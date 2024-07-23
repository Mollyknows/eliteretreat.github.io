<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/eliteRetreatSite.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../js/menu.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="login">
        <?php
        // Initialize variables for form data and error message
        $username = $password = $error = "";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate form data
            if (empty($username) || empty($password)) {
                $error = "Both fields are required.";
            } else {
                // Include the database connection file
                include 'db_connect.php';

                // Prepare SQL statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT Password FROM users WHERE Username = ?");
                $stmt->bind_param("s", $username);
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
                    // Start a session and store user information
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: protected_page.php"); // Redirect to the protected page
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
                $stmt->close();
            }
        }
        ?>

        <form method="post" action="../php/login_process.php">
            <label for="username">Username:</label><br />
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" autocomplete="username" /><br />
            <label for="pwd">Password:</label><br />
            <input type="password" id="pwd" name="password" autocomplete="current-password" /><br />
            <input type="submit" value="Log In" /><br />
            <span class="error"><?php echo $error; ?></span>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
