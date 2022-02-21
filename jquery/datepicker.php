<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$que = "SELECT * FROM cities";
$result = mysqli_query($con, $que);

$city = "";
while($data = mysqli_fetch_assoc($result))
{
    $city .= '"'.$data['city_name'].'",';
}

$newcity = rtrim($city, ",");

?>
<html>
    <head>
        <link rel="stylesheet" href="jquery-ui.css">
        <script src="jquery.js"></script>
        <script src="jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $("#mydate").datepicker({
                    changeMonth : true,
                    changeYear : true,
                    dateFormat : "dd/MM/yy"
                    
                });

                var arr = [<?= $newcity ?>];

                $("#search").autocomplete({
                    source : arr
                });
            })
        </script>
    </head>
    <body>
        <br />
        <br />
        <h1>Datepicker in jQuery Plugins</h1>
        Select Date <input type="text" id="mydate" />
        <br />
        <Br />
        Autocomplete : <input type="text" id="search"/>
    </body>
</html>