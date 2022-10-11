@extends('backend.master')
@section('page_title', 'Dashboard')
@section('css_links')
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection


@section('content')
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3>150</h3>

					<p>Subscriptions</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3>53</h3>
					<p>Proposals</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h3>44</h3>

					<p>User Registrations</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>65</h3>

					<p>Unique Visitors</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-6 col-6">
			<!-- Bar chart -->
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">
						<i class="far fa-chart-bar"></i>
						Bar Chart
					</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div id="bar-chart" style="height: 300px;"></div>
				</div>
				<!-- /.card-body-->
			</div>
			<!-- /.card -->
		</div>
	</div>

@endsection


@section('js_links')
	<!-- FLOT CHARTS -->
	<script src="{{ asset('public/assets/backend') }}/plugins/flot/jquery.flot.js"></script>
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="{{ asset('public/assets/backend') }}/plugins/flot/plugins/jquery.flot.resize.js"></script>
@endsection

@section('js')
	<script type="text/javascript">
		/*
		 * BAR CHART
		 * ---------
		 */

		var bar_data = {
			data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
			bars: { show: true }
		}
		$.plot('#bar-chart', [bar_data], {
			grid  : {
				borderWidth: 1,
				borderColor: '#f3f3f3',
				tickColor  : '#f3f3f3'
			},
			series: {
				bars: {
					show: true, barWidth: 0.5, align: 'center',
				},
			},
			colors: ['#3c8dbc'],
			xaxis : {
				ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
			}
		})
		/* END BAR CHART */
	</script>
@endsection
