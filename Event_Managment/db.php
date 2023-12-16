<?php
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "pwd";
$dbname = "event_managment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


