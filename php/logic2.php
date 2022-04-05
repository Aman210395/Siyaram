<?php
$arr = array(10, 5, 8, 1, 3, 4);

$n = count($arr)-1;

$arr2= array();
for($i = $n; $i>=0; $i--)
{
    $arr2[] = $arr[$i];
}
print_r($arr2);
?>