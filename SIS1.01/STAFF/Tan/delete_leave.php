<?php
    require_once "../../dbconnection.php";

    if (isset($_GET['id'])) {
        $leave_id = intval($_GET['id']); // Safety: Force it to be an integer

        // 1. SECURITY CHECK: Only delete if status is 'Pending'
        // This prevents users from 'hacking' the URL to delete Approved/Rejected records.
        $checkSql = "SELECT status, attachment_path FROM leave_requests WHERE leave_id = ?";
        $stmt = mysqli_prepare($conn, $checkSql);
        mysqli_stmt_bind_param($stmt, "i", $leave_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row && $row['status'] === 'Pending') {

            // 2. CLEANUP: Delete the physical file from the 'uploads' folder
            if (!empty($row['attachment_path'])) {
                $file_path = "uploads/" . $row['attachment_path'];
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // 3. THE ACTION: Delete from Database
            $deleteSql = "DELETE FROM leave_requests WHERE leave_id = ?";
            $delStmt = mysqli_prepare($conn, $deleteSql);
            mysqli_stmt_bind_param($delStmt, "i", $leave_id);

            if (mysqli_stmt_execute($delStmt)) {
                header("Location: staffdashboard.php?status=deleted");
                exit();
            }
        } else {
            // If it's already Approved/Rejected, redirect with an error
            header("Location: staffdashboard.php?status=error_locked");
            exit();
        }
    }
?>