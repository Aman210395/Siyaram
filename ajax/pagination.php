<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script>
            var rec_per_page = 200;
            $(document).ready(function(){
                $.get("api_total_rec.php", function(res){
                    var data = JSON.parse(res);
                    // console.log(data);
                    var total = data.total;
                    var total_page = Math.ceil(total/rec_per_page);
                    
                    for(var i = 1; i <= total_page; i++)
                    {
                        var str = `
                                <li class="page-item">
                                    <a class="page-link" onclick="get_rec(${i})" href="#">${i}</a>
                                </li>
                            `;

                        $(".pagination").append(str);
                    }
                })





                var n = 1;
                $.get("api_pagination.php?rec="+rec_per_page+"&pageno=1", function(res){
                    var data = JSON.parse(res);
                    data.forEach(function(x){

                        var str = `
                            <tr>
                                <td>${n}</td>
                                <td>${x.city_name}</td>
                                <td>${x.city_state}</td>
                            </tr>
                        `;
                        n++;
                        $("table").append(str);
                    })

                })
            })

            function get_rec(a)
            {
                // console.log(b);
                $("table").html(`<tr>
                            <th>S.No.</th>
                            <th>City Name</th>
                            <Th>State Name</Th>
                            </tr>`);
                var n = (rec_per_page*(a-1))+1;
                $.get("api_pagination.php?rec="+rec_per_page+"&pageno="+a, function(res){
                    var data = JSON.parse(res);
                    console.log(data);
                    data.forEach(function(x){

                        var str = `
                            <tr>
                                <td>${n}</td>
                                <td>${x.city_name}</td>
                                <td>${x.city_state}</td>
                            </tr>
                        `;
                        n++;
                        $("table").append(str);
                    })

                })
            }



        </script>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <ul class="pagination">
                        
                    </ul>
                    <table class="table table-dark table-hover">
                        <tr>
                            <th>S.No.</th>
                            <th>City Name</th>
                            <Th>State Name</Th>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>