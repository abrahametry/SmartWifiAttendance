<?php
session_start();
require 'dbcon.php';


    $query = "DELETE FROM scan";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "All Scan ssid and macAddress deleted !";
        header("Location: scan.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Fail to delete !";
        header("Location: scan.php");
        exit(0);
    }




?>