
<!-- Index array- -->
<?php 
$kbc=array(10,20,40,25,80,65);
echo $kbc[2];
echo "<br/>";
sort($kbc);
echo $kbc[2];
?>

<!-- Associative array- -->
<!-- Ye sort hone ke bad chal kyu nahi rha hai? -->
<?php 
echo "<br/>";
echo "<br/>";
$pk=array( "name" => "anushka", "age" => 24, "city" => "mumbai");
echo $pk["age"];
sort($pk);
echo $pk["name"];
?>