<!-- Index array -->
<?php 
$a=array(12,48,55.55,true,"rohit");
print_r($a);
echo "<br/>";
echo $a[1].$a[4];
echo "<br/>";
echo $a[4];
?>

<!-- Associative array -->
<?php 
echo "<br/>";
$b=array("a"=>"rohit", 12=>"Mukesh", true=>12, "24.3"=>25.5);
$a=array(12,48,55.55,true,"rohit");
print_r($b);
echo "<br/>";
echo $b[true].$b[12].$a[4];
echo "<br/>";
$b["a"]="rohit";
$b[12]="Mukesh";
$b[true]="12";
$b["24.3"]="25.5";
print_r($b);
?>

<!-- Multidimensional array -->
<?php 
echo "<br/>";
$c=array("rohit","amit", "kamlesh",22, true, 25.50);
$d=array("my"=>"me", "name"=>"rohit", "array1"=>$c, "kiran");
$e=array("a"=>"rohit", 12=>"Mukesh", true=>12, "array2"=>$d, "array1"=>$c, "24.3"=>25.5);
print_r($d);
echo "<br/>";
echo $e["array2"]["array1"][0]." ".$c[1];
echo "<br/>";
?>

<!-- if statement -->
<?php 
$f=10;
$g=6;
if($f%$g>=4 || $f-$g<=2){
    echo "Good going";
}
?>

<!-- if else statement (way 1) -->
<?php 
echo "<br/>";
$f=10;
$g=6;
if(($f%$g>=4 || $f-$g<=2) && $f+$g==17){
    echo "Good going";
} else {
    echo "Bad going";
}
?>

<!-- way 2 -->
<?php 
echo "<br/>";
$x=30;
$y=60;
$z=50;
if($z<$x){
    if($y<$x){
        echo "X is greater";
    } else {
        echo "Y is greater"; 
    }
} else {
    if($y<$z){
        echo "Z is greater";
        } else {
            echo "Y is greater";
    }
}
?>

<!-- if...elseif...else  -->

<?php 
$a=95;
if($a=>90){
    echo "Excellent";
} elseif ($a=>80 && $a<=90){
    echo "Very good";
} elseif ($a=>70 && $a<=80){
    echo  "good";
} elseif ($a=>60 && $a<=70){
    echo "Average";
} elseif ($a=>50 && $a<=60){
    echo "Pass";
} else{
    echo "Fail";
}
?>
