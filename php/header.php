<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Elite Retreat</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../css/eliteRetreatSite.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
  <script src="../js/menu.js"></script>
</head>
<body>
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Services</a>
      <a href="contact.php">Contact Us</a>
      <?php if (isset($_SESSION['username'])) { ?>
        <p class='logged-in'>Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <a href="logout.php">Logout</a>
      <?php } else { ?>
        <a href="login.php">Login</a>
        <a href="registration.php" style="display: block; border-radius: 10px; background-color: #e7cee3">Register</a>
      <?php } ?>
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
      <?php if (isset($_SESSION['username'])) { ?>
        <li style="justify-content: flex-end; margin-left: auto">
          <p class="book">Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        </li>
        <li style="justify-content: flex-end; margin-left: auto">
          <a class="book" href="logout.php">Log Out</a>
        </li>
      <?php } else { ?>
        <li style="justify-content: flex-end; margin-left: auto">
          <a class="book" href="login.php">Login</a>
        </li>
        <li style="justify-content: flex-end; margin-left: auto">
          <a class="book" href="registration.php">Register</a>
        </li>
      <?php } ?>
      <li style="justify-content: flex-end; margin-left: auto">
        <a class="book" href="booking.php">Book Appointment Now</a>
      </li>
    </ul>
  </div>
</body>
</html>
