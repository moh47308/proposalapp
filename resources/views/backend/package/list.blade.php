@extends('backend.master')
@section('page_title', 'Memberships')
@section('css_links')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('public/assets/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('public/assets/backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('public/assets/backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection


@section('content')
	<div class="card">
{{--		<div class="card-header">--}}
{{--			<h3 class="card-title">Managers</h3>--}}
{{--		</div>--}}

		<div>
			<a href="{{url('package/create')}}">Create a Package</a>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="managers_table" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>NO</th>
					<th>Name</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Delete</th>

				</tr>
				</thead>
				<tbody>
				<?php 
					$i = 1;
				?>
				@foreach($packages as $package)
				<tr>
					<td><?php echo $i ?></td>
					<td>{{ $package->package_name }}</td>
					<td>{{ $package->price }}</td>
					<td><a href="{{ url('package/edit'.'/'.$package->id) }}" class="btn btn-primary">Edit</a></td>
					<td><a href="{{ url('package/delete'.'/'.$package->id) }}" class="btn btn-danger">Delete</a></td>
				</tr>
				<?php 
					$i++;
				?>
				@endforeach
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
@endsection

@section('js_links')
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/jszip/jszip.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="{{ asset('public/assets/backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
@endsection
@section('js')
	<script type="text/javascript">
		$(function () {
			$("#managers_table").DataTable({
				"responsive": false, "lengthChange": false, "autoWidth": true,"paging": false,"info": false,"ordering": false,"searching": false,
				// "buttons": ["csv", "pdf", "print"]
			}).buttons().container().appendTo('#managers_table_wrapper .col-md-6:eq(0)');
		});
	</script>
@endsection



