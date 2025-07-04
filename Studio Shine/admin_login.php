<?php
require 'db.php';
session_start();
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $stmt = $mysqli->prepare("SELECT id, password FROM admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION["admin_id"] = $id;
        header("Location: admin_panel.php");
        exit;
    } else {
        $msg = "Invalid login.";
    }
    $stmt->close();
}
?>
<form method="post">
    <h2>Admin Login</h2>
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <div><?= $msg ?></div>
</form>