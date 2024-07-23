<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../php/db_connect.php'; // Database connection

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
    $sql = "SELECT Password FROM users WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($password_from_db);
    $stmt->fetch();

    // Debugging information
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Password entered: " . htmlspecialchars($password) . "<br>";
    echo "Password from DB: " . htmlspecialchars($password_from_db) . "<br>";

    // Verify the password
    if ($stmt->num_rows > 0 && $password === $password_from_db) {
        // Start a session and redirect to a protected page
        session_start();
        $_SESSION['username'] = $username;
        header("Location: protected_page.php"); // Redirect to the protected page
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
