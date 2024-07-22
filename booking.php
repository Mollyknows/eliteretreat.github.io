<?php
// Include the database connection file
include 'db_connect.php';

// Initialize an array to hold service data
$services = [];

// Fetch services from the database
$sql = "SELECT Service_ID, Service_Name, Service_Price, Service_Duration, image FROM services";
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
    <title>Booking</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="eliteRetreatSite.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
    <title>Booking</title>
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
        </ul>
    </div>
    <div class="bookingMain">
        <h1>Book Your Appointment</h1>
        <form action="process_booking.php" method="POST">
            <label for="service">Choose a Service:</label>
            <select name="service" id="service">
                <?php foreach ($services as $service): ?>
                    <option value="<?php echo htmlspecialchars($service['Service_ID']); ?>">
                        <?php echo htmlspecialchars($service['Service_Name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="techs">Choose a spa technician:</label>
            <select id="techs" name="techs">
                <option value="Jane Doe">Jane Doe</option>
                <option value="Anne Williams">Anne Williams</option>
                <option value="Janice Jones">Janice Jones</option>
            </select>

            <label for="locs">Choose a Location:</label>
            <select id="locs" name="locs">
                <option value="Main Location">Main Location</option>
                <option value="North Kennesaw">North Kennesaw</option>
                <option value="South Kennesaw">South Kennesaw</option>
                <option value="East Kennesaw">East Kennesaw</option>
                <option value="West Kennesaw">West Kennesaw</option>
            </select>

            <label for="date">Choose a Date and Time:</label>
            <input type="datetime-local" id="date" name="date" required>

            <input type="submit" value="Book Now">
        </form>

        <iframe
            src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FNew_York&bgcolor=%23ffffff&title=Elite%20Retreat%20Scheduling&src=bW9sbHlyb3NlLmNhbGhvdW5AZ21haWwuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=NmE1OTQ3MDhhYmQyMjQwZWE1N2Q4MzgwY2MzN2ZkYjIwMDIxNDY1ZjM2ZmYyYjE1MmJkYzZlNDcxN2ViYjNjMEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4udXNhI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%2333B679&color=%23EF6C00&color=%230B8043"
            style="border: solid 1px #777"
            width="800"
            height="600"
            frameborder="0"
            scrolling="no"
        ></iframe>
    </div>
</body>
</html>