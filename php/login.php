<?php include '../php/config.php'; 
// if (isset($_SESSION['user_id'])) 
    //header('Location: dashboard.php');?>
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
    <?php include '../php/header.php'; ?>

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
                // Redirect to the login process
                header("Location: ../php/login_process.php");
                exit();
            }
        }
        ?>
        <form method="post" action="../php/login_process.php">
            <label for="username">Username:</label><br />
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" autocomplete="username" /><br />
            <label for="password">Password:</label><br />
            <input type="password" id="password" name="password" autocomplete="current-password" /><br />
            <input type="submit" value="Log In" /><br />
            <span class="error"><?php echo $error; ?></span>
        </form>
    </div>

    <?php include '../php/footer.php'; ?>
</body>
</html>
