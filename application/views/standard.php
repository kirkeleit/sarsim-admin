<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SAR Simulator [Admin]">
    <title>SAR Simulator [Admin DEV]</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <script src="/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <script src="/js/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script src="/js/sarsim-api.js" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <!--<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">-->
    <meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="/css/sarsim.css" rel="stylesheet">
    <script>
      if (sessionStorage.getItem("AccessToken") == null) {
        window.location = 'https://'+window.location.hostname+'/index.php/brukere/logginn'
      }
    </script>
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">SAR Simulator</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Organisasjoner</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('organisasjoner/organisasjon'); ?>">
              <span data-feather="bar-chart-2"></span>
              Ny organisasjon
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('organisasjoner/liste'); ?>">
              <span data-feather="users"></span>
              Alle organisasjoner
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Brukere</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('brukere/bruker'); ?>">
              <span data-feather="users"></span>
              Ny bruker
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('brukere/rolle'); ?>">
              <span data-feather="users"></span>
              Ny rolle
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('brukere/liste'); ?>">
              <span data-feather="users"></span>
              Alle brukere
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('brukere/roller'); ?>">
              <span data-feather="users"></span>
              Alle roller
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Brikker</span>
        </h6>
        <ul class="nav flex-column mb-2">
		      <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('brikker/nyebrikker'); ?>">
              <span data-feather="users"></span>
              Nye brikker
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('brikker/liste'); ?>">
              <span data-feather="users"></span>
              Alle brikker
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>E-poster</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('eposter/liste'); ?>">
              <span data-feather="users"></span>
              Sendte e-poster
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Øvelser</span>
        </h6>
        <ul class="nav flex-column mb-2">
		      <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('ovelser/liste'); ?>">
              <span data-feather="users"></span>
              Liste
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('ovelser/kart'); ?>">
              <span data-feather="users"></span>
              Kart
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="padding-top: 2rem;">
    <?php if ($this->session->flashdata('Infomelding')) { ?>
    <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('Infomelding'); ?></div>
    <?php } ?>

    <?php echo $contents; ?>
    </main>
  </div>
</div>

    <script>
      $(document).ready(function() {
        SARSIMStatus();
        setInterval(SARSIMStatus,30000);
      });
    </script>
  </body>
</html>