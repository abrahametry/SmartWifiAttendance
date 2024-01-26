<?php
require 'dbcon.php'; // Make sure to replace this with your actual database connection file

// Check if routineId is provided in the POST request
if (isset($_POST['routineId'])) {
    $routineId = $_POST['routineId'];

    // Construct and execute the SQL query to delete the routine
    $deleteQuery = "DELETE FROM routine WHERE id = $routineId";

    if ($con->query($deleteQuery) === TRUE) {
        echo "Routine deleted successfully";
    } else {
        echo "Error deleting routine: " . $con->error;
    }
} else {
    echo "Invalid request. Please provide a routine ID.";
}
?>
