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
    .signup-card {
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
    <div class="signup-card mx-auto" style="background-color: #fef1ef;">
        <h2 class="text-center mb-4" style="color: #f9a392; font-weight: 900;">Admin Signup</h2>
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
                <div class="alert alert-info py-2"><?= $msg ?></div>
            <?php endif; ?>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg" style="background-color: #f9a392; border-color: #f9a392;">Sign Up</button>
            </div>
        </form>
    </div>
</div>