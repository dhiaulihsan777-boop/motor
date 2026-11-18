<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceWebController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with('daftarService')->get();

        return view('data-service.index', compact('dataServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])->get();

        return view('data-service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        DataService::create($validated);

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil disimpan.');
    }
}
