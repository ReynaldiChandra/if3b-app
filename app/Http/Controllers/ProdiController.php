<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use App\Models\fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view("prodi.index")->with("prodi",$prodi);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = fakultas::all();
        return view("prodi.create")->with("fakultas", $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi Data Input 
        $validasi = $request->validate([
            "name" => "required|unique:prodis",
            "fakultas_id" => "required"
        ]);

        // Simpan Data ke Tabel Fakultas
        Prodi::create($validasi);
        return redirect("prodi")->with("success", "Data Prodi Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view("prodi.edit")->with("fakultas", $fakultas)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prodi $prodi)
    {
        $validasi = $request->validate([
            "name" => "required",
            "fakultas_id" => "required"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prodi $prodi)
    {
        $this->Authorize('delete', $prodi);
        $prodi -> delete();
        return redirect()->route("prodi.index")->with("success","Berhasil Dihapus");
    }
}