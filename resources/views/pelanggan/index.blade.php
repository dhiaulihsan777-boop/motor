
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Service Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1000px;
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
        tr:nth-child(even) { background: #f8fafc; }
        th:last-child,
        td:last-child {
            width: 200px;
        }
        td:last-child div {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-start;
        }
        td:last-child form {
            margin: 0;
        }
        .btn-tambah {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .btn-tambah:hover { background: #1d4ed8; }
        .btn-edit {
            background: #f59e0b;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 6px;
        }
        .btn-edit:hover { background: #d97706; }
        .btn-hapus {
            background: #dc2626;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-hapus:hover { background: #b91c1c; }
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
        <h1>Data Pelanggan</h1>
        <a href="{{ route('pelanggan.create') }}" class="btn-tambah">+ Tambah Pelanggan</a>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
          
            <thead>
    <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
        <th>No. HP</th>
        <th>Alamat</th>
        <th>Pekerjaan</th>
        <th>Aksi</th>
    </tr>
</thead>

            <tbody>
                @forelse ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->nama_lengkap }}</td>
                        <td>{{ $pelanggan->no_hp }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->pekerjaan }}</td>
                        <td>
                            <div>
                                <a href="{{ route('pelanggan.web.edit', $pelanggan->id) }}" class="btn-edit">Edit</a>

                                <form action="{{ route('pelanggan.web.destroy', $pelanggan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada data pelanggan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>

