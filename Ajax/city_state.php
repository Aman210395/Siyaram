<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$que = "SELECT DISTINCT(city_state) FROM cities";
$result = mysqli_query($con, $que);
?>
<html>
    <head>
     <script src="jquery.js"></script>
     <script>
         $(document).ready(function(){
            $("#state").change(function(){
                var a = $("#state").val();
                $.post("city_state_server.php", {state : a},function(res){
                        console.log(res);
                })
            })
         })
     </script>

    </head>
    <body>
        <br/>
        <br/>
        Select State: <select id="state">
            <option>Select</option>
            <?php 
            while($data=mysqli_fetch_assoc($result))
            {
                
                echo "<option>".$data['city_state']."</option>";
            }
            
            ?>
        </select>
        <br/>
        <br/>
        <br/>
        Select City: <select>
            <option>Select</option>
            <option></option>
            <option></option>
        </select>

    </body>
</html>