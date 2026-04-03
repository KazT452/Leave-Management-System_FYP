<?php
    require_once "config.php";
    $conn = mysqli_connect("localhost", "root", "passwd", "sms101");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>