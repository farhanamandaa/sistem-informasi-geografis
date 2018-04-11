@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@include('admin.sidebar')
		<div class="col">
			<div class="justify-content-end">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Tambah Kategori</button>
			</div>
			
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="/addcategory" method="POST">
							<div class="modal-body">
								@csrf
								<div class="form-group">
                            		<label for="title">Nama Kategori : </label>
                            		<input type="text" class="form-control" id="name" name="name" required>
                        		</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<table class="table table-bordered table responsive">
				<tr>
					<th>No</th>
					<th>Nama Kategori</th>
					<th>Action</th>
				</tr>
				@foreach ($categoriesData as $data)
					<tr>
						<td>1</td>
						<td>{{ $data->name }}</td>
						<td><a href="/update/{{ $data->id }}">Edit</a>|<a href="/delete/{{ $data->id }}">Delete</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection