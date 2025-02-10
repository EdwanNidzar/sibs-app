<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIBS | Dinas Sosial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="{{ asset('assets/img/logo-sibs.png') }}" type="image/x-icon">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo-sibs-putih.png" alt="Logo" width="45">
        SIBANSOS
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-outline-light" onclick="location.href='{{ route('login') }}'">Login</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-section">
    <div class="container text-center">
      <h1>Selamat Datang Di</h1>
      <h3>Sistem Informasi Data Bantuan Sosial</h3>
      <p>Pemerintah Kabupaten Tanah Bumbu</p>
    </div>
  </section>

  <footer class="footer footer-dashboard">
    <p>
      <span class="copyright">Copyright &copy; <?php echo date('Y'); ?></span>
      <a href="https://dinsos.tanahbumbukab.go.id/" target="_blank">Dinas Sosial</a>.
      <span class="reserved">All rights reserved.</span>
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  

</body>
</html>
