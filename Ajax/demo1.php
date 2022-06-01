<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    $.get("https://fakestoreapi.com/products", function(res){
                        console.log(res);
                        res.forEach(function(x){
                            // var str = "<tr><td>"+x.title+"</td>";

                            /*var str = `
                                <tr>
                                    <td>${x.title}</td>
                                    <td>${x.price}</td>
                                    <td>${x.category}</td>
                                    <td><img src='${x.image}' height='50' width='50' /></td>
                                <tr>
                            `;*/
                            var str = `
                                <div class='col-md-3'>
                                    <div class='card'>
                                        <img src='${x.image}' class='card-img-top' style='height : 200px' />
                                        <div class='card-body'>
                                            <p>${x.title}</p>
                                            <small>${x.price}</small>
                                            
                                        </div>
                                    </div>
                                </div>
                            `;


                            $("#pro").append(str);
                        })
                    })
                })
            })
        </script>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary">Get Product</button>
                    <!-- <table class="table table-dark table-hover table-bordered mt-4">
                        <tr>
                            
                            <td>Title</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Image</td>
                        </tr>
                    </table> -->
                    <div class="row" id="pro">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>