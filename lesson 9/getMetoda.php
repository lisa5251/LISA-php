<?php
    $username = $_GET['username'];
    $password = $_GET['password'];

    echo $username;
    echo "<br>";
    echo $password;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "getMetoda.php" method = "get">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"> 
        <label for="password">Password</label>
        <input type="password" name="password" id="passwor">
        <input type="submit" value="submit">
</body>
</html>