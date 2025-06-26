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
    <style>
        body {
            background: linear-gradient(120deg, #e6e9f9 0%, #f8f8f8 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #0B1D51;
        }
        .container {
            max-width: 420px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 32px rgba(114,92,173,0.10);
            padding: 40px 32px 32px 32px;
        }
        h1 {
            text-align: center;
            color: #725CAD;
            margin-bottom: 28px;
        }
        label {
            font-weight: 500;
            margin-top: 12px;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="time"], select {
            width: 100%;
            padding: 12px;
            border: 1.5px solid #725CAD;
            border-radius: 6px;
            font-size: 1em;
            margin-top: 6px;
            margin-bottom: 16px;
            background: #f8f8f8;
            transition: border 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, input[type="time"]:focus, select:focus {
            border: 1.5px solid #0B1D51;
            outline: none;
        }
        button[type="submit"] {
            width: 100%;
            background: #725CAD;
            color: #fff;
            border: none;
            padding: 14px 0;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #0B1D51;
        }
        .success, .error {
            text-align: center;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 18px;
        }
        .success {
            background: #e6e9f9;
            color: #0B1D51;
            border: 1.5px solid #725CAD;
        }
        .error {
            background: #725CAD;
            color: #fff;
        }
        .button {
            display: block;
            width: 100%;
            background: #fff;
            color: #725CAD;
            border: 1.5px solid #725CAD;
            padding: 12px 0;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            margin-top: 18px;
            transition: background 0.2s, color 0.2s;
        }
        .button:hover {
            background: #725CAD;
            color: #fff;
        }
        @media (max-width: 600px) {
            .container {
                padding: 18px 6px;
            }
        }
    </style>
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
            <a href="index.php" class="button" style="margin-top:10px;">Back to Home</a>
            <a href="services.php" class="button" style="margin-top:10px; background:#e6e9f9; color:#725CAD; border:1.5px solid #725CAD;">View Services</a>
        </form>
    <?php endif; ?>
</div>
</body>
</html>