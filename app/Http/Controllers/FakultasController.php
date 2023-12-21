<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function _construtor()
    {
        $this->middleware
        (['checkRole:A'])
        ->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        // dd($fakultas);
      return view("fakultass.index")->with("fakultas",$fakultas);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("fakultass.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        // validasi data input
        $validasi = $request->validate([
            "nama" => "required|unique:fakultas"
        ]);
        //simpan data ke tabel fakultas
          Fakultas ::create($validasi);
            //redirect ke fakultas/index
            return redirect("fakultas")->with("success","Data fakultas berhasil disimpan");
    }
    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $id)
    {
        $fakultas = Fakultas::find($id);
        // dd($fakultas);
        $fakultas->edit();
        return view('fakultas.edit')->with('fakultas', $fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "nama" => "required"
        ]);
        Fakultas::find($id)->update($validasi);

        return redirect ('fakultas')->with('success', 'Data Fakultas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        // dd($fakultas);
        $fakultas->delete();
        return redirect('fakultas')->with('success', 'Data Fakultas Berhasil Dihapus.');
    }
}