<?php

namespace App\Http\Controllers;

use App\Models\Fakulitas;
use App\Models\fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fakultas = fakultas::all();
        $prodi = prodi::all();
        $mahasiswa = mahasiswa::all();
        $grafik_mhs = DB::select("SELECT");
        return view('home')
            ->with('fakultas', $fakultas)
            ->with('prodi', $prodi)
            ->with('mahasiswa', $mahasiswa);
    }
}