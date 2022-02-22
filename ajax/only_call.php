<html>
    <head>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    $.get("only_call_server.php", function(){
                        alert("Successfuly Inserted");
                    })
                })
            })
        </script>
    </head>
    <body>
        <Br />
        <Br />
        <button>OK</button>
    </body>
</html>