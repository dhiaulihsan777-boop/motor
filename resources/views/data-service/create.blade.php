<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Service - Bengkel Motor</title>
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
        .keluhan-box {
            margin-top: 14px;
            padding: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            display: none;
        }
        .keluhan-box.show { display: block; }
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
    <h1>Tambah Data Service</h1>

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

    <form action="{{ route('data-service.store') }}" method="POST">
        @csrf

        <!-- 1. ID Service Pelanggan (dropdown dari daftar service) -->
        <label for="daftar_service_id">ID Service Pelanggan</label>
        <select name="daftar_service_id" id="daftar_service_id" required>
            <option value="">-- Pilih ID Service Pelanggan --</option>
            @foreach ($daftarServices as $ds)
                <option value="{{ $ds->id }}"
                        data-keluhan="{{ e($ds->keluhan ?? '-') }}">
                    ID Service #{{ $ds->id }} -
                    {{ $ds->pelanggan->nama_lengkap ?? '-' }} -
                    {{ $ds->kendaraan->no_plat ?? '-' }}
                </option>
            @endforeach
        </select>

        <!-- 2. Keluhan Kendaraan (muncul otomatis setelah ID service dipilih) -->
        <label for="keluhan">Keluhan Kendaraan</label>
        <div id="keluhanBox" class="keluhan-box">
            <p id="keluhanText" style="margin:0; color:#334155;"></p>
        </div>

        <!-- 3. Estimasi Service -->
        <label for="estimasi_service">Estimasi Service</label>
        <input type="number" name="estimasi_service" id="estimasi_service"
               value="{{ old('estimasi_service') }}" step="0.01" min="0" required
               placeholder="Contoh: 150000">

        <!-- 4. Nama Mekanik -->
        <label for="nama_mekanik">Nama Mekanik</label>
        <input type="text" name="nama_mekanik" id="nama_mekanik"
               value="{{ old('nama_mekanik') }}" required>

        <!-- 5. Sparepart Pengganti -->
        <label for="sparepart_pengganti">Sparepart Pengganti</label>
        <textarea name="sparepart_pengganti" id="sparepart_pengganti" rows="3">{{ old('sparepart_pengganti') }}</textarea>

        <button type="submit">Simpan Data Service</button>
    </form>

    <p class="back-link"><a href="{{ route('data-service.index') }}">Kembali ke Data Service</a></p>
</div>

<script>
    const daftarServiceSelect = document.getElementById('daftar_service_id');
    const keluhanBox = document.getElementById('keluhanBox');
    const keluhanText = document.getElementById('keluhanText');

    function updateKeluhan() {
        const selectedOption = daftarServiceSelect.options[daftarServiceSelect.selectedIndex];
        const keluhan = selectedOption ? selectedOption.getAttribute('data-keluhan') : '-';
        keluhanText.textContent = keluhan || '-';
        keluhanBox.classList.toggle('show', daftarServiceSelect.value !== '');
    }

    daftarServiceSelect.addEventListener('change', updateKeluhan);
    window.addEventListener('load', updateKeluhan);
</script>
</body>
</html>