<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Home / J-Express</title>
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
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('/'); ?>"><i class="fas fa-home fa-sm"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
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
          <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> <?= $this->session->flashdata('error'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <div class="card">
            <div class="card-header">
              <i class="fas fa-search fa-sm"></i> Cek Resi
            </div>
            <div class="card-body">
              <form action="<?= base_url('/home/check'); ?>" method="post" class="form-group">
                <div class="form-group">
                  <label for="resi">Order Number</label>
                  <input type="number" class="form-control" id="resi" name="resi" placeholder="Resi" required />
                </div>
                <div class="form-group g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Le3UgUaAAAAAITZO-RenDSNA-lRGWlafQ_CmKTY"></div>
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">
                  <i class="fas fa-search fa-sm"></i> Check
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php if ($this->session->flashdata('result')) : ?>
        <div class="row justify-content-center my-4">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <i class="fas fa-list-alt fa-sm"></i> Result
              </div>
              <div class="card-body">
                <?php
                $result = $this->session->flashdata('result');
                $json = json_decode($result);

                // Data found
                if ($json->status == 'success') :
                  $i = count($json->track);
                  foreach ($json->track as $track) :
                ?>
                    <div class="card my-1">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php $i ?> [<?= $track->times; ?>] ➤ <?= $track->state; ?></li>
                      </ul>
                    </div>
                    <?php $i--; ?>
                  <?php endforeach; ?>
                <?php else : ?>
                  <h3 class='text-center text-danger'>Order Number Invalid!</h3>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </main>

  <footer class="footer mt-auto py-3">
    <div class="container">
      <span class="text-muted"><i class="far fa-copyright"></i> <?= date('Y'); ?> J-Express</span>
    </div>
  </footer>

  <script src="<?= base_url('assets/libs/jquery/js/jquery-3.5.1.slim.min.js'); ?>"></script>
  <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
</body>

</html>