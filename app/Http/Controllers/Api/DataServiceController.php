<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    // Menampilkan semua data service
    public function index()
    {
        return response()->json([
            'message' => 'Data service berhasil ditampilkan',
            'data' => DataService::with('daftarService')->get()
        ], 200);
    }

    // Menambahkan data service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $service = DataService::create($validated);

        return response()->json([
            'message' => 'Data service berhasil ditambahkan',
            'data' => $service->load('daftarService')
        ], 201);
    }

    // Melihat detail data service
    public function show($id)
    {
        $service = DataService::with('daftarService')->findOrFail($id);

        return response()->json([
            'data' => $service
        ], 200);
    }

    // Mengubah data service
    public function update(Request $request, $id)
    {
        $service = DataService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => 'sometimes|required|exists:daftar_services,id',
            'estimasi_service' => 'sometimes|required|numeric|min:0',
            'nama_mekanik' => 'sometimes|required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $service->update($validated);

        return response()->json([
            'message' => 'Data service berhasil diperbarui',
            'data' => $service->load('daftarService')
        ], 200);
    }

    // Menghapus data service
    public function destroy($id)
    {
        $service = DataService::findOrFail($id);
        $service->delete();

        return response()->json([
            'message' => 'Data service berhasil dihapus'
        ], 200);
    }
}
