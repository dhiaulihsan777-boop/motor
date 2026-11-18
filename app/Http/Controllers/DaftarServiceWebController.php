<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceWebController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        $pelanggans = Pelanggan::orderBy('nama_lengkap')->get();
        $kendaraans = Kendaraan::orderBy('no_plat')->get();

        return view('daftar-service.index', compact(
            'daftarServices',
            'pelanggans',
            'kendaraans'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'keluhan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        DaftarService::create($validated);

        return redirect()->route('daftar-service.index')
            ->with('success', 'Data service pelanggan berhasil disimpan.');
    }
}
