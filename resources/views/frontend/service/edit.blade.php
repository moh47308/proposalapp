@extends('frontend.users.master')
@section('page_title', 'Edit Service')

@section('content')
	<!--Container Main start-->
<div class="bg-gray p-4">
  <div class=" text-center page-title-box">
    <h4 class="page-title stock"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
        <path d="M17.968 0V1.406C17.1482 1.54679 16.3696 1.8671 15.688 2.344L14.656 1.374L13.281 2.844L14.281 3.781C13.8235 4.44769 13.5142 5.20469 13.374 6.001H11.968V8.001H13.374C13.52 8.831 13.848 9.587 14.312 10.251L13.249 11.281L14.689 12.721L15.719 11.657C16.383 12.121 17.139 12.449 17.969 12.595V14H19.969V12.594C20.7652 12.4541 21.5222 12.1452 22.189 11.688L23.125 12.688L24.595 11.312L23.625 10.282C24.095 9.612 24.415 8.837 24.563 8H25.968V6H24.562C24.4181 5.1903 24.0978 4.42217 23.624 3.75L24.562 2.812L23.155 1.406L22.218 2.344C21.5458 1.87017 20.7777 1.54994 19.968 1.406V0H17.968ZM18.968 3.313C19.4531 3.30981 19.934 3.403 20.3829 3.58714C20.8317 3.77129 21.2395 4.04274 21.5826 4.38573C21.9256 4.72872 22.1972 5.13643 22.3815 5.58521C22.5657 6.03398 22.6591 6.51488 22.656 7C22.656 9.055 21.023 10.688 18.968 10.688C16.913 10.688 15.28 9.055 15.28 7C15.28 4.945 16.913 3.312 18.968 3.312V3.313ZM5.998 9.218L4.156 9.968L4.874 11.778C3.91822 12.35 3.11423 13.1437 2.53 14.092L0.75 13.372L0 15.217L1.78 15.935C1.63952 16.4759 1.5663 17.0321 1.562 17.591C1.562 18.161 1.647 18.717 1.78 19.247L0 19.967L0.75 21.81L2.53 21.09C3.1089 22.0507 3.91351 22.8557 4.874 23.435L4.154 25.215L5.999 25.965L6.719 24.185C7.25987 24.3258 7.81611 24.3991 8.375 24.403C8.945 24.403 9.503 24.318 10.031 24.185L10.751 25.965L12.594 25.215L11.874 23.435C12.823 22.8516 13.6169 22.0474 14.188 21.091L15.998 21.809L16.748 19.966L14.938 19.246C15.068 18.716 15.156 18.159 15.156 17.59C15.156 17.02 15.069 16.462 14.936 15.933L16.749 15.215L15.999 13.37L14.189 14.09C13.6146 13.1441 12.8209 12.3504 11.875 11.776L12.595 9.966L10.75 9.216L10.033 11.026C9.49157 10.8864 8.93511 10.8135 8.376 10.809C7.806 10.809 7.25 10.895 6.72 11.027L6 9.217L5.998 9.218ZM8.374 12.81C11.037 12.81 13.154 14.93 13.154 17.592C13.156 20.255 11.037 22.404 8.374 22.404C7.74186 22.4048 7.11577 22.2809 6.53159 22.0393C5.94742 21.7978 5.41663 21.4434 4.96964 20.9964C4.52265 20.5494 4.16823 20.0186 3.92668 19.4344C3.68514 18.8502 3.56121 18.2241 3.562 17.592C3.562 14.929 5.712 12.81 8.374 12.81Z" fill="#085588"></path>
        </svg> Edit Service</h4>
  </div>
  <div class="row text-center mt-5 mb-5">
    <form class="create-proposal-form" action="{{url('service'.'/'.$service->id)}}"
        method="POST">
        @csrf
		@method('put')
        <div class="d-flex justify-content-between mb-1 align-items-center">Service Name</div>
        <input class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text" name="service_title" placeholder="" value="{{$service->service_title}}">

        <div class="d-flex justify-content-between mb-1 mt-2 align-items-center">Description</div>
        <textarea name="description" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" rows="10">{{$service->description}}</textarea>
        @error('description')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror

        <div class="d-flex justify-content-between mb-1 mt-2 align-items-center">Service Type</div>
        <select id="listing" class="w-100 p-1 search-field drop-down no-apperance p-2 bg-light rounded-0 service-type" name="service_type_id">
            <option selected disabled value="">How often do you charge for this?</option>
            @foreach($service_types as $service_type)
                <option
                    @if($service_type->id == $service->service_type_id)
                        selected
                    @endif
                    value="{{ $service_type->id }}">
                    {{ $service_type->title }}
                </option>
            @endforeach
        </select>
        @error('service_type_id')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror

      <div class="price-box 1">
      <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
      <input id="one_off" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text" placeholder="£ 0.00" name="one_off" value="@if(1 == $service->service_type_id){{ $service->value }}@endif" @if(1 == $service->service_type_id){{ 'required' }}@endif>
      </div>

      <div class="price-box 2">
      <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
      <input id="monthly" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text" placeholder="£ 0.00" name="monthly" value="@if(2 == $service->service_type_id){{ $service->value }}@endif" @if(2 == $service->service_type_id){{ 'required' }}@endif>
      </div>

      <div class="price-box 3">
      <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
      <input id="quarterly" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text" placeholder="£ 0.00" name="quarterly" value="@if(3 == $service->service_type_id){{ $service->value }}@endif" @if(3 == $service->service_type_id){{ 'required' }}@endif>
      </div>

      <div class="price-box 4">
      <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
      <input id="annual" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text" placeholder="£ 0.00" name="annual" value="@if(4 == $service->service_type_id){{ $service->value }}@endif" @if(4 == $service->service_type_id){{ 'required' }}@endif>
      </div>

      <div class="price-box 5">
      <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
      <input id="volume_base" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text" placeholder="£ 0.00" name="volume_base" value="@if(5 == $service->service_type_id){{ $service->value }}@endif" @if(5 == $service->service_type_id){{ 'required' }}@endif>
      </div>

    <div class="wrapper-range price-box 6">
        @if(6 == $service->service_type_id)
        <?php $range_based = json_decode($service->value); ?>
        @foreach($range_based as $range)
                <div class="ranges">
                    <div class="range" id="range_default">
                    <div class="d-flex justify-content-between mt-2 align-items-center">Range</div>
                    <input id="range" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text"
                           placeholder="1k to 2k" name="range[]"  value="{{  $range->range }}" >
                    <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
                    <input id="price" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text"
                           placeholder="£ 0.00" name="price[]" value="{{ $range->price }}" @if(6 == $service->service_type_id){{ 'required' }}@endif >
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between align-items-center">
                <a class="btn btn-secondary btn-lg  pe-5 pt-1 pb-1 text-uppercase fs-4" id="add_range"> Add More</a>
            </div>
        @else
            <div class="range" id="range_default">
                    <div class="d-flex justify-content-between mt-2 align-items-center">Range</div>
                    <input id="range" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text"
                           placeholder="1k to 2k" name="range[]"  value="" >
                    <div class="d-flex justify-content-between mt-2 align-items-center">Price</div>
                    <input id="price" class="w-100 p-1 search-field no-bg p-2 bg-light rounded-0" type="text"
                           placeholder="£ 0.00" name="price[]" value=""  >
                </div>
                <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-secondary btn-lg  pe-5 pt-1 pb-1 text-uppercase fs-4" id="add_range"> Add More</a>
                    </div>
        @endif
  </div>


      <button type="submit" class="btn green btn-success btn-lg my-3 ps-4 pe-4 pt-2 pb-2 text-uppercase">SAVE</button>
    </form>
  </div>
</div>
<!--Container Main end-->



@endsection
@section('js')
<script>


     jQuery(document).ready(function(){

    jQuery('#btnradio5').click(function(){
        var inputValue = jQuery(this).attr("value");
        var targetBox = jQuery("." + inputValue);
        jQuery(".date-filed").not(targetBox).hide();
        jQuery(targetBox).show();
    });
});


jQuery(document).ready(function(){
    jQuery("select.service-type").change(function(){
        jQuery(this).find("option:selected").each(function(){
            var optionValue = jQuery(this).attr("value");
            if(optionValue){
                jQuery(".price-box").not("." + optionValue).hide();
                jQuery("." + optionValue).show();
            } else{
                jQuery(".price-box").hide();
            }
        });
    }).change();
});





var range = document.getElementById("month-price");
var minusButton = document.querySelector(".control-minus");
var plusButton = document.querySelector(".control-plus");
var tooltip = document.querySelector(".current-value");
var steps = 500, padding = 15;
// There's a small error due to pixel truncating in Chrome
var subpixelCorrection = 0.4;

// All browsers but IE
range.addEventListener("input", function(evt) {
  updateTooltip ();
}, false);
// IE10
range.addEventListener("change", function(evt) {
  updateTooltip ();
}, false);

function updateTooltip () {
  tooltip.firstElementChild.textContent = range.value;

  var startPosition = - (tooltip.clientWidth)/2 + padding + 4;
  var stepWidth = (range.getBoundingClientRect().width - padding*2)/steps - subpixelCorrection;
  var currentStep =  range.value - range.min;

  // Reposition tooltip on top of the thumb
  tooltip.style.visibility = "visible";
  tooltip.style.left = Math.round(stepWidth*currentStep + startPosition) + "px";

}

minusButton.addEventListener("click", function() {
  range.stepDown();
  updateTooltip ();
}, false);

plusButton.addEventListener("click", function() {
  range.stepUp();
  updateTooltip ();
}, false);


  </script>
  <script type="text/javascript">
        $(document).ready(function () {
            $('#listing').on('change.listing', function () {
                $("#one_off").attr('required', false);
                $("#one_off").attr('required', false);
                $("#monthly").attr('required', false);
                $("#quarterly").attr('required', false);
                $("#annual").attr('required', false);
                $("#volume_base").attr('required', false);
                $("#range_base_1").attr('required', false);
                $("#range_base_2").attr('required', false);
                $("#range_base_3").attr('required', false);
                $("#range_base_4").attr('required', false);
                if($(this).val() == '1')
                {
                    $("#one_off").attr('required', true);
                }
                else if ($(this).val() == '2') {
                    $("#monthly").attr('required', true);
                }
                else if ($(this).val() == '3') {
                    $("#quarterly").attr('required', true);
                }
                else if ($(this).val() == '4') {
                    $("#annual").attr('required', true);
                }
                else if ($(this).val() == '5') {
                    $("#volume_base").attr('required', true);
                }
                else if ($(this).val() == '6') {
                    $("#range_base_1").attr('required', true);
                    $("#range_base_2").attr('required', true);
                    $("#range_base_3").attr('required', true);
                    $("#range_base_4").attr('required', true);
                }
            });
        });
    </script>
    <script>
        //Todo:On click add new range
        $(document).on('click', '#add_range', function () {
            $('#range_default').clone().appendTo('.ranges');
        });
    </script>
@endsection

