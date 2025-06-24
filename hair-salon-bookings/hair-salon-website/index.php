<?php
// Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "salon_db"; // Change to your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_submit'])) {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        $success = "Thank you for contacting us!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Hair Salon</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f8f8f8;
            margin: 0;
            padding: 0;
            color: #0B1D51;
        }
        header {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 0 0 10px 0;
        }
        .logo img {
            height: 60px;
            margin: 20px 0 0 30px;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 20px 30px 0 30px;
            justify-content: flex-end;
        }
        nav ul li {
            display: inline;
        }
        nav ul li a {
            text-decoration: none;
            color: #0B1D51;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background 0.2s;
        }
        nav ul li a:hover, nav ul li a.active {
            background: #725CAD;
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 40px 30px;
        }
        h1, h2 {
            color: #0B1D51;
        }
        ul {
            padding-left: 20px;
        }
        .button {
            display: inline-block;
            background: #725CAD;
            color: #fff;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .button:hover {
            background: #0B1D51;
            color: #fff;
        }
        /* Contact Form Styles */
        form {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        label {
            font-weight: 500;
        }
        input[type="text"], input[type="email"], textarea {
            padding: 10px;
            border: 1px solid #725CAD;
            border-radius: 5px;
            font-size: 1em;
            resize: vertical;
        }
        textarea {
            min-height: 80px;
        }
        button[type="submit"] {
            background: #725CAD;
            color: #fff;
            border: none;
            padding: 10px 0;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #0B1D51;
        }
        .success {
            color: #0B1D51;
            background: #e6e9f9;
            padding: 10px;
            border-radius: 5px;
        }
        .error {
            color: #fff;
            background: #725CAD;
            padding: 10px;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #0B1D51;
            color: #fff;
            margin-top: 40px;
        }
        .services-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .service-card {
            background: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
            transition: transform 0.2s;
            border: 2px solid #725CAD;
        }
        .service-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #725CAD;
        }
        .service-card h3 {
            margin: 10px 0 0 0;
            font-size: 1.2em;
            color: #725CAD;
        }
        .service-card:hover {
            transform: translateY(-5px);
            background: #e6e9f9;
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px 8px;
            }
            nav ul {
                flex-direction: column;
                gap: 10px;
                padding: 10px 0 0 0;
            }
            .logo img {
                margin: 10px 0 0 10px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="assets/logo.svg" alt="Salon Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="book.php">Book Now</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Welcome to Our Hair Salon</h1>
            <p>Your one-stop destination for all your hair care needs. We offer a range of services to help you look and feel your best.</p>
            <h2>Our Services</h2>
            <!-- Service Gallery -->
            <div class="services-gallery">
                <a href="haircuts.php" class="service-card">
                    <img src="assets/haircut.jpg" alt="Haircut">
                    <h3>Haircuts</h3>
                </a>
                <a href="coloring.php" class="service-card">
                    <img src="assets/coloring.jpg" alt="Coloring">
                    <h3>Coloring</h3>
                </a>
                <a href="styling.php" class="service-card">
                    <img src="assets/styling.jpg" alt="Styling">
                    <h3>Styling</h3>
                </a>
                <a href="packages.php" class="service-card">
                    <img src="assets/package.jpg" alt="Special Packages">
                    <h3>Special Packages</h3>
                </a>
            </div>
            <p><a href="services.php">Learn more about our services</a></p>
            <h2>Book Your Appointment</h2>
            <p>Ready to book your appointment? Click the button below!</p>
            <a href="book.php" class="button">Book Now</a>
            <h2>Contact Us</h2>
            <?php if ($success) echo "<p class='success'>$success</p>"; ?>
            <?php if ($error) echo "<p class='error'>$error</p>"; ?>
            <form method="POST" action="">
                <label for="name">Your Name:</label>
                <input type="text" name="name" required>
                <label for="email">Your Email:</label>
                <input type="email" name="email" required>
                <label for="message">Message:</label>
                <textarea name="message" required></textarea>
                <button type="submit" name="contact_submit">Send</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Hair Salon. All rights reserved.</p>
    </footer>
</body>
</html>