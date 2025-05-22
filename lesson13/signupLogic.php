<?php
include_once('config.php');
if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
        $tempPass = $_POST['password'];
        $password = password_hash($tempPass , PASSWORD_DEFAULT);

        if(empty($name) || empty($surname) || empty($username) || empty($password)){
            echo "You need to fill all the feilds";
        }
        else{
            $sql = "SELECT username FROM users WHERE username=:username";

            $tempSQL = $conn -> prepare($sql);
            $tempSQL ->bindParam(':username', $username);
            $tempSQL ->execute();

            if($tempSQL -> rowCount() >0){
                echo"Username exists!";
                header("refresh:2; url=login.php");
            }else{
                $sql = "INSERT INTO users (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :password)";
                $insertSql = $conn -> prepare($sql);
                $insertSql ->bindParam(':name', $name);
                $insertSql ->bindParam(':surname', $surname);
                $insertSql ->bindParam(':username', $username);
                $insertSql ->bindParam(':email', $email);
                $insertSql ->bindParam(':password', $password);

                $insertSql -> execute();

                echo "Data Saved Successfully";
                header("refresh:2; url=login.php")
         
            }
        }


}
?>