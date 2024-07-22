<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
    <link rel="stylesheet" href="eliteRetreatSite.css">
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
</head>
<body>
    <!-- Navigation and common header code here -->
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
