@extends('frontend.users.master')
@section('page_title', 'Select Company')


@section('css')
	.add-service {
	margin-top: 10px;
	background-color: rgba(219, 117, 112, 1);
	color: rgba(255, 255, 255, 1);
	font-weight: 700;
	font-size: 14px;
	line-height: 30px;
	width: 140px;
	border-radius: 20px;
	border: none;
	display: block;
	}
	.add-service:hover{
	color: rgba(255, 255, 255, 1);
	}

	.goals {
	color: rgba(11, 72, 119, 1);
	font-weight: 700;
	font-size: 18px;
	}

	.message {
	color: rgba(153, 153, 153, 1);
	font-weight: 700;
	font-size: 16px;
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

	input[type="submit"]:hover {
	background-color: #0B4877 !important;
	}

	label {
	color: rgba(153, 153, 153, 1);
	font-size: 16px;
	font-weight: 700;
	}

	input {
	border: 1px solid rgba(232, 232, 232, 1) !important;
	background-color: rgba(245, 245, 245, 1) !important;
	}

	select {
	border: 1px solid rgba(232, 232, 232, 1) !important;
	background-color: rgba(245, 245, 245, 1) !important;
	}

	td {
	color: rgba(155, 155, 155, 1);
	font-weight: 700;
	font-size: 12px;
	padding-left: 10px;
	padding-bottom: 5px;
	padding-top: 5px;
	}

	ul.dashboard-menu {
	padding: 0;
	margin: 0 15px;
	}

	ul.dashboard-menu li a {
	padding: 13px 17px 15px;
	margin: 0;
	}

	ul.dashboard-menu li a img {
	margin-right: 18px;
	}

	ul.dashboard-menu li a.active, ul.dashboard-menu li a:hover {
	background: linear-gradient(180deg, #579D5D 0%, #4B874C 100%);
	box-shadow: 0px 4px 10px rgba(75, 135, 76, 0.5);
	border-radius: 5px;
	color: #fff;
	}

	.edit-delete {
	margin: 0 auto;
	}
	.left{
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
	}
	.prop-form{
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	}
	.edit-icon{
	line-height: 30px;
	width: 32px;
	border-radius: 50%;
	color: #fff;
	background-color: #304B74;
	text-align: center;
	}
	.delete-icon{
	line-height: 30px;
	width: 32px;
	border-radius: 50%;
	color: #fff;
	background-color: #DB7570;
	text-align: center;

	}
@endsection

@section('content')

	<span class="text">Select Client</span><br>

	<div style="border: 1px solid #E8E8E8; display: block; margin-bottom: 20px;"></div>
	<div style="display: block; margin-top: 10px;">
		<form action="{{ url("proposal/selectcompany") }}" method="post">
			@csrf
			<div id="editForm"
				 >
				<select class="form-control" name="client_id" id="client_id" style="margin-bottom: 20px;">
					<option value="" disabled selected>Select Client</option>
					@foreach($clients as $client)
						<option value="{{ $client["id"] }}">{{ $client["name"] }}</option>
					@endforeach
				</select>

			</div>
		</form>

		<div class="row">
			<div class="offset-11">
				<button type="submit"  class="btn" style="background-color:  rgba(87, 157, 93, 1) !important;color: #fff0f0">Next</button>
			</div>
		</div>

	</div>

@endsection


@section('js_links')
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection
@section('js')
	<script type="text/javascript">
		// register jQuery extension
		jQuery.extend(jQuery.expr[':'],
				{
					focusable: function (el, index, selector) {
						return $(el).is('a, button, :input, [tabindex]');
					}
				});

		$(document).on('keypress', 'input,select', function (e) {
			if (e.which == 13) {
				e.preventDefault();
				// Get all focusable elements on the page
				var $canfocus = $(':focusable');
				var index = $canfocus.index(document.activeElement) + 1;
				if (index >= $canfocus.length) index = 0;
				$canfocus.eq(index).focus();
			}
		});
	</script>
	<script>
		$(document).ready(function () {
			// $("#editForm").hide();
			$("#send-button").click(function (e) {
				$("#editForm").show();
				$("#send-button").hide();

			});
		});

	</script>
	<script>
		$(function () {
			// $('#row_dim').hide();
			//$('#category2').change(function () {
			$('#category2').on('change', function (e) {
				$('#row_dim').hide();
				if (($(e.target).find('option:selected').val()) == 'turnover') {
					$('#row_dim').show();
				}
			});
		});
	</script>

	<script>
		$(function () {
			// $('#col_dim').hide();
			//$('#category2').change(function () {
			$('#category2').on('change', function (e) {
				$('#col_dim').hide();
				if (($(e.target).find('option:selected').val()) == 'volume base') {
					$('#col_dim').show();
				}
			});
		});
	</script>

	<script>
		$(function () {
			$('#client_id').on('change', function (e) {
				$(this).closest('form')
						.trigger('submit')
			})
		})
	</script>
@endsection
