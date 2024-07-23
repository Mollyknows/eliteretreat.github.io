<?php
// Include Google Maps iframe conditionally
if (isset($show_map) && $show_map): ?>
    <!-- Google Maps iframe -->
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
<?php endif; ?>
<footer style="
    background-color: #e7cee3; /* Match your design */
    color: #333;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
    box-sizing: border-box; /* Ensure padding is included in width */
">
    <p>&copy; 2024 Elite Retreat. All rights reserved.</p>
</footer>
