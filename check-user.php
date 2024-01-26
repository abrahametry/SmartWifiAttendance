<?php
session_start();
require 'dbcon.php'; // Make sure to replace this with your actual database connection file

if(isset($_POST['email']) && isset($_POST['pass']))
{
    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Validate the user
    $loginQuery = "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";
    $result = mysqli_query($con, $loginQuery);

    // echo var_dump($result);
    // exit();

    if (mysqli_num_rows($result) > 0) {
        // Login successful
        $_SESSION['email'] = $email;
        echo "Login successful. Redirect to dashboard or home page.";
        // You can redirect the user to another page, for example:
        header("Location: homepage.php");
    } else {
        // Login failed
        $_SESSION['message'] = "user or password incorrect !";
        header("Location: index.php");
        exit(0);
    }
}
?>
