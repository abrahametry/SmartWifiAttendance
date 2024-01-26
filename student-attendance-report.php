<?php
session_start();
require 'dbcon.php';

// Variables to store search parameters
$studentId = "";
$selectedCourse = "";

$totalDaysInCourse = 30; // Default value
$attendedDates = []; // Initialize an empty array for attended dates
$std_id = ""; // Initialize student ID
$intake = ""; // Initialize intake
$sec = ""; // Initialize section
$studentName = ""; // Initialize student name

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get search parameters from the form
    $studentId = mysqli_real_escape_string($con, $_POST['student_id']);
    $selectedCourse = mysqli_real_escape_string($con, $_POST['course']);
    
    // Query to get total attendance in a course
    $totalDaysInCourseQuery = "SELECT DISTINCT(r.stTime) AS attendance_count FROM attendance a ,students s, routine r 
        WHERE  a.course = '$selectedCourse' and a.course=s.course and a.std_id = s.sid and r.c_code=a.course and r.scanner=a.deviceMac and r.day=dayname(a.time_date)";
    $totalDaysInCourseQuery_run = mysqli_query($con, $totalDaysInCourseQuery);
    $totalDaysInCourse = mysqli_num_rows($totalDaysInCourseQuery_run);
  
    $totalDaysInCourse = 10;
    
    // Check if totalDaysInCourse is not zero to avoid division by zero error
    if ($totalDaysInCourse !== 0) {
        // Query to retrieve attendance records for the selected student and course
        $query = "SELECT a.*, s.name, s.intake, s.sec FROM attendance a
                  JOIN students s ON a.std_id = s.id
                  WHERE a.std_id = '$studentId' AND a.course = '$selectedCourse' AND a.attend = 'Pre'";
        $query_run = mysqli_query($con, $query);

        // Query to get additional information about attendance
        $daysAttendedQuery = "SELECT DISTINCT DATE(a.time_date) AS attendance_date FROM attendance a
                              JOIN students s ON a.std_id = s.sid
                              WHERE a.std_id = '$studentId' AND a.course = '$selectedCourse' AND a.attend = 'Pre' and a.course=s.course";
        $daysAttendedQuery_run = mysqli_query($con, $daysAttendedQuery);
        $numberOfDaysAttended = mysqli_num_rows($daysAttendedQuery_run);
       
        // Fetch student information
        $studentQuery = "SELECT sid, name, intake, sec FROM students WHERE sid = '$studentId'";
        $studentQuery_run = mysqli_query($con, $studentQuery);

        if ($studentQuery_run) {
            $studentData = mysqli_fetch_assoc($studentQuery_run);
            $std_id = $studentData['sid'];
            $studentName = $studentData['name'];
            $intake = $studentData['intake'];
            $sec = $studentData['sec'];
        }

        // Calculate attendance percentage
        $attendancePercentage = ceil(($numberOfDaysAttended / $totalDaysInCourse) * 100);

        // Define attendance status based on percentage
        if ($attendancePercentage >= 80) {
            $attendanceStatus = "Good";
        } elseif ($attendancePercentage >= 60) {
            $attendanceStatus = "Average";
        } else {
            $attendanceStatus = "Poor";
        }

        // Retrieve the attended dates
        while ($row = mysqli_fetch_assoc($daysAttendedQuery_run)) {
            $attendedDates[] = $row['attendance_date'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Student Attendance Report Card</title>
</head>
<body>

<div class="container mt-4">
    <h4><b>Student Attendance Report Card</b></h4>
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
                        <a href="record-home-page.php" class="btn btn-info">Record</a>
                        <a href="index.php" class="btn btn-danger float-end">Logout</a>
                        <a style="margin-right:20px" href="student-details.php" class="btn btn-success float-end">Students Details</a>
                    </h4>
                </div>
                <div class="card-body">

                    <!-- Search Form -->
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="student_id">Student ID:</label>
                                <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID" value="<?= $studentId ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="course">Course:</label>
                                <input type="text" name="course" class="form-control" placeholder="Enter Course" value="<?= $selectedCourse ?>">
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </div>
                    </form>

                    <!-- Additional Information -->
                    <?php if (isset($numberOfDaysAttended)) { ?>
                        <div class="mt-4">
                            <h5 class="mb-3">Attendance Summary</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Student ID</th>
                                        <th>Course</th>
                                        <th>Total Days in Course</th>
                                        <th>Days Attended</th>
                                        <th>Attendance Percentage</th>
                                        <th>Attendance Status</th>
                                        <th>Intake</th>
                                        <th>Section</th>
                                    </tr>
                                    <tr>
                                        <td><?= $std_id ?></td>
                                        <td><?= $studentName ?></td>
                                        <td><?= $studentId ?></td>
                                        <td><?= $selectedCourse ?></td>
                                        <td><?= $totalDaysInCourse ?></td>
                                        <td><?= $numberOfDaysAttended ?></td>
                                        <td><?= $attendancePercentage ?>%</td>
                                        <td><?= $attendanceStatus ?></td>
                                        <td><?= $intake ?></td>
                                        <td><?= $sec ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Charts -->
                        <div class="row mt-4">
                            <!-- Doughnut Chart -->
                            <div class="col-md-6">
                                <canvas id="attendanceDoughnutChart" width="300" height="300"></canvas>
                            </div>
                            <!-- Bar Chart -->
                            <div class="col-md-6">
                                <canvas id="attendanceBarChart" width="300" height="300"></canvas>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="mb-3">Attendance Dates</h5>
                            <ul>
                                <?php foreach ($attendedDates as $date) { ?>
                                    <li><?= $date ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <script>
                            // Doughnut Chart for overall attendance
                            var ctxDoughnut = document.getElementById('attendanceDoughnutChart').getContext('2d');
                            var myDoughnutChart = new Chart(ctxDoughnut, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Attended', 'Missed'],
                                    datasets: [{
                                        data: [<?= $numberOfDaysAttended ?>, <?= $totalDaysInCourse - $numberOfDaysAttended ?>],
                                        backgroundColor: ['green', 'red'],
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Overall Attendance',
                                        }
                                    }
                                }
                            });
                        </script>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
