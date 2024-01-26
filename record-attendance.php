<?php
session_start();
require 'dbcon.php';

if(isset($_GET['scanner']) && isset($_GET['course'])) {
    $scanner = mysqli_real_escape_string($con, $_GET['scanner']);
    $course = mysqli_real_escape_string($con, $_GET['course']);
}else{
    $scanner = "";
    $course = "";
}

$query = "UPDATE attendance set attend='Pre'
where attendance.deviceMac = '$scanner' and attendance.attend is NULL and TIME(attendance.time_date) 
BETWEEN (select stTime from routine,scan where routine.c_code = '$course' and routine.scanner='$scanner' and dayname(CURRENT_TIMESTAMP)=routine.day and time(scan.access_time) BETWEEN stTime and endTime
and routine.scanner=scan.scanner limit 1) 
AND (select endTime from routine,scan where routine.c_code = '$course' and routine.scanner='$scanner' and dayname(CURRENT_TIMESTAMP)=routine.day and time(scan.access_time) BETWEEN stTime and endTime
and routine.scanner=scan.scanner limit 1)";

$query_run = mysqli_query($con, $query);

/* $query="INSERT INTO attendance (std_id, name, ssid, macAddress, course, time_date, deviceMac)
SELECT students.sid AS std_id, students.name, students.ssid, students.macAddress, students.course, scan.access_time, scan.scanner AS deviceMac FROM routine,scan,students
where routine.scanner = '$scanner' AND TIME(scan.access_time) BETWEEN stTime AND endTime
AND routine.c_code = '$course' and dayname(CURRENT_TIMESTAMP)=routine.day and scan.scanner = routine.scanner and students.macAddress = scan.mac and c_code=course and date(scan.access_time)=date(CURRENT_TIMESTAMP)";


$query_run = mysqli_query($con, $query); */

// redirect to advance-attendance.php
header("Location: advance-attendance.php");
?>