$(document).ready(function(){
    $("[name='email']").blur(function(){
        var email = $("[name='email']").val();
        var reg = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

        if(email != "" && reg.test(email)==true)
        {
            $.ajax({
                type : "post",
                url : "check_username.php",
                data : { e : email },
                success : function(res){
                    // alert(res);
                    // console.log(JSON.parse(res));
                    res = JSON.parse(res);
                    // console.log(res);
                    if(res.success == 'false')
                    {
                        // alert();
                        $("#email_msg").html("This Email id already exists !");
                        $("[name='email']").addClass("is-invalid");
                    }else{
                        
                        $("#email_msg").html("");
                        $("[name='email']").removeClass("is-invalid");
                    }
                }
            })
        }

    })



    $("#signup_submit").click(function(){
        
        var name = $("[name='fullname']").val();
        var email = $("[name='email']").val();
        var pass = $("[name='pass']").val();
        var re_pass = $("[name='re_pass']").val();
        var city = $("[name='city']").val();
        var add = $("[name='add']").val();
        var contact = $("[name='contact']").val();


        var male = $("#male").is(":checked");
        var female = $("#female").is(":checked");

        var check = true;

        if(name=="")
        {
            check = false;
            $("#fullname_msg").html("Insert Your Name");
            $("[name='fullname']").addClass("is-invalid");
        }
        else{
            
            $("#fullname_msg").html("");
            $("[name='fullname']").removeClass("is-invalid");
        }

        if(email=="")
        {
            check = false;
            $("#email_msg").html("Insert Your Email");
            $("[name='email']").addClass("is-invalid");
        }
        else{
            
            $("#email_msg").html("");
            $("[name='email']").removeClass("is-invalid");

            var reg = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            if(reg.test(email)==false)
            {
                check = false;
                $("#email_msg").html("Email id is invalid");
                $("[name='email']").addClass("is-invalid");
            }
            else{
                $("#email_msg").html("");
                $("[name='email']").removeClass("is-invalid");
            }

        }
        if(pass=="")
        {
            check = false;
            $("#pass_msg").html("Insert Your Password");
            $("[name='pass']").addClass("is-invalid");
        }
        else{
            
            $("#pass_msg").html("");
            $("[name='pass']").removeClass("is-invalid");
        }
        if(re_pass=="")
        {
            check = false;
            $("#re_pass_msg").html("Insert Your Re-Password");
            $("[name='re_pass']").addClass("is-invalid");
        }
        else{
            
            $("#re_pass_msg").html("");
            $("[name='re_pass']").removeClass("is-invalid");


            if(pass != re_pass)
            {
                check = false;
                $("#re_pass_msg").html("Password and Re-Password is not matched");
                $("[name='re_pass']").addClass("is-invalid");
            }
            else{
                $("#re_pass_msg").html("");
                $("[name='re_pass']").removeClass("is-invalid");
            }

        }
        if(add=="")
        {
            check = false;
            $("#add_msg").html("Insert Your Address");
            $("[name='add']").addClass("is-invalid");
        }
        else{
            
            $("#add_msg").html("");
            $("[name='add']").removeClass("is-invalid");
        }
        if(city=="")
        {
            check = false;
            $("#city_msg").html("Select Your City");
            $("[name='city']").addClass("is-invalid");
        }
        else{
            
            $("#city_msg").html("");
            $("[name='city']").removeClass("is-invalid");
        }
        if(contact=="")
        {
            check = false;
            $("#contact_msg").html("Insert Your Contact");
            $("[name='contact']").addClass("is-invalid");
        }
        else{
            
            $("#contact_msg").html("");
            $("[name='contact']").removeClass("is-invalid");

            if(isNaN(contact))
            {
                check = false;
                $("#contact_msg").html("Contact Number must be Numeric");
                $("[name='contact']").addClass("is-invalid");
            }
            else{
                $("#contact_msg").html("");
                $("[name='contact']").removeClass("is-invalid");

                if(contact.length != 10)
                {
                    check = false;
                    $("#contact_msg").html("Contact Number in 10 Digit");
                    $("[name='contact']").addClass("is-invalid");
                }else{
                    $("#contact_msg").html("");
                    $("[name='contact']").removeClass("is-invalid");
                }
            }
        }

        if(male == false && female == false)
        {
            check = false;
            $("#gender_msg").html("Select Your Gender");
        }
        else{
            $("#gender_msg").html("");

        }

        return check;
    })
})