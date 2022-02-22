<html>
    <head>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                   var a = $("#name").val();
                   var b = $("#age").val();
                   var c = $("#city").val();
                   
                   $.post("call_send_server.php", { name : a, age : b, city : c }, function(){
                       $("#name").val("");
                       $("#age").val("");
                       $("#city").val("Select");
                       $("h4").html("Data Added");
                   })
                })
            })
        </script>
    </head>
    <body>
        <Br />
        <Br />
        Name : <input type="text" id="name"/>
        <br />
        <br />
        Age : <input type="text" id="age"/>
        <Br />
        <Br />
        City : <select id="city">
            <option>Select</option>
            <option>indore</option>
            <option>mumbai</option>
            <option>pune</option>
        </select>
        <Br />
        <Br />
        <button>OK</button>
        <h4></h4>
    </body>
</html>