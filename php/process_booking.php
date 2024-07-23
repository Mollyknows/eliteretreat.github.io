<?php
// Include the database connection file
include 'db_connect.php';

// Retrieve form data
$service_id = $_POST['service'];
$tech = $_POST['techs'];
$location = $_POST['locs'];
$date = $_POST['date'];
$user_id = 1; // This should be replaced with the logged-in user's ID

// Insert booking into the database
$sql = "INSERT INTO bookings (Service_ID, User_ID, Booking_Date, Status, Technician, Location) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissss", $service_id, $user_id, $date, $status, $tech, $location);

$status = 'Pending'; // Default status

if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
