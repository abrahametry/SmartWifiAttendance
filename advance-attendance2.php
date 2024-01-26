<?php
session_start();
require 'dbcon.php';

$scanner = isset($_POST['scanner']) ? mysqli_real_escape_string($con, $_POST['scanner']) : "";
$course = isset($_POST['course']) ? mysqli_real_escape_string($con, $_POST['course']) : "";

$rowCount = 0; // Initialize $rowCount to 0

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleteQuery = "DELETE FROM attendance
                    WHERE attendance.deviceMac = '$scanner'
                    AND DATE(attendance.time_date) = CURRENT_DATE
                    AND TIME(attendance.time_date) BETWEEN 
                        (SELECT stTime FROM routine, scan 
                            WHERE routine.c_code = '$course' 
                            AND routine.scanner='$scanner' 
                            AND dayname(CURRENT_TIMESTAMP) = routine.day 
                            AND time(scan.access_time) BETWEEN stTime AND endTime 
                            AND routine.scanner=scan.scanner LIMIT 1) 
                    AND 
                        (SELECT endTime FROM routine, scan 
                            WHERE routine.c_code = '$course' 
                            AND routine.scanner='$scanner' 
                            AND dayname(CURRENT_TIMESTAMP) = routine.day 
                            AND time(scan.access_time) BETWEEN stTime AND endTime 
                            AND routine.scanner=scan.scanner LIMIT 1)";

    $deleteResult = mysqli_query($con, $deleteQuery);

    $insertQuery = "INSERT INTO attendance (std_id, name, ssid, macAddress, course, time_date, deviceMac)
                    SELECT students.sid AS std_id, students.name, students.ssid, students.macAddress, students.course, scan.access_time, scan.scanner AS deviceMac 
                    FROM routine, scan, students
                    WHERE routine.scanner = '$scanner' 
                    AND TIME(scan.access_time) BETWEEN stTime AND endTime
                    AND routine.c_code = '$course' 
                    AND dayname(CURRENT_TIMESTAMP) = routine.day 
                    AND scan.scanner = routine.scanner 
                    AND students.macAddress = scan.mac 
                    AND students.course = '$course'
                    AND DATE(scan.access_time) = CURRENT_DATE
                    AND NOT EXISTS (
                        SELECT 1 FROM attendance
                        WHERE attendance.std_id = students.sid
                        AND DATE(attendance.time_date) = CURRENT_DATE
                    )";

    $insertResult = mysqli_query($con, $insertQuery);

    $selectQuery = "SELECT students.sid AS std_id, students.name, students.ssid, students.macAddress, students.course, scan.access_time, scan.scanner AS deviceMac 
                    FROM routine, scan, students
                    WHERE routine.scanner = '$scanner' 
                    AND TIME(scan.access_time) BETWEEN stTime AND endTime
                    AND routine.c_code = '$course' 
                    AND dayname(CURRENT_TIMESTAMP) = routine.day 
                    AND scan.scanner = routine.scanner 
                    AND students.macAddress = scan.mac 
                    AND students.course = '$course'
                    AND DATE(scan.access_time) = CURRENT_DATE";

    $query_run = mysqli_query($con, $selectQuery);

    if ($query_run !== false) {
        $rowCount = mysqli_num_rows($query_run);
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

    <title>Attendance</title>
</head>
<body>

<div class="container mt-4">

    <div class="container mt-4">
        <h4><b>Attendance</b></h4>
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
                            <a href="homepage.php" class="btn btn-primary">🏡Home</a>
                            <a href="record-home-page.php" class="btn btn-info">🗂️Record</a>
                            <a href="index.php" class="btn btn-danger float-end">🛑Logout</a>
                            <!-- <a style="margin-right:20px" href="attendance-manual.php" class="btn btn-success float-end">📝Manual Attendance</a> -->
                        </h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="scanner"><b>Room Number:</b></label>
                                    <input type="text" name="scanner" class="form-control" placeholder="Enter Room Number">
                                </div>
                                <div class="col-md-4">
                                    <label for="course"><b>Course:</b></label>
                                    <input type="text" name="course" class="form-control" placeholder="Enter course">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <?php if ($rowCount > 0) { ?>
                                        <!-- <button type="submit" class="btn btn-info float-end" id="submitAttendanceButton">✔️Submit Attendance</button> -->
                                        <button type="button" class="btn btn-success float-end" id="presentAllButton">Present All</button>
                                    <?php } ?>
                                    <button type="submit" class="btn btn-warning float-end">🔍Search</button>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>SSID</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody class="studentdata">
                                <?php
                                if ($rowCount > 0) {
                                    foreach ($query_run as $student) {
                                        ?>
                                        <tr>
                                            <td> <?= $student['std_id']; ?></td>
                                            <td> <?= $student['name']; ?></td>
                                            <td> <?= $student['ssid']; ?></td>
                                            <td> <?= $student['course']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Attendance">
                                                    <button type="button" class="btn btn-danger" data-value="Absent">Absent</button>
                                                    <button type="button" class="btn btn-success">Present</button>
                                                    <input type="hidden" name="attendance[<?= $student['std_id']; ?>]" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <!-- Add active status as needed -->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-group .btn-danger').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var hiddenInput = this.parentNode.querySelector('input[type="hidden"]');
                    hiddenInput.value = this.getAttribute('data-value');
                    var stdId = hiddenInput.name.replace('attendance[', '').replace(']', '');
                    var status = hiddenInput.value;
                    updateAttendance(stdId, status);
                });
            });

            document.querySelectorAll('.btn-group .btn-success').forEach(function (presentBtn) {
                presentBtn.addEventListener('click', function () {
                    var hiddenInput = this.parentNode.querySelector('input[type="hidden"]');
                    hiddenInput.value = "Present";
                    var stdId = hiddenInput.name.replace('attendance[', '').replace(']', '');
                    updateAttendance(stdId, "Present");
                });
            });

            document.querySelector('#presentAllButton').addEventListener('click', function () {
                document.querySelectorAll('.btn-group input[type="hidden"]').forEach(function (hiddenInput) {
                    var stdId = hiddenInput.name.replace('attendance[', '').replace(']', '');
                    var currentStatus = hiddenInput.value;
                    if (currentStatus === "") {
                        updateAttendance(stdId, "Present");
                    }
                });
                // Update the hidden input values before submitting the form
                document.querySelector('form').submit();
            });

            function updateAttendance(stdId, status) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    }
                };
                xhttp.open("POST", "update_attendance.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("std_id=" + stdId + "&status=" + status + "&date=" + getCurrentDate());
            }

            function getCurrentDate() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();
                return yyyy + '-' + mm + '-' + dd;
            }
        });
    </script>
</body>
</html>
