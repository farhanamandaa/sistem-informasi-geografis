@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@include('admin.sidebar')
		<div class="col">
			<table class="table table-bordered table responsive">
				<tr>
					<th>No</th>
					<th>Nama Lokasi</th>
					<th>Alamat</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Deskripsi</th>
					<th>Action</th>
				</tr>
				@foreach ($locationsData as $data)
					<tr>
						<td>1</td>
						<td>{{ $data->name }}</td>
						<td>{{ $data->address }}</td>
						<td>{{ $data->latitude }}</td>
						<td>{{ $data->longitude }}</td>
						<td>{{ $data->description }}</td>
						<td><a href="/updatelocation/{{ $data->id }}">Edit</a>|
							<form method="DELETE" action="/deletelocation/{{ $data->id }}">
								@csrf
								<button type="submit">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection