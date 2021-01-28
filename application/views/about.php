<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>About / J-Express</title>
  <link rel="icon" href="<?= base_url('assets/img/favicon.png'); ?>">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

  <!--- Addon CSS -->
  <link href="<?= base_url('/assets/libs/fontawesome/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
</head>

<body class="d-flex flex-column h-100">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">J-Express</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/'); ?>"><i class="fas fa-home fa-sm"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('about'); ?>"><i class="fas fa-info-circle fa-sm"></i> About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <i class="fas fa-fw fa-info-circle"></i> About
            </div>
            <div class="card-body text-justify">
              <p>
                Zetbot Indonesia merupakan situs cek resi J-Express, ditujukan kepada pengguna yang ingin lebih mudah dalam memantau pesanan melalui kurir J-Express.
              </p>
              <p>
                Dibuat untuk memenuhi tugas besar matakuliah Pemrograman Web Interaktif 2. Bagaskara Achmad Zaky (7708180096) | Prodi Teknologi Rekayasa Multimedia Fakultas Ilmu Terapan - Telkom University
              </p>
              <div class="text-center mt-2">
                <a href="//twitter.com/zckyachmd" class="btn btn-primary" target="_blank" title="Twitter : Zacky Achmad"><i class="fab fa-fw fa-twitter"></i></a>
                <a href="mailto:zckyachmd@gmail.com" class="btn btn-danger" title="Contact : Zacky Achmad"><i class="fas fa-fw fa-envelope"></i></a>
                <a href="//github.com/zckyachmd" class="btn btn-dark" target="_blank" title="Github : Zacky Achmad"><i class="fab fa-fw fa-github"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer mt-auto py-3">
    <div class="container">
      <span class="text-muted"><i class="far fa-copyright"></i> <?= date('Y'); ?> J-Express</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>