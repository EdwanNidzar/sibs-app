<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Data Penerima</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>

<body>

  <img src="{{ public_path('assets/svg/KOP.svg') }}" alt="Kop Surat" style="width: 100%;">
  <hr style="border: 1px solid black;">
  <h2 class="text-center">Laporan Data Penerima</h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>No KK</th>
        <th>Nama Lengkap</th>
        <th>JK</th>
        <th>Kecamatan</th>
        <th>Desa</th>
        <th>Alamat</th>
        <th>Status DTKS</th>
        <th>Kategori</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($penerimas as $index => $penerima)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $penerima->nik }}</td>
          <td>{{ $penerima->no_kk }}</td>
          <td>{{ $penerima->nama_lengkap }}</td>
          <td>{{ $penerima->jk == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
          <td>{{ $penerima->district->name ?? '-' }}</td>
          <td>{{ $penerima->village->name ?? '-' }}</td>
          <td>{{ $penerima->alamat_penerima }}</td>
          <td>{{ $penerima->dtks_status }}</td>
          <td>{{ $penerima->kategori }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top: 20px; text-align: right;">
    <img src="{{ public_path('assets/svg/ttd-kadis-rev-02-02.svg') }}" alt="Tanda Tangan" style="width: 200px;">
  </div>

</body>

</html>
