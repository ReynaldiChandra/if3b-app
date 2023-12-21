@extends('Layout.main')
@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nama Mahasiswa</h4>
                    <p class="card-description">
                        Formulir tambah Mahasiswa
                    </p>

                    <form class="forms-sample" method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        {{-- NPM --}}
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control" name="npm" placeholder="Nomor NPM" value="{{ $mahasiswa->npm }} disabled">
                            @error('npm')
                                <label class="text-danger"> {{ $message }}</label>
                            @enderror
                        </div>

                        {{-- Nama --}}
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="{{ $mahasiswa->nama }}">
                            @error('nama')
                                <label class="text-danger"> {{ $message }}</label>
                            @enderror
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir Mahasiswa</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $mahasiswa->tempat_lahir }}">
                            @error('tempat_lahir')
                                <label class="text-danger"> {{ $message }}</label>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir Mahasiswa</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $mahasiswa->tanggal_lahir }}">
                            @error('tanggal_lahir')
                                <label class="text-danger"> {{ $message }}</label>
                            @enderror
                        </div>

                        {{-- Foto --}}
                            <div class="form-group">
                                <label for="foto">Foto Mahasiswa</label>
                                <input type="file" class="form-control" name="foto" placeholder="Foto Mahasiswa" value="{{ $mahasiswa->foto }}">
                                @error('nama')
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                            </div>

                        {{-- Prodi --}}
                        <div class="form-group">
                            <label for="prodi_id">Nama Program Studi</label>
                            <select name="prodi_id" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($prodi as $item);
                                    <option value="{{ $item->id }}"
                                        @if (old('prodi_id', $mahasiswa->prodi_id) == $item('id'))
                                            selected
                                        @endif
                                        >
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection