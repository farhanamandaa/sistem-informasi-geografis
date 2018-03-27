@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Lokasi</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Nama Lokasi : </label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="title">Alamat : </label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="lat">Latitude : </label>
                                <input type="text" class="form-control" id="lat" name="lat">
                            </div>
                            <div class="col">
                                <label for="lat">Longitude : </label>
                                <input type="text" class="form-control" id="lng" name="lng">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div id="maps" style="width: 600px; height: 600px; padding-top: 10px; padding-bottom: 10px;">
                                {!! Mapper::render() !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Gambar : </label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="form-group">
                            <label for="title">Deskripsi : </label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">

    function setLatLng(event    ){
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        $('input[name="lat"]').val(lat);
        $('input[name="lng"]').val(lng);
    }
</script>
