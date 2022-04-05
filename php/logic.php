<?php
$a = 41;

$x = "";
switch($a){
    case 10 : $x = 10;

    case 9 : $x .= 9;

    case 8 : $x .= 8;

    case 7 : $x .= 7;

    case 6 : $x .= 6;

    case 5 : $x .= 5;

    case 4 : $x .= 4;

    case 3 : $x .= 3;

    case 2 : $x .= 2;

    case 1 : $x .= 1;
            break;

    default : echo "not number";
}

echo strrev($x);


$arr = array(3, 5, 7, 4, 1, 5, 8, 7, 2, 4);
?>