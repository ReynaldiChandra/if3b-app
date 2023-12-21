<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view("mahasiswa.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request-> validate([
            "nmp" => "required|unique:mahasiswa",
            "nama" => "required",
            "tempat_lahir" =>"required",
            "tanggal_lahir"=> "required",
            "prodi_id"=> "required|",
           "foto" => "required|image"
        ]);

        $ext = $request->images->getClientOriginalExtension();
        $validasi["images"] =$request->npm.".".$ext;
        $request->images->move(public_path('image'),$validasi["images"]);
        Mahasiswa::create($validasi);
        return redirect("mahasiswa")->with("Success","Data mahasiswa berhasil disimpan");
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response("Data Berhasil Dihapus", 200);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validasi = $request-> validate([
            "nmp" => "required|unique:mahasiswa",
            "nama" => "required",
            "tempat_lahir" =>"required",
            "tanggal_lahir"=> "required",
            "prodi_id"=> "required|",
            "foto" => "image|nullable"
        ]);
        
        $ext = $request->images->getClientOriginalExtension();
        $validasi["images"] =$request->npm.".".$ext;
        $request->images->move(public_path('image'),$validasi["images"]);
        Mahasiswa::update($validasi);
        return redirect("mahasiswa")->with("Success","Data mahasiswa berhasil disimpan");
    }
}