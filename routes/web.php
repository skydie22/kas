<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\rekapController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home' ,[DashboardController::class , 'index'])->name('home');
    Route::get('/rekap', [rekapController::class, 'index'])->name('rekap');
    Route::get('/rekap/cetak_pdf', [rekapController::class , 'exportPdf'])->name('export.pdf');
    Route::post('/rekap/cetak_pdf/periode', [rekapController::class , 'cetak_periode_pdf'])->name('export.pdf.periode');


    Route::get('/kas-pemasukan' , [KasController::class , 'indexMasuk'])->name('kas.pemasukan');
    Route::post('/kas-pemasukan/tambah' , [KasController::class , 'storeMasuk'])->name('tambah.pemasukan');
    Route::delete('/kas-pemasukan/delete/{id}' , [KasController::class, 'destroy'])->name('hapus.pemasukan');
    Route::put('/kas-pemasukan/edit/{id}' , [KasController::class, 'updateMasuk']);
    

    Route::get('/kas-pengeluaran' , [KasController::class , 'indexKeluar'])->name('kas.pengeluaran');
    Route::post('/kas-pengeluaran' , [KasController::class , 'storeKeluar'])->name('tambah.pengeluaran');
    Route::delete('/kas-pengeluaran/delete/{id}' , [KasController::class, 'destroy'])->name('hapus.pengeluaran');
    Route::put('/kas-pengeluaran/edit/{id}' , [KasController::class, 'updateKeluar']);

    Route::get('/manage-bendahara' , [UserController::class , 'index'])->name('manage.bendahara')->middleware('role:admin');
    Route::post('/bendahara/tambah' , [UserController::class , 'store'])->name('tambah.bendahara')->middleware('role:admin');
    Route::delete('/hapus-bendahara/{id}' , [UserController::class, 'destroy'])->name('hapus.bendahara')->middleware('role:admin');




});


