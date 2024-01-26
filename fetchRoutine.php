<?php
require 'dbcon.php'; // Make sure to replace this with your actual database connection file

// Fetch routine data from the database
$sql = "SELECT id, stTime, endTime, c_code, scanner, day FROM routine";
$result = $con->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Return the routine data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
