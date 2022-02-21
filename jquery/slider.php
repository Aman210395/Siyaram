<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').bxSlider({
                captions : true,
                // mode : "vertical",
                speed : 3000,
                auto : true,
                pause : 1000
                
            });
        })
    </script>
    </head>
    <body>
        <div class="slider">
            <div>
                <img src="images/1.jpg" title="First Image" style="height: 200px; width:100%"/>
            </div>
            <div>
                <img src="images/2.jpg" title="Second Image" style="height: 200px; width:100%"/>
            </div>
            <div>
                <img src="images/3.jpg" title="Second Image" style="height: 200px; width:100%"/>
            </div>
        </div>

        <Br />
        <br />
        Date : <select>
            <option>Select</option>
            <?php
            for($i=2000; $i>=1905; $i--)
            { ?>
                <option><?= $i ?></option>
            <?php
            }
            ?>
        </select>


    </body>
</html>