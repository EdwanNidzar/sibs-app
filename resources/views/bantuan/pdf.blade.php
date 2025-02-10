<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bantuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('assets/svg/KOP.svg') }}" alt="Kop Surat" style="width: 100%;">
    <h2 style="text-align: center;">Laporan Data Bantuan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Bantuan</th>
                <th>Jenis Bantuan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bantuans as $bantuan)
            <tr>
                <td>{{ $bantuan->nama_bantuan }}</td>
                <td>{{ $bantuan->jenis_bantuan }}</td>
                <td>{{ $bantuan->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: right;">
        <img src="{{ public_path('assets/svg/ttd-kadis-rev-02-02.svg') }}" alt="Tanda Tangan" style="width: 200px;">
    </div>
    
</body>
</html>
