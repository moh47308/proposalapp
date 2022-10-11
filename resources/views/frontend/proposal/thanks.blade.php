<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Suggestion</title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.left {
		background: #FFFFFF;
		border-top-left-radius: 10px;
      	border-bottom-left-radius: 10px;
	}
	.prop-form{
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      background: #F5F5F5;
      padding-bottom: 100px;
    }
    	ul li {
			list-style: none;
			padding-bottom: 15px;
		}
			textarea {
			background-color: rgba(245, 245, 245, 1);
			border: 1px solid rgba(232, 232, 232, 1);
			margin-bottom: 20px;
			width: 100%;
		}
			.submit-btn {
			width: 270px;
			background-color: rgba(87, 157, 93, 1) !important;
			border: none;
			line-height: 60px;
			color: rgba(255, 255, 255, 1);
			font-weight: 500;
			font-size: 18px;
			border-radius: 5px;
			display: block;
			margin: 0 auto;
		}
			.message {
			color: rgba(153, 153, 153, 1);
			font-weight: 700;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="container-fluid h-100">
  		<div class="container-fluid h-100">
  			<div class="row no-gutters h-100">
				<div class="col-3 left">
					<img style="padding: 50px;" src="{{ url("public/assets/forntend") }}/images/EziProposal.png">
				</div>
	  			<div class="col-9 prop-form">
	  				<ul style="background-color: #FFFFFF; padding-top: 30px; border-top-right-radius: 10px;">
						<li style="font-weight: 800; color: #304B74; font-size: 22px;">
							<img  src="{{ url("public/assets/forntend/") }}/images/dashboard-color-icon.svg">
							Proposal
						</li>
						<li style="font-weight: 700; color: #304B74; font-size: 22px;">Ref No: @if($proposal_details){{$proposal_details["ref_no"] }}@endif
						</li>
						<li style="font-weight: 700; color: #304B74; font-size: 22px;">Email: @if($client_details){{ $client_details["email"] }}@endif
						</li>
						<?php $today = date("j F, Y"); ?>
						<li style="font-weight: 700; color: #4B874C;"><img src="{{ url("public/assets/forntend/") }}/images/date-icon.svg" style="padding-right: 5px;"><?php echo $today; ?>
						</li>
					</ul>
	  				<h1>
	  					Thanks for your Response!
	  				</h1>
	  			</div>
			</div>
		</div>
	</div>
</body>
</html>