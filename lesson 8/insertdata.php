<?php
// try{
//     $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");

//     $username = "Jack";

//     $password = password_hash("mypassword" , PASSWORD_DEFAULT);

//     $sql = "INSERT INTO users (username,password)  VALUES ('$username','$password')";

//     $pdo -> exec($sql);
//     $last_id = $pdo -> lastInsertId();
//     echo "New record created successfully.";
// }
// catch (PDOException  $e){

//     echo $e -> getMessage();
// }
// try{
//     $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");

//     $sql = "ALTER TABLE product DROP COLUMN name";

//     $pdo -> exec($sql);
//     echo "Coulmn droped successfully.";

// }
// catch (PDOException  $e){

//       echo $e -> getMessage();
// }

try{
    $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");

    $sql = "DROP TABLE product";

    $pdo -> exec($sql);
    echo "Table droped successfully.";

}
catch (PDOException  $e){

      echo $e -> getMessage();
}
?>
