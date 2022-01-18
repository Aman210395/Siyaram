<?php 
$a= array("mahindra", "hyundai", "suzuki", "kia");
$b= array("a" => "rohit", "b" => 27, "c" => "indore", "d" => $a);
$c= array(5,10,25,16,"name",$b,40);
$d= array(true, "home", 100, $c);
// Print $a by using $b
print_r($b["d"]);
echo "<br />";
// print $b by using $d and $c
print_r($d[3][5]);
echo "<br />";
// print $a by using $d, $c, $b
print_r($d[3][5]["d"]);
echo "<br />";
// only $c mai 10 ko print krvao
echo($d[3][1]);
echo "<br />";
// only $b mai indore ko print krvao
echo($d[3][5]["c"]);
?>