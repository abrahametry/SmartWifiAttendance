<?php
session_start();
require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["routineId"])) {
    $routineId = $_POST["routineId"];

    // Delete routine from the database
    $deleteQuery = "DELETE FROM routine WHERE id = '$routineId'";
    if ($con->query($deleteQuery) === TRUE) {
        // Redirect to view-routine.php after successful deletion
        header("Location: view-routine.php");
        exit();
    } else {
        echo "Error deleting routine: " . $con->error;
    }
}
?>
