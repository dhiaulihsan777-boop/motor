
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Service Motor</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        h1 { color: #1e293b; }
        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-decoration: none;
            color: #1e293b;
            box-shadow: 0 3px 10px rgba(0,0,0,.07);
        }
        .card:hover {
            background: #dbeafe;
            transform: translateY(-3px);
        }
        .card h3 { color: #2563eb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard Service Motor</h1>
        <p>Selamat datang di aplikasi manajemen bengkel motor.</p>

        <div class="menu">
            <a class="card" href="/pelanggan">
                <h3>Data Pelanggan</h3>
                <p>Melihat data pelanggan bengkel.</p>
            </a>

            <a class="card" href="/kendaraan">
                <h3>Data Kendaraan</h3>
                <p>Melihat data kendaraan pelanggan.</p>
            </a>

            <a class="card" href="/daftar-service">
                <h3>Daftar Service</h3>
                <p>Melihat pendaftaran servis motor.</p>
            </a>

            <a class="card" href="/data-service">
                <h3>Data Service</h3>
                <p>Melihat pengerjaan servis motor.</p>
            </a>

            <a class="card" href="/pembayaran-service">
                <h3>Pembayaran Service</h3>
                <p>Melihat data pembayaran servis.</p>
            </a>
        </div>
    </div>
</body>
</html>
