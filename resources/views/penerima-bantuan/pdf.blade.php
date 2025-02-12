<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Penerima Bantuan</title>
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
  <hr style="border: 1px solid black;">
  <div class="title">Laporan Data Penerima Bantuan</div>

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Penerima</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th>Jenis Bantuan</th>
        <th>Tanggal Penerimaan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($penerima_bantuans as $index => $penerima)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $penerima->penerima->nama_lengkap }}</td>
          <td>{{ $penerima->penerima->district->name }}</td>
          <td>{{ $penerima->penerima->village->name }}</td>
          <td>{{ $penerima->bantuan->nama_bantuan }}, {{ $penerima->bantuan->jenis_bantuan }}</td>
          <td>{{ $penerima->tanggal_penerimaan }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top: 20px; text-align: right;">
    <img src="{{ public_path('assets/svg/ttd-kadis-rev-02-02.svg') }}" alt="Tanda Tangan" style="width: 200px;">
  </div>

</body>

</html>
