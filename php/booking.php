<?php
// Include the database connection file
include 'db_connect.php';

// Include the header file
include 'header.php';
?>

<div class="bookingMain">
  <h1>You have selected:</h1>
  <h2>Service Name Here</h2>
  <ul>
    <li>Price:</li>
    <li>Duration:</li>
  </ul>
  <form>
    <label for="techs">Choose a spa technician:</label>
    <select id="techs" name="techs">
      <option value="Jane Doe">Jane Doe</option>
      <option value="Anne Williams">Anne Williams</option>
      <option value="Janice Jones">Janice Jones</option>
    </select>
    <label for="Locations">Choose a Location:</label>
    <select id="locs" name="locs">
      <option value="Main Location">Main Location</option>
      <option value="North Kennesaw">North Kennesaw</option>
      <option value="South Kennesaw">South Kennesaw</option>
      <option value="East Kennesaw">East Kennesaw</option>
      <option value="West Kennesaw">West Kennesaw</option>
    </select>
    <input type="submit" />
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

<?php include 'footer.php'; ?>
