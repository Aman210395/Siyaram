<!-- way 1 -->
<?php 
$color="blue";
switch($color){
    case("blue"):echo "my favorite color is blue";
    break;
    case("green"):echo "my favorite color is green";
    break;
    case("red"):echo "my favorite color is red";
    break;
    case("yellow"):echo "my favorite color is yellow";
    break;
    case("pink"):echo "my favorite color is pink";
    break;
    default: echo "none of my favorite color";

}
?>

<!-- way 2 -->
<?php
$color="white";
echo "<br />";
if($color=="blue"){
    echo "my favorite color is blue";
} elseif($color=="green") {
    echo "my favorite color is green";
} elseif($color=="red") {
    echo "my favorite color is red";
} elseif($color=="yellow") {
    echo "my favorite color is yellow";
} elseif($color=="pink") {
    echo "my favorite color is pink";
} else {
    echo "none of my favorite color";
}
?>