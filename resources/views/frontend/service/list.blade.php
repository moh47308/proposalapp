@extends('frontend.users.master')
@section('page_title', 'Services')
@section('css_links')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
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
@endif
<div class="bg-gray p-4">
  <div class="d-flex justify-content-between align-items-center page-title-box">
    <h4 class="page-title stock"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
        <path d="M20.7273 17.4545H3.27273C1.46836 17.4545 0 15.9862 0 14.1818V3.27273C0 1.46836 1.46836 0 3.27273 0H20.7273C22.5316 0 24 1.46836 24 3.27273V14.1818C24 15.9862 22.5316 17.4545 20.7273 17.4545ZM3.27273 2.18182C2.67164 2.18182 2.18182 2.67164 2.18182 3.27273V14.1818C2.18182 14.7829 2.67164 15.2727 3.27273 15.2727H20.7273C21.3284 15.2727 21.8182 14.7829 21.8182 14.1818V3.27273C21.8182 2.67164 21.3284 2.18182 20.7273 2.18182H3.27273ZM9.81818 12H5.45455C5.16522 12 4.88774 11.8851 4.68316 11.6805C4.47857 11.4759 4.36364 11.1984 4.36364 10.9091C4.36364 10.6198 4.47857 10.3423 4.68316 10.1377C4.88774 9.93312 5.16522 9.81818 5.45455 9.81818H9.81818C10.1075 9.81818 10.385 9.93312 10.5896 10.1377C10.7942 10.3423 10.9091 10.6198 10.9091 10.9091C10.9091 11.1984 10.7942 11.4759 10.5896 11.6805C10.385 11.8851 10.1075 12 9.81818 12ZM9.81818 7.63636H5.45455C5.16522 7.63636 4.88774 7.52143 4.68316 7.31684C4.47857 7.11226 4.36364 6.83478 4.36364 6.54545C4.36364 6.25613 4.47857 5.97865 4.68316 5.77407C4.88774 5.56948 5.16522 5.45455 5.45455 5.45455H9.81818C10.1075 5.45455 10.385 5.56948 10.5896 5.77407C10.7942 5.97865 10.9091 6.25613 10.9091 6.54545C10.9091 6.83478 10.7942 7.11226 10.5896 7.31684C10.385 7.52143 10.1075 7.63636 9.81818 7.63636Z" fill="#085588"/>
        <path d="M16.3635 9.27272C17.5684 9.27272 18.5453 8.29589 18.5453 7.09091C18.5453 5.88592 17.5684 4.90909 16.3635 4.90909C15.1585 4.90909 14.1816 5.88592 14.1816 7.09091C14.1816 8.29589 15.1585 9.27272 16.3635 9.27272Z" fill="#085588"/>
        <path d="M16.364 10.2066C14.66 10.2066 13.6367 10.9866 13.6367 11.7655C13.6367 12.1549 14.66 12.5455 16.364 12.5455C17.9633 12.5455 19.0913 12.156 19.0913 11.7655C19.0913 10.9866 18.0222 10.2066 16.364 10.2066Z" fill="#085588"/>
        </svg> Services List</h4>
  </div>
  <div>
    <a href="{{ url("service/create")  }}" class="submit-btn">Create a New Service</a>
  </div>
  <div class="row text-center mt-5 mb-5">
    <table id="service_list_table">
      <thead>
        <tr class="no-bg">
          <th  scope="col">NO</th>
          <th  scope="col">Service</th>
          <th  scope="col">Service Type</th>
          <th  scope="col">Price</th>
          <th  align="right" scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        	<?php if($services)
			{
				$i=1;
				foreach($services as $service)
				{
			?>
          <td data-label="NO"><?php echo $i; ?></td>
          <td data-label="Service">{{$service->service_title}}</td>
          <td data-label="Service Type">{{$service->service_type->title}}</td>
          <td data-label="Price"><?php if($service->service_type_id == '6'	)
								{
									$range_base = json_decode($service->value);
									foreach ($range_base as $range)
									{
										echo $range->price." ,";
									}
								}
								else
								{
									echo $service->value;
								}
							?></td>
          <td data-label="Actions" class="text-end action-bar">
{{--              <img src="images/mob-view-icon.png"/>--}}
              <!-- <a href="#" class="table-btn view px-3 py-1">VIEW/SEND</a> --> <a href="edit/{{$service->id}}" class="table-btn edit p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
            <path d="M10.5386 2.8413L12.1582 4.4602M11.5801 1.41511L7.20061 5.79462C6.97432 6.02059 6.81999 6.3085 6.75707 6.62204L6.35254 8.647L8.3775 8.24171C8.69103 8.179 8.97857 8.02529 9.20492 7.79894L13.5844 3.41942C13.716 3.28782 13.8204 3.13158 13.8917 2.95963C13.9629 2.78768 13.9995 2.60338 13.9995 2.41726C13.9995 2.23115 13.9629 2.04685 13.8917 1.8749C13.8204 1.70295 13.716 1.54671 13.5844 1.41511C13.4528 1.2835 13.2966 1.17911 13.1246 1.10788C12.9527 1.03666 12.7684 1 12.5823 1C12.3962 1 12.2119 1.03666 12.0399 1.10788C11.868 1.17911 11.7117 1.2835 11.5801 1.41511V1.41511Z" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12.4707 10.1764V12.4706C12.4707 12.8762 12.3096 13.2652 12.0227 13.552C11.7359 13.8389 11.3469 14 10.9413 14H2.52943C2.1238 14 1.73478 13.8389 1.44796 13.552C1.16114 13.2652 1 12.8762 1 12.4706V4.05872C1 3.65309 1.16114 3.26408 1.44796 2.97726C1.73478 2.69043 2.1238 2.5293 2.52943 2.5293H4.82357" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg></a> <a onclick="return confirm('Are you sure?')"
								href="{{$service->id}}" class="table-btn del p-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
            <path d="M13.4831 2.25174L11.4311 0.200474C11.3677 0.136814 11.2923 0.0863273 11.2093 0.0519216C11.1262 0.0175159 11.0372 -0.000129623 10.9474 7.16829e-07H2.73684C2.64698 -0.000129623 2.55797 0.0175159 2.47495 0.0519216C2.39193 0.0863273 2.31654 0.136814 2.25311 0.200474L0.20116 2.25174C0.137232 2.31515 0.0865324 2.39062 0.0520013 2.47378C0.0174701 2.55693 -0.00020481 2.64612 1.79047e-06 2.73616V11.6316C1.79047e-06 12.3863 0.613739 13 1.36842 13H12.3158C13.0705 13 13.6842 12.3863 13.6842 11.6316V2.73616C13.6844 2.64612 13.6667 2.55693 13.6322 2.47378C13.5977 2.39062 13.547 2.31515 13.4831 2.25174ZM3.02011 1.36842H10.6641L11.3476 2.05195H2.33658L3.02011 1.36842ZM1.36842 11.6316V3.42037H12.3158L12.3172 11.6316H1.36842Z" fill="#DB7570"/>
            <path d="M8.89556 6.84205H4.7903V5.47363H3.42188V8.21047H10.264V5.47363H8.89556V6.84205Z" fill="#DB7570"/>
            </svg></a></td>
        </tr>
        <?php
      		$i++;
      		}
      	}
      	?>
    </tbody>
    </table>
  </div>
  <p>Need to add more client? You can upgrade to <strong class="blue-clr">Solo Plan</strong> or Buy more Clients any time..</p>
  <div><a href="#" class="btn green btn-success btn-sm my-0 ps-3 pe-3 text-uppercase">UPGRADE TO SOLO PLAN</a></div>
  <div><a href="#" class="btn blue btn-success btn-sm my-3 ps-4 pe-4 text-uppercase">BUY MORE PROPOSALS</a></div>
</div>
<!--Container Main end-->
@endsection
@section('js_links')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection
@section('js')
<script>

    $(document).ready( function () {
        $('#service_list_table').DataTable();
    } );
  jQuery('.mob-view-icon img').click(function() {
     jQuery(this).toggleClass('active');
	  jQuery(this).parent().next("td.action-bar").toggleClass('show');
});


jQuery('.dashboard-nav .pe-2 img').click(function() {
     jQuery('span.last-day').toggleClass('show');

	 });

  </script>
@endsection
