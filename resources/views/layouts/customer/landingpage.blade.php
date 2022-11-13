<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>{{ $title }}</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../img/logo/landing-page.png" rel="icon" />
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="../vendor/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"
    <!-- Template Main CSS File -->
  <link href="../vendor/css/style.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
</head>

<body style="background: linear-gradient(to top, #ffffff 20%, #6464dc 90%) no-repeat">
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="padding: 1%">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="/" class="logo">
        <i class="fa-solid fa-shop"></i>
        <b>Super Pisang</b>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          @auth
            {{-- Icon Untuk Keranjang --}}
            <li><a href="{{ Route('cus.keranjang') }}"><span class="fa-solid fa-bag-shopping"></span></a></li>
            <li><a href="{{ Route('cus.riwayat') }}">Pesanan</a></li>
          @endauth

          <li class="tombol">
            @auth
              <a href="{{ Route('cus.account') }}">
                <span class="fa-solid fa-user-large ml-2 opacity-8"></span>
              </a>
            @endauth
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  @yield('container');

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../vendor/js/main.js"></script>
</body>

</html>
