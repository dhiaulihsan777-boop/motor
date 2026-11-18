
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Service - Service Motor</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 { color: #1e293b; }

        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .form-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .form-card h2 {
            margin-top: 0;
            font-size: 18px;
            color: #1e293b;
            margin-bottom: 16px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 8px 10px;
            font-size: 14px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background: #fff;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group input:read-only {
            background: #f1f5f9;
            color: #64748b;
            cursor: not-allowed;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        button.btn-simpan {
            grid-column: 1 / -1;
            padding: 10px 18px;
            font-size: 15px;
            font-weight: 600;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 4px;
        }

        button.btn-simpan:hover {
            background: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        tr:nth-child(even) {
            background: #f8fafc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Service</h1>
        <p>Daftar kendaraan yang melakukan servis di bengkel</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="form-card">
            <h2>Tambah Service Pelanggan</h2>
            <form action="{{ route('daftar-service.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <!-- 1. ID Service Pelanggan (diisi otomatis oleh sistem) -->
                    <div class="form-group">
                        <label for="id_service">ID Service Pelanggan</label>
                        <input type="text" id="id_service" name="id_service" readonly
                               placeholder="Diisi otomatis oleh sistem">
                    </div>

                    <!-- 3. ID Pelanggan (dropdown dari tabel pelanggan) -->
                    <div class="form-group">
                        <label for="pelanggan_id">ID Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}"
                                        data-nama="{{ e($pelanggan->nama_lengkap) }}">
                                    {{ $pelanggan->id }} - {{ $pelanggan->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 4. Nama Pelanggan (muncul otomatis setelah ID pelanggan dipilih) -->
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan" readonly>
                    </div>

                    <!-- 2. Nomor Plat Kendaraan (dropdown dari tabel kendaraan) -->
                    <div class="form-group">
                        <label for="kendaraan_id">Nomor Plat Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" required>
                            <option value="">-- Pilih Nomor Plat --</option>
                            @foreach ($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}">{{ $kendaraan->no_plat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 5. Keluhan Service -->
                    <div class="form-group full">
                        <label for="keluhan">Keluhan Service</label>
                        <textarea name="keluhan" id="keluhan" rows="3" required>{{ old('keluhan') }}</textarea>
                    </div>

                    <!-- 6. Tanggal Service -->
                    <div class="form-group">
                        <label for="tanggal_servis">Tanggal Service</label>
                        <input type="date" name="tanggal_servis" id="tanggal_servis"
                               value="{{ old('tanggal_servis') }}" required>
                    </div>

                    <button type="submit" class="btn-simpan">Simpan Service</button>
                </div>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Service</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>No. Plat Kendaraan</th>
                    <th>Keluhan</th>
                    <th>Tanggal Service</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($daftarServices as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->pelanggan_id ?? '-' }}</td>
                        <td>{{ $service->pelanggan->nama_lengkap ?? '-' }}</td>
                        <td>{{ $service->kendaraan->no_plat ?? '-' }}</td>
                        <td>{{ $service->keluhan }}</td>
                        <td>{{ $service->tanggal_servis }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada daftar service.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        // 4. Nama pelanggan muncul otomatis setelah ID pelanggan dipilih
        const pelangganSelect = document.getElementById('pelanggan_id');
        const namaPelangganInput = document.getElementById('nama_pelanggan');

        function updateNamaPelanggan() {
            const selectedOption = pelangganSelect.options[pelangganSelect.selectedIndex];
            const nama = selectedOption ? selectedOption.getAttribute('data-nama') : '';
            namaPelangganInput.value = nama || '';
        }

        pelangganSelect.addEventListener('change', updateNamaPelanggan);
        window.addEventListener('load', updateNamaPelanggan);
    </script>
</body>
</html>
