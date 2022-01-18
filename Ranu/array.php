<?php
$a=array(10,26,27,47,26,97,47);
echo $a[4];
?>
<br/>
<br/>

<?php
$a=array("a"=>48,"b"=>65,"c"=>50 ,"d"=>36,"e"=>29);

echo $a["b"];
?>
<br/>
<br/>
<?php
$a=array(1=>"amit",2=>"nitin",3=>"shalu",4=>"monu",5=>"kalu");

echo $a[5];
?>
<br/>
<br/>
<?php
$a=array(27,56,9,9,78,80,30,45);
$b=array(1=>"dhar",2=>"ujjain",3=>"mumbai",4=>"indore",5=>"bhopal",6=>$a);
$c=array("a"=>"red","b"=>"yellow","c"=>"pink","d"=>$b);
echo ($c["d"][6][0]);
echo "<br/>";
echo "<br/>";
print_r ($c["b"]);
echo "<br/>";
echo "<br/>";

print_r ($b[3]);
echo "<br/>";echo "<br/>";

echo ($b[6][4])

?>
<br/>
<br/>
<?php

$a=array("name"=>"rishi","age"=>19,"city"=>"indore","last"=>"nandiwal");
$b=array("name"=>"harsh","age"=>26,"city"=>"dewas","last"=>"sharma");
$c=array("name"=>"pankaj","age"=>20,"city"=>"bhopal","last"=>"mishra");
print_r ($a["name"]."".$a["last"]."".$a["city"]);
echo "<br/>";
echo "<br/>";
print_r($b['name']."".$b['last']);
echo "<br/>";
echo "<br/>";
print_r($c["city"]."".$c["age"]."".$c["name"]."".$c["last"]);

?>



