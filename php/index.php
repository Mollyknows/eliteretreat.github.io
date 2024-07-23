<?php
include '../php/config.php';
// Determine whether to show the Google Maps iframe
$show_map = false; // Default to not show the map

// Set $show_map to true for pages where you want the map
if (basename($_SERVER['PHP_SELF']) == 'contact.php') {
    $show_map = true;
}

// Include the header file
include 'header.php';
?>

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

<?php

include 'footer.php';
?>
