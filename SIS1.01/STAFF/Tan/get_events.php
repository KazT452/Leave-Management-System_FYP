<?php
// Hide notices/warnings from outputting into the JSON response
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 0);

// Only start session if one isn't already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbPath = "../../dbconnection.php";
$userPath = "../class/User.php";

if (file_exists($dbPath)) {
    require_once $dbPath;
}
if (file_exists($userPath)) {
    include($userPath);
}

header('Content-Type: application/json');

if (!isset($_SESSION['userid'])) {
    echo json_encode(['error' => 'Unauthorized / Session expired']);
    exit;
}

if (!isset($conn)) {
    echo json_encode(['error' => 'Database connection variable ($conn) not found in dbconnection.php']);
    exit;
}

try {
    $sql = "SELECT lr.leave_id AS id,
                   CONCAT(u.first_name, ' ', u.last_name) AS staff_name,
                   lr.leave_type,
                   lr.start_date AS start,
                   lr.end_date
            FROM leave_requests lr
            JOIN user u ON lr.staff_id = u.id
            WHERE lr.status = 'Approved'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception(mysqli_error($conn));
    }

    $rawLeaves = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $events = [];
    foreach ($rawLeaves as $leave) {
        // FullCalendar all-day end dates are exclusive, so we add 1 day to include the final day of leave
        $endDate = date('Y-m-d', strtotime($leave['end_date'] . ' + 1 day'));

        $bgColor = '#007bff';
        $textColor = '#fff';

        if ($leave['leave_type'] === 'Medical') {
            $bgColor = '#dc3545';
        } elseif ($leave['leave_type'] === 'Emergency' || $leave['leave_type'] === 'Compassionate') {
            $bgColor = '#ffc107';
            $textColor = '#000';
        }

        $events[] = [
            'title' => $leave['staff_name'] . ' (' . $leave['leave_type'] . ')',
            'start' => $leave['start'],
            'end'   => $endDate,
            'backgroundColor' => $bgColor,
            'textColor' => $textColor
        ];
    }

    echo json_encode($events);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>