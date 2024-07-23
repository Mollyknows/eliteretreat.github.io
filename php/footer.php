<?php
// Include Google Maps iframe conditionally
if (isset($show_map) && $show_map): ?>
    <!-- Google Maps iframe -->
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
<?php endif; ?>
<footer>
    <p>&copy; 2024 Elite Retreat. All rights reserved.</p>
</footer>
