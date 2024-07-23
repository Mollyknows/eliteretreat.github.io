<?php
// Include the database connection file
include 'db_connect.php';

// Get form data
$username = $_POST['username'];
$password = $_POST['password']; // We'll use this for hashing
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$dob = $_POST['dob'];

// Hash the password before storing it
$password_hash = password_hash($password, PASSWORD_BCRYPT);  // Use bcrypt algorithm

// Prepare the SQL statement for inserting the user with hashed password
$sql = "INSERT INTO users (Username, Password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password_hash);

// Execute the query
if ($stmt->execute()) {
  $user_id = $stmt->insert_id; // Get the ID of the inserted user

  // Prepare the SQL statement for inserting customer details (assuming User_ID is a foreign key)
  $sql_customer = "INSERT INTO customers (Customer_Name, Customer_Phone, Customer_Email, Customer_Address, Customer_Date_of_Birth, User_ID) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt_customer = $conn->prepare($sql_customer);
  $stmt_customer->bind_param('sssssi', $name, $phone, $email, $address, $dob, $user_id);

  if ($stmt_customer->execute()) {
    // Redirect to a success page or display a success message
    header('Location: registration_success.php');
    exit();
  } else {
    echo "Error: " . $stmt_customer->error;
  }

  $stmt_customer->close();
} else {
  echo "Error: " . $stmt->error;
}

// Close the connections
$stmt->close();
$conn->close();
?>
