<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;

class DaftarServiceController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        return view('daftar-service.index', compact('daftarServices'));
    }
}
