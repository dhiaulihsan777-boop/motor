<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanWebController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();

        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat' => 'required|string|max:20|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        Kendaraan::create($validated);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan.');
    }
}
