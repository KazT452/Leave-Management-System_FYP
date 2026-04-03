<?php
    require_once "../../dbconnection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the hidden ID from the form
        $leave_id   = isset($_POST['leave_id']) ? $_POST['leave_id'] : "";
        $leave_type = $_POST['leave_type'];
        $start_date = $_POST['start_date'];
        $end_date   = $_POST['end_date'];
        $reason     = $_POST['reason'];
        $temp_staff_id = 1; // Keep for testing

        // Date Validation
        if (strtotime($end_date) < strtotime($start_date)) {
            header("Location: staffdashboard.php?msg=invalid_date");
            exit();
        }

        // File Upload Logic
        $filename = "";
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
            $target_dir = "uploads/";
            $filename = time() . "_" . basename($_FILES["attachment"]["name"]);
            if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
            move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_dir . $filename);
        }

        // UPDATE OR INSERT
        if (!empty($leave_id)) {
            // EDITING REQUEST
            if ($filename != "") {
                // Update with new attachment
                $sql = "UPDATE leave_requests SET leave_type=?, start_date=?, end_date=?, reason=?, attachment_path=? WHERE leave_id=? AND Staff_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssssii", $leave_type, $start_date, $end_date, $reason, $filename, $leave_id, $temp_staff_id);
            } else {
                // Update without changing the old attachment
                $sql = "UPDATE leave_requests SET leave_type=?, start_date=?, end_date=?, reason=? WHERE leave_id=? AND Staff_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssssii", $leave_type, $start_date, $end_date, $reason, $leave_id, $temp_staff_id);
            }
        } else {
            // CREATING NEW REQUEST
            $sql = "INSERT INTO leave_requests (Staff_ID, leave_type, start_date, end_date, reason, attachment_path, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "isssss", $temp_staff_id, $leave_type, $start_date, $end_date, $reason, $filename);
        }

        // --- Execute and Redirect ---
        if (mysqli_stmt_execute($stmt)) {
            $msg = !empty($leave_id) ? "updated" : "success";
            header("Location: staffdashboard.php?msg=$msg");
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>