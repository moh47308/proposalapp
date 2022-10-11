<?php
	$today = date("j F, Y");
?>
<html>
<head>
	<title>Proposal Preview</title>
	<style>
		body{
			/*background:#8EB6D9;*/
			font-family: 'Raleway', sans-serif;
			margin-bottom: 20px;
		}
		.left{
			background:#FFFFFF;
		}
		.content{
			background:#F5F5F5;
		}
		ul li{
			list-style: none;
			padding-bottom: 15px;
		}
		a{
			text-decoration: none!important;
			color: rgba(155, 155, 155, 1);
			font-weight: 500;
			font-size: 18px;
			margin-bottom: 20px;
			display: block;
			text-align: center;
		}
		.main-div-content{
			padding: 25px 40px;
			margin: 40px;
			background-color: rgba(255, 255, 255, 1);
		}
		.proposal-company{
			font-weight: 700;
			font-size: 20px;
			color: rgba(87, 156, 93, 1);
			display: block;
			text-align: center;
			margin-top: 10px;
		}
		.edit-details{
			background-color: rgba(11, 72, 119, 1);
			border-radius: 10px;
			color: rgba(255, 255, 255, 1);
			font-size: 10px;
			font-weight: 700;
			border: none;
			width: 100px;
			display: block;
			line-height: 25px;
			margin-top: 20px;
		}
		.prepared{
			color: rgba(11, 72, 119, 1);
			font-weight: 700;
			font-size: 18px;
		}
		.bio-data{
			color: rgba(106, 106, 106, 1);
			font-size: 16px;
			font-weight: 700;
			margin-top: 10px;
			display: block;
		}
		.info{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
		}
		.ref-date{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
		}
		.introduction{
			margin-top: 5px;
		}
		.introduction h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
		.introduction p,.pro-name{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
			line-height: 24px;
		}
		.testimonial h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
		.testimonial p{
			color: rgba(30, 135, 200, 1);
			font-style: italic;
			font-weight: 600;
			font-size: 14px;
			line-height: 24px;
			margin-top: 15px;
		}
		.seen{
			color: rgba(106, 106, 106, 1)!important;
			font-weight: 700!important;
			font-size: 14px!important;
			line-height: 24px!important;
			font-style: normal!important;
		}
		.services h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
		.edit-services{
			float: right;
			background-color: rgba(11, 72, 119, 1);
			font-weight: 700;
			font-size: 10px;
			color: rgba(255, 255, 255, 1);
			line-height: 25px;
			border-radius: 10px;
			width: 100px;
		}
		table {
	border-collapse: collapse;
	margin: 0;
	padding: 0;
	width: 100%;
	table-layout: fixed;
	border-collapse: separate;
	border-spacing: 0 10px;
}
table tr {
	padding: .35em;
	margin-bottom: 10px;
	background: #fff;
}
table tr.no-bg {
	background: none!important
}
table tr:hover {
	background: #ccc;
}
table th, table td {
	padding: 10px 20px;
	font-weight: 400;
	font-size: 15px;
	line-height: 22px;
	color: #6A6A6A;
	text-align: left;
}
table th {
	font-size: .85em;
	letter-spacing: .1em;
	text-transform: uppercase;
	font-weight: 500;
	font-size: 16px;
	line-height: 24px;
	letter-spacing: 0.02em;
	color: #0B4877;
	background-color: transparent;
}
.services-offered th{ font-size:14px; text-transform:capitalize;}
.services-offered{border-collapse: collapse; }
.services-offered thead{border: 1px solid #E8E8E8;}
.services-offered thead tr{border-bottom:0;}
.services-offered tr{background:#F5F5F5;border-bottom: 10px solid #fff;}
		.goals h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
	.goals p{color: rgba(106, 106, 106, 1);
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    margin-top: 10px;}
		.goals span{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
			line-height: 24px;
			margin-top: 10px;
			display: block;
		}
		.next-steps h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
		.next-steps p{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
			line-height: 24px;
			margin-top: 10px;
		}
		.services-details h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
		.services-details h5{
			color: rgba(219, 117, 112, 1);
			font-weight: 700;
			font-size: 16px;
			line-height: 18px;
			margin-top: 10px;
			margin-bottom: 0;
		}
		.services-details p{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
			line-height: 24px;
		}
		.add-services h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;

		}
		.add-services span{
			color: rgba(106, 106, 106, 1);
			font-weight: 500;
			font-size: 14px;
			line-height: 30px;
			margin-top: 20px;
		}
		.add-services img{
			margin-right: 15px;
		}
		.lt-services, .rt-services{
			margin-top: 20px!important;
			display: block;
		}
		.fnl-wrd h4{
			    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    font-size: 16px;
		}
		.fnl-wrd p{
			color: rgba(30, 135, 200, 1);
			font-weight: 600;
			font-size: 14px;
			font-style: italic;
			line-height: 24px;
			margin-top: 8px;
		}
		.fnl-wrd span{
			color: rgba(106, 106, 106, 1);
			font-weight: 700;
			font-size: 14px;
			line-height: 24px;
		}
		ul.dashboard-menu{ padding: 0; margin: 0 15px;}
		ul.dashboard-menu li a{ padding: 13px 17px 15px; margin: 0; }
		ul.dashboard-menu li a img{ margin-right: 18px; }
		ul.dashboard-menu li a.active,ul.dashboard-menu li a:hover{background: linear-gradient(180deg, #579D5D 0%, #4B874C 100%);
			box-shadow: 0px 4px 10px rgba(75, 135, 76, 0.5);
			border-radius: 5px; color: #fff;}
		/*.border-box .col-4{ border-right: 1px solid #000;}
		.border-box .col-4:last-child{ border: none; }*/
		.submit-btn{
			background-color: rgba(87, 157, 93, 1);
			border: none;
			color: rgba(255, 255, 255, 1);
			font-weight: 500;
			font-size: 18px;
			line-height: 60px;
			border-radius: 5px;
			margin: 0 auto;
			display: block;
			margin-top: 20px;
			min-width: 270px;

		}
		input[type="submit"]:hover{
			background-color: #0B4877!important;
		}
		.left{
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
		}
		.content{
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		.edit-icon{
			line-height: 30px;
			width: 32px;
			border-radius: 50%;
			color: #fff;
			background-color: #304B74;
		}
		.delete-icon{
			line-height: 30px;
			width: 32px;
			border-radius: 50%;
			color: #fff;
			background-color: #DB7570;

		}
		.dashboard-menu a{
			text-align: left;
		}
		a:hover{
			color: rgba(255, 255, 255, 1);
		}
.testimonial-box {
    border: 1px solid rgba(30, 135, 200, 0.3);
    border-radius: 10px;
    text-align: center;
    padding: 23px 10% 9px;
    position: relative;
}
.testimonial-txt {
    color: #3977A0;
}
.testimonial-box:after {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    content: "";
    width: 30px;
    height: 30px;
    background: url({{ asset('public/assets/frontend/') }}/images/testimonial-icon.png) no-repeat;
}
.services-offered {
    border-collapse: collapse;
}
.monthly-amount-box {
    background: rgba(84, 187, 94, 0.1);
    border: 1px solid #54BB5E;
    color: #02A053;
    font-weight: 600;
    padding: 10px 20px;
    display: flex;
    margin-left: auto;
    margin-top: 25px;
    max-width: 375px;
}
.totle-amount-box {
    border: 1px solid #D9D9D9;
    color: #0B4877;
    font-weight: 600;
	padding: 10px 20px;
    display: flex;
    margin-left: auto;
    margin-top: 25px;
    max-width: 375px;
}
.totle-amount-box .totle-amount {
    color: #02A053;
}
.totle-amount{ display: flex;
    margin-left: auto;}
	</style>
</head>
<body>
<div class="main-div-content" style="padding: 40px 40px; margin: 40px; background-color: rgba(245, 245, 245, 1);">
<div style="background-color: #fff; padding: 40px;">
	<div style="display: flex; width: 100%;">
		<div style="width: 33%;">
			<img src="{{ asset('assets/forntend/images/company-logo.jpg') }}">
		</div>

		<div style="border-right: 0; width: 67%; margin-left: 56px;  margin-top: 2%; text-align:right;">
		<strong>Call:</strong>@if($data["company_detail"]){{$data["company_detail"]["phone"]}}@endif<br>
<strong>Email:</strong> david.zoboki@spartanaccounting.co.uk
		</div>
	</div>

	<hr style="margin-top: 20px;"/>

    <div style="display: flex; width: 100%; padding:1rem 0; line-height: 22px; font-size:12px;">
    <div style="width:90%;">
    <div>Prepared for:</div>
     <div><strong>@if($data["client_detail"]){{$data["client_detail"]["name"]}}@endif</strong></div>
     <div>@if($data["client_detail"]){{ $data["client_detail"]["first_name"] }} {{ $data["client_detail"]["last_name"] }}@endif</div>
     <div>@if($data["client_detail"]){{ $data["client_detail"]["address_line_1"]}}@endif</div>
    </div>
    <div style="width:10%;">
    <strong>Ref No:</strong> <span class="font-sm">@if($data["proposal_details"]){{ $data["proposal_details"]["ref_no"] }}@endif</span><br>
<strong>Date:</strong> <span class="font-sm">{{ $today }}</span>
    </div>
    </div>

	<div class="introduction">
		<h4 style="margin-bottom: 5px;">Introduction</h4>
		<p>With this proposal, you will see all the services we provide and what we do. The fees are custom made to your business size and align with your goals to help you to build a more profitable business. It will save you time, as you just need to review to make sure that you have all the ordered services and accept them. There are no hidden fees!</p>
	</div>

	<div class="testimonial">
		<h4 style="margin-bottom: 5px;">Testimonial</h4>
		<div class="testimonial-box" style="margin: 1.5rem 0;">
    <div class="testimonial-txt">"Filing limited company accounts and statement for a start up company. Delivered in good time and excellent communicaiton!"</div>
    <div class="pro-name">- Seen to hire Ltd</div>
    </div>
	</div>

	<div class="services" style="width: 100%;">
		<h4 style="margin-bottom: 20px;">Services Offered</h4>

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
          		@foreach($data["proposal_details"]["proposal_services"]  as $proposal_service)
	        	<tr>
		          	<td data-label="Service">{{ $proposal_service->service->service_title }}</td>
		          	<td data-label="Type">{{ $proposal_service->service->service_type->title }}</td>
		          	<td data-label="Price">{{ $proposal_service->price }}</td>
		          	<td data-label="Field">{{ $proposal_service->price }}</td>
		          	<td data-label="Total" class="text-end">£{{ $proposal_service->price }}
                	<?php   $total = $total + $proposal_service->price ?></td>
	        	</tr>
	        	@endforeach
      		</tbody>
    	</table>

        <div class="w-50 float-end d-flex justify-content-between align-items-center px-3 py-2 totle-amount-box"><span class="totle-txt">Total Amount</span> <span class="totle-amount"><?php echo "&#163;".$total; ?></span> </div>

        <div class="w-50 float-end d-flex justify-content-between align-items-center px-3 py-2 monthly-amount-box mt-3 mb-4"><span class="totle-txt">Your Monthly Investment will be:</span> <span class="totle-amount"><?php echo "&#163;".round($total/12) ; ?></span> </div>

	</div>

	<div class="goals">
		<h4 style="margin-bottom: 20px;">Goals/Targets</h4>
		<p>{{$data["proposal_details"]["goals"]}}</p>
	</div>

	<div class="next-steps">
		<h4 style="margin-bottom: 20px;">Next Steps</h4>
		<p>The next step will be fo you to review our proposal and make sure it's include the requested services. If you are happy with the contect click accept and shortly you will receive the service agreement to review and sign digitally.<br><br>

			This could be done in minutes and you are part of our team now!
		</p>
	</div>

	<div class="services-details">
		<h4 style="margin-bottom: 20px;">Services Details</h4>
		<?php  $i = 1 ?>
	      @foreach($data["proposal_details"]->proposal_services  as $proposal_service)
	        <h5>{{ $i }}- {{  $proposal_service->service->service_title }}</h5>
	        <p>{{ $proposal_service->service->service_type->title }}.</p>
	      <?php $i++; ?>
	      @endforeach
	</div>

	<div class="add-services" style="width: 100%;">
		<h4 style="margin-bottom: 20px;">Additional Services to consider</h4>
		<div style="display: flex;">
			<div class="lt-services" style="width: 50%;">
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">P&L ANALYSES</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">COMPANY HEALTH CHECK</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">TAX CREDIT CHECK</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">CASH FLOW MANAGEMENT </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">PERFORMANCE MEASUREMENT AND IMPROVEMENT</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">BREAK-EVEN POINT ANALYSIS</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">BENCHMARKING </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">PRICING STRATEGIES CONSULTATION ( REF)</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">EMAIL SUPPORT </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">PHONE SUPPORT</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">BUSINESS PLAN WRITING</span><br>
			</div>

			<div class="rt-services" style="width: 50%;">
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">TAX CONSULTATION</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">STARTUP LOAN APPLICATION</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">BUSINESS FINANCING ADVICE - (REF)</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">ICO REGISTRATION </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">CAPITAL GAIN TAX</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">INHERITANCE TAX </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">ESTATE PLANNING </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">TIDE BANK ACCOUNT OPENING </span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">HR PLANNING  (REF)</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">CRYPTO INCOME DECLARATION</span><br>
				<span><img src="{{ asset('public/assets/frontend/') }}/images/green-check.png">R&D TAX CREDIT CHECK</span><br>
			</div>
		</div>

	</div>

	<div class="fnl-wrd">
		<h4 style="margin:20px 0;">Final Words</h4>
		<p>David provided a very comprehensive service and great support for setting up the PAYE system for my company. Very efficient, reliable and knowledgable about HMRC (UK tax) and accounting processes. I would recommend the service to any new startups. Well worth the investment.</p>
		<span>Japan Transnational Business and Consulting Services co. Ltd</span>
		<p>Success usually comes to those who are too busy to be looking for it.</p>
		<span>Henry David Thoreau</span>
	</div>

	<a style="color: rgba(255, 255, 255, 1); background-color: rgba(87, 157, 93, 1); border: none; font-weight: 500; font-size: 18px; line-height: 60px; border-radius: 5px; margin: 0 auto; display: block;
	margin-top: 20px; min-width: 270px;" href="<?php echo url('proposal/response').'/'.session()->get('proposal_id').'/1'; ?>" class="submit-btn"  name="accept"> Accept </a>
	<a style="color: rgba(255, 255, 255, 1); background-color: rgba(87, 157, 93, 1); border: none; font-weight: 500; font-size: 18px; line-height: 60px; border-radius: 5px; margin: 0 auto; display: block;
	margin-top: 20px; min-width: 270px;" href="<?php echo url('proposal/response').'/'.session()->get('proposal_id').'/2'; ?>" class="submit-btn"  name="reject" > Modify </a>
</div>
</div>
</body>
</html>

