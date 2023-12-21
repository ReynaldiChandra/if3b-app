<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FakultasController;
use App\Http\Controllers\API\ProdiController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('fakultas', [AuthController::class, 'index']);
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->get('fakultas', [FakultasController::class, 'index']);
// Route::get('prodi', [ProdiController::class, 'index']);
// Route::get('mahasiswa', [MahasiswaController::class, 'index']);

// Route::post('fakultas', [FakultasController::class, 'store']);
// Route::post('prodi', [ProdiController::class, 'store']);
// Route::post('mahaiswa', [MahasiswaController::class, 'store']);

// Route::patch('fakultas/{id}', [FakultasController::class, 'update']);
// Route::delete('fakultas/{id}', [FakultasController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'ability:read-fakultas'])->get('fakultas', [FakultasController::class, 'index']);
Route::middleware(['auth:sanctum', 'ability:create-fakultas'])->post('fakultas', [FakultasController::class, 'store']);
Route::middleware(['auth:sanctum', 'ability:update-fakultas'])->patch('fakultas/{id}', [FakultasController::class, 'update']);
Route::middleware(['auth:sanctum', 'ability:delete-fakultas'])->delete('fakultas/{id}', [FakultasController::class, 'destroy']);