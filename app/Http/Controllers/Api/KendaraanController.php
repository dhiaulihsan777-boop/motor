<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan semua kendaraan
    public function index()
    {
        return response()->json([
            'message' => 'Data kendaraan berhasil ditampilkan',
            'data' => Kendaraan::all()
        ], 200);
    }

    // Menambahkan kendaraan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat' => 'required|string|max:255|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:2155',
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'message' => 'Kendaraan berhasil ditambahkan',
            'data' => $kendaraan
        ], 201);
    }

    // Melihat detail kendaraan
    public function show($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return response()->json([
            'data' => $kendaraan
        ], 200);
    }

    // Mengubah kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'no_plat' => 'sometimes|required|string|max:255|unique:kendaraans,no_plat,' . $id,
            'jenis_kendaraan' => 'sometimes|required|in:Matic,Manual Transmisi',
            'no_stnk' => 'sometimes|required|string|max:255',
            'tahun_pembuatan' => 'sometimes|required|integer|min:1900|max:2155',
            'nama_pemilik' => 'sometimes|required|string|max:255',
            'warna' => 'sometimes|required|string|max:255',
        ]);

        $kendaraan->update($validated);

        return response()->json([
            'message' => 'Data kendaraan berhasil diperbarui',
            'data' => $kendaraan
        ], 200);
    }

    // Menghapus kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return response()->json([
            'message' => 'Kendaraan berhasil dihapus'
        ], 200);
    }
}
