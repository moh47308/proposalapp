@extends('frontend.users.master')
@section('page_title', 'Proposals')
@section('content')
<!--Container Main start-->
<div class="bg-gray p-4">
  <div class=" text-center page-title-box">
    <h4 class="page-title stock"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
        <path d="M20.7273 17.4545H3.27273C1.46836 17.4545 0 15.9862 0 14.1818V3.27273C0 1.46836 1.46836 0 3.27273 0H20.7273C22.5316 0 24 1.46836 24 3.27273V14.1818C24 15.9862 22.5316 17.4545 20.7273 17.4545ZM3.27273 2.18182C2.67164 2.18182 2.18182 2.67164 2.18182 3.27273V14.1818C2.18182 14.7829 2.67164 15.2727 3.27273 15.2727H20.7273C21.3284 15.2727 21.8182 14.7829 21.8182 14.1818V3.27273C21.8182 2.67164 21.3284 2.18182 20.7273 2.18182H3.27273ZM9.81818 12H5.45455C5.16522 12 4.88774 11.8851 4.68316 11.6805C4.47857 11.4759 4.36364 11.1984 4.36364 10.9091C4.36364 10.6198 4.47857 10.3423 4.68316 10.1377C4.88774 9.93312 5.16522 9.81818 5.45455 9.81818H9.81818C10.1075 9.81818 10.385 9.93312 10.5896 10.1377C10.7942 10.3423 10.9091 10.6198 10.9091 10.9091C10.9091 11.1984 10.7942 11.4759 10.5896 11.6805C10.385 11.8851 10.1075 12 9.81818 12ZM9.81818 7.63636H5.45455C5.16522 7.63636 4.88774 7.52143 4.68316 7.31684C4.47857 7.11226 4.36364 6.83478 4.36364 6.54545C4.36364 6.25613 4.47857 5.97865 4.68316 5.77407C4.88774 5.56948 5.16522 5.45455 5.45455 5.45455H9.81818C10.1075 5.45455 10.385 5.56948 10.5896 5.77407C10.7942 5.97865 10.9091 6.25613 10.9091 6.54545C10.9091 6.83478 10.7942 7.11226 10.5896 7.31684C10.385 7.52143 10.1075 7.63636 9.81818 7.63636Z" fill="#085588"/>
        <path d="M16.3635 9.27272C17.5684 9.27272 18.5453 8.29589 18.5453 7.09091C18.5453 5.88592 17.5684 4.90909 16.3635 4.90909C15.1585 4.90909 14.1816 5.88592 14.1816 7.09091C14.1816 8.29589 15.1585 9.27272 16.3635 9.27272Z" fill="#085588"/>
        <path d="M16.364 10.2066C14.66 10.2066 13.6367 10.9866 13.6367 11.7655C13.6367 12.1549 14.66 12.5455 16.364 12.5455C17.9633 12.5455 19.0913 12.156 19.0913 11.7655C19.0913 10.9866 18.0222 10.2066 16.364 10.2066Z" fill="#085588"/>
        </svg> Edit Profile</h4>
  </div>
  
    
<form action="{{url('user/edit')}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
    
    <div class="row mt-5 mb-5 w-75 m-auto">
    <div class="d-flex justify-content-between mb-1 align-items-center mb-3 blue-clr"><h4>User Details:</h4></div>
    <div class="col-md-6">
    <strong>First Name</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="first_name" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="@if($user_data){{$user_data->first_name}}@endif">
				@error('first_name')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
      
     <div class="col-md-6">
     <strong>Last Name</strong>
	  <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="last_name" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="@if($user_data){{$user_data->last_name}}@endif">
				@error('last_name')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
     <div class="col-md-6">
    <strong>Email</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="email" 
						name="email" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="@if($user_data){{$user_data->email}}@endif">
				@error('email')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
      
     <div class="col-md-6">&nbsp;</div>
    
     <div class="col-md-6">
    <strong>Current Password</strong>
      <input type="password" name="old_password" class="form-control" placeholder="" id="">
    </div>
      
     <div class="col-md-6">
     <strong>New Password</strong>
	  <input type="password" name="new_password" class="form-control" placeholder="" id="">
    </div>
    
    
    <div class="d-flex justify-content-between mb-1 align-items-center mb-3 blue-clr"><h4>Company Details:</h4></div>
    
    <div class="col-md-6">
   <strong>Company Name</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="company_name" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="{{$user_data->company['name']}}">
				@error('company_name')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    <div class="col-md-6">
    <strong>Website</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="website" 
						class="form-control" 
						placeholder="" 
						id=""
						value="@if(!$user_data->company['website']){{old('website')}}@else{{$user_data->company['website']}}@endif">
				@error('website')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
    <div class="col-md-6">
    <strong>Address 1</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="address_line_1"
						class="form-control" 
					 	placeholder="" 
						id="" 
						value="@if(!$user_data->company['address_line_1']){{old('address_line_1')}}@else{{$user_data->company['address_line_1']}}@endif" >
				@error('address_line_1')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    <div class="col-md-6">
    <strong>Address 2</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="address_line_2"
						class="form-control" 
					 	placeholder="" 
						id="" 
						value="@if(!$user_data->company['address_line_2']){{old('address_line_2')}}@else{{$user_data->company['address_line_2']}}@endif" >
				@error('address_line_2')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
    <div class="col-md-6">
    <strong>Address 3</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text"
						name="address_line_3" 
					 	class="form-control" 
						placeholder="" 
						id="" 
						value="@if(!$user_data->company['address_line_3']){{old('address_line_3')}}@else{{$user_data->company['address_line_3']}}@endif">
				@error('address_line_3')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
    <div class="col-md-6">
    <strong>Phone</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="phone" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="@if(!$user_data->company['phone']){{old('phone')}}@else{{$user_data->company['phone']}}@endif">
				@error('phone')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
    <div class="col-md-6">
    <strong>City</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="city" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="@if(!$user_data->company['city']){{old('city')}}@else{{$user_data->company['city']}}@endif">
				@error('city')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
    <div class="col-md-6">
    <strong>Country</strong>
      <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text"
					name="country" 
					class="form-control" 
					placeholder="" 
					id="" 
					value="@if(!$user_data->company['country']){{old('country')}}@else{{$user_data->company['country']}}@endif">
				@error('country')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    <div class="col-md-6">
    <strong>Zip Code</strong>
   	  <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="text" 
						name="zipcode" 
						class="form-control" 
						placeholder="" 
						id="" 
						value="@if(!$user_data->company['zipcode']){{old('zipcode')}}@else{{$user_data->company['zipcode']}}@endif">
				@error('zipcode')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
    <div class="col-md-6">
    <strong>Logo</strong>
   	  <input class="w-100 p-1 search-field no-bg mb-4 p-2 bg-light rounded-0" type="file" 
                    id="" 
                    name="logo" 
                    class="form-control">
                @error('logo')
					<p class="alert alert-danger">
						{{$message}}
					</p>
				@enderror
    </div>
    
      <div class="w-25 m-auto">
      <button class="btn green btn-success btn-lg my-3 ps-5 pe-5 pt-3 pb-3 text-uppercase fs-4" type="submit">Submit</button>
      </div>
    </div>
    </form>
  
</div>
<!--Container Main end--> 
@endsection
@section('js')
<script>
  jQuery('.dashboard-nav .pe-2 img').click(function() {
     jQuery('span.last-day').toggleClass('show');
	 
	 });
	 
	 
jQuery('.bill-client').click(function() {
     //jQuery('.billing-box').toggle();
	 jQuery(this).next(".billing-box").toggle();
	 });
	 
	 jQuery(document).ready(function(){
		 
    jQuery('#btnradio5').click(function(){
        var inputValue = jQuery(this).attr("value");
        var targetBox = jQuery("." + inputValue);
        jQuery(".date-filed").not(targetBox).hide();
        jQuery(targetBox).show();
    });
});

jQuery("input:radio").change(function () {
if (jQuery("#btnradio5").is(":checked")) {
             jQuery(".date-filed").show();
    }
    else {
        jQuery(".date-filed").hide();
    }
});
	
	
	 
	 jQuery("input:radio").change(function () {
if (jQuery("#btnradio6").is(":checked")) {
             jQuery(".deposit-box").show();
    }
    else {
        jQuery(".deposit-box").hide();
    }
});
	 
  </script>
@endsection