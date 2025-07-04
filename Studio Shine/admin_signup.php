<?php
require 'db.php';
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    if ($stmt->bind_param("ss", $username, $password) && $stmt->execute()) {
        $msg = "Admin registered! <a href='admin_login.php'>Login here</a>.";
    } else {
        $msg = "Username already exists.";
    }
    $stmt->close();
}
?>
<form method="post">
    <h2>Admin Signup</h2>
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
    <div><?= $msg ?></div>
</form>