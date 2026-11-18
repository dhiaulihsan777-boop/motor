<?php

namespace App\Http\Controllers;

use App\Models\PembayaranService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranServiceWebController extends Controller
{
    public function index()
    {
        $pembayaranServices = PembayaranService::with('daftarService')->get();

        return view('pembayaran-service.index', compact('pembayaranServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])->get();

        return view('pembayaran-service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'nullable|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        PembayaranService::create($validated);

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Data pembayaran service berhasil disimpan.');
    }
}
