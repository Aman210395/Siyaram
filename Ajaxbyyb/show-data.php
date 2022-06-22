<html>
  <head>
    <link rel = "stylesheet" href="assets/css/bootstrap.css"/>
    <script src = "assets/js/jquery.js"></script>
    <script src = "assets/js/bootstrap.bundle.js"></script>
  </head>
  <body>
    <div class="container"> 
      <div class="row">
        <div class="col-md-6 offset-md-3">

        <h3 class="mt-3 text-center">PHP AJAX</h3>
        <br>
        <h3 class="text-center" id="load">Load Data</h3>
        <table class="table table-bordered" id="loadtbl"></table>

    <script>
   $(document).ready(function(){
    $("#load").on("click",function(){
      $.ajax({
         url : "ajax-load.php",
         type : "POST",
         success : function(data){
           if(data != "")
           {
             $("#loadtbl").html(data);
          }
          else
          {
            alert("Not Entered");
                 
           }
         }
      })
    })
   })
   </script>
  
        </div>
      </div>
    </div>
  </body>
</html>