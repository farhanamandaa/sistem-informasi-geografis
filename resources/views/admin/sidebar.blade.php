<div class="col-md-2">
	<ul class="list-group">
		<a href="admin"><button type="button" class="list-group-item list-group-item-action {{ Request::is('admin') ? 'active' : 'no' }} ">Home</button></a>
		<a href="{{route('lists')}}"><button type="button" class="list-group-item list-group-item-action {{ Request::is('lists') ? 'active' : 'no' }} ">Daftar Lokasi</button></a>
		<button type="button" class="list-group-item list-group-item-action">Daftar Kategori</button>
		<a href="posts"><button type="button" class="list-group-item list-group-item-action {{ Request::is('posts') ? 'active' : 'no' }}">Tambah Lokasi</button></a>
	</ul>
</div>