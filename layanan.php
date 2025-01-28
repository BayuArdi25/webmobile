<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <title>Dropdown Page Layout · Bootstrap v5.3</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Flexbox untuk memastikan footer selalu berada di bawah */
    html,
    body {
      height: 100%;
      margin: 0;
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
      flex-grow: 1;
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
    <div class="text-left mb-4">
      <h1>Layanan Kami</h1>
      <div class="bg-secondary w-100 mb-5" style="height: 2px;"></div>
    </div>
    <div class="row">
      <?php
      $sql = "SELECT * FROM layanan";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '
                <div class="col-md-12 d-flex mb-2 align-items-center">
                  <div class="me-3" style="width: 150px; height: 100px; overflow: hidden;">
                    <img src="gam_layanan/' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['nama_layanan']) . '" class="img-fluid">
                  </div>
                  <div>
                    <h2>' . htmlspecialchars($row['nama_layanan']) . '</h2>
                    <p>' . htmlspecialchars($row['penjelasan_layanan']) . '</p>
                  </div>
                </div>';
        }
      } else {
        echo "<p>Produk tidak tersedia.</p>";
      }
      ?>
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