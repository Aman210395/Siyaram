<?php
$data = array(
        "name"=> "Rohit",
        "age" => 25,
        "city" => "indore",
        "gender" => "male",
        "salary" => 25000
);

foreach($data as $a => $x)
{
    echo $a." : ".$x;
    echo "<Br />";
}

?>