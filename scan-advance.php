<?php
session_start();
require 'dbcon.php';

// Handle search form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedClassroom = isset($_POST['classroom']) ? $_POST['classroom'] : '';
    $whereClause = $selectedClassroom ? "WHERE scanner = '$selectedClassroom'" : '';
    // Use $selectedClassroom in your SQL query to filter data
    $query = "SELECT * FROM scan $whereClause ORDER BY access_time DESC, id DESC";
    $query_run = mysqli_query($con, $query);
} else {
    // Default query without filtering
    $query = "SELECT * FROM scan ORDER BY access_time DESC, id DESC";
    $query_run = mysqli_query($con, $query);
}

// Handle reload button click
if (isset($_POST['reload'])) {
    $selectedClassroom = isset($_POST['classroom']) ? $_POST['classroom'] : '';
    $deleteQuery = "DELETE FROM scan WHERE scanner = '$selectedClassroom'";
    $deleteQuery_run = mysqli_query($con, $deleteQuery);

    if ($deleteQuery_run) {
        $_SESSION['message'] = "Records for Classroom $selectedClassroom deleted!";
    } else {
        $_SESSION['message'] = "Failed to delete records for Classroom $selectedClassroom!";
    }

    // Redirect to the same page to refresh the data
    header("Location: delete-all.php");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0/dist/css/bootstrap-select.min.css">
    <title>Scan</title>
    <style>
        body {
            background-color: #fff;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn-logout,
        .btn-home,
        .btn-back {
            background-color: #007bff;
            color: #fff;
            margin-right: 10px;
        }

        .btn-logout:hover,
        .btn-home:hover,
        .btn-back:hover {
            background-color: #0056b3;
        }

        .btn-search {
            background-color: #28a745;
            color: #fff;
        }

        .btn-search:hover {
            background-color: #218838;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .selectpicker {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
                        </center>
                       
                        <h2 class="text-center mb-4">Scan</h2>
                        
                        <!-- Search Form -->
                        <form method="POST" action="" class="mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="classroom">Select Classroom:</label>
                                    <select name="classroom" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected disabled>Select Classroom</option>
                                        <?php
                                        // Fetch distinct classrooms from the database
                                        $classroomQuery = "SELECT DISTINCT scanner FROM scan";
                                        $classroomQuery_run = mysqli_query($con, $classroomQuery);

                                        if ($classroomQuery_run) {
                                            while ($row = mysqli_fetch_assoc($classroomQuery_run)) {
                                                $classroom = $row['scanner'];
                                                echo "<option value='$classroom'>$classroom</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn btn-search">Search</button>
                                    <form method="POST" action="">
                                            <button type="submit" name="reload" class="btn btn-warning">Reload</button>
                                        
                                            <a href="index.php" class="btn btn-danger float-end">Logout</a> 
                                            <a href="scan.php" class="btn btn-info float-end">All Scan</a> 
                                            <a href="homepage.php" class="btn btn-success float-end">Home</a>
                                            
                                        
                                            </form>
                                </div>
                        
                        </form>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SSID</th>
                                    <th>MAC Address</th>
                                    <th>Class Room</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="studentdata">
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                        ?>
                                        <tr>
                                            <td><?= $student['ssid']; ?></td>
                                            <td><?= $student['mac']; ?></td>
                                            <td><?= $student['scanner']; ?></td>
                                            <td>
                                                <a href="student-create.php?macid=<?= $student['mac'] . "&ssid=" . $student['ssid']; ?>" target=_blank class="btn btn-success btn-sm">Add</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No Record Found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0/dist/js/bootstrap-select.min.js"></script>
</body>

</html>
