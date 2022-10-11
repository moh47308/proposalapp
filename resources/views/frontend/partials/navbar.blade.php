<header class="header p-2 p-sm-4" id="header">
    <div class="col-md-2 logo-img"> <img src="{{ asset('public/assets/frontend/') }}/images/price-proposal-logo-inner.png" alt=""> </div>
    <div class="col-lg-6 col-md-8 user-name ps-3 ms-5"> Hello, {{session()->get('company_name')}}/{{session()->get('first_name')}} {{session()->get('last_name')}} <a style="@if(session()->get('allowed_proposal') == session()->get('monthly_proposal'))pointer-events: none;  @endif" class="btn blue btn-success btn-sm ms-3 ps-2 pe-2 text-uppercase border-0" href="{{url('proposal/createp')}}"><img width="16px" src="{{ asset('public/assets/frontend/') }}/images/plus-icon-w.png"/> CREATE NEW PROPOSAL</a></div>
    <div class="col-md-2 free-plan d-none d-lg-block"> Current Plan <span>{{ session()->get('current_plan') }} - Limited Features</span></div>
    <div class="col-md-2 mob-profile-box"><a href="#" class="btn green btn-success btn-sm my-3 ps-3 pe-3 text-uppercase d-none d-lg-inline border-0">UPGRADE</a> 
        <img src="{{ asset('public/assets/frontend/') }}/images/bell-icon.png" class="ms-4" /><a href="#"><img width="30px" height="30px" src="@if(session()->has('logo')){{asset('storage/app/public/company_images'.'/'.session()->get('logo'))}}@else{{ asset('public/assets/frontend/images/profile-icon.png') }}@endif" class="ms-2 pro-icon" /></a>
        <div class="profile-menu">
            <ul>
                <li><a href="{{ url('user/show') }}">Account Details</a></li>
                <li><a href="{{ '' }}">Subscription &  Billing</a></li>
                <li><a href="{{ '' }}">Help & Support</a></li>
                <li><a href="{{ url('logout') }}" class="active">Logout</a></li>
            </ul>
        </div>
    </div>
</header>
