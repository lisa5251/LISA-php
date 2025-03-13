<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = 'Digital School!';
        echo "I love $name" . "<br>";

        $x = 120;
        $y = 50;

        echo $x + $y ."<br>";
        echo $x - $y ."<br>";
        echo $x / $y ."<br>";
        echo $x * $y ."<br>";
        echo $x % $y ."<br>";

        $a = 'digital';
        $b = ' school';
        $c = $a.$b;

        echo "$c \n";

        $first_string = 'Filan Fisteku';
        echo strlen($first_string);
        $second_string = 'Filan Fisteku';
        echo str_word_count($second_string);
        $third_string = 'Programming is not cool';
        echo str_replace('not','very',$third_string);
        $fourth_string = 'Real Madrid';
        echo strrev($fourth_string);
    ?>
</body>
</html>