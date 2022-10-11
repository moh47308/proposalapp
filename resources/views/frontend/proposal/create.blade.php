@extends('frontend.users.master')
@section('page_title', 'Create Proposal')


@section('css_links')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('css')
    .select2-container .select2-selection--single{
    height:34px !important;
    }
    .select2-container--default .select2-selection--single{
    border: 0px solid #ccc !important;
    border-radius: 0px !important;
    }
@endsection

@section('content')
    <!--Container Main start-->
    @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('danger') }}</li>
        </ul>
    </div>
@elseif(Session::has('deleted'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('deleted') }}</li>
        </ul>
    </div>
@endif
    <div class="bg-gray p-4">
        <div class=" text-center page-title-box">
            <h4 class="page-title stock">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="22" viewBox="0 0 26 22" fill="none">
                    <path
                        d="M16 4.33333C16 4.33333 16 1 12.6667 1C9.33333 1 9.33333 4.33333 9.33333 4.33333M23.5 11.8333V21H1.83333V11.8333H23.5ZM1 4.33333H24.3333V11C24.3333 11 19.3333 14.3333 12.6667 14.3333C6 14.3333 1 11 1 11V4.33333ZM12.6667 16V12.6667V16Z"
                        stroke="#085588" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Create Proposal
            </h4>
        </div>
        <div class="text-center mt-5 mb-5">
            <form class="create-proposal-form" method="post" action="{{ url("proposal/selectcompany") }}">
                @csrf
                <div class="d-flex justify-content-between mb-1 align-items-center"><strong>1. Select a Client</strong>
                    <a href="{{url('client/create')}}">ADD NEW CLIENT</a></div>
                <select name="client_id" class="w-100 p-1 search-field mb-5 p-2 bg-light rounded-0" id="select_a_client"
                        type="text">
                    <option selected disabled>Select Client or Type Company Name...</option>
                    @foreach($clients as $client)
                        <option
                            @if($selected_client &&  $selected_client->id == $client->id)
                            selected
                            @endif
                            value="{{ $client->id }}">{{ $client->name }} </option>
                    @endforeach
                </select>

                <div class="d-flex justify-content-between mb-1 align-items-center"><strong>2. Billing</strong> <a
                        href="{{url('client/create')}}">ADD NEW CLIENT</a></div>
                <div class="w-100 p-1 search-field drop-down mb-0 p-2 bg-light rounded-0 text-start bill-client">How
                    would you like to bill your client?
                </div>
                <div class="w-100 search-field no-bg p-3 bg-light rounded-0 billing-box">

                    <h6 class="text-start">Recurring Billing</h6>
                    <div class="d-flex">
                        <input type="radio"
                               @if($proposal_details && $proposal_details->billing_option == "recurring" && $proposal_details->billing_sub_option == "weekly" )  checked
                               @endif required class="me-2" name="btnradio" value="weekly" id="btnradio1"
                               autocomplete="off">
                        <label class="me-4" for="btnradio1">Weekly</label>
                        <input type="radio"
                               @if($proposal_details && $proposal_details->billing_option == "recurring" && $proposal_details->billing_sub_option == "monthly" )  checked
                               @endif class="me-2" name="btnradio" id="btnradio2" value="monthly" autocomplete="off">
                        <label class="me-4" for="btnradio2">Monthly</label>
                        <input type="radio"
                               @if($proposal_details && $proposal_details->billing_option == "recurring" && $proposal_details->billing_sub_option == "Quarterly" )  checked
                               @endif class="me-2" name="btnradio" id="btnradio3" value="quarterly" autocomplete="off">
                        <label for="btnradio3">Quarterly</label>
                    </div>
                    <h6 class="text-start mt-4">One Time Billing</h6>
                    <div class="d-flex">
                        <input type="radio"
                               @if($proposal_details && $proposal_details->billing_option == "time billing" && $proposal_details->billing_sub_option == "On Acceptance" )  checked
                               @endif class="me-2" name="btnradio" value="On Acceptance" id="btnradio4"
                               autocomplete="off">
                        <label class="me-5" for="btnradio4">On Acceptance</label>
                        <input type="radio"
                               @if($proposal_details && $proposal_details->billing_option == "time billing" && $proposal_details->billing_sub_option == "On Completion" )  checked
                               @endif class="me-2" name="btnradio" value="On Completion" id="btnradio5">
                        <label for="btnradio5">On Completion</label>
                    </div>
                    <div class="date-filed">
                        <label class="w-100 text-start mt-3">Select estimated completion date</label>
                        <input class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" name="completion_date" id="date" 
                               @if($proposal_details && $proposal_details->billing_option == "time billing" && $proposal_details->billing_sub_option == "On Completion" )  value="{{ $proposal_details->billing_custom_option }}"
                               @endif type="date">
                    </div>
                    <h6 class="text-start mt-4">Custom</h6>
                    <div class="text-start">
                        <input type="radio"
                               @if($proposal_details && $proposal_details->billing_option == "custom" )  checked
                               @endif  class="me-2" name="btnradio" value="custom" id="btnradio6" autocomplete="off" >
                        <label class="me-5" for="btnradio6">Deposit</label>
                    </div>
                    <div class="row deposit-box">
                        <input class="p-1 search-field no-bg p-2 bg-light rounded-0 mt-3 me-3 col-8" id="deposit" name="custom_value"
                               type="text" placeholder="Enter amount or %"
                               @if($proposal_details && $proposal_details->billing_option == "custom" )
                               value="{{ $proposal_details->billing_custom_option }}"
                            @endif
                        >
                        <select name="custom_option" class="p-1 search-field no-bg p-2 bg-light rounded-0 mt-3 col-3">
                            <option
                                @if($proposal_details && $proposal_details->billing_option == "custom" &&  $proposal_details->billing_sub_option == "£")
                                selected
                                @endif value="£">£
                            </option>
                            <option
                                @if($proposal_details && $proposal_details->billing_option == "custom" &&  $proposal_details->billing_sub_option == "%")
                                selected
                                @endif value="%">%
                            </option>
                        </select>
                    </div>
                    <div class="text-start w-100 d-block mt-3 mb-2">
                        <button class="text-left" type="submit">SAVE</button>
                    </div>
                </div>
            </form>
            <div class="create-proposal-form">
                <div class="d-flex justify-content-between mb-1 align-items-center mt-5"><strong>
                    3. Add a Service
                </strong> <a href="{{ url('service/create') }}">UPDATE SERVICES</a></div>
                @if($proposal_details && $proposal_details->proposal_services )
                    @foreach($proposal_details->proposal_services  as $proposal_service)
                        <input disabled 
                            class="w-100 p-1 search-field del-field mb-2 p-2 bg-light rounded-0" type="text"
                            placeholder="{{ $proposal_service->service->service_title }}">
                            <a href="{{url('proposal/delete-selected-service'.'/'.$proposal_service->id)}}">delete</a>
                    @endforeach
                @endif

            </div>
            @if(!$service_detail)
                <form class="create-proposal-form" action="{{ url("proposal/selectservice") }}" method="post">
                    @csrf
                    <div class="select-service-box mt-2">
                        {{--                <input list="services" class="w-100 p-1 search-field no-bg p-2 mb-5 bg-light rounded-0"  type="text" placeholder="">--}}
                        <select class="w-100 p-1 search-field no-bg p-2 mb-5 bg-light rounded-0" name="service_id"
                                id="select_a_service" type="text">
                            <option selected disabled>Select a Service</option>
                            @foreach($services as $service)
                                <option
                                    @if($service_detail && $service_detail->id == $service->id )
                                    selected
                                    @endif
                                    value="{{ $service->id }}">{{ $service->service_title }}</option>
                            @endforeach
                        </select>
                        <a href="#" id="service_id"><img
                                src="{{ asset("public/assets/frontend") }}/images/plus-icon.png"/></a></div>
                </form>
            @endif
            @if($service_detail)
                @if($service_detail->service_type_id == 1 ||  $service_detail->service_type_id == 2 || $service_detail->service_type_id == 3 || $service_detail->service_type_id == 4)
                    <form class="create-proposal-form" action="{{ url("/proposal/addservicetoproposal") }}"
                          method="post">
                        @csrf
                        <div class="w-100 p-1 search-field drop-down mb-0 p-2 bg-light rounded-0 text-start bill-client"
                             style="display: block">{{ ucfirst($service_detail->service_title) }}</div>
                        <div class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0 billing-box"
                             style="display: block">
                            <div class="text-start w-100 d-block mt-3 mb-2">
                                <button class="text-left" type="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                @elseif($service_detail->service_type_id == 5)
                    <form class="create-proposal-form" action="{{ url("/proposal/addservicetoproposal") }}"
                          method="post">
                        @csrf
                        <div class="w-100 p-1 search-field drop-down mb-0 p-2 bg-light rounded-0 text-start bill-client"
                             style="display: block">{{ ucfirst($service_detail->service_title) }}</div>
                        <div class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0 billing-box"
                             style="display: block">
                            <input class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text"
                                   name="volume_value" placeholder="Enter base fee"
                                   @if(5 == $service_detail->service_type_id){{ 'required' }}@endif>
                            <div class="text-start w-100 d-block mt-3 mb-2">
                                <button type="submit" class="text-left">SAVE</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="create-proposal-form" action="{{ url("/proposal/addservicetoproposal") }}"
                          method="post">
                        @csrf
                        <div class="w-100 p-1 search-field drop-down mb-0 p-2 bg-light rounded-0 text-start bill-client"
                             style="display: block">{{ ucfirst($service_detail->service_title) }}</div>
                        <div class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0 billing-box"
                             style="display: block">
                            <?php
                            $ranges = json_decode($service_detail->value);
                            ?>
                            <select class="form-control"
                            @if(session()->get('service_type_id')) == 6)
                            required
                            @endif
                            name="turnover_range">
                            <option value="" selected disabled>Select Turnover Range</option>
                            @foreach($ranges as $range)
                                <option value="{{ $range->price }}">{{ $range->range }}</option>
                                @endforeach
                                </select>
                                <div class="text-start w-100 d-block mt-3 mb-2">
                                    <button type="submit" class="text-left">SAVE</button>
                                </div>
                        </div>
                    </form>
                @endif
            @endif

            <form class="create-proposal-form" action="{{ url('/proposal/goals') }}" method="post">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-between mb-1 align-items-center"><strong>4. Define Your Goal</strong>
                </div>
                <textarea name="goals" required class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" rows="10"
                          placeholder="Enter your personal goal or message here">@if($proposal_details && $proposal_details['goals']){{ $proposal_details["goals"] }}@endif</textarea>
                @error('goals')
                <p class="alert alert-danger">
                    {{$message}}
                </p>
                @enderror
                <button type="submit" class="btn green btn-success btn-lg my-3 ps-4 pe-4 pt-2 pb-2 text-uppercase">
                    NEXT
                </button>
            </form>
        </div>
    </div>
    <!--Container Main end-->
@endsection

@section('js_links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
@section('js')
    <script>
        jQuery('.dashboard-nav .pe-2 img').click(function () {
            jQuery('span.last-day').toggleClass('show');

        });


        jQuery('.bill-client').click(function () {
            //jQuery('.billing-box').toggle();
            jQuery(this).next(".billing-box").toggle();
        });

        jQuery(document).ready(function () {

            jQuery('#btnradio5').click(function () {
                var inputValue = jQuery(this).attr("value");
                var targetBox = jQuery("." + inputValue);
                jQuery(".date-filed").not(targetBox).hide();
                jQuery(targetBox).show();
            });
        });

        jQuery("input:radio").change(function () {
            if (jQuery("#btnradio5").is(":checked")) {
                jQuery(".date-filed").show();
                jQuery("#date").attr('required', true);
            } else {
                jQuery(".date-filed").hide();
                jQuery("#date").attr('required', false);
            }
        });


        jQuery("input:radio").change(function () {
            if (jQuery("#btnradio6").is(":checked")) {
                jQuery(".deposit-box").show();
                jQuery("#deposit").attr('required', true);
            } else {
                jQuery(".deposit-box").hide();
                jQuery("#deposit").attr('required', false);
            }
        });

    </script>
    <script>
        function myFunction() {
            document.getElementById("myForm").submit();
        }
    </script>

    {{--  convert dropdowns to search able --}}
    <script>
        $('#select_a_client').select2();
        $('#select_a_service').select2();
    </script>
    {{-- add service action  --}}
    <script>
        $(function () {
            $('#service_id').on('click', function (e) {
                $(this).closest('form')
                    .trigger('submit')
            })
        })
    </script>
@endsection
