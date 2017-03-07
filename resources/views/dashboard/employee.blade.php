@extends('dashboard.layout')

@section('content')
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<div class="btn-group" role="group">
			<a href="{{ asset('/') }}" type="button" class="btn btn-primary"><strong>HOME</strong></a>
		</div>
		<div class="btn-group" role="group">
			<a href="{{ asset('/view/service') }}" type="button" class="btn btn-success"><strong>ADD NEW</strong></a>
		</div>
	</div>
	<hr>
	<div class="table-responsive">
		<table class="table  table-hover">
			<thead>
				<tr>
					<th>Employee #</th>
					<th>Employee Name</th>
					<th>Phone Number</th>
					<th>Position</th>
					<th>Status</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse($emps as $emp)
					<tr>
						<td>{{ $emp->empID }}</td>
						<td>{{ $emp->fname }} {{ $emp->mname }} {{ $emp->lname }}</td>
						<td>{{ $emp->phone }}</td>
						<td>{{ $emp->posName }}</td>
						<td>
							@if($emp->avail == 1)
								<span class="label label-primary">available</span>
							@else
								<span class="label label-danger">unavailable</span>
							@endif
						</td>
						<td class="text-center">
							@if($emp->avail == 1)
								<a href="{{ asset('/employee/unavail/'. $emp->empID) }}" type="button" class="btn btn-danger"><strong>Unavailable</strong></a>
							@else
								<a href="{{ asset('/employee/avail/'. $emp->empID) }}" type="button" class="btn btn-primary"><strong>Available</strong></a>
							@endif	
						</td>
					</tr>
				@empty
					<tr>
						<td>NO DATA</td>
						<td>NO DATA</td>
						<td>NO DATA</td>
						<td>NO DATA</td>
						<td>NO DATA</td>
						<td>NO DATA</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
@endsection