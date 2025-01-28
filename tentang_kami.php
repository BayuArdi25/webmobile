<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <title>New Page · Bootstrap v5.3</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .custom-footer {
      background-color: #007bff;
      /* Warna latar belakang default (biru) */
      color: white;
      /* Warna teks default */
      text-align: center;
      /* Teks di tengah */
      padding: 10px 0;
      /* Padding atas dan bawah */
      margin-top: auto;
      /* Untuk mendorong footer ke bawah jika ada layout flex */
    }

    .custom-footer .footer-text {
      margin: 0;
      /* Menghilangkan margin default */
      font-size: 14px;
      /* Ukuran teks */
    }

    main {
      flex: 1;
      /* Membuat konten utama mengambil sisa ruang */
    }

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

    #customNavbar {
      background-color: #ffffff;
      /* Warna latar navbar */
    }

    /* Warna teks default */
    #customNavbar a.nav-link {
      color: #000000;
      /* Warna putih untuk teks */
    }

    /* Warna teks saat hover */
    #customNavbar a.nav-link:hover {
      color: #ffc107;
      /* Warna kuning saat hover */
    }

    /* Warna dropdown item */
    #customNavbar .dropdown-menu .dropdown-item {
      color: #000000;
      /* Warna teks dropdown item */
    }
  </style>
</head>

<body>
  <header>
    <div class="navbar shadow-sm" id="customNavbar">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <img src="bann/logo-intisel.png" alt="Logo" style="height: 40px; width: auto;">
        </a>
        <ul class="nav d-none d-md-flex">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang_kami.php">Tentang Kami</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produk dan Layanan
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="product.php">Produk</a></li>
              <li><a class="dropdown-item" href="layanan.php">Layanan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Experience
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="expprojek.php">Experience Project</a></li>
              <li><a class="dropdown-item" href="site.php">Experience Site</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </header>

  <main class="container py-5">
    <!-- Hero Section -->
    <div class="mb-5">
      <h1>TENTANG KAMI</h1>
      <div class="mt-3">
        <p>
          PT. INTISEL PRODAKTIFAKOM, yang dikenal sebagai “Intisel” adalah perusahaan yang berorientasi pada jasa yang berfokus pada Kontraktor Telekomunikasi/Komunikasi dan Pemasok Sistem.
        </p>
        <p>
          Sejak perusahaan ini didirikan pada tahun 1997 oleh sekelompok profesional muda, perusahaan ini tumbuh dengan cepat dan mampu memuaskan pelanggan kami dengan nilai-nilai yang kami tawarkan.
        </p>
        <p>
          Kesatuan dalam bisnis dan teknologi, penekanan pada nilai-nilai, dedikasi dan loyalitas kepada pelanggan; membawa bisnis kami ke cakrawala berikutnya.
        </p>
      </div>


      <!-- Repeated Small Cards -->
      <div class="col">
        <div class="col-md-6 mb-3">
          <h2>MISI</h2>
          <div class="d-flex align-items-center">
            <img src="bann\intisel_mission.png" alt="Deskripsi gambar" class="me-3" style="width: 100px; height: 100px; object-fit: contain; background-color: #f8f9fa;">
            <p>Tumbuh bersama dengan pelanggan kami.</p>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <h2>VISI</h2>
          <div class="d-flex align-items-center">
            <img src="bann\intisel_vision.png" alt="Deskripsi gambar" class="me-3" style="width: 100px; height: 100px; object-fit: contain; background-color: #f8f9fa;">
            <p>Menjadi Aset bagi Industri Telekomunikasi di Indonesia.</p>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <h2>MOTO</h2>
          <div class="d-flex align-items-center">
            <img src="bann\intisel-team.png" alt="Deskripsi gambar" class="me-3" style="width: 150px; height: 100px; object-fit: contain; background-color: #f8f9fa;">
            <p>TEAM (Together Everyone Achieves More)</p>
          </div>
        </div>
      </div>
  </main>

  <footer class="custom-footer">
    <div class="container">
      <p class="footer-text">Copyright 2024 - Intisel Prodaktifakom</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>