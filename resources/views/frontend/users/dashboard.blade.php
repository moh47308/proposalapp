@extends('frontend.users.master')
@section('page_title', 'Dashboard')
@section('content')
	@if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <!--Container Main start-->
    <div class="bg-gray p-4 page-title-box">
        <h4 class="page-title"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M6.66667 20H2.22222C1 20 0 19 0 17.7778V2.22222C0 1 1 0 2.22222 0H6.66667C7.88889 0 8.88889 1 8.88889 2.22222V17.7778C8.88889 19 7.88889 20 6.66667 20ZM13.3333 20H17.7778C19 20 20 19 20 17.7778V12.2222C20 11 19 10 17.7778 10H13.3333C12.1111 10 11.1111 11 11.1111 12.2222V17.7778C11.1111 19 12.1111 20 13.3333 20ZM20 5.55556V2.22222C20 1 19 0 17.7778 0H13.3333C12.1111 0 11.1111 1 11.1111 2.22222V5.55556C11.1111 6.77778 12.1111 7.77778 13.3333 7.77778H17.7778C19 7.77778 20 6.77778 20 5.55556Z" fill="#085588"/>
            </svg> Dashboard</h4>
        <div class="bg-light mt-4 dashboard-nav d-flex align-items-center ps-3 pe-3">
            <div class="pe-2"><img src="{{ asset('public/assets/frontend/') }}/images/last-day-icon.png" /></div>
            <span class="p-3 last-day">
    <select class="border-0">
      <option>From: <strong>the last 30 days</strong></option>
      <option>option2</option>
    </select>
    </span> </div>
        <div class="row text-center mt-5 mb-5 dashboard-list">
            <div class="col-md-4">
                <div class="dashboard-box p-4 red"> <img src="{{ asset('public/assets/frontend/') }}/images/total-proposals-icon-icon.png"/>
                    <h6 class="pt-4">Total Proposals</h6>
                    <div class="date green-clr">@if($proposals){{$proposals}} @else{{ 0 }} @endif/@if($company_data->total_allowed_proposals_in_month){{$company_data->total_allowed_proposals_in_month}} @else{{ 0 }} @endif</div>
                    <div class="dashboard-box-text">Waiting Approval</div>
                    <div class="dashboard-box-number blue-clr">@if($proposals_accepted){{$proposals_accepted}} @else{{ 0 }} @endif</div>
                    <div class="dashboard-box-text">Accepted</div>
                    <div class="dashboard-box-number green-clr">@if($proposals_waiting){{$proposals_waiting}} @else{{ 0 }} @endif</div>
                    <div class="dashboard-box-text">Rejected</div>
                    <div class="dashboard-box-number red-clr">@if($proposals_rejected){{$proposals_rejected}} @else{{ 0 }} @endif</div>
                </div>
                <p class="p-4 m-0">Running out of Proposals? You can upgrade to <a href="#">Solo Plan</a> or Buy more Proposals any time.</p>
                <a href="{{url('stripe/2')}}" class="btn green btn-success btn-sm mb-3 ps-3 pe-3 text-uppercase">UPGRADE TO SOLO PLAN</a> 
                <a href="{{url('show/bundel/1')}}" class="btn blue btn-success btn-sm ps-4 pe-3 mb-3 text-uppercase" >BUY MORE PROPOSALS</a> </div>
            <div class="col-md-4">
                <div class="dashboard-box p-4 green"> <img src="{{ asset('public/assets/frontend/') }}/images/services-offered-icon.png"/>
                    <h6 class="pt-4">Services Offered</h6>
                    <div class="date blue-clr">@if($services){{$services}} @else {{  0}} @endif/@if($company_data->total_services){{$company_data->total_services}} @else {{ 0 }} @endif</div>
                    <!-- <div class="dashboard-box-text">Fixed Price</div>
                    <div class="dashboard-box-number">{{$fix_fee}}</div>
                    <div class="dashboard-box-text">Volume Based</div>
                    <div class="dashboard-box-number">{{$volume_base}}</div>
                    <div class="dashboard-box-text">Turn-Over</div>
                    <div class="dashboard-box-number">{{$turn_over}}</div> -->
                </div>
                <p class="p-4 m-0">Running out of Proposals? You can upgrade to <a href="#">Solo Plan</a> or Buy more Proposals any time.</p>
                <a href="{{url('stripe/2')}}" class="btn green btn-success btn-sm mb-3 ps-3 pe-3 text-uppercase">UPGRADE TO SOLO PLAN</a> 
                <a href="{{url('buy/bundel/1')}}" class="btn blue btn-success btn-sm ps-4 pe-3 mb-3 text-uppercase" >BUY MORE PROPOSALS</a> </div>
            <div class="col-md-4">
                <div class="dashboard-box p-4 blue"> <img src="{{ asset('public/assets/frontend/') }}/images/clients-icon.png"/>
                    <h6 class="pt-4">Clients</h6>
                    <div class="date blue-clr">@if($clients){{$clients}} @else {{ 0 }} @endif/@if($company_data->total_allowed_clients_in_year){{$company_data->total_allowed_clients_in_year}} @else {{ 0 }} @endif</div>
                </div>
                <p class="p-4 m-0">Running out of Proposals? You can upgrade to <a href="#">Solo Plan</a> or Buy more Proposals any time.</p>
                <a href="{{url('stripe/2')}}" class="btn green btn-success btn-sm mb-3 ps-3 pe-3 text-uppercase">UPGRADE TO SOLO PLAN</a> 
                <a href="{{url('show/bundel/1')}}" class="btn blue btn-success btn-sm ps-4 pe-3 mb-3 text-uppercase" >BUY MORE PROPOSALS</a> </div>
        </div>
    </div>
    <!--Container Main end-->
@endsection


