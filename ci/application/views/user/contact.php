<div class="container" style="min-height: 600px; margin-top:50px;">
    <div class="row">
        <div class="col-md-12">
            <h3>Contact Page</h3>
           <?php

            $datestring = '%d-%M-%y';
            $time = time();
            echo mdate($datestring, $time);
            ?>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente tempore ratione sed fugiat deserunt qui neque perferendis voluptas dolorum exercitationem incidunt perspiciatis nulla magnam temporibus omnis mollitia, sequi quam? Velit!</p>

            <br />
            <Br />
            <button id="mybtn" class="btn btn-primary">Get Data</button>

            <table class="table table-dark"></table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#mybtn").click(function(){
            $.get("<?= site_url('ajax/demo') ?>", function(data){
                data = JSON.parse(data);
                // console.log(str);
                var str = "";
                data.forEach(function(x){
                    str += `<tr>
                                <td>${x.title}</td>
                                <td>${x.category}</td>
                                <td>${x.image}</td>
                            </tr>
                    `;

                })
                $(".table-dark").append(str);

                
            })
        })
    })
</script>