<html>
    <head>
      <script src="jquery.js"></script>
      <script>
          $(document).ready(function(){
              $("button").mouseover(function(){
                  $.get("only_call_server.php", function(){
                      alert("Successfully Inserted");
                  })
              })
          })
      </script>
    </head>
    <body>
        <br/>
        <button>OK</button>
    </body>
</html>