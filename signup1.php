<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
            width: 350px;
            margin: 0 auto;
            padding: 30px;
            /* Increased padding */
            padding-right: 45px;
            margin-top: 100px;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .input-group button:hover {
            background-color: #0056b3;
        }

        .register-link {
            margin-top: 10px;
        }

        #role {
            width: 100%;
            padding: 10px;
            /* outline: #000; */
            border: 1px solid gray;
            border-radius: 5px;
            color: #000;
            cursor: pointer;
        }
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="login-container">
        <span style="color : red;"> <?php include('message.php'); ?> </span>
        <center>
        <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
        </center>
        <h2>Signup</h2>
        <form action="register.php" method="post">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $student['name'] ?? ""; ?>" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?= $student['email'] ?? ""; ?>" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?= $student['pass'] ?? ""; ?>" required>
            </div>
            <div class="input-group">
                <label for="role">Role:</label>
                <select id="role" name="role" value="<?= $student['role']; ?>" required>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select><br>
                <!-- <input type="text" id="role" name="role" required> -->
            </div>

            <div class="input-group">
                <button type="submit">
                    Signup
                </button>
            </div>
        </form>
        <div class="register-link">
            <a href="index.php">Login</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>