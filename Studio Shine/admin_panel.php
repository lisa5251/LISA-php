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
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-primary"><span class="text-dark">Studio</span> Shine</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="price.php" class="nav-item nav-link">Pricing</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>    
                </div>
                <a href="admin_logout.php" class="btn btn-primary mt-2">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Admin Panel Start -->
    <?php
    require 'db.php';
    session_start();
    if (!isset($_SESSION["admin_id"])) {
        header("Location: admin_login.php");
        exit;
    }

    // Approve booking
    if (isset($_GET["accept"])) {
        $id = intval($_GET["accept"]);
        $mysqli->query("UPDATE bookings SET status='accepted' WHERE id=$id");
    }

    // Fetch bookings from database
    $result = $mysqli->query("SELECT * FROM bookings ORDER BY created_at DESC");
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body" style="background-color: #fef1ef; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: none;">  
                        <h2 class="m-0 text-primary text-center">Bookings</h2>
                        <p class="text-center text-muted">Manage all bookings from here</p>
                        <table border="0" cellpadding="8">
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
                                <td>
                                    <?php if ($row['status'] == 'pending'): ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Accepted</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['status'] == 'pending'): ?>
                                        <a href="?accept=<?= $row['id'] ?>" class="btn btn-sm btn-success">Accept</a>
                                    <?php else: ?>
                                        <span class="text-muted">Accepted</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $mysqli->close(); ?>

    <!-- Admin Panel End -->

    <!-- Footer Start -->
    <!-- ...keep your existing footer code here... -->
</body>
</html>