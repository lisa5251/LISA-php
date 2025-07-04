<?php
$success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simple validation and saving to a CSV file (for demonstration)
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $service = htmlspecialchars($_POST["service"]);
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);
    $notes = htmlspecialchars($_POST["notes"]);
    $row = [$name, $email, $phone, $service, $date, $time, $notes, date("Y-m-d H:i:s")];
    $file = fopen("bookings.csv", "a");
    fputcsv($file, $row);
    fclose($file);
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book Now | Studio Shine Salon</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-primary"><span class="text-dark">Studio</span> Shine</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="price.html" class="nav-item nav-link">Pricing</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Booking Form Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light p-5 rounded shadow">
                        <h2 class="mb-4 text-center text-primary">Book Your Appointment</h2>
                        <?php if ($success): ?>
                            <div class="alert alert-success text-center" role="alert">
                                Your appointment has been booked! We look forward to seeing you.
                            </div>
                        <?php endif; ?>
                        <form id="bookingForm" method="post" action="booknow.php" novalidate="novalidate">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control border-0 p-4" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control border-0 p-4" name="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control border-0 p-4" name="phone" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control border-0 p-4" name="service" required>
                                        <option value="">Select Service</option>
                                        <option>Haircut & Styling</option>
                                        <option>Color & Highlights</option>
                                        <option>Hair Treatments</option>
                                        <option>Blowouts</option>
                                        <option>Bridal & Events</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control border-0 p-4" name="date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="time" class="form-control border-0 p-4" name="time" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-0 py-3 px-4" rows="3" name="notes" placeholder="Additional Notes"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit">Book Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Form End -->

    <!-- Admin Panel Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light p-5 rounded shadow">
                        <h2 class="mb-4 text-center text-primary">All Bookings</h2>
                        <?php
                        // Simple admin panel to view bookings
                        if (!file_exists('bookings.csv')) {
                            echo "No bookings found.";
                            exit;
                        }
                        echo "<table border='1' cellpadding='8' class='table table-striped'>";
                        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Date</th><th>Time</th><th>Notes</th><th>Booked At</th></tr>";
                        if (($handle = fopen("bookings.csv", "r")) !== FALSE) {
                            while (($data = fgetcsv($handle)) !== FALSE) {
                                echo "<tr>";
                                foreach ($data as $cell) {
                                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                                }
                                echo "</tr>";
                            }
                            fclose($handle);
                        }
                        echo "</table>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Panel End -->

    <!-- Admin Panel Start -->
    <?php
    require 'db.php';
    session_start();
    if (!isset($_SESSION["admin_id"])) {
        header("Location: admin_login.php");
        exit;
    }

    // Accept appointment
    if (isset($_GET["accept"])) {
        $id = intval($_GET["accept"]);
        $mysqli->query("UPDATE bookings SET status='accepted' WHERE id=$id");
    }

    // Fetch bookings
    $result = $mysqli->query("SELECT * FROM bookings ORDER BY created_at DESC");
    ?>
    <h2>Admin Panel - Bookings</h2>
    <a href="admin_logout.php">Logout</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Date</th><th>Time</th><th>Notes</th><th>Status</th><th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['service']) ?></td>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['time']) ?></td>
            <td><?= htmlspecialchars($row['notes']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td>
                <?php if ($row['status'] == 'pending'): ?>
                    <a href="?accept=<?= $row['id'] ?>">Accept</a>
                <?php else: ?>
                    Accepted
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <!-- Admin Panel End -->

    <!-- Footer Start -->
    <!-- ...keep your existing footer code here... -->
</body>
</html>