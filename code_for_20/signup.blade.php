<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/parsley.js')}}"></script>
</head>

<body>
    <title></title>
    <div class="container mt-3" style="min-height:700px;">
        <form action="{{route('save')}}" id="validate_form" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">User's Signup</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="fullname" name="fullname" required data-parsley-pattern="/^[a-zA-Z ]*$/"
                                    data-parsley-trigger="keyup" class="form-control">
                                <!-- <small class="text-center text-danger" id="name_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required data-parsley-type="email"
                                    class="form-control">
                                <!-- <small class="text-center text-danger" id="email_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" required
                                    data-parsley-length="[8,16]" data-parsley-trigger="keyup" class="form-control">
                                <!-- <small class="text-center text-danger" id="pass_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Re-password</label>
                                <input type="password" name="re_pass" required data-parsley-equalto="#password"
                                    data-parsley-trigger="keyup" class="form-control">
                                <!-- <small class="text-center text-danger" id="re_password_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" name="contact" required data-parsley-type="number"
                                    data-parsley-maxlength="10" class="form-control">
                                <!-- <small class="text-center text-danger" id="contact_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Select Gender :</label>
                                Male: <input type="radio" value="male" name="gender">
                                Female: <input type="radio" value="female" name="gender">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address"></textarea>
                                <!-- <small class="text-center text-danger" id="address_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Select city</label>
                                <select class="form-control" name="city">
                                    <option value="">Select</option>
                                    <option value="Indore">Indore</option>
                                    <option value="Dewas">Dewas</option>
                                    <option value="Ujjain">Ujjain</option>
                                </select>
                                <!-- <small class="text-center text-danger" id="city_msg"></small> -->
                            </div>
                            <div class="form-group">
                                <label>Hobbies</label>
                                <br>
                                Cricket: <input type="checkbox" value="Cricket" name="check_rules[]" required>
                                Football: <input type="checkbox" value="Football" name="check_rules[]" required>
                                Music: <input type="checkbox" value="Music" name="check_rules[]" required>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Signup">
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
    <!-- <script src="=base_url('assets/js/signup_val.js')?>"></script> -->
</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#validate_form').parsley();
})
</script>