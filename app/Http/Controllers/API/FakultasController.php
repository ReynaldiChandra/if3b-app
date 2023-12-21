<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\prodi;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index() {
        $fakultas = Fakultas::all();
        return response()->json($fakultas, 200);
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'nama' => 'required|unique:fakultas'
        ]);

        Fakultas::create($validate);
        $response['Success'] = true;
        $response['message'] = 'Fakultas Berhasil Disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id) {
        $validate = $request->validate([
            'nama' => 'required'
        ]);
        $fakultas = Fakultas::where('id', $id)->update($validate);
        if($fakultas) {
            $response['success'] = true;
            $response['message'] = 'Fakultas Berhasil Diperbarui';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Fakultas Gagal Diperbarui';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
    public function destroy($id) {
        $fakultas = Fakultas::where('id', $id)->get();
        if(count($fakultas) > 0) {
            $prodi = prodi::where('fakultas_id', $id)->get();
            if(count($prodi) > 0) {
                $response['success'] = false;
                $response['message'] = 'Data Fakultas Tidak Diizinkan Dihapus Dikarenakan Digunakan di Tabel Prodi';
                return response()->json($response, Response::HTTP_NOT_FOUND);
            } else {
                $response['success'] = true;
                $response['message'] = 'Fakultas Berhasil Dihapus';
                return response()->json($response, Response::HTTP_OK);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Data Fakultas Tidak Ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
