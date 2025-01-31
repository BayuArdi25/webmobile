-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jan 2025 pada 02.25
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intiselweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_home`
--

CREATE TABLE `banner_home` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `alamat`, `phone`, `email`, `created_at`) VALUES
(3, 'JL. TERATAI 2 HARAPAN INDAH', '081344337690', 'bayu@gmail.com', '2025-01-22 03:56:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `no` int(11) NOT NULL,
  `nama_layanan` varchar(150) NOT NULL,
  `penjelasan_layanan` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`no`, `nama_layanan`, `penjelasan_layanan`, `gambar`) VALUES
(1, 'TECHNOLOGY COVERAGE', 'Layanan Bagus', 'technology-coverage-view.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `no` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `penjelasan_produk` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`no`, `nama_produk`, `penjelasan_produk`, `gambar`) VALUES
(1, 'vCloudPoint Technology', 'Barang bagus', 'intisel_vcloud.png'),
(2, 'RECTIFIER', 'ASPIRO\r\n- Capacity Ã‚ Ã‚  Ã‚ : 800W (XR08.48) and 1200W (XPGe12.48)\r\n- Subrack Ã‚ Ã‚  Ã‚ : Capacity 2 modules 1 RU (M35),\r\n\r\nGUARDIAN\r\n- CapacityÃ‚ Ã‚  Ã‚ : 3000 W (FMPe30.48)\r\n- SubrackÃ‚ Ã‚  Ã‚ : Capacity 5 modules 3 RU (M27)', 'img_678e76c938de59.16650418.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_experience`
--

CREATE TABLE `project_experience` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `operator_provider` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `scope_of_works` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project_experience`
--

INSERT INTO `project_experience` (`id`, `customer`, `periode`, `operator_provider`, `area`, `scope_of_works`) VALUES
(1, 'PT Infrastruktur Telekomunikasi Indonesia', '2023 - Now', 'Telkom, CDC Nationwide', 'All Region', 'Pengadaan Sewa Daya Perangkat CDC Nationwide'),
(2, 'PT. Poca Jaringan Solusi', '2023 - Now', 'Indosat', 'West Java, Jabodetabek', 'TI'),
(3, 'YOFC', '2023 - Now', 'Asianet', 'Jabodetabek, Central Java, East Java', 'FTTH, EMR FTTH 200K Project'),
(4, 'PT. Cahaya Arif Abadi', '2022 - Now', 'XL', 'All Region', 'Outdoorisasi, New Link, Swap Upgrade, Rerout, Swap Reroute dan Upgrade Only'),
(5, 'FIBERHOME', '2022 - Now', 'Bakti Kominfo', 'Sulawesi, Kalimantan, NTT', '4G BAKTI PROJECT'),
(6, 'Asianet Media Teknologi', '2022 - Now', 'All operator', 'Jabodetabek', 'Optical');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siteexp`
--

CREATE TABLE `siteexp` (
  `no` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siteexp`
--

INSERT INTO `siteexp` (`no`, `count`, `category`) VALUES
(1, 15000, 'Site Survey - Installation 1'),
(2, 5000, 'SWAP'),
(3, 10000, 'Dismantle - Relocation'),
(4, 500, 'New Build Site');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`email`, `username`, `password`) VALUES
('admin@gmail.com', 'admin', '$2y$10$lUlhpOuMbMRkOheL1qoHiua8JL6h/GF8upSU4gb5eFB4QuhBlLhtq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_home`
--

CREATE TABLE `video_home` (
  `id` int(11) NOT NULL,
  `alamat_video` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video_home`
--

INSERT INTO `video_home` (`id`, `alamat_video`, `created_at`) VALUES
(1, '(1766) Sistem Pakar - Mesin Inferensi - YouTube - Google Chrome 2023-10-27 00-48-07.mp4', '2025-01-22 04:21:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `project_experience`
--
ALTER TABLE `project_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteexp`
--
ALTER TABLE `siteexp`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `video_home`
--
ALTER TABLE `video_home`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_experience`
--
ALTER TABLE `project_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `siteexp`
--
ALTER TABLE `siteexp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video_home`
--
ALTER TABLE `video_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
