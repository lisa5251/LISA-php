<?php
session_start();
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['admin'] = $user;
        header("Location: car_inventory.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>
<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>