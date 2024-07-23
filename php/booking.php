<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking | Elite Retreat</title>
    <link rel="stylesheet" href="../css/eliteRetreatSite.css">
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="../js/menu.js"></script>
    <style>
        select {
            width: 250px; /* Adjust the width as needed */
            padding: 8px; /* Add some padding for better appearance */
            border-radius: 4px; /* Optional: adds rounded corners */
            border: 1px solid #ccc; /* Optional: adds a border */
            text-align: center; /* Center text */
            font-size: 20px; /* Increase font size */
        }
        .btn-book-now {
            background-color: #d87a8c; /* Darker shade of pink */
            color: white; /* White text */
            padding: 12px 20px; /* Larger button size */
            border: 2px solid white; /* White border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 26px; /* Increase font size */
            display: inline-block; /* Inline block for spacing */
            text-align: center; /* Center text inside button */
            margin-top: 20px; /* Space above button */
        }
        .btn-book-now:hover {
            background-color: #555; /* Darker shade on hover */
        }
        .thank-you-message {
            margin-top: 20px; /* Space above message */
            color: #333; /* Text color */
            font-size: 22px; /* Font size */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include '../php/header.php'; ?>

    <?php
    include '../php/config.php'; // For session and site config
    include 'db_connect.php'; // For database connection

    // Retrieve the service ID from the query parameters
    $serviceID = isset($_GET['service_id']) ? intval($_GET['service_id']) : 0;

    // Fetch service details from the database
    $service = null;
    if ($serviceID) {
        $sql = "SELECT Service_Name, Service_Price, Service_Duration FROM services WHERE Service_ID = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $serviceID);
            $stmt->execute();
            $result = $stmt->get_result();
            $service = $result->fetch_assoc();
            $stmt->close();
        }
    }

    // Fetch all services for dropdown
    $all_services = [];
    $sql_all = "SELECT Service_ID, Service_Name FROM services";
    if ($result_all = $conn->query($sql_all)) {
        while ($row_all = $result_all->fetch_assoc()) {
            $all_services[] = $row_all;
        }
        $result_all->free();
    }

    $message = '';
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tech = $_POST['techs'];
        $location = $_POST['locs'];
        $selected_service_id = $_POST['service_id'];

        // Process booking information here (e.g., save to the database)

        // Set the message for display
        $message = "<p>Thank you for booking with us! A confirmation email will be sent shortly!</p>";
    }

    $conn->close();
    ?>

    <div class="bookingMain">
        <h1>Select a service, tech & location!</h1>
        <?php if ($service): ?>
            <h2><?php echo htmlspecialchars($service['Service_Name']); ?></h2>
            <ul>
                <li>Price: <?php echo htmlspecialchars($service['Service_Price']); ?></li>
                <li>Duration: <?php echo htmlspecialchars($service['Service_Duration']); ?></li>
            </ul>
        <?php else: ?>
        <?php endif; ?>

        <form method="POST" action="booking.php">
            <label for="service_id">Select a service</label>
            <select id="service_id" name="service_id">
                <?php foreach ($all_services as $s): ?>
                    <option value="<?php echo $s['Service_ID']; ?>" <?php echo ($s['Service_ID'] == $serviceID) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($s['Service_Name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="techs">Choose your spa technician</label>
            <select id="techs" name="techs">
                <option value="Jane Doe">Jane Doe</option>
                <option value="Anne Williams">Anne Williams</option>
                <option value="Janice Jones">Janice Jones</option>
            </select>

            <label for="locs">Choose the location</label>
            <select id="locs" name="locs">
                <option value="Main Location">Main Location</option>
                <option value="North Kennesaw">North Kennesaw</option>
                <option value="South Kennesaw">South Kennesaw</option>
                <option value="East Kennesaw">East Kennesaw</option>
                <option value="West Kennesaw">West Kennesaw</option>
            </select>

            <input type="submit" value="Book Now" class="btn-book-now" />
        </form>

        <?php if ($message): ?>
            <div class="thank-you-message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <iframe
            src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FNew_York&bgcolor=%23ffffff&title=Elite%20Retreat%20Scheduling&src=bW9sbHlyb3NlLmNhbGhvdW5AZ21haWwuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=NmE1OTQ3MDhhYmQyMjQwZWE1N2Q4MzgwY2MzN2ZkYjIwMDIxNDY1ZjM2ZmYyYjE1MmJkYzZlNDcxN2ViYjNjMEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4udXNhI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%2333B679&color=%23EF6C00&color=%230B8043"
            style="border: solid 1px #777"
            width="800"
            height="600"
            frameborder="0"
            scrolling="no"
        ></iframe>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
