<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\DaftarServiceController;
use App\Http\Controllers\Api\DataServiceController;
use App\Http\Controllers\Api\PembayaranServiceController;

// API Pelanggan
Route::apiResource('pelanggan', PelangganController::class);

// API Kendaraan
Route::apiResource('kendaraan', KendaraanController::class);

// API Daftar Service
Route::apiResource('daftar-service', DaftarServiceController::class);

// API Data Service
Route::apiResource('data-service', DataServiceController::class);

// API Pembayaran Service
Route::apiResource('pembayaran-service', PembayaranServiceController::class);
