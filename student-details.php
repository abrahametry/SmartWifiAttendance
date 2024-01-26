<?php
session_start();
require 'dbcon.php';

// Check if the form for adding a course is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_course"])) {
    $student_id = mysqli_real_escape_string($con, $_POST["student_id"]); // Add this line to get the student ID
    // You can add more processing here if needed
    header("Location: student-add-course.php?id=$student_id"); // Redirect to the add course page
    exit();
}

// Check if the form for editing is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_student"])) {
    $student_id = mysqli_real_escape_string($con, $_POST["student_id"]); // Add this line to get the student ID
    // You can add more processing here if needed
    header("Location: student-edit.php?id=$student_id"); // Redirect to the edit page
    exit();
}


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Details</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
                        </center> 
                        <h4>
                            <div>Student Details</div>
                            <br>
                            <a href="index.php" class="btn btn-danger float-end">🚪Logout</a>
                            <a style="margin-right: 20px" href="student-create.php" class="btn btn-primary float-end">📝Add Students</a>
                            <a style="margin-right: 20px" href="homepage.php" class="btn btn-success float-end">🏡Home</a>
                            <a style="margin-right: 20px" href="course-students-search.php" class="btn btn-warning float-start">🔎Course Students</a>
                            <a style="margin-right: 20px" href="student-search.php" class="btn btn-warning float-start">🔎 Student Search</a>
                           
                           
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>SSID</th>
                                    <th>macAddress</th>
                                    <th>Phone</th>
                                    <!-- <th>Dept</th> -->
                                    <th>Intake</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['sid']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['ssid']; ?></td>
                                                <td><?= $student['macAddress']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                <!-- <td><?= $student['course']; ?></td> -->
                                                <td><?= $student['intake']; ?></td>
                                                <td><?= $student['sec']; ?></td>
                                                <td>
                                                    <!-- Add Course Form -->
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display: inline;">
                                                        <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                                        <button type="submit" name="add_course" class="btn btn-warning btn-sm">Add Course</button>
                                                    </form>
                                                    
                                                    <!-- Edit Form -->
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display: inline;">
                                                        <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                                        <button type="submit" name="edit_student" class="btn btn-success btn-sm">Edit</button>
                                                    </form>
                                                    
                                                    <!-- Delete Form -->
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
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
