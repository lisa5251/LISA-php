<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num = 10;
    $age = 18;
    $numri = 23;

    $a = 50;
    $b= 10;
    $age2=15;
    $day = "E enjte";

    if($num < 0){
        echo "$num is less than 0" . "<br>";
    }

    if(($age >12)&&($age<20)){
        echo "you are a teenager";
    }else{
        echo "you are a grown man" . "<br>";
    }

    if($numri<0){
        echo "The value of $numri is a negative number";
    }else if($numri==0){

        echo "the value of $numri is 0";
    }else{
        echo "the value of $numri is a positive number";
    }

    if($a == $b){
        echo '1';
    }else if($a > $b){
        echo '2';
    }else{
        echo '3';
    }

    switch($age2){
        case ($age2>=0 && $age2<18):
            echo "You are a minor (0-18 years old) <br>";
            break;
        case ($age2>=18 && $age2<25):
                echo "You are a young adult <br>";
            break;
        case ($age2>=25):
                    echo "You are an adult <br>";
            break;
            default:
            echo "Invalid age input.";
    }

    switch($day){
        case "E hene":
            echo "sot eshte dite e hene";
            break;
        case "E marte":
            echo "sot eshte dite e marte";
            break;
        case "E merkure":
            echo "sot eshte dite e merkure";
            break;
        case "E enjte":
            echo "sot eshte dite e enjte";
            break;
        case "E premte":
            echo "sot eshte dite e premte";
            break;
        case "E shtune":
            echo "sot eshte dite e shtune";
            break;
        case "E diel":
            echo "sot eshte dite e diel";
            break;
    }

    $whilevar = 1;
    while($whilevar <= 5){
        echo "<br> Numri is $whilevar <br>";
        $whilevar++;
    }

    $dowhile = 1;
    do{
        echo "<br> Numri is $dowhile <br>";
        $dowhile++;
    }while($dowhile <= 5);
    for($forvar = 0; $forvar <= 10; $forvar++){
        echo "<br> Numri is $forvar <br>";
    }
    ?>
    <?php
    $cars = array("volo", "bmw", "tesla", "audi");
    foreach($cars as $value){
        echo "$value <br>";
    }
    ?>
    <?php
    $age3 = array("John" =>"18","Micheal" =>"23","John" =>"10");
    foreach($age3 as $x1 => $val){
        echo "Name: $x1, Age: $val <br>";
    }
    ?>
</body>
</html>