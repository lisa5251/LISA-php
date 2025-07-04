<?php
// login.php - Customer login page
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "salon_db";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM customers WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['customer_id'] = $row['id'];
            $_SESSION['customer_name'] = $row['name'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: #f8f8f8; font-family: 'Segoe UI', Arial, sans-serif; }
        .container { max-width: 400px; margin: 60px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(114,92,173,0.10); padding: 32px 24px; }
        h1 { text-align: center; color: #725CAD; }
        label { font-weight: 500; margin-top: 12px; }
        input[type="email"], input[type="password"] { width: 100%; padding: 12px; border: 1.5px solid #725CAD; border-radius: 6px; font-size: 1em; margin-top: 6px; margin-bottom: 16px; background: #f8f8f8; }
        button[type="submit"] { width: 100%; background: #725CAD; color: #fff; border: none; padding: 14px 0; border-radius: 6px; font-size: 1.1em; font-weight: bold; cursor: pointer; margin-top: 10px; }
        button[type="submit"]:hover { background: #0B1D51; }
        .error { text-align: center; padding: 12px; border-radius: 6px; margin-bottom: 18px; background: #725CAD; color: #fff; }
        .button { display: block; width: 100%; background: #fff; color: #725CAD; border: 1.5px solid #725CAD; padding: 12px 0; border-radius: 6px; font-weight: bold; text-align: center; text-decoration: none; margin-top: 18px; }
        .button:hover { background: #725CAD; color: #fff; }
    </style>
</head>
<body>
<div class="container">
    <h1>Log In</h1>
    <?php if ($error) echo "<div class='error'>$error</div>"; ?>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Log In</button>
    </form>
    <a href="signup.php" class="button">Don't have an account? Sign Up</a>
</div>
</body>
</html>
