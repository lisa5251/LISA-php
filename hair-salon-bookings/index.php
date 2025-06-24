<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Salon Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Book Your Appointment</h2>
        <form action="book.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="service">Service:</label>
            <select name="service" required>
                <option value="">Select a service</option>
                <option value="Haircut">Haircut</option>
                <option value="Coloring">Coloring</option>
                <option value="Styling">Styling</option>
                <option value="Other">Other</option>
            </select>

            <label for="date">Date:</label>
            <input type="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" name="time" required>

            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>