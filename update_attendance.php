<?php
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stdId = isset($_POST['std_id']) ? (int)$_POST['std_id'] : 0;
    $status = isset($_POST['status']) ? mysqli_real_escape_string($con, $_POST['status']) : '';
    $date = isset($_POST['date']) ? mysqli_real_escape_string($con, $_POST['date']) : '';

    if ($stdId > 0 && ($status === 'Present' || $status === 'Absent') && !empty($date)) {
        // Update attendance only if the date matches
        $updateQuery = "UPDATE attendance SET attend = '$status'
                        WHERE std_id = $stdId AND DATE(time_date) = '$date'";

        mysqli_query($con, $updateQuery);
        echo "Attendance updated successfully";
    } else {
        echo "Invalid data";
    }
} else {
    echo "Invalid request";
}
?>
