
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Service - Bengkel Motor</title>

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

        .btn-tambah {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .btn-tambah:hover { background: #1d4ed8; }

        .alert-success {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pembayaran Service</h1>
        <p>Daftar pembayaran servis kendaraan pelanggan</p>

        <a href="{{ route('pembayaran-service.create') }}" class="btn-tambah">+ Tambah Pembayaran</a>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th>ID Service Pelanggan</th>
                    <th>Jumlah Biaya</th>
                    <th>Jenis Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pembayaranServices as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->id }}</td>
                        <td>{{ $pembayaran->daftar_service_id }}</td>
                        <td>Rp {{ number_format($pembayaran->jumlah_biaya, 0, ',', '.') }}</td>
                        <td>{{ $pembayaran->jenis_pembayaran ?? '-' }}</td>
                        <td>{{ $pembayaran->keterangan ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
