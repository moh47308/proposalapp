<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EziProposal | Forget Password</title>
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
                <form method="POST" action="{{url('/reset/password')}}" id="login" autocomplete="off">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-row">
                        <h5 class="title mb-4 text-center">Reset Password</h5>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="email" type="email" value="{{ $email ?? old('email') }}" class="input form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="email" aria-label="Email" aria-describedby="basic-addon1"  />
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
                                <input name="password" type="password" value="" class="input form-control @error('password') is-invalid @enderror" id="password" placeholder="password" required aria-label="password" aria-describedby="basic-addon1" autocomplete="new-password" />
                                <div class="input-group-append"> <span class="input-group-text" onclick="password_show_hide();"> <i class="fas fa-eye-slash" id="show_eye"></i> <i class="fas fa-eye d-none" id="hide_eye"></i> </span> </div>
                            </div>
                        </div>
                        @error('password')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="password_confirmation"
                                       value="{{old('password_confirmation')}}"
                                       type="password" value="" class="input form-control" id="password2" placeholder="*Re-enter your Password" required aria-label="Re-enter your Password" aria-describedby="basic-addon1" />
                                <div class="input-group-append"> <span class="input-group-text" onclick="password_show_hide2();"> <i class="fas fa-eye-slash" id="show_eye"></i> <i class="fas fa-eye d-none" id="hide_eye"></i> </span> </div>
                            </div>
                            @error('password_confirmation')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn green btn-success btn-lg my-3 ps-5 pe-5 text-uppercase form-btn" type="submit" >Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
