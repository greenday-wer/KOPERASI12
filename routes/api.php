<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakApiController;
use App\Http\Controllers\JenistransaksiApiController;
use App\Http\Controllers\TabunganApiController;
use App\Http\Controllers\AgamaApiController;
use App\Http\Controllers\NasabahApiController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\MahasiswaApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/kontak',KontakApiController::class);

Route::apiResource('/jenistransaksi',JenistransaksiApiController::class);
Route::apiResource('/agama',AgamaApiController::class);
Route::apiResource('/nasabah',NasabahApiController::class);
Route::apiResource('/tabungan',TabunganApiController::class);

// Route::middleware('auth:sanctum')->group(function () {
//     //get Profile
//     Route::apiResource('users', UserApiController::class);

//     Route::get('logout', [UserApiController::class, 'logout']);
// });

Route::post('users', [UserApiController::class, 'store']);
Route::post('users/login', [UserApiController::class, 'login']);

Route::post('register', [UserApiController::class, 'register']);
Route::post('login', [UserApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/check-token', [UserApiController::class, 'checkToken']);
});
