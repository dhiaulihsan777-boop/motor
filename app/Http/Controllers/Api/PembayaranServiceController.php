<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    // Menampilkan semua pembayaran
    public function index()
    {
        return response()->json([
            'message' => 'Data pembayaran berhasil ditampilkan',
            'data' => PembayaranService::with('daftarService')->get()
        ], 200);
    }

    // Menambahkan pembayaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:pembayaran_services,daftar_service_id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = PembayaranService::create($validated);

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => $pembayaran->load('daftarService')
        ], 201);
    }

    // Melihat detail pembayaran
    public function show($id)
    {
        $pembayaran = PembayaranService::with('daftarService')
            ->findOrFail($id);

        return response()->json([
            'data' => $pembayaran
        ], 200);
    }

    // Mengubah pembayaran
    public function update(Request $request, $id)
    {
        $pembayaran = PembayaranService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => 'sometimes|required|exists:daftar_services,id|unique:pembayaran_services,daftar_service_id,' . $pembayaran->id,
            'jumlah_biaya' => 'sometimes|required|numeric|min:0',
            'jenis_pembayaran' => 'sometimes|required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($validated);

        return response()->json([
            'message' => 'Pembayaran berhasil diperbarui',
            'data' => $pembayaran->load('daftarService')
        ], 200);
    }

    // Menghapus pembayaran
    public function destroy($id)
    {
        $pembayaran = PembayaranService::findOrFail($id);
        $pembayaran->delete();

        return response()->json([
            'message' => 'Pembayaran berhasil dihapus'
        ], 200);
    }
}
