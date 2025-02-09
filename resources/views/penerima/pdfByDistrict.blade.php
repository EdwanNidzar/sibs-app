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
    <h1>Data Penerima berdasarkan Kecamatan</h1>
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
</body>
</html>
