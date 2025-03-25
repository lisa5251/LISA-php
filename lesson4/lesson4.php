<?php
    // phpinfo();
    // $x = "Hello";
    // print_r($x);            
    // $x = 5;
    // echo gettype($x)."<br>";
    
    // $y = 10.5;
    // echo gettype($y)."<br>";

    // $a = "Digital School";
    // echo gettype($a)."<br>";
?>
<?php
// function displayPhpVersion(){
//     echo "this is PHP". phpversion();
//     echo "\n";
// }
// displayPhpVersion();
?>
<?php
    // function Hello(){
    //     echo "Hello World!";
    // }
    // Hello();
?>
<?php
// function sum(){
//     $value = 120 + 20; //140
//     echo $value;
// }
// sum();
?>
<?php 
    // function maximum($x, $y){
    //     if($x > $y){
    //         return $x;
    //     }
    //     else{
    //         return $y;
    //     }
    // }

    // $a = 20;
    // $b = 30;
    // $test = maximum($a , $b);
    // echo "The max of $a and $b is $test";
?>
<?php  
    function divisiable($n){
        if(($n % 2)== 0){
            return "$n is divisiable with 2";
        }
        else{
            return"$n is not divisiable with 2";
        }
    }

    print_r(divisiable(4). "<br>");
    print_r(divisiable(35). "<br>");
    print_r(divisiable(16). "<br>");
    print_r(divisiable(22). "<br>");
?>