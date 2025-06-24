<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        $_POST['name'],
        $_POST['email'],
        $_POST['service'],
        $_POST['date'],
        $_POST['time']
    ];
    $file = fopen("bookings.csv", "a");
    fputcsv($file, $data);
    fclose($file);
    echo "<link rel='stylesheet' href='style.css'>";
    echo "<div class='container'><p>Thank you, your appointment has been booked!</p>";
    echo '<a href="index.html">Back to Booking</a><br>';
    echo '<a href="view_bookings.php">View All Bookings (Admin)</a></div>';
} else {
    header("Location: index.html");
    exit();
}
?>