<?php
session_start();
require 'dbcon.php';

// Fetch all students
$selectQuery = "SELECT * FROM students";
$result = mysqli_query($con, $selectQuery);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Handle search
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $intake = mysqli_real_escape_string($con, $_POST['intake']);
    $section = mysqli_real_escape_string($con, $_POST['section']);

    // Build the search query
    $searchConditions = array();

    if (!empty($course)) {
        $searchConditions[] = "course = '$course'";
    }
    if (!empty($intake)) {
        $searchConditions[] = "intake = '$intake'";
    }
    if (!empty($section)) {
        $searchConditions[] = "sec = '$section'";
    }

    if (!empty($searchConditions)) {
        $searchQuery = "SELECT * FROM students WHERE " . implode(' AND ', $searchConditions);
        $result = mysqli_query($con, $searchQuery);

        if (!$result) {
            die("Search query failed: " . mysqli_error($con));
        }

        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

    <title>Manual Attendance</title>
</head>
<body>

<div class="container mt-4">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
                    </center>
                    <h4>
                        <div>Manual Attendance</div>
                        <br>
                        <a href="index.php" class="btn btn-danger float-end">🚪Logout</a>
                        <a style="margin-right: 20px" href="homepage.php" class="btn btn-success float-end">🏡Home</a>
                    </h4>
                </div>
                <br>
                <div class="card-body">

                    <!-- Search Form -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="course" class="form-label">Course:</label>
                            <input type="text" class="form-control" id="course" name="course">
                        </div>
                        <div class="mb-3">
                            <label for="intake" class="form-label">Intake:</label>
                            <input type="text" class="form-control" id="intake" name="intake">
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Section:</label>
                            <input type="text" class="form-control" id="section" name="section">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    <!-- Student Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>SSID</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student) { ?>
                                <tr>
                                    <td><?= $student['sid']; ?></td>
                                    <td><?= $student['name']; ?></td>
                                    <td><?= $student['ssid']; ?></td>
                                    <td><?= $student['course']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Attendance">
                                        <a style="margin-right: 20px" href="update-manual-attendance.php" class="btn btn-success float-end">🏡present</a>
                                            <button type="button" class="btn btn-success" onclick="markAttendance('Present', <?= $student['sid']; ?>)">Present</button>
                                            <button type="button" class="btn btn-danger" onclick="markAttendance('Absent', <?= $student['sid']; ?>)">Absent</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-c3VI6n0rrqfU1xHjHjvyoiJKyFtC5bF7XHIJ6lhlF0HeYo9fXQ3XEeuRHoYKTIqk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-o3eHgA6V1iB7uYVijFP6SGIaqJX0uqTlMYFqgFxFMlFFv2EysuP1TKz/J++JoEaR" crossorigin="anonymous"></script>

<script>
    function markAttendance(status, studentId) {
        // Implement your AJAX code here to update the attendance
        // You can send the status and student ID to the server for processing
        // Example AJAX structure using jQuery:
        $.ajax({
            type: 'POST',
            url: 'update_attendance.php',
            data: { status: status, student_id: studentId },
            success: function(response) {
                // Handle success, e.g., update UI or show a message
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>

</body>
</html>
