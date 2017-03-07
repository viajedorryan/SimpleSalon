@extends('dashboard.layout')

@section('content')
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<div class="btn-group" role="group">
			<a href="{{ asset('/view/service') }}" type="button" class="btn btn-success"><strong>ADD NEW</strong></a>
		</div>
		<div class="btn-group" role="group">
			<a href="{{ asset('/view/employee') }}" type="button" class="btn btn-danger"><strong>EMPLOYEE STATUS</strong></a>
		</div>
	</div>
	<hr>
	<div class="table-responsive">
		<table class="table  table-hover">
			<thead>
				<tr>
					<th>Service #</th>
					<th>Service Type</th>
					<th>Handled By</th>
					<th>Service Fee</th>
					<th>Service Date</th>
				</tr>
			</thead>
			<tbody>
				@forelse($servs as $serv)
				<tr>
					<td>{{ $serv->Service_ID }}</td>
					<td>{{ $serv->Availed_ID }}</td>
					<td>{{ $serv->Employee_ID }}</td>
					<td>&#x20b1; {{ $serv->Total_Service_Fee }}</td>
					<td>{{ $serv->Service_Date }}</td>
				</tr>
				@empty
				<tr>
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