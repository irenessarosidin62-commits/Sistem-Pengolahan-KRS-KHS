<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah - Sistem KRS & KHS</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            padding: 2em;
            background-color: #f4f7f6;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0056b3;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 0.5em;
            margin-bottom: 1.5em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1em;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 12px 15px;
        }
        thead {
            background-color: #007bff;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Mata Kuliah Tersedia</h1>

        <table>
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Dosen Pengajar</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse ($daftarMataKuliah as $mk)
                    <tr>
                        <td>{{ $mk['kode_mk'] }}</td>
                        <td>{{ $mk['nama_mk'] }}</td>
                        <td style="text-align: center;">{{ $mk['sks'] }}</td>
                        <td>{{ $mk['dosen'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: #888;">Belum ada data mata kuliah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>