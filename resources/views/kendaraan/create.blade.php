<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan - Service Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        h1 { color: #1e293b; }
        label {
            display: block;
            margin-top: 14px;
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .radio-group {
            display: flex;
            gap: 16px;
            margin-top: 6px;
        }
        .radio-group label {
            margin-top: 0;
            font-weight: normal;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .radio-group input {
            width: auto;
            margin: 0;
        }
        button {
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            width: auto;
        }
        button:hover { background: #1d4ed8; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .back-link {
            display: inline-block;
            margin-top: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tambah Data Kendaraan</h1>

    @if ($errors->any())
        <div style="color:#dc2626; background:#fef2f2; border:1px solid #fecaca; padding:12px; border-radius:6px; margin-bottom:16px;">
            <strong>Mohon perbaiki kesalahan berikut:</strong>
            <ul style="margin:8px 0 0 20px; padding:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf

        <label>Nomor Plat Kendaraan</label>
        <input type="text" name="no_plat" value="{{ old('no_plat') }}" required placeholder="Contoh: B 1234 ABC">

        <label>Jenis Kendaraan (Transmisi)</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="jenis_kendaraan" value="Matic" {{ old('jenis_kendaraan') == 'Matic' ? 'checked' : '' }}> Matic
            </label>
            <label>
                <input type="radio" name="jenis_kendaraan" value="Manual" {{ old('jenis_kendaraan') == 'Manual' ? 'checked' : '' }}> Manual
            </label>
        </div>

        <label>No. STNK</label>
        <input type="text" name="no_stnk" value="{{ old('no_stnk') }}" required placeholder="Contoh: 1234567890">

        <label>Tahun Pembuatan Kendaraan</label>
        <input type="number" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}" min="1900" max="{{ date('Y') }}" required>

        <label>Nama Pemilik</label>
        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required>

        <label>Warna Kendaraan</label>
        <input type="text" name="warna" value="{{ old('warna') }}" required placeholder="Contoh: Hitam, Merah, Putih">

        <button type="submit">Simpan Kendaraan</button>
    </form>

    <p class="back-link"><a href="{{ route('kendaraan.index') }}">Kembali ke Data Kendaraan</a></p>
</div>
</body>
</html>