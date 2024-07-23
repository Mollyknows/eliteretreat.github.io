<?php
include '../php/config.php';
// Include the database connection file
include 'db_connect.php';
//include('auth_check.php'); 

// Initialize an array to hold service data
$services = [];

// Query to get services from the database
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Elite Retreat</title>
    <link rel="stylesheet" href="../css/eliteRetreatSite.css">
    <script src="https://kit.fontawesome.com/8dd7f794af.js" crossorigin="anonymous"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <?php include '../php/header.php'; ?>

    <main>
        <div class="serviceMain">
            <?php foreach ($services as $service): ?>
                <div class="product">
                    <?php if (!empty($service['image'])): ?>
                        <img src="../images/<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['Service_Name']); ?>">
                    <?php endif; ?>
                    <div class="prodContent">
                        <h1><?php echo htmlspecialchars($service['Service_Name']); ?></h1>
                        <h2>Duration: <?php echo htmlspecialchars($service['Service_Duration']); ?></h2></br>
                        <p>Price: <?php echo htmlspecialchars($service['Service_Price']); ?></p>
                        <button><a href="booking.php?service_id=<?php echo htmlspecialchars($service['Service_ID']); ?>">BOOK NOW</a></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
