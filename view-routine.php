<?php
session_start();
require 'dbcon.php';

$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday");

$searchValue = "";
$searchIntake = "";
$searchSection = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $searchValue = $_POST["search"];
    $searchIntake = $_POST["intake"];
    $searchSection = $_POST["section"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>View Routine</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .btn-container {
            margin-top: 20px;
            text-align: center;
        }

        .search-container {
            margin-top: 20px;
            text-align: center;
        }

        .add-container {
            margin-top: 20px;
            text-align: center;
            max-width: 80%;
        }

        #searchInput,
        #searchIntake,
        #searchSection {
            width: 70%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        
        

        .add-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: #218838;
        }

        /* Additional Styles */
        .custom-container {
            margin-top: 40px;
        }

        .custom-search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .custom-img-container {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container custom-container">
    <h5 class="text-left"><b>View Routine</b></h5>
                    <div class="card-header">
                        <h4>
                            <center>
                                <img src="bubt.png" alt="BUBT Logo" style="height: 70px; margin-right: 0px;">
                            </center>
                            <br>
                            <a href="homepage.php" class="btn btn-primary float-left">🏡Home</a>
                            <a href="index.php" class="btn btn-danger float-right">🛑Logout</a>
                            <a style="margin-right:20px" href="routine1.php" class="btn btn-success float-right">📝Add Routine</a>
                        <br>
                        
                        </h4>
                    </div>
                    <br>
        
        <div class="custom-search-container">
            <br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-inline">
                <input type="text" id="searchInput" name="search" class="form-control mr-4" placeholder="Search by Class Room or Subject Code"
                    value="<?php echo $searchValue; ?>">
                <input type="text" id="searchIntake" name="intake" class="form-control mr-4" placeholder="Search by Intake"
                    value="<?php echo $searchIntake; ?>">
                <input type="text" id="searchSection" name="section" class="form-control mr-4" placeholder="Search by Section"
                    value="<?php echo $searchSection; ?>">
                
            </form>
            
            
        </div>
        <div><center><button type="submit" id="searchButton" class="btn btn-warning">Search</button></center><br></div>
        <?php
        foreach ($days as $day) {
            $sql = "SELECT id, stTime, endTime, c_code, intake, sec, scanner FROM routine WHERE day = '$day' AND (c_code LIKE '%$searchValue%' OR scanner LIKE '%$searchValue%') AND (intake LIKE '%$searchIntake%' AND sec LIKE '%$searchSection%')";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                ?>
                <div class="container mt-4">
                    <h4><b><?= $day ?> Routine</b></h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Subject Code</th>
                                <th>Intake</th>
                                <th>Section</th>
                                <th>Class Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['stTime']}</td>
                                    <td>{$row['endTime']}</td>
                                    <td>{$row['c_code']}</td>
                                    <td>{$row['intake']}</td>
                                    <td>{$row['sec']}</td>
                                    <td>{$row['scanner']}</td>
                                    <td>
                                        <form action='delete-routine.php' method='post' style='display:inline;'>
                                            <input type='hidden' name='routineId' value='{$row['id']}'>
                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                echo "<div class='container mt-4'><p>No routine available for $day.</p></div>";
            }
        }
        ?>
    </div>
</body>

</html>
