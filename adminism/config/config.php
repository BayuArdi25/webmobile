<?php
// Konfigurasi database
$host = "localhost";    // Nama host (contoh: localhost)
$username = "root";     // Username database (contoh: root)
$password = "";         // Password database (kosong jika default)
$database = "intiselweb"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
