<?php
session_start();
require 'dbcon.php';

if(isset($_REQUEST['id']))
{
    $student_id = $_REQUEST["id"];

    $query = "DELETE FROM attendance WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: advance-attendance.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: advance-attendance.php");
        exit(0);
    }
}


?>