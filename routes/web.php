<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/fakultas', function () {
//     return view('fakultas');
// });
Route::resource(
    'fakultas',
    FakultasController::class
);
// Route::get('/prodi', function () {
//     return view('prodi');
// });
Route::resource(
    'prodi',
    ProdiController::class
);
// Route::get('/mahasiswa', function () {
//     $data = [
//         ["npm" => 2226250001, "nama" => "Ahmad"],
//         ["npm" => 2226250002, "nama" => "Kareem"]
//     ];
//     return view('mahasiswa.index')->with('mahasiswa', $data);
// });
Route::resource(
    'mahasiswa',
    MahasiswaController::class
);

//  Admin
// Route::middleware(['auth', 'checkRole:A'])->group(function() {
//     Route::resource('fakultas', FakultasController::class);
//     Route::resource('prodi', ProdiController::class);
//     Route::resource('mahasiswa', MahasiswaController::class);
// });

Route::middleware(['auth'])->group(function() {
    Route::resource('fakultas', FakultasController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});

// User
// Route::middleware(['auth', 'checkRole:U'])->group(function () {
//     Route::get('/fakultas', FakultasController::class, 'index')->name('fakultas.index');
//     // Route::get('/prodi', ProdiController::class, 'index')->name('prodi.index');
//     // Route::get('/mahasiswa', MahasiswaController::class, 'index')->name('mahasiswa.index');
// });

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified', 'checkRole:A'])->name('home');
