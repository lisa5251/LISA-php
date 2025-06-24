<?php
// filepath: c:\xampp\htdocs\LISA-php\hair-salon-website\book.php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "salon_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $service = $conn->real_escape_string($_POST['service']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);

    $sql = "INSERT INTO bookings (name, email, service, date, time, status) VALUES ('$name', '$email', '$service', '$date', '$time', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        $success = "Thank you, $name! Your appointment for a $service on $date at $time has been booked.";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book an Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Book an Appointment</h1>
    <?php if ($success): ?>
        <div class="success"><?= $success ?></div>
        <a href="index.php" class="button">Back to Home</a>
    <?php else: ?>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="book.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="service">Service:</label>
            <select name="service" required>
                <option value="Haircut">Haircut</option>
                <option value="Coloring">Coloring</option>
                <option value="Styling">Styling</option>
                <option value="Special Package">Special Package</option>
            </select>
            <label for="date">Date:</label>
            <input type="date" name="date" required>
            <label for="time">Time:</label>
            <input type="time" name="time" required>
            <button type="submit">Book Now</button>
        </form>
        <a href="index.php" class="button">Back to Home</a>
    <?php endif; ?>
</div>
</body>
</html>