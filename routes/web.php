<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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

Route::get('/profile', function(){
    return view('profile');
});

//Route dengan Parameter (WAJIB)
// Route::get('/mahasiswa/{nama}', function($nama = "Nur"){
//     echo "<h1>Halo nama saya $nama</h1";
// });

//Route tidak dengan Parameter (Tidak WAJIB)
// Route::get('/mahasiswa2/{nama?}', function($nama = "Nur"){
//     echo "<h1>Halo nama saya $nama</h1";
// });

//Route dengan Parameter > 1
Route::get('/profile/{nama?}/{pekerjaan?}', function($nama = "Nur", $pekerjaan = "Mahasiswa"){
    echo "<h1>Halo nama saya $nama kerja $pekerjaan</h1";
});

//Redirect

Route::get('/hubungi', function () {
    echo "<h1> Hubungi Kami </h1>";
}) ->name("Call");

Route::get('/Halo', function () {
    echo "<a href='" .route('Call') . "'>" . route('Call'). "</a>";
});

Route::prefix('/dosen')->group(function(){
    Route::get('/jadwal', function(){
        echo "<h1>Jadwal dosen</h1>";
    });
    Route::get('/materi', function(){
        echo "<h1>Materi Perkuliahan</h1>";
    });
});

Route::get('/fakultas', function () {
    // return view('fakultas.index',
    // ["ilkom" => "fakultas Ilmu Komputer dan Rekayasa"]);

    // return view('fakultas.index',
    // ["fakultas" => ["fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"]]);

    // return view('fakultas.index') -> with
    // ("fakultas" , ["fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"]);

    $kampus = "Universitas Multi Data Palembang";

    //$fakultas = [];

    $fakultas = ["fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact ('fakultas', 'kampus'));
});

Route::get
('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get
('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get
('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get
('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacede']);
Route::get('/prodi/all-join-elq', [ProdiController::class, 'allJoinElq']);

Route::get('/prodi/create', [ProdiController::class,'create']);
Route::post('/prodi/store', [ProdiController::class,'store']);


Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class,'allJoinElq']);

Route::get('/prodi', [ProdiController::class,'index'])->name('prodi.index');

//Route::get('/prodi/{id}', [ProdiController::class,'show'])->name('prodi.show');

Route::get('/prodi', [ProdiController::class,'index'])->name('prodi.index');

Route::get('/prodi/{prodi}', [ProdiController::class, 'show'])->name('prodi.show');


Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');

Route::patch('/prodi/{prodi}', [ProdiController::class,'update'])->name('prodi.update');

Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
