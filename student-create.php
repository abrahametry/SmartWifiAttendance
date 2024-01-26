<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
					<center>
        <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
    </center>
                        <h4>Student Add 
                            <a href="student-details.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
					
                    <div class="card-body">
					<?php
					if(isset($_GET['macid']) && isset($_GET['ssid']))
							{
								$student_macid = mysqli_real_escape_string($con, $_GET['macid']);
								$query = "SELECT * FROM students WHERE macAddress='$student_macid' ";
								$query_run = mysqli_query($con, $query);

								if(mysqli_num_rows($query_run) > 0)
								{
									$student = mysqli_fetch_array($query_run);
									?>
									<form action="code.php" method="POST">
										
									<input type="hidden" name="student_id" value="<?= $student['sid']; ?>" >

										<div class="mb-3">
											<label>Student ID</label>
											<input type="text" name="id" value="<?= $student['sid']; ?>" class="form-control"placeholder="Subject A">
										</div>
										<div class="mb-3">
											<label>Student Name</label>
											<input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
										</div>
										<div class="mb-3">
											<label>SSID</label>
											<input type="text" name="ssid" value="<?=$_GET['ssid'];?>" readonly="true" class="form-control">
										</div>
										<div class="mb-3">
											<label>Student Mac Address</label>
											<input type="text" name="macAddress" value="<?=$_GET['macid'];?>" readonly="true" class="form-control">
										</div>
										<div class="mb-3">
											<label>Student Phone</label>
											<input type="text" name="phone" value="" class="form-control">
										</div>
										<div class="mb-3">
											<label>Course code</label>
											<input type="text" name="course" value="" class="form-control">
										</div>
										<div class="mb-3">
											<label>Intake</label>
											<input type="text" name="intake" class="form-control">
										</div>
										<div class="mb-3">
											<label>Section</label>
											<input type="text" name="sec" class="form-control">
										</div>
										<div class="mb-3">
											<button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
										</div>

									</form>
									<?php
								}else{
								?>
									<form action="code.php" method="POST">
										
									<input type="hidden" name="student_id" value="" >

										<div class="mb-3">
											<label>Student ID</label>
											<input type="text" name="id" value="" class="form-control">
										</div>
										<div class="mb-3">
											<label>Student Name</label>
											<input type="text" name="name" value="" class="form-control">
										</div>
										<div class="mb-3">
											<label>SSID</label>
											<input type="text" name="ssid" value="<?=$_GET['ssid'];?>" readonly="true" class="form-control">
										</div>
										<div class="mb-3">
											<label>Student Mac Address</label>
											<input type="text" name="macAddress" value="<?=$_GET['macid'];?>" readonly="true" class="form-control">
										</div>
										<div class="mb-3">
											<label>Student Phone</label>
											<input type="text" name="phone" value="" class="form-control">
										</div>
										<div class="mb-3">
											<label>Student Course</label>
											<input type="text" name="course" value="" class="form-control">
										</div>
										<div class="mb-3">
											<label>Intake</label>
											<input type="text" name="intake" class="form-control">
										</div>
										<div class="mb-3">
											<label>Section</label>
											<input type="text" name="sec" class="form-control">
										</div>
										<div class="mb-3">
											<button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
										</div>

									</form>
									<?php
								}
                            }else{
							?>
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Student ID</label>
                                <input type="text" name="id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>SSID</label>
                                <input type="text" name="ssid" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student macAdderess</label>
                                <input type="text" name="macAddress" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student Course</label>
                                <input type="text" name="course" class="form-control">
                            </div>
							<div class="mb-3">
                                <label>Intake</label>
                                <input type="text" name="intake" class="form-control">
                            </div>
							<div class="mb-3">
                                <label>Section</label>
                                <input type="text" name="sec" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
						<?php
							}
							?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
