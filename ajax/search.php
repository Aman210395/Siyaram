<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script>
            $(document).ready(()=>{
                






                $.get("get_all_product.php", (res)=>{
                    res = JSON.parse(res);
                    
                    res.forEach((x)=>{
                        var str = `
                        <tr>
                            <td>${x.id}</td>
                            <td>${x.title}</td>
                            <td>${x.price}</td>
                            <td>${x.category}</td>
                            <td><img src="${x.image}" height="80" width="80" /></td>
                            
                    `;

                        $("#tab").append(str);

                    })
                })


                $("#search_box").keyup(function(){
                    var text = $(this).val();
                    $("#tab").html(`<tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                        </tr>`);
                    $.post("get_search_product.php", { search : text }, function(res){
                        res = JSON.parse(res);
                        res.forEach((x)=>{
                        var str = `
                        <tr>
                            <td>${x.id}</td>
                            <td>${x.title}</td>
                            <td>${x.price}</td>
                            <td>${x.category}</td>
                            <td><img src="${x.image}" height="80" width="80" /></td>
                            
                    `;

                        $("#tab").append(str);

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
                    <h4 class="text-center">All Product</h4>
                    <input type="text" id="search_box" placeholder="Search Your Keyword..." class="form-control" />
                    <Br />
                    <table id="tab" class="table table-dark table-bordered table-hover">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>