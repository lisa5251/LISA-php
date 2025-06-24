<?php
echo "<link rel='stylesheet' href='style.css'>";
echo "<div class='container'><h2>All Bookings</h2>";
if (file_exists("bookings.csv") && ($file = fopen("bookings.csv", "r")) !== FALSE) {
    echo "<table><tr><th>Name</th><th>Email</th><th>Service</th><th>Date</th><th>Time</th></tr>";
    while (($data = fgetcsv($file)) !== FALSE) {
        echo "<tr>";
        foreach ($data as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    fclose($file);
} else {
    echo "<p>No bookings found.</p>";
}
echo '<a href="index.html">Back to Booking</a></div>';
?>