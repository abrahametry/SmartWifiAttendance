<?php
session_start();
require 'dbcon.php';

// Set default values
$course = "";
$intake = "";
$section = "";
$startDate = date('Y-m-d');
$endDate = date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $course = isset($_POST['course']) ? $_POST['course'] : "";
    $intake = isset($_POST['intake']) ? $_POST['intake'] : "";
    $section = isset($_POST['section']) ? $_POST['section'] : "";
    $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : $startDate;
    $endDate = isset($_POST['end_date']) ? $_POST['end_date'] : $endDate;

    // Validate input to prevent SQL injection
    $course = mysqli_real_escape_string($con, $course);
    $intake = mysqli_real_escape_string($con, $intake);
    $section = mysqli_real_escape_string($con, $section);
    $startDate = mysqli_real_escape_string($con, $startDate);
    $endDate = mysqli_real_escape_string($con, $endDate);

    // Query to retrieve attendance based on filters
    $query = "SELECT a.*, s.course AS student_course, s.intake, s.sec
              FROM attendance a
              JOIN students s ON a.macAddress = s.macAddress
              WHERE 
              s.course = '$course' AND 
              s.intake = '$intake' AND 
              s.sec = '$section' AND 
              DATE(a.time_date) BETWEEN '$startDate' AND '$endDate'";
    $query_run = mysqli_query($con, $query);
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

    <title>Attendance Status</title>
</head>
<body>

<div class="container mt-4">
    <h4><b>Attendance Status</b></h4>
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
                    <br>
                    <!-- Search Form -->
                    <form class="form-inline" method="POST" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="course" placeholder="Course" value="<?= $course ?>">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="intake" placeholder="Intake" value="<?= $intake ?>">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="section" placeholder="Section" value="<?= $section ?>">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="form-control" name="start_date" value="<?= $startDate ?>">
                        </div>
                        <div class="input-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" name="end_date" value="<?= $endDate ?>">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-primary float-end">Search</button>
                    </form>

                </div>
                <div class="card-body">

                    <!-- Status Bar -->
                    <div class="alert alert-info" role="alert">
                        Showing results for Course: <strong><?= $course ?></strong>, Intake: <strong><?= $intake ?></strong>, Section: <strong><?= $section ?></strong>, Date Range: <strong><?= $startDate ?></strong> to <strong><?= $endDate ?></strong>
                    </div>

                    <!-- Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Student Course</th>
                                <th>Time Date</th>
                                <th>DeviceMac</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($query_run) && mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $attendance) {
                                    ?>
                                    <tr>
                                        <td><?= $attendance['std_id']; ?></td>
                                        <td><?= $attendance['name']; ?></td>
                                        <td><?= $attendance['student_course']; ?></td>
                                        <td><?= $attendance['time_date']; ?></td>
                                        <td><?= $attendance['deviceMac']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>No Record Found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
