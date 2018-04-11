<div class="col-md-2">
	<ul class="list-group">
		<a href="{{route('home')}}"><button type="button" class="list-group-item list-group-item-action {{ Request::is('admin') ? 'active' : 'no' }} ">Home</button></a>

		<a href="{{route('lists')}}"><button type="button" class="list-group-item list-group-item-action {{ Request::is('lists') ? 'active' : 'no' }} ">Daftar Lokasi</button></a>

		<a href="{{route('categories')}}"><button type="button" class="list-group-item list-group-item-action">Daftar Kategori</button></a>

		<a href="{{route('posts')}}"><button type="button" class="list-group-item list-group-item-action {{ Request::is('posts') ? 'active' : 'no' }}">Tambah Lokasi</button></a>
	</ul>
</div>