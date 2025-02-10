<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Rumah</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 12px;
    }

    .title {
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .table,
    .table th,
    .table td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    .table th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <img src="{{ public_path('assets/svg/KOP.svg') }}" alt="Kop Surat" style="width: 100%;">
  <div class="title">Laporan Data Rumah</div>

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Penerima</th>
        <th>Alamat Rumah</th>
        <th>Kondisi Rumah</th>
        <th>Status Bantuan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rumahs as $index => $rumah)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $rumah->penerima->nama_lengkap }}</td>
          <td>{{ $rumah->alamat_rumah }}</td>
          <td>{{ $rumah->kondisi_rumah }}</td>
          <td>{{ $rumah->status_bantuan == 'yes' ? 'Diberikan' : 'Belum Diberikan' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top: 20px; text-align: right;">
    <img src="{{ public_path('assets/svg/ttd-kadis-rev-02-02.svg') }}" alt="Tanda Tangan" style="width: 200px;">
  </div>

</body>

</html>
