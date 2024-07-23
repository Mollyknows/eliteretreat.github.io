<?php
// Include the database connection file
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Elite Retreat</title>
    <link rel="stylesheet" href="../css/eliteRetreatSite.css">
</head>
<body>
    <?php include 'header.php'; // Include header ?>
    
    <main>
        <div class="registration-form-container">
            <form class="registration-form" action="register_process.php" method="post">
                <h1>Create an Account</h1>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">
                
                <input type="submit" value="Register">
            </form>
        </div>
    </main>
    
    <?php include 'footer.php'; // Include footer ?>
</body>
</html>
