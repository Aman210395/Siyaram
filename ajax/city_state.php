<html>
    <head>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                
                $.get("state_server.php", function(res){
                    var data = JSON.parse(res);
                    data.forEach(function(x){
                        var str = `<option>${x.city_state}</option>`;
                        $("#state").append(str);
                    })
                })



                $("#state").change(function(){
                    var a = $(this).val();
                    $("#city").html("");
                    $.post("city_state_server.php", { state : a }, function(res){
                        
                        var data = JSON.parse(res);
                        console.log(data);
                        $("#city").html("<option>Select</option>");
                        data.forEach(function(x){
                            var str = `<option>${x.city_name}</option>`;
                            $("#city").append(str);
                        })
                        // var n = 1;
                        // data.forEach(function(x){
                        //     var htmlCode = `
                        //         <tr>
                        //             <td>${n}</td>
                        //             <td>${x.city_name}</td>
                        //         </tr>
                        //     `;
                        //     n++;
                        //     $("table").append(htmlCode);
                        // })
                    })
                })
            })
        </script>

    </head>
    <body>
        <h1>City-State Task</h1>
        <br />
        <Br />
        Select State <select id="state">
            <option>Select</option>
           
        </select>
        <br />
        <Br />
        <Br />
        <Br />
        <Br />
        Select City <select id="city">
            <option>Select</option>
        </select>
        <!-- <table align="center" border="1" width="500">
            <tr>
                <th>S.No.</th>
                <th>City Name</th>
                
            </tr>
        </table> -->

    </body>
</html>