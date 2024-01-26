<?php
    $servername = "localhost"; // Change to your MySQL server's hostname or IP address if necessary
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password (if applicable)
    $database = "students"; // Change to the name of your database

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";

    // You can now perform database operations using $conn

    // Close the connection when done
    $conn->close();
?>