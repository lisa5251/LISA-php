<?php
$conn = new mysqli("localhost", "root", "", "smartserve");
if ($conn->conect_error){
    die("Database connection failed: " . $conn->connect_error);
}
?>