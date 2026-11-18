
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
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
        input, textarea {
            width: 100%;
            padding: 11px;
            margin: 8px 0 16px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
        a { color: #2563eb; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h1>Tambah Data Pelanggan</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('pelanggan.web.store') }}" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>

        <label>Nomor HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required>

        <label>Alamat</label>
        <textarea name="alamat" required>{{ old('alamat') }}</textarea>

        <label>Pekerjaan</label>
        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required>

        <button type="submit">Simpan Pelanggan</button>
    </form>

    <p><a href="{{ route('pelanggan.index') }}">Kembali ke Data Pelanggan</a></p>
</div>
</body>
</html>
