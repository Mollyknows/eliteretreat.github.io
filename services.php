<?php
// Include the database connection file
include 'db_connect.php';

// Initialize an array to hold service data
$services = [];

// Query to get services from the database
$sql = "SELECT Service_ID, Service_Name, Service_Price, Service_Duration FROM services";
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
    $result->free();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Elite Retreat</title>
    <link rel="stylesheet" href="eliteRetreatSite.css">
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
</head>
<body>
    <header>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="index.php">Home</a>
                <a href="about.html">About</a>
                <a href="services.php">Services</a>
                <a href="contact.html">Contact Us</a>
                <a href="login.php">Log In</a>
                <a href="booking.html" style="display: block; border-radius: 10px; background-color: #e7cee3">Book Now</a>
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
                <li style="justify-content: flex-end; margin-right: 10px;"><a class="book" href="booking.html">Book Appointment Now</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="serviceMain">
            <?php foreach ($services as $service): ?>
                <div class="product">
                    <!-- Update this part if you have an image column; otherwise, remove it -->
                    <!-- <img src="images/<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['Service_Name']); ?>"> -->
                    <div class="prodContent">
                        <h1><?php echo htmlspecialchars($service['Service_Name']); ?></h1>
                        <h2>Duration: <?php echo htmlspecialchars($service['Service_Duration']); ?></h2></br>
                        <p>Price: <?php echo htmlspecialchars($service['Service_Price']); ?></p>
                        <button><a href="booking.html">BOOK NOW</a></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <!-- Include footer content here -->
    </footer>
</body>
</html>
