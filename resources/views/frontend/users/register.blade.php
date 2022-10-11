<!DOCTYPE html>
<html lang="en">
<head>
    <title>EziProposal | Register</title>
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
            <div class="register_oueter text-white p-4">
                <form action="{{url('register/user')}}" method="POST" id="login" autocomplete="off" >
                    @csrf
                    <div class="row">
                        <h5 class="title mb-4 text-center">Register a FREE Account</h5>
                        <div class="col-6">
                            <div class="input-group mb-4">
                                <input name="first_name"  value="{{ old('first_name') }}"  type="text" value="" class="input form-control" id="firstname" required placeholder="*First Name" />
                            </div>
                            @error('first_name')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-4">
                                <input name="last_name"  value="{{ old('last_name') }}"  type="text" value="" class="input form-control" id="lastname" required placeholder="*Last Name" />
                            </div>
                            @error('last_name')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="email" type="email" class="input form-control" value="{{ old('email') }}" id="emailaddress" required placeholder="*Email Address" />
                            </div>
                            @error('email')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="contact"  type="tel" value="{{old('contact')}}" class="input form-control" id="contactnumber" placeholder="Contact Number" />
                            </div>
                            @error('contact')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="company_name"  type="text" value="{{old('company_name')}}" class="input form-control" id="companyname" placeholder="Company Name" />
                            </div>
                            @error('company_name')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <input name="password" type="password"  value="{{old('password')}}" class="input form-control" id="password" placeholder="*Set a Password" required aria-label="Set a Password" aria-describedby="basic-addon1" />
                                <div class="input-group-append"> <span class="input-group-text" onclick="password_show_hide();"> <i class="fas fa-eye-slash" id="show_eye"></i> <i class="fas fa-eye d-none" id="hide_eye"></i> </span> </div>
                            </div>
                            @error('password')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
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
                        <div class="col-12">
                            <div class="form-group form-check text-left">
                                <input type="checkbox" name="terms" class="form-check-input"  id="remember_me" />
                                <label class="form-check-label" for="remember_me">I agree to Terms & Conditions</label>
                            </div>
                            @error('terms')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn green btn-success btn-lg my-3 ps-5 pe-5 text-uppercase form-btn" type="submit" name="signin">REGISTER</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 login-account text-white pt-4 pb-4 ps-2 pe-2 text-center">
                <h5 class="title text-center">Already have an account? Login</h5>
                <a href="{{url('login')}}" class="btn btn-outline-light btn-md mt-3 ps-4 pe-4 text-uppercase">Login</a> </div>
        </div>
    </div>
</div>
</body>
</html>
