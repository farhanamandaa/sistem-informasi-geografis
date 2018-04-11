@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Lokasi</div>

                <div class="card-body">
                    <form method="POST" action="/posts">
                        @csrf
                        <div class="form-group">
                            <label for="title">Nama Lokasi : </label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Alamat : </label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Kategori : </label>
                            <select id="category_id" name="category_id">
                                @foreach ($categoryList as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="lat">Latitude : </label>
                                <input type="text" class="form-control" id="latitude" name="latitude" required>
                            </div>
                            <div class="col">
                                <label for="lat">Longitude : </label>
                                <input type="text" class="form-control" id="longitude" name="longitude" required>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div id="maps" style="width: 600px; height: 600px; padding-top: 10px; padding-bottom: 10px;">
                                {!! Mapper::render() !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">URL Gambar : </label>
                            <input type="text" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="title">Deskripsi : </label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    function setLatLngToForm(event)
    {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        $('input[name="latitude"]').val(lat);
        $('input[name="longitude"]').val(lng);
    }
</script>
