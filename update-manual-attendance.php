<?php
session_start();
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = isset($_POST['student_id']) ? mysqli_real_escape_string($con, $_POST['student_id']) : "";
    $course = isset($_POST['course']) ? mysqli_real_escape_string($con, $_POST['course']) : "";
    $status = isset($_POST['status']) ? mysqli_real_escape_string($con, $_POST['status']) : "";

    // You may add additional validation or checks here

    $insertQuery = "INSERT INTO attendance (std_id, name, ssid, macAddress, course, time_date, deviceMac, attend)
                    SELECT sid AS std_id, name, ssid, macAddress, '$course', NOW(), 'your_device_mac', '$status'
                    FROM students
                    WHERE sid = '$studentId'";

    $query_run = mysqli_query($con, $insertQuery);

    if (!$query_run) {
        echo "Error: " . mysqli_error($con);
    } else {
        echo "Attendance recorded successfully!";
    }
}
?>
