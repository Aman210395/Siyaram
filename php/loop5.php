<?php
$data = array("red", "green", "blue", "pink", "yellow", "black", "white");

// foreach($data as $x)
// {
//     echo $x;
//     echo "<br />";
// }
echo $data[0];
sort($data);
echo "<Br />";
echo $data[0];
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";


$data2 = array("a"=>"red", "b"=>"green", "c"=>"blue", "d"=>"pink", "e"=>"yellow", "f"=>"black", "g"=>"white");

echo $data2["b"];
ksort($data2);
print_r($data2);
// echo $data2["b"];


?>