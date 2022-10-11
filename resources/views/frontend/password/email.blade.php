<!DOCTYPE html>
<html lang="en">
<head>
    <title>EziProposal | Forget Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/') }}/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/assets/frontend/') }}/custom-script.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
        <div class="login-main-box">
            <div class="col-md-12 logo_outer text-center"> <img src="{{ asset('public/assets/frontend/') }}/images/price-proposal-logo.png" /> </div>
            <div class="login_oueter text-white p-4">
                <form method="POST" action="{{url('/forget/password')}}" id="login" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <h5 class="title mb-4 text-center">Reset Password</h5>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="email" type="email" class="input form-control @error('email') is-invalid @enderror" id="email" placeholder="email" aria-label="Email" aria-describedby="basic-addon1" value="{{ old('email') }}" />
                                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span> </div>
                            </div>
                        </div>
                        @error('email')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="col-12 text-center">
                            <button class="btn green btn-success btn-lg my-3 ps-5 pe-5 text-uppercase form-btn" type="submit" name="signin">Send Password Reset Link</button>
                        </div>
                        <div class="col-12">
                            <div class="text-end fg-pw-link"> <a href="{{url('login')}}">Go to login?</a> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
