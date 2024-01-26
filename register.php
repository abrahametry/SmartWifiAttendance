<?php
session_start();
require 'dbcon.php'; // Make sure to replace this with your actual database connection file

if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['role']))
{
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $role = $_REQUEST["role"];

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists. Please choose a different one.";
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO users (Name, email, pass, role) VALUES ('$name', '$email', '$password', '$role')";
        
        if (mysqli_query($con, $insertQuery)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
        }
    }
}
?>


    <!-- if($user=="teacher1" && $pass=="11111111"){
        $_SESSION['message'] = "teacher1 Successfully Login !";
       // echo "attendance";
        header("Location: attendance.php");
        // exit(0)
    }else if($user=="teacher2" && $pass=="00000000"){
        $_SESSION['message'] = "teacher2 Successfully Login !";
       // echo "attendance";
        header("Location: attendance.php");
    }else{
        //echo "index";
        $_SESSION['message'] = "user or password incorrect !";
        header("Location: index.php");
        // exit(0);
    } -->


