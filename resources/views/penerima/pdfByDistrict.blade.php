<!DOCTYPE html>
<html>
<head>
    <title>Data Penerima berdasarkan Kecamatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
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
    
    <h2 style="text-align: center">Laporan Data Penerima Per Kecamatan</h2>
    <table>
        <thead>
            <tr>
                <th>Kecamatan</th>
                <th>Jumlah Penerima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($districts as $district)
                <tr>
                    <td>{{ $district->name }}</td>
                    <td>{{ $district->penerima_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: right;">
        <img src="{{ public_path('assets/svg/ttd-kadis-rev-02-02.svg') }}" alt="Tanda Tangan" style="width: 200px;">
    </div>
    
</body>
</html>
