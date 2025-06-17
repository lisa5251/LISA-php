<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST['model'];
    $price = $_POST['price'];
    $sql = "INSERT INTO cars (model, price) VALUES ('$model', '$price')";
    $conn->query($sql);
}
$cars = $conn->query("SELECT * FROM cars");
?>
<form method="post">
    Model: <input type="text" name="model"><br>
    Price: <input type="number" name="price"><br>
    <input type="submit" value="Add Car">
</form>
<h2>Inventory</h2>
<table border="1">
<tr><th>ID</th><th>Model</th><th>Price</th></tr>
<?php while($row = $cars->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['model'] ?></td>
    <td><?= $row['price'] ?></td>
</tr>
<?php endwhile; ?>
</table>