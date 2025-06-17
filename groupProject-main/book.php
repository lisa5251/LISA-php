<?php
$conn = new mysqli("localhost", "root", "", "car_rental");
$car = isset($_GET['car']) ? $_GET['car'] : '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car = $_POST['car'];
    $user_name = $_POST['user_name'];
    $date = $_POST['date'];
    $status = 'pending'; // Default status
    $sql = "INSERT INTO bookings (car_id, user_name, date, status) VALUES ('$car', '$user_name', '$date', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Car</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book to Buy: <?php echo htmlspecialchars($car); ?></h2>
    <form method="post">
        <input type="hidden" name="car" value="<?php echo htmlspecialchars($car); ?>">
        <div class="mb-3">
            <label for="user_name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="user_name" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Booking Date</label>
            <input type="date" class="form-control" name="date" required>
        </div>
        <button type="submit" class="btn btn-success">Book Now</button>
    </form>
</div>
</body>
</html>