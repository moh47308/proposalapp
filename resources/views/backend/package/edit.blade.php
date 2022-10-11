@extends('backend.master')
@section('page_title', 'Edit Membership')
@section('css_links')
@endsection


@section('content')
	<!-- Horizontal Form -->
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Starter</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="{{url('package/update').'/'.$package->id}}" method="post">
			@csrf
			@method('put')
			<div class="card-body">
				<div class="form-group row">
					<label for="proposal" class="col-sm-2 col-form-label">Package Name </label>
					<div class="col-sm-10">
						<input type="text" name="package_name" class="form-control" id="" placeholder="Package name" required value="{{$package->package_name}}">
						@error('package_name')
							<p class="alert alert-danger">
								{{$message}}
							</p>
						@enderror
					</div>
				</div>
				<div class="form-group row">
					<label for="proposal" class="col-sm-2 col-form-label">Proposal's per month </label>
					<div class="col-sm-10">
						<input type="number" required name="no_of_proposal" class="form-control" id="no_of_proposal" placeholder="No of proposals" value="{{$package->proposal_per_month}}">
						@error('no_of_proposal')
							<p class="alert alert-danger">
								{{$message}}
							</p>
						@enderror
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword3" class="col-sm-2 col-form-label">Client's per year</label>
					<div class="col-sm-10">
						<input type="number" required name="no_of_client" class="form-control" id="inputPassword3" placeholder="No of clients" value="{{$package->client_per_year}}">
						@error('no_of_client')
							<p class="alert alert-danger">
								{{$message}}
							</p>
						@enderror
					</div>
				</div>
				<div class="form-group row">
					<label for="proposal" class="col-sm-2 col-form-label">Price </label>
					<div class="col-sm-10">
						<input type="number" required name="price" class="form-control" id="" placeholder="Enter Price" value="{{$package->price}}">
						@error('price')
							<p class="alert alert-danger">
								{{$message}}
							</p>
						@enderror
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-info">Save</button>
				<a href="{{ url('admin/package/all') }}"  class="btn btn-default float-right">Cancel</a>
			</div>
			<!-- /.card-footer -->
		</form>
	</div>
	<!-- /.card -->
@endsection

@section('js_links')

@endsection
@section('js')
@endsection



