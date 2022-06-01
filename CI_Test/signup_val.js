$(document).ready(function(){
    $("#signup_submit").click(function(){
          var a = $("[name='fullname']").val();
          var b = $("[name='email']").val();
          var c = $("[name='pass']").val();
          var d = $("[name='re_pass']").val();
          var e = $("[name='gender']").val();
          var f = $("[name='add']").val();
          var g = $("[name='city']").val();
          var h = $("[name='contact']").val();

          var i = $("#male").is(":checked");
          var j = $("#female").is(":checked");

          var check = true;

          if(a=="")
          {
              check = false;
              $("#fullname_msg").html("Insert Your Fullname");
              $("[name='fullname']").addClass("is-invalid");
          }
          else{
            $("#fullname_msg").html("");
            $("[name='fullname']").removeClass("is-invalid");
          }
          if(b=="")
          {    
              check = false;
              $("#email_msg").html("Insert Your email");
              $("[name='email']").addClass("is-invalid");
          }
          else{
            $("#email_msg").html("");
            $("[name='email']").removeClass("is-invalid");

            var reg = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            if(reg.test(b)==false)
             {
              check = false;
              //  alert();
               $("#email_msg").html("Enter Valid Email Address");
               $("[name='email']").addClass("is-invalid");
              }
              else{
              //  alert("/oooo");
                $("#email_msg").html("");
                $("[name='email']").removeClass("is-invalid");

             }
          }
          if(c=="")
          {    
              check = false;
              $("#pass_msg").html("Insert Your password");
              $("[name='pass']").addClass("is-invalid");
          }
          else{
            $("#pass_msg").html("");
            $("[name='pass']").removeClass("is-invalid");
          }
          if(d=="")
          {    
              check = false;  
              $("#re_pass_msg").html("Re-enter your password");
              $("[name='re_pass']").addClass("is-invalid");
          }
          else{
            $("#re_pass_msg").html("");
            $("[name='re_pass']").removeClass("is-invalid");

            if(c != d)
            {  
              check = false;
              $("#re_pass_msg").html("Password & Re-Password not Matched");
              $("[name='re_pass']").addClass("is-invalid");
            }
            else{
              $("#re_pass_msg").html("");
              $("[name='re_pass']").removeClass("is-invalid");
            }
          }
          
          if(f=="")
          {    
            check = false;
            $("#add_msg").html("Insert Your Address");
            $("[name='add']").addClass("is-invalid");
          }
          else{
            $("#add_msg").html("");
            $("[name='add']").removeClass("is-invalid");
          }
          if(g=="")
          {   
            check = false;
            $("#city_msg").html("Select Your City");
            $("[name='city']").addClass("is-invalid");
          }
          else{
            $("#city_msg").html("");
            $("[name='city']").removeClass("is-invalid");
          }
          if(h=="")
          {   
            check = false;

            $("#contact_msg").html("Insert Your Contact No.");
            $("[name='contact']").addClass("is-invalid");  
          }
          else{
              $("#contact_msg").html("");
              $("[name='contact']").removeClass("is-invalid");

            if(isNaN(h))
            {
              check = false;
              $("#contact_msg").html("Contact No.must be Numeric");
              $("[name='contact']").addClass("is-invalid");
              
            }
            else{
              $("#contact_msg").html("");
              $("[name='contact']").removeClass("is-invalid");

              if(h.length != 10)
              {
                check = false;
                $("#contact_msg").html("Contact No.must be of 10 digits");
                $("[name='contact']").addClass("is-invalid");
              }
              else{
                $("#contact_msg").html("");
                $("[name='contact']").removeClass("is-invalid");
              }
            }
          }
          if(i == false && j == false)
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