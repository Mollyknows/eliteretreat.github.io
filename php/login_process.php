<?php 
include 'config.php'; // Start the session and include other configurations
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files

include 'db_connect.php'; // Database connection

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if form fields are empty
  if (empty($username) || empty($password)) {
    echo "Both fields are required.";
    exit();
  }

  // Prepare and execute query to fetch user data
  $sql = "SELECT Username, Password FROM users WHERE Username = ?";
  $stmt = $conn->prepare($sql);
  if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
  }
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($username_from_db, $password_from_db);
  $stmt->fetch();

  // Verify the password (using password_verify)
  if ($stmt->num_rows > 0 && password_verify($password, $password_from_db)) {
    // Successful login
    $_SESSION['username'] = $username_from_db; // Use retrieved username
    $_SESSION['loggedin'] = true; // Set loggedin flag
    header("Location: protected_page.php");
    exit();
  } else {
    echo "Invalid username or password.";
  }

  $stmt->close();
}

// Close the database connection
$conn->close();
?>