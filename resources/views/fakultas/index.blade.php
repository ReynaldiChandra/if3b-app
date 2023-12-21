@extends('layout.main')
@section('title', 'Fakulitas')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fakultas</h4>
                    <p class="card-description">
                        Ini Adalah Daftar Fakultas Universitas Multi Data Palembang
                    </p>
                    @if (Auth::user()->role == 'A')
                        <a href="{{route('fakultas.create')}}"class = "btn btn-primary btn-rounded btn-fw">Tambah</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fakulitas as $item)
                                    <tr>
                                        <td>
                                            {{ $item['nama'] }}
                                        </td>
                                        <a href="{{ route('faklutas"></a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection