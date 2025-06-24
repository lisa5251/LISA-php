<?php
// Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "salon_db"; // Change if your DB name is different

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Accept booking if requested
if (isset($_GET['accept']) && is_numeric($_GET['accept'])) {
    $id = intval($_GET['accept']);
    $conn->query("UPDATE bookings SET status='Accepted' WHERE id=$id");
}

// Fetch all bookings
$result = $conn->query("SELECT * FROM bookings ORDER BY date, time");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
        }
        th, td {
            border: 1px solid #725CAD;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #725CAD;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f8f8f8;
        }
        .accept-btn {
            background: #0B1D51;
            color: #fff;
            padding: 6px 14px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s;
        }
        .accept-btn:hover {
            background: #725CAD;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>All Bookings</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['service']) ?></td>
                    <td><?= htmlspecialchars($row['date']) ?></td>
                    <td><?= htmlspecialchars($row['time']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td>
                        <?php if ($row['status'] !== 'Accepted'): ?>
                            <a class="accept-btn" href="?accept=<?= $row['id'] ?>">Accept</a>
                        <?php else: ?>
                            <span style="color: #0B1D51;">Accepted</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">No bookings found.</td></tr>
        <?php endif; ?>
    </table>
    <a href="index.php" class="button">Back to Home</a>
</div>
</body>
</html>