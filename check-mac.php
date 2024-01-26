<?php
session_start();
require 'dbcon.php';

if (isset($_REQUEST['mac'])) {
    $student_mac = $_REQUEST["mac"];

    $query = "SELECT * FROM attendance WHERE macAddress='$student_mac'";
    $query_run = mysqli_query($con, $query);

    if ($query_run == true) {
       /*  while ($data = mysqli_fetch_array($query_run)) {
            // Check if the MAC address already exists in the attendance table
            // If yes, you may choose to handle this case
            // For now, let's assume you want to skip adding duplicate entries
            echo "exist";
        } */

        // Check if the current time matches any routine entry
		date_default_timezone_set("Asia/Dhaka");
		$d=date("Y-m-d H:i:s");
		$current_time = date("H",$d);
        $current_day = date("l", $d);
        $routine_query = "SELECT * FROM routine WHERE day='$current_day' AND '$current_time' BETWEEN stTime AND endTime";
        $routine_result = mysqli_query($con, $routine_query);

        if ($routine_result && mysqli_num_rows($routine_result) > 0) {
            // Fetch the student details from the students table
            $student_query = "SELECT * FROM students WHERE macAddress='$student_mac'";
            $student_result = mysqli_query($con, $student_query);

            if ($student_result && mysqli_num_rows($student_result) > 0) {
                $student_data = mysqli_fetch_array($student_result);

                // Insert the student's attendance into the attendance table
                $insert_query = "INSERT INTO attendance (name, ssid, macAddress, course, deviceMac, time_date)
                                VALUES ('{$student_data['name']}', '{$student_data['ssid']}', '$student_mac', '{$student_data['course']}', '4a:13:3c:62:b6:31', NOW())";
                
                $insert_result = mysqli_query($con, $insert_query);

                if ($insert_result) {
                    echo $student_data['name'] . " attendance recorded successfully.";
                } else {
                    echo "Error recording attendance: " . mysqli_error($con);
                }
            } else {
                echo "Student details not found.";
            }
        } else {
            echo "No matching routine found for the current time and day.";
        }
    }
}
?>
