<?php
    require_once "../../../dbconnection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get data from the Review Modal
        $leave_id = mysqli_real_escape_string($conn, $_POST['leave_id']);
        $action = mysqli_real_escape_string($conn, $_POST['action']); // 'Approved' or 'Rejected'
        $remark = mysqli_real_escape_string($conn, $_POST['admin_remark']);

        // Update the database
        $sql = "UPDATE leave_requests
                SET status = '$action',
                    admin_remark = '$remark'
                WHERE leave_id = '$leave_id'";

        if (mysqli_query($conn, $sql)) {
            // Success! Redirect back to admin dashboard
            header("Location: admindashboard.php?msg=success");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>