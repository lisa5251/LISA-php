<?php
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];
    $user_name = $_POST['user_name'];
    $date = $_POST['date'];
    $sql = "INSERT INTO bookings (car_id, user_name, date) VALUES ('$car_id', '$user_name', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="post">
    Car ID: <input type="text" name="car_id"><br>
    Your Name: <input type="text" name="user_name"><br>
    Date: <input type="date" name="date"><br>
    <input type="submit" value="Book">
</form>