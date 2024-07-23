<?php
// Include the database connection and start the session
include 'db_connect.php';


// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// User is logged in, proceed with displaying the protected content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Page | Elite Retreat</title>
    <link rel="stylesheet" href="../css/eliteRetreatSite.css">
</head>
<body>
    <?php include 'header.php'; // Include header ?>

    <main>
        <h1>Welcome to the Protected Page</h1>
        <p>Only logged-in users can see this content.</p>
        <p>Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <a href="logout.php">Logout</a>
    </main>
    
    <?php include 'footer.php'; // Include footer ?>
</body>
</html>
