$(document).ready(function(){
    $("[name='fullname']").keyup(function(){
        var a = $(this).val();
        if(a=="")
        {
            $("#fullname_msg").html("Insert Your Full Name");
            $("[name='fullname']").addClass("is-invalid");
        }
        else{
            $("#fullname_msg").html("");
            $("[name='fullname']").removeClass("is-invalid");
        }
    })



    $("[type='submit']").click(function(){
        
        var a = $("[name='fullname']").val();
        var b = $("[name='age']").val();
        var c = $("[name='add']").val();

        var check=true;

        if(a == "")
        {
            check=false;
            $("#fullname_msg").html("Insert Your Full Name");
            $("[name='fullname']").addClass("is-invalid");
        }
        else
        {
            $("#fullname_msg").html("");
            $("[name='fullname']").removeClass("is-invalid");

        }


        if(b == "")
        {
            check=false;
            $("#age_msg").html("Insert Your Age");
            $("[name='age']").addClass("is-invalid");
        }
        else
        {
            $("#age_msg").html("");
            $("[name='age']").removeClass("is-invalid");

        }
        if(c == "")
        {
            check=false;
            $("#add_msg").html("Insert Address");
            $("[name='add']").addClass("is-invalid");
        }
        else
        {
            $("#add_msg").html("");
            $("[name='add']").removeClass("is-invalid");

        }

        return check;
    })
})