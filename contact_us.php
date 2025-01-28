<?php
include 'config.php';

// Query untuk mengambil data dari tabel contact_us
$sql = "SELECT * FROM contact_us LIMIT 1";
$result = $conn->query($sql);

// Periksa apakah ada data dalam tabel
if ($result->num_rows > 0) {
    $contact = $result->fetch_assoc();
} else {
    $contact = [
        'alamat' => 'Data alamat belum tersedia.',
        'phone' => 'Data phone belum tersedia.',
        'email' => 'Data email belum tersedia.',
    ];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Intisel Prodaktifakom</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <a href="#" class="flex items-center">
        <img src="bann/logo-intisel.png" alt="Logo" class="h-10">
      </a>
      <nav class="hidden md:flex space-x-6">
        <a href="index.php" class="text-black hover:text-yellow-500">Home</a>
        <a href="tentang_kami.php" class="text-black hover:text-yellow-500">Tentang Kami</a>
        <div class="relative group">
          <button class="text-black hover:text-yellow-500">Produk dan Layanan</button>
          <div class="absolute hidden group-hover:block bg-white shadow rounded mt-2">
            <a href="product.php" class="block px-4 py-2 text-black hover:bg-gray-100">Produk</a>
            <a href="layanan.php" class="block px-4 py-2 text-black hover:bg-gray-100">Layanan</a>
          </div>
        </div>
        <div class="relative group">
          <button class="text-black hover:text-yellow-500">Experience</button>
          <div class="absolute hidden group-hover:block bg-white shadow rounded mt-2">
            <a href="expprojek.php" class="block px-4 py-2 text-black hover:bg-gray-100">Experience Project</a>
            <a href="site.php" class="block px-4 py-2 text-black hover:bg-gray-100">Experience Site</a>
          </div>
        </div>
        <a href="contact_us.php" class="text-black hover:text-yellow-500">Contact Us</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto py-10 px-6">
    <!-- Hero Section -->
    <div class="text-center mb-10">
      <h1 class="text-3xl font-bold">CONTACT US</h1>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.310319628935!2d131.3275845!3d-0.9143192000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5bff002fb8a599%3A0x636755fdf41da684!2sPT%20INTISEL-GIT%20PUMA!5e0!3m2!1sid!2sid!4v1736695037506!5m2!1sid!2sid" 
        class="w-full h-96 mt-5 border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- Contact Information -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <div class="text-center">
        <h2 class="text-xl font-bold">Contact Address</h2>
        <img class="flex ms-44 justify-center" src="https://intisel.co.id/views/templates/intisel/images/logo-intisel.png">
        <p class="mt-4 text-gray-700">
          <?php echo htmlspecialchars($contact['alamat']); ?>
        </p>
        <p class="mt-2 text-gray-700">
          Phone: <a href="tel:<?php echo htmlspecialchars($contact['phone']); ?>" class="text-blue-500"><?php echo htmlspecialchars($contact['phone']); ?></a>
        </p>
        <p class="mt-2 text-gray-700">
          Email: <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>" class="text-blue-500"><?php echo htmlspecialchars($contact['email']); ?></a>
        </p>
      </div>
      <div class="text-center">
        <h2 class="text-xl font-bold">Thank You</h2>
        <p class="mt-4 text-gray-700">IT IS OUR HONOUR TO BE PART OF YOUR SOLUTION</p>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white py-4">
    <div class="text-center">
      <p class="text-sm">Copyright 2024 - Intisel Prodaktifakom</p>
    </div>
  </footer>
</body>
</html>
