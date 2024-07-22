<?php
// Include the database connection file
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Elite Retreat</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="eliteRetreatSite.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
</head>
<body>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="services.php">Services</a>
            <a href="contact.html">Contact Us</a>
            <a href="login.php">Log In</a>
            <a href="booking.php" style="display: block; border-radius: 10px; background-color: #e7cee3">Book Now</a>
        </div>
    </div>
    <div class="menu">
        <h1>Elite Retreat</h1>
        <span class="burger"><i class="fa-solid fa-bars" onclick="openNav()"></i></span>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li style="justify-content: flex-end; margin-left: auto"><a class="book" href="login.php">Login</a></li>
            <li style="justify-content: flex-end; margin-right: 10px;"><a class="book" href="booking.php">Book Appointment Now</a></li>
        </ul>
    </div>
    <div class="mainpage">
        <i class="fa-solid fa-hands-holding-circle" style="font-size: 150px"></i>
        <h1>Welcome to Elite Retreat Spa and Salon</h1>
        <h2>Nourish your body</h2>
        <h2>Revitalize your spirit</h2>
        <p>Experience relaxation like never before with Elite Retreat</p>
        <div>
            <ul class="listly" style="margin-top: 0;">
                <li>Hydrotherapy</li>
                <li>Facials</li>
                <li>Massages</li>
                <li>Relax</li>
            </ul>
        </div>
        <h2>Discover our services</h2>
    </div>
</body>
</html>