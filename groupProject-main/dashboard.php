<?php
$conn = new mysqli("localhost", "root", "", "car_rental");
if (isset($_GET['approve'])) {
    $id = intval($_GET['approve']);
    $conn->query("UPDATE bookings SET status='approved' WHERE id=$id");
}
if (isset($_GET['done'])) {
    $id = intval($_GET['done']);
    $conn->query("UPDATE bookings SET status='done' WHERE id=$id");
}
$bookings = $conn->query("SELECT * FROM bookings");
?>
<h2>Bookings Dashboard</h2>
<table border="1">
<tr><th>ID</th><th>Car</th><th>User</th><th>Date</th><th>Status</th><th>Action</th></tr>
<?php while($row = $bookings->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['car_id']) ?></td>
    <td><?= htmlspecialchars($row['user_name']) ?></td>
    <td><?= htmlspecialchars($row['date']) ?></td>
    <td><?= htmlspecialchars($row['status']) ?></td>
    <td>
        <?php if($row['status'] == 'pending'): ?>
            <a href="dashboard.php?approve=<?= $row['id'] ?>">Approve</a>
        <?php elseif($row['status'] == 'approved'): ?>
            <a href="dashboard.php?done=<?= $row['id'] ?>">Mark as Done</a>
        <?php elseif($row['status'] == 'done'): ?>
            Done
        <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>
</table>