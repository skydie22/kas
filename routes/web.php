<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
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
    Route::get('/home' ,[HomeController::class , 'index'])->name('home');

    Route::get('/kas-pemasukan' , [KasController::class , 'indexMasuk'])->name('kas.pemasukan');
    Route::post('/kas-pemasukan/tambah' , [KasController::class , 'storeMasuk'])->name('tambah.pemasukan');
    

    Route::get('/kas-pengeluaran' , [KasController::class , 'indexKeluar'])->name('kas.pengeluaran');
    Route::post('/kas-pengeluaran' , [KasController::class , 'storeKeluar'])->name('tambah.pengeluaran');

});


