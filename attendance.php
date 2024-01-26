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
                            <a href="homepage.php" class="btn btn-info">Home</a>
                            <a href="advance-attendance.php" class="btn btn-info">Advance</a>
                            <a href="attendance-record.php" class="btn btn-info">Record</a>
                            <a href="index.php" class="btn btn-danger float-end">Logout</a>
                            <a style ="margin-right:20px" href="student-details.php" class="btn btn-success float-end">Students Details</a>                
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>SSID</th>
                                    
                                    <th>Course</th>
                                    
                                    <th> Action </th>
                                    <th> Active </th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody class="studentdata">
<?php 
                                    $query = "select students.id,name,students.ssid,course from routine,scan,students WHERE routine.scanner='ClassRoom_B1-301' and day=dayname(access_time)
and scan.scanner=routine.scanner and TIME(access_time) BETWEEN stTime AND endTime and mac=macAddress and course='CSE 205' and c_code=course";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
											<td> <?= $student['id']; ?></td>
											<td> <?= $student['name']; ?></td>
											<td> <?= $student['ssid']; ?></td>
											
											<td> <?= $student['course']; ?></td>
											
											<td>
												<a href="attendance-delete.php?id='+value['id']+'" class="badge btn-danger">Delete</a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>

    // Function to refresh the page
    function refreshPage() {
        location.reload(true); // Reload the page
    }

    // Automatically refresh the page after 1 second (1000 milliseconds)
    //setTimeout(refreshPage, 5000);

        $(document).ready(function () {
		//alert('ready');
            //getdata(); 
        });

        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch-attendance.php",
                success: function (response) {
				//alert('form was submitted');
                    // console.log(response);
                    $.each(response, function (key, value) { 
                        // console.log(value['fname']);
                        $('.studentdata').append('<tr>'+
                                '<td class="stud_id">'+value['id']+'</td>\
                                <td>'+value['name']+'</td>\
                                <td>'+value['ssid']+'</td>\
                                <td>'+value['macAddress']+'</td>\
                                <td>'+value['course']+'</td>\
                                <td>'+value['time_date']+'</td>\
                                <td>'+value['deviceMac']+'</td>\
                                <td>\
                                    <a href="attendance-delete.php?id='+value['id']+'" class="badge btn-danger">Delete</a>\
                                </td>\
                                
                            </tr>');
                    });
                }
            });
        }

    
        //setInterval(callUrl, 1000);
    </script>


</body>
</html>