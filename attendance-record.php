

<!DOCTYPE html>
<html lang="en">
<head>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <style>
       body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        margin-right: 10px;
    }

    input {
        padding: 8px;
    }

    button {
        background-color: #4caf50;
        color: white;
        padding: 8px 12px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .attendance-table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    th, td {
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

    .no-records {
        text-align: center;
        color: #333;
    }
    </style>
</head>
<body>

    <h1>Attendance Records</h1>
    <center>
        <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
    </center>
    
                        
    <div class="container mt-4">
                            <a href="homepage.php" class="btn btn-info">Home</a>
                            <a href="record-home-page.php" class="btn btn-info">Back</a>
                            <a href="index.php" class="btn btn-danger float-end">Logout</a>
                            <a style="margin-right:20px" href="student-details.php" class="btn btn-success float-end">Students Details</a>
    </div>                    
                    
<div><p>    </p></div>
    <!-- Search Form for Detailed Attendance -->
    <form class="search-form" method="post" action="">
        <label for="searchName">Search by Student Name:</label>
        <input type="text" id="searchName" name="searchName" placeholder="Enter student name">
        <button type="submit">Search</button>
    </form>

    <?php
session_start();
require 'dbcon.php';

// Function to fetch and display detailed attendance records
function displayDetailedAttendance($con, $studentName = null) {
    $query = "SELECT std_id, name, course, time_date FROM attendance";
    
    if ($studentName) {
        $query .= " WHERE name LIKE '%$studentName%'";
    }

    $query .= " ORDER BY time_date DESC";

    $result = mysqli_query($con, $query);
    

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table class="attendance-table">
        
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Date & Time</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['std_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['course'] . '</td>
                    
                    <td>' . $row['time_date'] . '</td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo '<p class="no-records">No records found.</p>';
    }
}

// Function to fetch and display the dates when each student was present
function displayAttendanceDates($con, $studentName = null) {
    $query = "SELECT name, GROUP_CONCAT(DISTINCT DATE(time_date) ORDER BY DATE(time_date) DESC) as datesPresent
              FROM attendance";

    if ($studentName) {
        $query .= " WHERE name LIKE '%$studentName%'";
    }

    $query .= " GROUP BY name ORDER BY datesPresent DESC";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table class="attendance-table">
                <tr>
                    <th>Student Name</th>
                    <th>Dates Present</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['datesPresent'] . '</td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo '<p class="no-records">No records found.</p>';
    }
}

// Function to fetch and display attendance records with Days Present
function displayAttendanceRecords($con, $studentName = null) {
    $query = "SELECT name, COUNT(DISTINCT DATE(time_date)) as daysPresent FROM attendance";
    
    if ($studentName) {
        $query .= " WHERE name LIKE '%$studentName%'";
    }

    $query .= " GROUP BY name ORDER BY daysPresent DESC";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table class="attendance-table">
                <tr>
                    <th>Student Name</th>
                    <th>Days Present</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['daysPresent'] . '</td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo '<p class="no-records">No records found.</p>';
    }
}

// Handle the search form submission for detailed attendance
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchName = $_POST['searchName'];
    displayDetailedAttendance($con, $searchName);
} else {
    // Display all records by default
    displayDetailedAttendance($con);
}

// Handle the search form submission for attendance dates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchName = $_POST['searchName'];
    displayAttendanceDates($con, $searchName);
} else {
    // Display all records by default
    displayAttendanceDates($con);
}

// Handle the search form submission for attendance records with Days Present
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchName = $_POST['searchName'];
    displayAttendanceRecords($con, $searchName);
} else {
    // Display all records by default
    displayAttendanceRecords($con);
}
?>
    <!-- Display Attendance Records -->
    <?php displayAttendanceRecords($con); ?>

</body>
</html>
