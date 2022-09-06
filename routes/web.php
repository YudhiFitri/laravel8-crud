<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// daftar pegawai
Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

// Tambah pegawai
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

// update pegawai
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

// delete pegawai
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

// export pdf
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

// export excel
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');

// import excel
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

