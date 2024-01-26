<?php
session_start();
require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_course'])) {
        $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
        $course = mysqli_real_escape_string($con, $_POST['course']);

        // Validate input to prevent SQL injection
        $student_id = mysqli_real_escape_string($con, $student_id);
        $course = mysqli_real_escape_string($con, $course);

        // Perform the SQL query to insert data into the 'courses' column of the 'students' table
        $insert_course_query = "UPDATE students SET courses = CONCAT(courses, ',', '$course') WHERE id = $student_id";
        $result = mysqli_query($con, $insert_course_query);

        if ($result) {
            $_SESSION['success'] = "Course added successfully";
        } else {
            $_SESSION['error'] = "Error adding course: " . mysqli_error($con);
        }

        header("Location: student-details.php");
        exit();
    }
}
?>
