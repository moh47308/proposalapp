<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> EziProposal | Registration</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/assets/backend/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('public/assets/backend/') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/assets/backend/') }}/dist/css/adminlte.min.css">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ asset("public/assets/backend/") }}index2.html" class="h1">
                EziProposal
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new account</p>

            <form action="{{url('register/user')}}" method="POST">
                @csrf
                <p class="login-box-msg">User Details </p>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        name="first_name"
                        class="form-control"
                        placeholder="First name"
                        value="{{ old('first_name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('first_name')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="input-group mb-3">
                    <input
                        type="text"
                        name="last_name"
                        class="form-control"
                        placeholder="Last name"
                        value="{{ old('last_name') }}"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('last_name')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="input-group mb-3">
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        value="{{ old('email') }}" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="input-group mb-3">
                    <input
                        type="number"
                        name="contact"
                        class="form-control"
                        placeholder="Contact number"
                        value="{{old('contact')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('contact')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="input-group mb-3">
                    <input
                        type="text"
                        name="company_name"
                        class="form-control"
                        placeholder="Company name"
                        value="{{old('company_name')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('company_name')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="input-group mb-3">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Password"
                        value="{{old('password')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="input-group mb-3">
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Retype password"
                        value="{{old('password_confirmation')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <input type="checkbox" onclick="showPassword()"> Show Password
                @error('password_confirmation')
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
                @enderror

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input
                                type="checkbox"
                                id="agreeTerms"
                                name="terms"
                                value="1">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                        @error('terms')
                        <p class="alert alert-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>
                    <!-- /.col -->

            </form>

            <a href="{{ url('login') }}" class="text-center">I already have a account</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- show password -->
<script>
    function showPassword() {
        var getPass = document.getElementById("password");
        if (getPass.type === "password") {
            getPass.type = "text";
        } else {
            getPass.type = "password";
        }
    }
</script
    <!-- /.register-box -->

    <!-- jQuery -->
<script src="{{ asset("public/assets/backend/") }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("public/assets/backend/") }}/plugins/bootstr{{ asset("assets/backend/") }}bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset("public/assets/backend/") }}/di{{ asset("assets/backend/") }}adminlte.min.js"></script>
</body>
</html>
