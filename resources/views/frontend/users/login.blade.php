<!DOCTYPE html>
<html lang="en">
<head>
    <title>EziProposal | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/') }}/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/assets/frontend/') }}/custom-script.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
        <div class="login-main-box">
            <div class="col-md-12 logo_outer text-center"> <img src="{{ asset('public/assets/frontend/') }}/images/price-proposal-logo.png" /> </div>
            <div class="login_oueter text-white p-4">
                <form action="{{ url('users/authenticate') }}" method="post" id="login" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <h5 class="title mb-4 text-center">Login to your account</h5>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="email" type="email" value="" class="input form-control" id="email" placeholder="email" aria-label="Email" aria-describedby="basic-addon1" />
                                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span> </div>
                            </div>
                        </div>
                        @error('email')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required aria-label="password" aria-describedby="basic-addon1" />
                                <div class="input-group-append"> <span class="input-group-text" onclick="password_show_hide();"> <i class="fas fa-eye-slash" id="show_eye"></i> <i class="fas fa-eye d-none" id="hide_eye"></i> </span> </div>
                            </div>
                        </div>
                        @error('password')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="col-12">
                            <div class="text-end fg-pw-link"> <a href="{{url('/forget/password')}}">Forgot your password?</a> </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-check text-left">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember_me" />
                                <label class="form-check-label" for="remember_me">Keep me logged in</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn green btn-success btn-lg my-3 ps-5 pe-5 text-uppercase form-btn" type="submit" name="signin">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 register-new-account text-white pt-4 pb-4 ps-2 pe-2 text-center">
                <h5 class="title text-center">Register a new Account</h5>
                <a href="{{ url('register') }}" class="btn btn-outline-light btn-md mt-3 ps-4 pe-4 text-uppercase">Register</a> </div>
        </div>
    </div>
</div>
</body>
</html>
