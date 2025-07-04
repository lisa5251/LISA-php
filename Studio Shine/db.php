<?php
$mysqli = new mysqli("localhost", "root", "", "studioshine"); // Change user/pass if needed
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
?>