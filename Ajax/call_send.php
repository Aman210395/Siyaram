<html>
    <head>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    var a = $("#name").val();
                    var b = $("#age").val();
                    var c = $("#city").val();
                    $.post("call_send_server.php", {name : a, age : b, city : c}, function(){
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
    <br/>
    Name: <input type="text" id="name">
    <br/>
    <br/>
    Age: <input type="text" id="age">
    <br/>
    <br/>
    <select id="city">
        <option>Select</option>
        <option>Indore</option>
        <option>Dewas</option>
        <option>Ujjain</option>
    </select>
    <br/>
    <br/>
    <button>OK</button>
    <br/>
    <h4></h4>
    </body>
</html>