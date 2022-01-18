<?php 
$a=40;
$b=30;
echo "Hello,";
if(($a*$b>=1500 || 20/2==10) && ($a-$b<=5 || $a+$b != 70)){
    echo "that is fine";
}else{
    echo "that is not fine";
}
echo " "."see you later.";
?>
<!-- Practice - 1 -->
<?php 
$a=30;
$b=15;
$c=35;
echo "<br/>";
if($a<$b){
   if ($c<$b){
   echo "b is greater";
   } else {
   echo "c is greater";
   }
} else {
    if ($a<$c){
    echo "c is greater";
    } else {
        echo "a is greater";
    }
}
?>

<!-- Practice - 2 -->
<?php 
// $A_age=;
// $B_age=;
// $C_age=;
// $D_age=;
// if($A_age > $B_age){
//     if($A_age > $C_age){
//         echo "A age is greater";
//     } else {
//         echo "C age is greater";
//     }
//     if($A_age > $D_age){
//         echo "A age is greater";
//     } else {
//         echo "D age is greater";
//     }
// } else {
//     if ($B_age > $C_age)
// }

?>

<?php 
$A_age=40;
$B_age=50;
$C_age=60;
$D_age=90;
if($A_age > $B_age && $A_age > $C_age && $A_age > $D_age)
echo "A age is greater";
if($B_age > $A_age && $B_age > $C_age && $B_age > $D_age)
echo "B age is greater";
if($C_age > $A_age && $C_age > $B_age && $C_age > $D_age)
echo "C age is greater";
if($D_age > $A_age && $D_age > $B_age && $D_age > $C_age)
echo "D age is greater";
?>

<?php
$x=12;
$y=10;
if($x+$y==22 || 4*3>=15){
    echo "That is good";
} else {
    echo "That is not good";
}
?>

