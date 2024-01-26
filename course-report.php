<?php
session_start();
require 'dbcon.php';

// Variables to store search parameters
$selectedCourse = "";
$totalDaysInCourse = 30; // Default value
$selectedIntake = "";
$selectedSection = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $selectedCourse = isset($_POST['course']) ? htmlspecialchars($_POST['course']) : "";
    $totalDaysInCourse = isset($_POST['total_days']) ? (int)$_POST['total_days'] : 0;
    $selectedIntake = isset($_POST['intake']) ? htmlspecialchars($_POST['intake']) : "";
    $selectedSection = isset($_POST['sec']) ? htmlspecialchars($_POST['sec']) : "";

    
    // Query to get total attendance in a course
    $totalDaysInCourseQuery = "SELECT DISTINCT(r.stTime) AS attendance_count FROM attendance a ,students s, routine r 
        WHERE  a.attend='Pre' and a.course = '$selectedCourse' and a.course=s.course and a.std_id = s.sid and r.c_code=a.course and r.scanner=a.deviceMac and r.day=dayname(a.time_date)";
    $totalDaysInCourseQuery_run = mysqli_query($con, $totalDaysInCourseQuery);
    $totalDaysInCourse = mysqli_num_rows($totalDaysInCourseQuery_run);

    $totalDaysInCourse = 10;
    // Validate totalDaysInCourse to avoid division by zero error
    if ($totalDaysInCourse <= 0) {
        echo "Error: Total days in the course must be greater than zero. Total Class Count = 0";
        exit();
    }

    // Check if totalDaysInCourse is not zero to avoid division by zero error
    if ($totalDaysInCourse !== 0) {
        // Establish a database connection
        $con = mysqli_connect("localhost", "root", "", "students");

        // Check for connection errors
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to retrieve attendance records for the selected course, intake, and section
        $query = "SELECT DISTINCT s.name, s.sid FROM students s
                  INNER JOIN attendance a ON s.macAddress = a.macAddress
                  WHERE s.course = '$selectedCourse' AND s.intake = '$selectedIntake' AND s.sec = '$selectedSection'";
        $query_run = mysqli_query($con, $query);

        // Check for query execution errors
        if (!$query_run) {
            die("Query failed: " . mysqli_error($con));
        }

        // Array to store student attendance data
        $studentsAttendanceData = [];

        // Loop through each student and fetch attendance data
        while ($row = mysqli_fetch_assoc($query_run)) {
            $studentName = $row['name'];
            $studentID = $row['sid'];

            // Modify the query to join the attendance table based on macAddress and course
            $studentAttendanceQuery = "
                SELECT 
                    COUNT(*) AS attended_days,
                    GROUP_CONCAT(DISTINCT DATE(time_date) ORDER BY DATE(time_date)) AS attended_dates
                FROM attendance
                WHERE name = '$studentName' AND course = '$selectedCourse' AND attend = 'Pre'
            ";

            $studentAttendanceQuery_run = mysqli_query($con, $studentAttendanceQuery);

            // Check for query execution errors
            if (!$studentAttendanceQuery_run) {
                die("Query failed: " . mysqli_error($con));
            }

            $attendanceData = mysqli_fetch_assoc($studentAttendanceQuery_run);

            // Calculate attendance percentage for each student
            $attendancePercentage = ceil(($attendanceData['attended_days'] / $totalDaysInCourse) * 100);

            // Store data in the array
            $studentsAttendanceData[] = [
                'name' => $studentName,
                'id' => $studentID,
                'attended_days' => $attendanceData['attended_days'],
                'attendance_percentage' => $attendancePercentage,
                'attended_dates' => explode(',', $attendanceData['attended_dates']),
            ];
        }

        // Overall course attendance data
        $overallAttendanceQuery = "SELECT COUNT(DISTINCT name) AS total_students, COUNT(*) AS total_attended_days FROM attendance WHERE course = '$selectedCourse' AND attend = 'Pre'";
        $overallAttendanceQuery_run = mysqli_query($con, $overallAttendanceQuery);

        // Check for query execution errors
        if (!$overallAttendanceQuery_run) {
            die("Query failed: " . mysqli_error($con));
        }

        $overallAttendanceData = mysqli_fetch_assoc($overallAttendanceQuery_run);

        // Calculate overall attendance percentage, checking for division by zero
        $overallAttendancePercentage = 0; // Default value

        if ($totalDaysInCourse > 0 && $overallAttendanceData['total_students'] > 0) {
            $overallAttendancePercentage = ($overallAttendanceData['total_attended_days'] / ($totalDaysInCourse * $overallAttendanceData['total_students'])) * 100;
        }

        // Close the database connection
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>
    <title>Course Attendance Record</title>
</head>
<body>

<div class="container mt-4">
    <div class="container mt-4">
        <h4><b>Course Attendance Record</b></h4>
    </div>

    <div class="container mt-4">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <center>
                                <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
                            </center>
                            <a href="homepage.php" class="btn btn-info">Home</a>
                            <a href="record-home-page.php" class="btn btn-info">Student Record</a>
                            <a href="index.php" class="btn btn-danger float-end">Logout</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <!-- Search Form -->
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="course">Course:</label>
                                    <input type="text" name="course" class="form-control" value="<?php echo htmlspecialchars($selectedCourse); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="intake">Intake:</label>
                                    <input type="text" name="intake" class="form-control" value="<?php echo htmlspecialchars($selectedIntake); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="sec">Section:</label>
                                    <input type="text" name="sec" class="form-control" value="<?php echo htmlspecialchars($selectedSection); ?>">
                                </div>
                                <!-- <div class="col-md-4">
                                    <label for="total_days">Total Days in Course:</label>
                                    <input type="number" name="total_days" class="form-control" value="<?php echo $totalDaysInCourse; ?>">
                                </div> -->
                                <div class="col-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <!-- Display Individual Student Attendance Data in a Table -->
                        <?php if (!empty($studentsAttendanceData)): ?>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Student ID</th>
                                            <th>Attended Days</th>
                                            <th>Attendance Percentage</th>
                                            <!-- <th>Attended Dates</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($studentsAttendanceData as $studentData): ?>
                                            <tr>
                                                <td><?php echo $studentData['name']; ?></td>
                                                <td><?php echo $studentData['id']; ?></td>
                                                <td><?php echo $studentData['attended_days']; ?></td>
                                                <td><?php echo $studentData['attendance_percentage']; ?>%</td>
                                                <!-- <td><?php echo implode(', ', $studentData['attended_dates']); ?></td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>No attendance data available for the selected course, intake, and section.</p>
                        <?php endif; ?>

                        <!-- Display Overall Course Attendance Data -->
                        <div class="overall-attendance mt-4">
                            <h5>Overall Attendance</h5>
                            <?php if (isset($overallAttendanceData)): ?>
                                <p>Total Students: <?php echo $overallAttendanceData['total_students']; ?></p>
                                <!-- <p>Total Attended Days: <?php echo $overallAttendanceData['total_attended_days']; ?></p> -->
                            <?php else: ?>
                                <p>Total Students: N/A</p>
                                <p>Total Attended Days: N/A</p>
                            <?php endif; ?>

                            <?php if (isset($overallAttendancePercentage)): ?>
                                <p>Overall Attendance Percentage: <?php echo $overallAttendancePercentage; ?>%</p>
                            <?php else: ?>
                                <p>Overall Attendance Percentage: N/A</p>
                            <?php endif; ?>
                        </div>

                        <!-- Canvas for Chart -->
                        <canvas id="attendanceChart" width="400" height="200"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script for Chart.js -->
<script>
    var ctx = document.getElementById('attendanceChart').getContext('2d');
    var data = {
        labels: <?php echo json_encode(array_column($studentsAttendanceData, 'name')); ?>,
        datasets: [{
            label: 'Attendance Percentage',
            data: <?php echo json_encode(array_column($studentsAttendanceData, 'attendance_percentage')); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    var options = {
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    };

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

</body>
</html>
