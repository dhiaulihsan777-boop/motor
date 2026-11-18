<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganWebController;
use App\Http\Controllers\KendaraanWebController;
use App\Http\Controllers\DaftarServiceWebController;
use App\Http\Controllers\DataServiceWebController;
use App\Http\Controllers\PembayaranServiceWebController;



Route::get('/', function () {
    return view('dashboard');
}) ->name('dashboard');

 Route::get('/pelanggan', [PelangganWebController::class, 'index'])
    ->name('pelanggan.index');

Route::get('/kendaraan', [KendaraanWebController::class, 'index'])
    ->name('kendaraan.index');

Route::get('/kendaraan/tambah', [KendaraanWebController::class, 'create'])
    ->name('kendaraan.create');

Route::post('/kendaraan/simpan', [KendaraanWebController::class, 'store'])
    ->name('kendaraan.store');    

Route::get('/daftar-service', [DaftarServiceWebController::class, 'index'])
    ->name('daftar-service.index');

Route::post('/daftar-service/simpan', [DaftarServiceWebController::class, 'store'])
    ->name('daftar-service.store');    


Route::get('/data-service', [DataServiceWebController::class, 'index'])
    ->name('data-service.index');

Route::get('/data-service/tambah', [DataServiceWebController::class, 'create'])
    ->name('data-service.create');

Route::post('/data-service/simpan', [DataServiceWebController::class, 'store'])
    ->name('data-service.store');    


Route::get('/pembayaran-service', [PembayaranServiceWebController::class, 'index'])
    ->name('pembayaran-service.index');

Route::get('/pembayaran-service/tambah', [PembayaranServiceWebController::class, 'create'])
    ->name('pembayaran-service.create');

Route::post('/pembayaran-service/simpan', [PembayaranServiceWebController::class, 'store'])
    ->name('pembayaran-service.store');


Route::get('/pelanggan/tambah', [PelangganWebController::class, 'create'])
    ->name('pelanggan.create');

Route::post('/pelanggan/simpan', [PelangganWebController::class, 'store'])
    ->name('pelanggan.web.store'); 


Route::get('/pelanggan/{id}/edit', [PelangganWebController::class, 'edit'])
    ->name('pelanggan.web.edit');

Route::put('/pelanggan/{id}/update', [PelangganWebController::class, 'update'])
    ->name('pelanggan.web.update');

Route::delete('/pelanggan/{id}/hapus', [PelangganWebController::class, 'destroy'])
    ->name('pelanggan.web.destroy');    