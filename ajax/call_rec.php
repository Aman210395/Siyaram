<html>
    <head>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    $.get("call_rec_server.php", function(res){
                        // alert(res);
                        $("table").html(res);
                    })
                })
            })
        </script>
    </head>
    <body>
        <Br />
        <Br />
        <button>OK</button>
        <table border="1"></table>
    </body>
</html>