<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE sid='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: student-details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: student-details.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $sid = mysqli_real_escape_string($con, $_POST['sid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $ssid = mysqli_real_escape_string($con, $_POST['ssid']);
    $email = mysqli_real_escape_string($con, $_POST['macAddress']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $intake = mysqli_real_escape_string($con, $_POST['intake']);
    $sec = mysqli_real_escape_string($con, $_POST['sec']);

    $query = "UPDATE students SET sid = '$sid', name='$name', ssid='$ssid', macAddress='$email', phone='$phone', course='$course', intake='$intake',sec='$sec' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: student-details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: student-details");
        exit(0);
    }

}

if (isset($_POST['add_course'])) {
    $sid = mysqli_real_escape_string($con, $_POST['id']);
    $sid = mysqli_real_escape_string($con, $_POST['sid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $ssid = mysqli_real_escape_string($con, $_POST['ssid']);
    $email = mysqli_real_escape_string($con, $_POST['macAddress']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $intake = mysqli_real_escape_string($con, $_POST['intake']);
    $sec = mysqli_real_escape_string($con, $_POST['sec']);

    $query = "INSERT INTO students (sid,name,ssid,macAddress,phone,course,intake,sec) VALUES ('$sid','$name','$ssid','$email','$phone','$course','$intake','$sec')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Course Added Successfully";
        header("Location: student-details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Added";
        header("Location: student-details.php");
        exit(0);
    }
}


if(isset($_POST['save_student']))
{
    $sid = mysqli_real_escape_string($con, $_POST['id']);
    $sid = mysqli_real_escape_string($con, $_POST['sid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $ssid = mysqli_real_escape_string($con, $_POST['ssid']);
    $email = mysqli_real_escape_string($con, $_POST['macAddress']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $intake = mysqli_real_escape_string($con, $_POST['intake']);
    $sec = mysqli_real_escape_string($con, $_POST['sec']);

    $query = "INSERT INTO students (sid,name,ssid,macAddress,phone,course,intake,sec) VALUES ('$sid','$name','$ssid','$email','$phone','$course','$intake','$sec')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>