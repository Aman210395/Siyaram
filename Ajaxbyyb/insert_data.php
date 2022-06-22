
<html>
    <head>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"/> -->
    <script src="assets/js/jquery.js"></script>
    <!-- <script src="assets/js/bootstrap.bundle.js"></script> -->
     </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center">Add Records with PHP & Ajax</h3>
                    <br>
                    First Name : <input type="text" id="first_name"> <br/><br/>
                    Last Name : <input type="text" id="last_name">
                    <br>
                    <br> 
                    <input type="button" value="Save" id="savedata">
                    <br>
                    <br>
                    <table class="table table-bordered" id="xyz">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                        </tr>
                    </table>

                    <script>
                       $(document).ready(function(){
                        function loadTable()
                        {
                            $.ajax({
                                url : "ajax-load.php",
                                type : "POST",
                                success : function(data){
                                    $("#xyz").html(data)
                                }
                            })
                        }
                        loadTable();

                       $("#savedata").on("click",function(e){
                                 e.preventDefault();
                                 var a = $("#first_name").val();
                                 var b = $("#last_name").val();
                                 
                                $.ajax({
                                    url : "ajax-insert.php",
                                    type : "POST",
                                    
                                    data : {fname : a, lname : b },
                                    success : function(data)
                                    {
                                        if(data == 1)
                                        {
                                        loadTable();
                                        }
                                        else{
                                            alert("Data not Inserted");
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