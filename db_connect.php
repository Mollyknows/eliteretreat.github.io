<?php
$servername = "localhost";
$username = "root"; // replace with your actual MySQL username
$password = ""; // replace with your actual MySQL password
$dbname = "eliteretreat"; // replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
