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
<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        min-height: 100vh;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card {
        max-width: 400px;
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        background: #fff;
        padding: 2.5rem 2rem;
    }
    .brand-logo {
        width: 60px;
        height: 60px;
        object-fit: contain;
        margin-bottom: 1rem;
    }
</style>

<div class="container">
    <div class="login-card mx-auto" style="background-color: #fef1ef;">
        <h2 class="text-center mb-4" style="color: #f9a392; font-weight: 900;">Admin Login</h2>
        <form method="post" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" id="username" class="form-control" placeholder="Enter username" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" id="password" type="password" class="form-control" placeholder="Enter password" required>
            </div>
            <?php if ($msg): ?>
                <div class="alert alert-danger py-2"><?= $msg ?></div>
            <?php endif; ?>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg" style="background-color: #f9a392; border-color: #f9a392;">Login</button>
            </div>
        </form>
    </div>
</div>

