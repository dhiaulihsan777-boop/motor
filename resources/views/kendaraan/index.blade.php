
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan - Service Motor</title>
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
        <h1>Data Kendaraan</h1>
        <p>Daftar kendaraan pelanggan Bengkel Service Motor</p>

        <a href="{{ route('kendaraan.create') }}" class="btn-tambah">+ Tambah Kendaraan</a>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No. Plat</th>
                    <th>Jenis Kendaraan</th>
                    <th>No. STNK</th>
                    <th>Tahun</th>
                    <th>Nama Pemilik</th>
                    <th>Warna</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($kendaraans as $kendaraan)
                    <tr>
                        <td>{{ $kendaraan->id }}</td>
                        <td>{{ $kendaraan->no_plat }}</td>
                        <td>{{ $kendaraan->jenis_kendaraan }}</td>
                        <td>{{ $kendaraan->no_stnk }}</td>
                        <td>{{ $kendaraan->tahun_pembuatan }}</td>
                        <td>{{ $kendaraan->nama_pemilik }}</td>
                        <td>{{ $kendaraan->warna }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada data kendaraan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
