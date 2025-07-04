<?php
session_start();

// --- Simple admin credentials (for demonstration only) ---
$ADMIN_USER = "admin";
$ADMIN_PASS = "admin";

// Handle login
if (isset($_POST['admin_login'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($user === $ADMIN_USER && $pass === $ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $login_error = "Invalid username or password.";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

// If not logged in, show login form
if (empty($_SESSION['admin_logged_in'])):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f8f8f8; color: #0B1D51; margin: 0; }
        .login-container { max-width: 350px; margin: 80px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #725CAD; text-align: center; }
        form { display: flex; flex-direction: column; gap: 14px; }
        input[type="text"], input[type="password"] { padding: 10px; border: 1px solid #725CAD; border-radius: 5px; font-size: 1em; }
        button { background: #725CAD; color: #fff; border: none; padding: 10px 0; border-radius: 5px; font-size: 1em; font-weight: bold; cursor: pointer; }
        button:hover { background: #0B1D51; }
        .error { color: #fff; background: #FF6F61; padding: 10px; border-radius: 5px; text-align: center; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (!empty($login_error)): ?>
            <div class="error"><?= $login_error ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="admin_login">Login</button>
        </form>
        <a href="index.php" class="button" style="margin-top:18px; background:#0B1D51;">Back to Home</a>
    </div>
</body>
</html>
<?php
exit;
endif;

// --- Admin panel code below (only visible if logged in) ---
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "salon_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle status update
if (isset($_POST['update_status'])) {
    $id = intval($_POST['booking_id']);
    $status = $conn->real_escape_string($_POST['status']);
    $conn->query("UPDATE bookings SET status='$status' WHERE id=$id");
}

// Fetch bookings
$result = $conn->query("SELECT * FROM bookings ORDER BY date DESC, time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Bookings</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f8f8f8; color: #0B1D51; margin: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
        h1 { color: #725CAD; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { padding: 10px 8px; border: 1px solid #e6e9f9; text-align: center; }
        th { background: #e6e9f9; color: #725CAD; }
        tr:nth-child(even) { background: #f8f8f8; }
        .status-pending { color: #FF6F61; font-weight: bold; }
        .status-confirmed { color: #1A936F; font-weight: bold; }
        .status-cancelled { color: #888; font-weight: bold; }
        .button { background: #725CAD; color: #fff; border: none; padding: 6px 16px; border-radius: 4px; font-weight: bold; cursor: pointer; }
        .button:hover { background: #0B1D51; }
        .back-link { display: inline-block; margin-top: 24px; color: #725CAD; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .logout-link { float: right; color: #FF6F61; text-decoration: none; font-weight: bold; }
        .logout-link:hover { text-decoration: underline; }
        .back-home-btn {
            background: linear-gradient(90deg, #725CAD 60%, #0B1D51 100%);
            color: #fff;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(114,92,173,0.10);
            letter-spacing: 1px;
            transition: background 0.2s, transform 0.2s;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }
        .back-home-btn:hover {
            background: linear-gradient(90deg, #0B1D51 60%, #725CAD 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 4px 16px rgba(114,92,173,0.18);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="admin.php?logout=1" class="logout-link">Logout</a>
        <h1>Admin Panel - Bookings</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Service</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['service']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
                <td><?= htmlspecialchars($row['time']) ?></td>
                <td class="status-<?= strtolower($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                        <select name="status">
                            <option value="Pending" <?= $row['status']=='Pending'?'selected':'' ?>>Pending</option>
                            <option value="Confirmed" <?= $row['status']=='Confirmed'?'selected':'' ?>>Confirmed</option>
                            <option value="Cancelled" <?= $row['status']=='Cancelled'?'selected':'' ?>>Cancelled</option>
                        </select>
                        <button type="submit" name="update_status" class="button">Update</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="index.php" class="button back-home-btn" style="margin-top:24px;">Back to Home</a>
    </div>
</body>
</html>
<?php
$conn->close();
?>