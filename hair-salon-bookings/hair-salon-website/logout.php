<?php
// logout.php - Customer logout
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>
