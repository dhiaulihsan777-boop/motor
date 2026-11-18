<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran Service - Bengkel Motor</title>
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
    <h1>Tambah Pembayaran Service</h1>

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

    <form action="{{ route('pembayaran-service.store') }}" method="POST">
        @csrf

        <!-- 1. ID Service Pelanggan (dropdown dari daftar service) -->
        <label for="daftar_service_id">ID Service Pelanggan</label>
        <select name="daftar_service_id" id="daftar_service_id" required>
            <option value="">-- Pilih ID Service Pelanggan --</option>
            @foreach ($daftarServices as $ds)
                <option value="{{ $ds->id }}">
                    ID Service #{{ $ds->id }} -
                    {{ $ds->pelanggan->nama_lengkap ?? '-' }} -
                    {{ $ds->kendaraan->no_plat ?? '-' }}
                </option>
            @endforeach
        </select>

        <!-- 2. Jumlah Biaya Service -->
        <label for="jumlah_biaya">Jumlah Biaya Service</label>
        <input type="number" name="jumlah_biaya" id="jumlah_biaya"
               value="{{ old('jumlah_biaya') }}" step="0.01" min="0" required
               placeholder="Contoh: 150000">

        <!-- 3. Jenis Pembayaran (radio button: Cash/Tunai dan Non Tunai) -->
        <label>Jenis Pembayaran</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="jenis_pembayaran" value="Cash/Tunai"
                       {{ old('jenis_pembayaran') == 'Cash/Tunai' ? 'checked' : '' }}> Cash / Tunai
            </label>
            <label>
                <input type="radio" name="jenis_pembayaran" value="Non Tunai"
                       {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }}> Non Tunai
            </label>
        </div>

        <!-- 4. Keterangan -->
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>

        <button type="submit">Simpan Pembayaran</button>
    </form>

    <p class="back-link"><a href="{{ route('pembayaran-service.index') }}">Kembali ke Daftar Pembayaran</a></p>
</div>
</body>
</html>