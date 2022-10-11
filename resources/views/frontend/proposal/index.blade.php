<?php $today = date("j F, Y"); ?>
@extends('frontend.users.master')
@section('page_title', 'Preview Proposal')
@section('content')
<!--Container Main start-->
<div class="bg-gray p-4">
  <div class="review-edit-proposal-box p-2">
    <div class="d-block d-lg-flex justify-content-between align-items-center"><img src="" alt="">
      <div class="logo-box text-center mb-sm-3"><img height="81px" width="202px" src="@if($company_detail->logo){{asset('storage/app/public/company_images'.'/'.$company_detail->logo)}}@else{{ asset('public/assets/frontend/images/company-logo.jpg') }}@endif"
        alt=""/> <a href="{{url('user/show')}}" class="table-btn edit p-1 d-inline-block align-top"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
            <path d="M10.5386 2.8413L12.1582 4.4602M11.5801 1.41511L7.20061 5.79462C6.97432 6.02059 6.81999 6.3085 6.75707 6.62204L6.35254 8.647L8.3775 8.24171C8.69103 8.179 8.97857 8.02529 9.20492 7.79894L13.5844 3.41942C13.716 3.28782 13.8204 3.13158 13.8917 2.95963C13.9629 2.78768 13.9995 2.60338 13.9995 2.41726C13.9995 2.23115 13.9629 2.04685 13.8917 1.8749C13.8204 1.70295 13.716 1.54671 13.5844 1.41511C13.4528 1.2835 13.2966 1.17911 13.1246 1.10788C12.9527 1.03666 12.7684 1 12.5823 1C12.3962 1 12.2119 1.03666 12.0399 1.10788C11.868 1.17911 11.7117 1.2835 11.5801 1.41511V1.41511Z" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12.4707 10.1764V12.4706C12.4707 12.8762 12.3096 13.2652 12.0227 13.552C11.7359 13.8389 11.3469 14 10.9413 14H2.52943C2.1238 14 1.73478 13.8389 1.44796 13.552C1.16114 13.2652 1 12.8762 1 12.4706V4.05872C1 3.65309 1.16114 3.26408 1.44796 2.97726C1.73478 2.69043 2.1238 2.5293 2.52943 2.5293H4.82357" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a></div>
      <div class="eamil-box text-center text-lg-end"><strong>Call:</strong>@if($company_detail){{$company_detail->phone}}@endif<br>
<strong>Email:</strong> david.zoboki@spartanaccounting.co.uk </div>
    </div>
    </div>
    <div class="review-edit-proposal-box">
    <hr class="m-0 p-0">
   </div>
   <div class="review-edit-proposal-box px-4 py-3">


    <div class="d-block d-sm-flex justify-content-between align-items-top mb-4">
    <div class="name-box">
    <div class="prepared-box font-sm d-flex align-items-center">Prepared for: <a href="#" class="table-btn edit p-1 d-inline-block align-top ms-4"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
            <path d="M10.5386 2.8413L12.1582 4.4602M11.5801 1.41511L7.20061 5.79462C6.97432 6.02059 6.81999 6.3085 6.75707 6.62204L6.35254 8.647L8.3775 8.24171C8.69103 8.179 8.97857 8.02529 9.20492 7.79894L13.5844 3.41942C13.716 3.28782 13.8204 3.13158 13.8917 2.95963C13.9629 2.78768 13.9995 2.60338 13.9995 2.41726C13.9995 2.23115 13.9629 2.04685 13.8917 1.8749C13.8204 1.70295 13.716 1.54671 13.5844 1.41511C13.4528 1.2835 13.2966 1.17911 13.1246 1.10788C12.9527 1.03666 12.7684 1 12.5823 1C12.3962 1 12.2119 1.03666 12.0399 1.10788C11.868 1.17911 11.7117 1.2835 11.5801 1.41511V1.41511Z" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12.4707 10.1764V12.4706C12.4707 12.8762 12.3096 13.2652 12.0227 13.552C11.7359 13.8389 11.3469 14 10.9413 14H2.52943C2.1238 14 1.73478 13.8389 1.44796 13.552C1.16114 13.2652 1 12.8762 1 12.4706V4.05872C1 3.65309 1.16114 3.26408 1.44796 2.97726C1.73478 2.69043 2.1238 2.5293 2.52943 2.5293H4.82357" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a></div>
     <div class="comp-name"><strong>@if($client_detail){{$client_detail->name}}@endif</strong></div>
     <div class="full-name font-sm">@if($client_detail){{ $client_detail->first_name }} {{ $client_detail->last_name }}@endif</div>
     <div class="address font-sm">@if($client_detail){{$client_detail->address_line_1}}@endif</div>
    </div>
    <div class="ref-no">
    <strong>Ref No:</strong> <span class="font-sm">{{ $proposal_details->ref_no }}</span><br>
<strong>Date:</strong> <span class="font-sm">{{ $today }}</span>
    </div>
    </div>

    <div class="introduction mb-4">
    <h6 class="text-dark">Introduction</h6>
    <p>With this proposal, you will see all the services we provide and what we do. The fees are custom made to your business size and align with your goals to help you to build a more profitable business. It will save you time, as you just need to review to make sure that you have all the ordered services and accept them. There are no hidden fees!</p>
    </div>

     <div class="testimonial mb-4">
    <h6 class="text-dark">Testimonial</h6>
    <div class="testimonial-box mt-4">
    <div class="testimonial-txt">"Filing limited company accounts and statement for a start up company. Delivered in good time and excellent communicaiton!"</div>
    <div class="pro-name">- Seen to hire Ltd</div>
    </div>
    </div>

    <div class="goals-targets mb-4">
    <h6 class="text-dark">Services Offered <a href="{{url('proposal/show/edit'.'/'.$proposal_details->id)}}" class="table-btn edit p-1 d-inline-block align-top ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
            <path d="M10.5386 2.8413L12.1582 4.4602M11.5801 1.41511L7.20061 5.79462C6.97432 6.02059 6.81999 6.3085 6.75707 6.62204L6.35254 8.647L8.3775 8.24171C8.69103 8.179 8.97857 8.02529 9.20492 7.79894L13.5844 3.41942C13.716 3.28782 13.8204 3.13158 13.8917 2.95963C13.9629 2.78768 13.9995 2.60338 13.9995 2.41726C13.9995 2.23115 13.9629 2.04685 13.8917 1.8749C13.8204 1.70295 13.716 1.54671 13.5844 1.41511C13.4528 1.2835 13.2966 1.17911 13.1246 1.10788C12.9527 1.03666 12.7684 1 12.5823 1C12.3962 1 12.2119 1.03666 12.0399 1.10788C11.868 1.17911 11.7117 1.2835 11.5801 1.41511V1.41511Z" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12.4707 10.1764V12.4706C12.4707 12.8762 12.3096 13.2652 12.0227 13.552C11.7359 13.8389 11.3469 14 10.9413 14H2.52943C2.1238 14 1.73478 13.8389 1.44796 13.552C1.16114 13.2652 1 12.8762 1 12.4706V4.05872C1 3.65309 1.16114 3.26408 1.44796 2.97726C1.73478 2.69043 2.1238 2.5293 2.52943 2.5293H4.82357" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a></h6>


    <table class="services-offered">
      <thead>
        <tr class="no-bg">
          <th width="50%" scope="col">Service</th>
          <th width="10%" scope="col">Type</th>
          <th width="10%" scope="col">Price</th>
          <th width="10%" scope="col">Field</th>
          <th width="20%" scope="col" class="text-end">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $total = 0;
        ?>
        @foreach($proposal_details->proposal_services  as $proposal_service)
          <tr>
            <td data-label="Service">
              {{ $proposal_service->service->service_title }}
            </td>
            <td data-label="Type">
              {{ $proposal_service->service->service_type->title }}
            </td>
            <td data-label="Price">
              {{ $proposal_service->price }}
            </td>
            <td data-label="Field">
              {{ $proposal_service->price }}
            </td>
            <td data-label="Total" class="text-end">
              £{{ $proposal_service->price }}
                <?php   $total = $total + $proposal_service->price ?>
            </td>
        @endforeach
        </tbody>
        </table>

    <div class="w-50 float-end d-flex justify-content-between align-items-center px-3 py-2 totle-amount-box"><span class="totle-txt">Total Amount</span> <span class="totle-amount">£{{ $total }}</span> </div>

    <div class="clearfix"></div>

    <div class="w-50 float-end d-flex justify-content-between align-items-center px-3 py-2 monthly-amount-box mt-3 mb-4"><span class="totle-txt">Your Monthly Investment will be:</span> <span class="totle-amount">£334</span> </div>

    </div>
 <div class="clearfix"></div>

    <div class="goals-targets mb-4">
    <h6 class="text-dark">Goals/Targets <a href="{{url('proposal/show/edit'.'/'.$proposal_details->id)}}" class="table-btn edit p-1 d-inline-block align-top ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
            <path d="M10.5386 2.8413L12.1582 4.4602M11.5801 1.41511L7.20061 5.79462C6.97432 6.02059 6.81999 6.3085 6.75707 6.62204L6.35254 8.647L8.3775 8.24171C8.69103 8.179 8.97857 8.02529 9.20492 7.79894L13.5844 3.41942C13.716 3.28782 13.8204 3.13158 13.8917 2.95963C13.9629 2.78768 13.9995 2.60338 13.9995 2.41726C13.9995 2.23115 13.9629 2.04685 13.8917 1.8749C13.8204 1.70295 13.716 1.54671 13.5844 1.41511C13.4528 1.2835 13.2966 1.17911 13.1246 1.10788C12.9527 1.03666 12.7684 1 12.5823 1C12.3962 1 12.2119 1.03666 12.0399 1.10788C11.868 1.17911 11.7117 1.2835 11.5801 1.41511V1.41511Z" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12.4707 10.1764V12.4706C12.4707 12.8762 12.3096 13.2652 12.0227 13.552C11.7359 13.8389 11.3469 14 10.9413 14H2.52943C2.1238 14 1.73478 13.8389 1.44796 13.552C1.16114 13.2652 1 12.8762 1 12.4706V4.05872C1 3.65309 1.16114 3.26408 1.44796 2.97726C1.73478 2.69043 2.1238 2.5293 2.52943 2.5293H4.82357" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a></h6>
      <p>{{$proposal_details->goals}} </p>
    </div>

    <div class="text-center">
    @if($proposal_details->status == 'Accepted')
    <a href="#"
      class="btn submit-btn" class="btn green btn-success btn-md my-3 ps-3 pe-3 pt-2 pb-2 text-uppercase">
      Send Proposal Now
    </a>
    @else()
    <a
      href="{{ url('proposal/send/email'.'/'.$proposal_details->id) }}"
      class="btn green btn-success btn-md my-3 ps-3 pe-3 pt-2 pb-2 text-uppercase">
      SEND PROPOSAL NOW
    </a>
    @endif
    </div>

  </div>
</div>
<!--Container Main end-->
@endsection
@section('js')
<script>
  jQuery('.dashboard-nav .pe-2 img').click(function() {
     jQuery('span.last-day').toggleClass('show');

     });
  </script>
@endsection
