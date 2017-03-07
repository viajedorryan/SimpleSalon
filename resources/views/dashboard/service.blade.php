@extends('dashboard.layout')

@section('content')
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<div class="btn-group" role="group">
			<a href="{{ asset('/') }}" type="button" class="btn btn-primary"><strong>HOME</strong></a>
		</div>
		{{-- <div class="btn-group" role="group">
			<a href="{{ asset('/add/service') }}" type="button" class="btn btn-success"><strong>ADD NEW</strong></a>
		</div> --}}
		<div class="btn-group" role="group">
			<a href="{{ asset('/view/employee') }}" type="button" class="btn btn-danger"><strong>EMPLOYEE STATUS</strong></a>
		</div>
	</div>
	<hr>
	<form action="{{ asset('/add/services') }}" method="POST">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon3"><strong>Customer Name</strong></span>
			  <input type="text" class="form-control" name ="custname" id="custname" required aria-describedby="basic-addon3">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon3"><strong>Date and Time</strong></span>
			  <input type="text" class="form-control" name="date" id="date" aria-describedby="basic-addon3" value="{{ Carbon\Carbon::now()->toDayDateTimeString() }}">
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<h3 class="text-center"><strong>Service/s Availed</strong></h3>
			<hr>
			<div class="table-responsive">
				<table class="table  table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Service Type</th>
							<th>Price</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse($avails as $avail)
							<tr>
								<td>{{ $avail->Availed_ID }}</td>
								<td>{{ $avail->Service_Type }}</td>
								<td>&#x20b1; {{ $avail->Service_Fee }}</td>
								<td><input class="my-activity" type="checkbox" name="serv[]" id="{{ $avail->Service_Fee }}" value="{{ $avail->Service_Type }}" aria-label="..."></td>
							</tr>
						@empty
							<tr> 	
								<td>NO DATA</td>
								<td>NO DATA</td>
								<td>NO DATA</td>
								<td>NO DATA</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<h3 class="text-center"><strong>Handled By</strong></h3>
			<hr>
			<div class="table-responsive">
				<table class="table  table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Employee Name</th>
							<th>Position</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse($emps as $emp)
							<tr>
								<td>{{ $emp->empID }}</td>
								<td>{{ $emp->fname }} {{ $emp->mname }} {{ $emp->lname }}</td>
								<td>{{ $emp->posName }}</td>
								<td><input type="checkbox" name="emp[]" id="{{ $emp->empID }}" value="{{ $emp->fname }} {{ $emp->mname }} {{ $emp->lname }}" aria-label="..."></td>
							</tr>
						@empty
							<tr>
								<td>NO DATA</td>
								<td>NO DATA</td>
								<td>NO DATA</td>
								<td>NO DATA</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon3"><strong>TOTAL AMOUNT</strong></span>
			  <input type="text" class="form-control" name="amount" required readonly id="amount" aria-describedby="basic-addon3">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon3"><strong>Payment Method</strong></span>
					<select class="form-control" name="payment" id="payment" required>
						<option selected disabled>Please Select...</option>
						<option value="Cash">Cash</option>
						<option value="Credit Card">Credit Card</option>
					</select>
			</div>
		</div>
		<div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-5">
			{{-- <a href="{{ asset('/view/employee') }}" type="button" class="btn btn-primary"><strong>SAVE</strong></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="{{ asset('/') }}" type="button" class="btn btn-danger"><strong>CANCEL</strong></a> --}}

			<div class="btn-group btn-group-justified" role="group" aria-label="...">
				<div class="btn-group" role="group">
					<button type="submit" name="action" class="btn btn-info" ><strong>SAVE</strong></button>
				</div>
				<div class="btn-group" role="group">
					<a href="{{ asset('/') }}" type="button" class="btn btn-warning"><strong>CANCEL</strong></a>
				</div>
			</div>
		</div>
        </form>
	</div>
@endsection