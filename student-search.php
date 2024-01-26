<?php
session_start();
require 'dbcon.php';

$error = "";
$query_result = array();
$rowNumber=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $search_term = $_POST['search_term'];

    // Validate input to prevent SQL injection
    $search_term = mysqli_real_escape_string($con, $search_term);

    $query = "SELECT * FROM students WHERE name LIKE '%$search_term%' OR sid LIKE '%$search_term%'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $query_result = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
    } else {
        $error = "Query execution error: " . mysqli_error($con);
    }
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

    <title>Student Search</title>
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
                        <h4>Student Search</h4>
                        <br>
                        <h4>
                            <a href="index.php" class="btn btn-danger float-end">Logout</a>
                            <a style="margin-right: 20px" href="student-create.php" class="btn btn-primary float-end">Add Students</a>
                            <a style="margin-right: 20px" href="homepage.php" class="btn btn-success float-end">Home</a>
                            <!-- <a style="margin-right: 20px" href="student-details.php" class="btn btn-success float-start">All Student</a> -->
                            <a style="margin-right: 20px" href="course-students-search.php" class="btn btn-warning float-start">Course Students Details</a>
                        </h4>
                        <br>
                        <form class="form-inline" method="POST" action="">
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_term" placeholder="Enter Name or Student ID">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary float-end">Search</button>
                        </form>
                        <?php
                        if (!empty($error)) {
                            echo "<p class='text-danger'>$error</p>";
                        }
                        ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Intake</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                    foreach ($query_result as $student) {
                                        ?>
                                        <tr>
                                            <td><?= $rowNumber++; ?></td>
                                            <td><?= $student['sid']; ?></td>
                                            <td><?= $student['name']; ?></td>
                                            <td><b><p style="background-color:tomato;"><?= $student['course']; ?></p></b></td>
                                            <td><?= $student['intake']; ?></td>
                                            <td><?= $student['sec']; ?></td>
                                            <td>
                                                <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                                <a href="student-add-course.php?id=<?= $student['id']; ?>" class="btn btn-primary btn-sm">Add Course</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                    ?>
                                </tbody>
                            </table>
                                   
                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
