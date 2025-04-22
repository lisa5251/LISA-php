<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';

    try{
        $conn = new PDO("mysql:host = $host", $user , $pass);
        $sql = 'Create database test3B';
        $conn-> exec($sql);
        echo 'Database is created';
    }
    catch(Exeption $e){
        echo 'Database is not created,something went wrong;';
    }
?>
