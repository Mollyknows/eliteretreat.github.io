<?php
session_start();

// Include the database connection file
include 'db_connect.php';

// Initialize variables
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Handle login submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT User_ID, Username, Password FROM users WHERE Username = ? AND Password = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $password);
                    if ($stmt->fetch()) {
                        // Password is correct, so start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;                            
                        
                        // Redirect user to welcome page
                        header("location: index.php");
                        exit();
                    }
                } else {
                    // Username or password is not valid, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="eliteRetreatSite.css" />
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
</head>
<body>
    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact Us</a>
        <?php if (isset($_SESSION['username'])): ?>
          <a href="welcome.php">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login.php">Log In</a>
        <?php endif; ?>
        <a href="booking.php" style="display: block; border-radius: 10px; background-color: #e7cee3">Book Now</a>
      </div>
    </div>
    <div class="menu">
      <h1>Elite Retreat</h1>
      <span class="burger"><i class="fa-solid fa-bars" onclick="openNav()"></i></span>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <?php if (isset($_SESSION['username'])): ?>
          <li style="justify-content: flex-end; margin-left: auto">
            <span>Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></span>
          </li>
          <li><a class="book" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li style="justify-content: flex-end; margin-left: auto">
            <a class="book" href="login.php">Login</a>
          </li>
        <?php endif; ?>
        <li style="justify-content: flex-end; margin-right: 10px">
          <a class="book" href="booking.php">Book Appointment Now</a>
        </li>
      </ul>
    </div>
    <div class="login">
      <h2>Login</h2>
      <p>Please fill in your credentials to login.</p>
      <?php if (!empty($login_err)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($login_err); ?></div>
      <?php endif; ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br />
        <input type="text" id="username" name="username" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($username); ?>" /><br />
        <span class="invalid-feedback"><?php echo htmlspecialchars($username_err); ?></span>
        <label for="pwd">Password:</label><br />
        <input type="password" id="pwd" name="password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
        <span class="invalid-feedback"><?php echo htmlspecialchars($password_err); ?></span><br />
        <input type="submit" value="Login" />
      </form>
    </div>
</body>
</html>
