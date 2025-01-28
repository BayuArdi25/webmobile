<?php
include 'config.php';

// Query untuk mengambil alamat video dari database
$sql = "SELECT alamat_video FROM video_home LIMIT 1"; // Ambil satu video saja untuk contoh
$result = $conn->query($sql);

// Periksa apakah ada video dalam database
if ($result->num_rows > 0) {
    // Ambil alamat video
    $row = $result->fetch_assoc();
    $video_url = $row['alamat_video'];
} else {
    $video_url = ''; // Jika tidak ada video, set ke string kosong
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <title>Album Example · Bootstrap v5.3</title>

    <!-- Bootstrap core CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet" />

    <style>
      html,
      body {
        height: 100%;
      }

      .custom-footer {
        background-color: #007bff; /* Warna latar belakang default (biru) */
        color: white; /* Warna teks default */
        text-align: center; /* Teks di tengah */
        padding: 10px 0; /* Padding atas dan bawah */
        margin-top: auto; /* Untuk mendorong footer ke bawah jika ada layout flex */
      }

      .custom-footer .footer-text {
        margin: 0; /* Menghilangkan margin default */
        font-size: 14px; /* Ukuran teks */
      }
      body {
        display: flex;
        flex-direction: column;
      }

      main {
        flex: 1;
      }

      footer {
        margin-top: auto;
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

      .banner {
        position: relative;
        width: 100%;
        height: 90vh;
        overflow: hidden;
      }

      .banner img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 1s ease-in-out;
      }

      .banner video {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 80%;
        max-width: 720px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
      }

      .banner img.hidden {
        opacity: 0;
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
            <img
              src="bann/logo-intisel.png"
              alt="Logo"
              style="height: 40px; width: auto" />
          </a>
          <ul class="nav d-none d-md-flex">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tentang_kami.php">Tentang Kami</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                Produk dan Layanan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="product.php">Produk</a></li>
                <li><a class="dropdown-item" href="layanan.php">Layanan</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                Experience
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="expprojek.php"
                    >Experience Project</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="site.php">Experience Site</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <main>
      <div class="banner">
        <img src="bann/1.jpg" alt="Banner 1" />
        <img src="bann/2.png" alt="Banner 2" class="hidden" />
        <img src="bann/3.jpg" alt="Banner 3" class="hidden" />
        <img src="bann/4.jpg" alt="Banner 4" class="hidden" />
        <!-- Menampilkan video dari database -->
        <?php if (!empty($video_url)): ?>
          <video controls autoplay loop>
            <source src="uploads/<?php echo $video_url; ?>" type="video/mp4" />
            Your browser does not support the video tag.
          </video>
        <?php else: ?>
          <p>Video tidak tersedia.</p>
        <?php endif; ?>
      </div>
    </main>

    <footer class="custom-footer">
      <div class="container">
        <p class="footer-text">Copyright 2024 - Intisel Prodaktifakom</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const banners = document.querySelectorAll(".banner img");
      let currentIndex = 0;

      function showNextBanner() {
        banners[currentIndex].classList.add("hidden");
        currentIndex = (currentIndex + 1) % banners.length;
        banners[currentIndex].classList.remove("hidden");
      }

      setInterval(showNextBanner, 3000);

    </script>
  </body>
</html>
