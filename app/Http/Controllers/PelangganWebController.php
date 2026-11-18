<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganWebController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        Pelanggan::create($request->only([
            'nama_lengkap',
            'no_hp',
            'alamat',
            'pekerjaan',
        ]));

       return redirect('/pelanggan')
    ->with('success', 'Data pelanggan berhasil ditambahkan!');
}

public function edit($id)
{
    $pelanggan = Pelanggan::findOrFail($id);

    return view('pelanggan.edit', compact('pelanggan'));
}

public function update(Request $request, $id)
{
    $pelanggan = Pelanggan::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
        'alamat' => 'required|string',
        'pekerjaan' => 'required|string|max:255',
    ]);

    $pelanggan->update($request->only([
        'nama_lengkap',
        'no_hp',
        'alamat',
        'pekerjaan',
    ]));

    return redirect('/pelanggan')
        ->with('success', 'Data pelanggan berhasil diperbarui!');
    
    }

public function destroy($id)
{
    $pelanggan = Pelanggan::findOrFail($id);

    $pelanggan->delete();

    return redirect('/pelanggan')
        ->with('success', 'Data pelanggan berhasil dihapus!');
}
}