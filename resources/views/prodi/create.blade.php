@extends('layout.main')
@section('title','Tambah Prodi')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Prodi</h4>
                <p class="card-description">
                    Formulir tambah prodi
                </p>
                <form class="form-sample" method="POST"action="{{route('prodi.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama prodi</label>
                        <input type="text"class="form-control" name="nama" placeholder ="Nama prodi">
                        @error('nama')
                        <label class="text-danger">{{$message}}</label>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Nama Fakultas</label>
                            <select name="fakultas_id"
                            class="form-control">
                            <option value="">pilih</option>
                        </select>
                        @error('fakultas_id')
                        <label class=" text-danger">{{$message}}
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light">cancel</button>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
</div>
@endsection