<?php
$city = array("indore", "ujjain", "mumbai", "pune", "bhopal");
?>
<html>
    <head>
    </head>
<body>
    <h1>City in Select-option</h1>
    Select City : <select>
        <option>Select</option>
        <?php
        foreach($city as $x)
        {
            echo "<option>".$x."</option>";
        }
        ?>
    </select>
</body>
</html>
