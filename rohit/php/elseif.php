<?php 
$amit=101;
if($amit>=90 && $amit<=100){
echo "Excellent";
} elseif ($amit>=80 && $amit<90){
echo "Very good";
} elseif ($amit>=70 && $amit<80){
echo "Good";
} elseif ($amit>=60 && $amit<70){
    echo "Average";
} elseif ($amit>=50 && $amit<60){
    echo "Ok";
} elseif ($amit>100){
    echo "Invalid result";
} else {
    echo "Fail";
}
?>