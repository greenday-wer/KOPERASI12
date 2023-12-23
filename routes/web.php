<?php
use App\Http\Controllers\TestController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
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

// Route::get('/makan', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/{any}', 'AppController@index')->where('any', '.*');


Route::get('mahasiswa/formku', 'MahasiswaController@formku')->name('mahasiswa.formku');


// Route::get("/kiri",[TestController::class,"learn"]);
// Route::get('/belajar', function () {
//     return view('belajar');
// });

Route::resource("mahasiswa", MahasiswaController::class);