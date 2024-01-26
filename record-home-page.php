<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System Home</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .logo {
            width: 150px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <img src="bubt.png" alt="Logo" class="logo"> <!-- Replace 'your_logo.png' with your actual logo file path -->

        <h1>Attendance Record</h1>

        <!-- Navigation Links -->
        <div class="btn-container">
            
            <a href="current-date-record.php" class="btn"> Daily Attendace Status</a>
            <a href="student-attendance-report.php" class="btn">Attendace Report of a Student</a>
            <a href="course-report.php" class="btn">Course Report for a Class</a>

           
        </div>
    </div>

</body>

</html>
