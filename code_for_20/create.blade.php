@extends('backend.layouts.master')

@section('title')
Admin Create - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
.form-check-label {
    text-transform: capitalize;
}
</style>
@endsection

@section('extra_styles')
<style>
.box {
    width: 100%;
    max-width: 600px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 16px;
    margin: 0 auto;
}

input.parsley-success,
select.parsley-success,
textarea.parsley-success {
    color: #468847;
    background-color: #DFF0D8;
    border: 1px solid #D6E9C6;
}

input.parsley-error,
select.parsley-error,
textarea.parsley-error {
    color: #B94A48;
    background-color: #F2DEDE;
    border: 1px solid #EED3D7;
}

.parsley-errors-list {
    margin: 2px 0 3px;
    padding: 0;
    list-style-type: none;
    font-size: 0.9em;
    line-height: 0.9em;
    opacity: 0;

    transition: all .3s ease-in;
    -o-transition: all .3s ease-in;
    -moz-transition: all .3s ease-in;
    -webkit-transition: all .3s ease-in;
}

.parsley-errors-list.filled {
    opacity: 1;
}

.parsley-type,
.parsley-required,
.parsley-equalto {
    color: #ff0000;
}
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admin Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                    <li><span>Create Admin</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Role</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.admins.store') }}" id="validate_form" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Admin Name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Admin Email</label>
                                <input type="text" id="email_address" name="email" value="{{old('email')}}"
                                    class="form-control" required placeholder="Enter Email ID" data-parsley-type="email"
                                    data-parsley-trigger="keyup" data-parsley-checkemail
                                    data-parsley-checkemail-message="Email Address already Exists" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    data-parsley-type="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="password">Assign Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    <option value="">Select</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="username">Admin Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter Username" required>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Admin</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
})
</script>

@endsection

@section('extra_scripts')
<script type="text/javascript" src="http://parsleyjs.org/dist/parsley.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('#validate_form').parsley();
})
$('#email_address').parsley();

window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value) {
        return $.ajax({
            url: "{{route('check.email')}}",
            method: "POST",
            data: {
                email: value
            },
            dataType: "json",
            async: false,
            success: function(data) {
                return true;
            }
        });
    }
});
</script>
@endsection