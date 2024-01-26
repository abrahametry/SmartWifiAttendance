<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Routine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 70%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            align-items: center;
            margin: auto;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 55px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #viewRoutineBtn {
            background-color: #5bc0de;
            border: 1px solid #46b8da;
            color: #fff;
            padding: 10px 15px;
            margin-top: 10px;
            cursor: pointer;
        }

        #routineTableContainer {
            display: none;
            margin-top: 20px;
        }

        #routineTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #routineTable th,
        #routineTable td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        #routineTable th {
            background-color: #4caf50;
            color: white;
        }

        #routineTable tr:hover {
            background-color: #45a049S;
        }

        .navbar {
            overflow: hidden;
            background-color: whitesmoke;
        }

        .navbar a {
            float: center;
            display: block;
            color: #45a049;
            text-align: center;
            padding: 14px 40px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: #f44336;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            background-color: #4caf50;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            margin: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .button1 {
            background-color: #f44336;
        }
        .button4 {border-radius: 12px;}
    </style>
</head>

<body>
    <?php
    session_start();
    require 'dbcon.php';

    $sql = "SELECT stTime, endTime, c_code, scanner, day FROM routine";
    $result = $con->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    ?>

    

    <div class="container mt-4">
        
        <div class="navbar">
            <center>
            <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
        </center>
        <a href="homepage.php"><button class="button4">🏡   <b>Home</b>        </button></a>
        <a href="view-routine.php"><button class="button4"><b>View Routine</b></button></a>
        <a href="index.php" style="float: right;">Logout</a>
    </div>
        <h1>Class Routine</h1>

        <?php
        // Fetch $student details here

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Your existing PHP code for adding routine
            $stTime = $_POST["stTime"];
            $endTime = $_POST["endTime"];
            $classCode = $_POST["classCode"];
            $intake = $_POST["intake"];
            $sec = $_POST["sec"];
            $roomNumber = $_POST["room_number"];
            $day = $_POST["day"];

            // Insert data into the routine table
            $insertQuery = "INSERT INTO routine (stTime, endTime, c_code, intake, sec, scanner, day) 
                            VALUES ('$stTime', '$endTime', '$classCode', '$intake', '$sec', '$roomNumber', '$day')";

            if ($con->query($insertQuery) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $con->error;
            }
        }
        ?>

        <form id="classRoutineForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="startTime">Start Time:</label>
            <input type="time" id="startTime" name="stTime" value="<?= $student['stTime'] ?? ""; ?>">

            <label for="endTime">End Time:</label>
            <input type="time" id="endTime" name="endTime" value="<?= $student['endTime'] ?? ""; ?>">

            <label for="classCode">Subject Code:</label>
            <input type="text" id="classCode" name="classCode" value="<?= $student['c_code'] ?? ""; ?>" placeholder="CS101">

            <label for="classCode">Intake:</label>
            <input type="text" id="intake" name="intake" value="<?= $student['intake'] ?? ""; ?>" placeholder="#Intake NUMBER">

            <label for="classCode">Section:</label>
            <input type="text" id="sec" name="sec" value="<?= $student['sec'] ?? ""; ?>" placeholder="#Section NUMBER">

            <label for="deviceName">Class Room/Device Name:</label>
            <input type="text" id="deviceName" name="room_number" value="<?= $student['room_num'] ?? ""; ?>" placeholder="#ClassRoom_B1-301">

            <label for="day">Day:</label>
            <select id="day" name="day">
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Saturday">Saturday</option>
            </select>
            <br>
            <br>
            <br>
            <button class="button button1" type="submit">Update Routine</button>
            
        </form>
        <br>
        <br>
        <center>
            <a href="view-routine.php" class="btn btn-info">View Routine</a>
        </center>
    </div>

</body>

</html>
