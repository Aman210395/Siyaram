<!-- <html>
    <head>
     <script src="jquery.js"></script>
     <script>
         $(document).ready(function(){
             $("button").click(function(){
                 $.get("call_rec_server.php", function(res){
                     $("table").html(res);
                 })
             })
         })
     </script>
    </head>
    <body>
        <br/>
       <button>OK</button>
       <br/>
       <br/>
       <table border=1></table>
    </body>
</html> -->
<html>
    <head>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.get("call_rec_server.php",function(res){
                    $("table").html(res);
                })
            })
        })
    </script>
    </head>
    <body>
        <br />
        <button>OK</button>
        <br />
        <br />
         <table border=1></table>
    </body>
</html>