<?php
session_start();
require 'dbcon.php';

$error = "";
$rowNumber=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $course = $_POST['course'];
    $intake = $_POST['intake'];
    $section = $_POST['section'];

    // Validate input to prevent SQL injection
    $course = mysqli_real_escape_string($con, $course);
    $intake = mysqli_real_escape_string($con, $intake);
    $section = mysqli_real_escape_string($con, $section);

    $query = "SELECT * FROM students WHERE ";
    $conditions = array();

    // Add conditions based on selected values
    if (!empty($course)) {
        $conditions[] = "course = '$course'";
    }
    if (!empty($intake)) {
        $conditions[] = "intake = '$intake'";
    }
    if (!empty($section)) {
        $conditions[] = "sec = '$section'";
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

    <title>Course Students Details</title>
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
                        <h4>Course Students Details</h4>
                        <br>
                        <h4>
                            <a href="index.php" class="btn btn-danger float-end">Logout</a>
                            <a style="margin-right: 20px" href="student-create.php" class="btn btn-primary float-end">Add Students</a>
                            <a style="margin-right: 20px" href="homepage.php" class="btn btn-success float-end">Home</a>
                           <!--  <a style="margin-right: 20px" href="student-details.php" class="btn btn-success float-start">All Student</a> -->
                            <a style="margin-right: 20px" href="student-search.php" class="btn btn-warning float-strat">Student Search</a>
                        </h4>
                        <br>
                        <form class="form-inline" method="POST" action="">
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="course" placeholder="Enter Course">
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="intake" placeholder="Enter Intake">
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="section" placeholder="Enter Section">
                                <br>
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
                                        <th>SSID</th>
                                        <th>macAddress</th>
                                        <th>Phone</th>
                                        <th>Course</th>
                                        <th>Intake</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Combine conditions with AND
                                    if (!empty($conditions)) {
                                        $query .= implode(" AND ", $conditions);

                                        $query_run = mysqli_query($con, $query);

                                        if ($query_run) {
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $student) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $rowNumber++; ?></td>
                                                        <td><?= $student['sid']; ?></td>
                                                        <td><?= $student['name']; ?></td>
                                                        <td><?= $student['ssid']; ?></td>
                                                        <td><?= $student['macAddress']; ?></td>
                                                        <td><?= $student['phone']; ?></td>
                                                        <td><?= $student['course']; ?></td>
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
                                        } else {
                                            $error = "No records found.";
                                        }
                                    } else {
                                        $error = "Query execution error: " . mysqli_error($con);
                                    }
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
