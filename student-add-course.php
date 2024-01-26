<?php
session_start();
require 'dbcon.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_course'])) {
        $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
        $course = mysqli_real_escape_string($con, $_POST['course']);

        // Validate input to prevent SQL injection
        $student_id = mysqli_real_escape_string($con, $student_id);
        $course = mysqli_real_escape_string($con, $course);

        // Perform the SQL query to insert data into the 'courses' column of the 'students' table
        $insert_course_query = "UPDATE students SET courses = CONCAT(courses, ',', '$course') WHERE id = $student_id";
        $result = mysqli_query($con, $insert_course_query);

        if ($result) {
            $_SESSION['success'] = "Course added successfully";
        } else {
            $_SESSION['error'] = "Error adding course: " . mysqli_error($con);
        }

        header("Location: student-details.php");
        exit();
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

    <title>Add Course</title>
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
                        <div>Add Course</div>
                        <br>
                        <a href="student-details.php" class="btn btn-primary float-start">Back</a>
                        <a href="index.php" class="btn btn-danger float-end">🚪Logout</a>
                        <a style="margin-right: 20px" href="homepage.php" class="btn btn-success float-end">🏡Home</a>
                    </h4>
                </div>
                <br>
                <div class="card-body">

                    <form method="POST" action="code.php">

                        <div class="mb-3">
                            <label for="course" class="form-label"><b>Course Code:</b></label>
                            <input type="text" class="form-control" id="course" name="course" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label"><b>Course Section:</b></label>
                            <input type="text" class="form-control" id="sec" name="sec" required>
                        </div>

                        <input type="hidden" name="student_id" value="<?= $student_id ?>">
                        <button type="submit" name="add_course" class="btn btn-primary">Add Course</button>
                        <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    
                                <input type="hidden" name="student_id" value="<?= $student['id']; ?>" >

                                    <div class="mb-3">
                                        <label>Student ID</label>
                                        <input type="text" name="sid" value="<?= $student['sid']; ?>" readonly="true"class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <input type="text" name="name" value="<?=$student['name'];?>"readonly="true" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>SSID</label>
                                        <input type="text" name="ssid" value="<?=$student['ssid'];?>" readonly="true" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Mac Address</label>
                                        <input type="text" name="macAddress" value="<?=$student['macAddress'];?>" readonly="true" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <input type="text" name="phone" value="<?=$student['phone'];?>"readonly="true" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>intake</label>
                                        <input type="text" name="intake" value="<?=$student['intake'];?>" readonly="true" class="form-control">
                                    </div>
                                    
                                    

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
						
                        ?>
                    </div>
                    </form>

                </div>
                
                <br>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
