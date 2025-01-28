<?php
// Include file koneksi ke database
session_start();
include '../config/config.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['nolayanan'])){
        $noLayanan = $_GET['nolayanan'];

         // Query untuk mendapatkan data gambar berdasarkan ID
    $query = "SELECT gambar FROM layanan WHERE no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $noLayanan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $gambar = $data['gambar'];

        // Lokasi file gambar
        $file_path = "../../gam_layanan/" . $gambar;

        // Hapus file gambar jika ada
        if (file_exists($file_path) && !empty($gambar)) {
            unlink($file_path);
        }

        // Query untuk menghapus data dari database
        $delete_query = "DELETE FROM layanan WHERE no = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param("i", $noLayanan);

        if ($delete_stmt->execute()) {
            // Berhasil menghapus data
            header("Location: ../layanan.php?status=success");
        } else {
            // Gagal menghapus data
            header("Location: ../layanan.php?status=error");
        }
    } else {
        // Data tidak ditemukan
        header("Location: ../layanan.php?status=notfound");
    }
    }
    if(isset($_GET['noproduk'])){
        $noproduk = $_GET['noproduk'];

         // Query untuk mendapatkan data gambar berdasarkan ID
    $query = "SELECT gambar FROM produk WHERE no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $noproduk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $gambar = $data['gambar'];

        // Lokasi file gambar
        $file_path = "../../gam_produk/" . $gambar;

        // Hapus file gambar jika ada
        if (file_exists($file_path) && !empty($gambar)) {
            unlink($file_path);
        }

        // Query untuk menghapus data dari database
        $delete_query = "DELETE FROM produk WHERE no = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param("i", $noproduk);

        if ($delete_stmt->execute()) {
            // Berhasil menghapus data
            header("Location: ../produk.php?status=success");
        } else {
            // Gagal menghapus data
            header("Location: ../produk.php?status=error");
        }
    } else {
        // Data tidak ditemukan
        header("Location: ../produk.php?status=notfound");
    }
    }
    if(isset($_GET['nosite'])){
        $nosite = $_GET['nosite'];
        $delete_query = "DELETE FROM siteexp WHERE no = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param("i", $nosite);

        if ($delete_stmt->execute()) {
            // Berhasil menghapus data
            header("Location: ../siteexp.php?status=success");
        } else {
            // Gagal menghapus data
            header("Location: ../siteexp.php?status=error");
        }
    }
    if (isset($_GET['noproject'])) {
        // Ambil ID dari parameter URL
        $id = $_GET['noproject'];
    
        // Query untuk menghapus data
        $query = "DELETE FROM project_experience WHERE id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $id);
    
            // Eksekusi query
            if ($stmt->execute()) {
                header('Location: ../projectexp.php?status=delete_success');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Gagal menghapus data: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
        }
    }
    
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambahdataproduk'])) {
        // Logika tambah data produk
        // Ambil data dari form
        $namaProduk = $_POST['productName'];
        $deskripsiProduk = $_POST['productDescription'];

        // Proses file gambar
        $namaFile = $_FILES['productImage']['name'];
        $tmpName = $_FILES['productImage']['tmp_name'];
        $uploadDir = '../../gam_produk/';

        // Pastikan direktori upload ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Acak nama file untuk menghindari duplikasi
        $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
        $uniqueFileName = uniqid('img_', true) . '.' . $ext;
        $targetFile = $uploadDir . $uniqueFileName;

        // Validasi dan upload file gambar
        if (move_uploaded_file($tmpName, $targetFile)) {
            // Siapkan query SQL untuk menyimpan data
            $query = "INSERT INTO produk (nama_produk, penjelasan_produk, gambar) VALUES (?, ?, ?)";

            // Gunakan prepared statement untuk keamanan
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('sss', $namaProduk, $deskripsiProduk, $uniqueFileName);

                // Eksekusi query
                if ($stmt->execute()) {
                    header('Location: ../produk.php');
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
                }

                // Tutup statement
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
        }
    }
    if (isset($_POST['tambahdatalayanan'])) {
        // Logika tambah data produk
        // Ambil data dari form
        $namalayanan = $_POST['layananName'];
        $deskripsilayanan = $_POST['layananDescription'];

        // Proses file gambar
        $namaFile = $_FILES['layananImage']['name'];
        $tmpName = $_FILES['layananImage']['tmp_name'];
        $uploadDir = '../../gam_layanan/';

        // Pastikan direktori upload ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Acak nama file untuk menghindari duplikasi
        $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
        $uniqueFileName = uniqid('img_', true) . '.' . $ext;
        $targetFile = $uploadDir . $uniqueFileName;

        // Validasi dan upload file gambar
        if (move_uploaded_file($tmpName, $targetFile)) {
            // Siapkan query SQL untuk menyimpan data
            $query = "INSERT INTO layanan (nama_layanan, penjelasan_layanan, gambar) VALUES (?, ?, ?)";

            // Gunakan prepared statement untuk keamanan
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('sss', $namalayanan, $deskripsilayanan, $uniqueFileName);

                // Eksekusi query
                if ($stmt->execute()) {
                    header('Location: ../layanan.php');
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
                }

                // Tutup statement
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
        }
    }
    if (isset($_POST['tambahdatasite'])) {
        // Logika tambah data produk
        // Ambil data dari form
        $siteCategory = $_POST['siteCategory'];
        $siteCount = $_POST['siteCount'];

            // Siapkan query SQL untuk menyimpan data
            $query = "INSERT INTO siteexp (category, count) VALUES (?, ?)";

            // Gunakan prepared statement untuk keamanan
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('si', $siteCategory, $siteCount);

                // Eksekusi query
                if ($stmt->execute()) {
                    header('Location: ../siteexp.php');
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
                }

                // Tutup statement
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
            }
    }


    if (isset($_POST['updatedatasite'])) {
        // Ambil data dari form
        $idSite = $_POST['id']; // ID data yang akan diupdate
        $siteCategory = $_POST['siteCategory'];
        $siteCount = $_POST['siteCount'];
    
        // Siapkan query SQL untuk mengupdate data
        $query = "UPDATE siteexp SET category = ?, count = ? WHERE no = ?";
    
        // Gunakan prepared statement untuk keamanan
        if ($stmt = $conn->prepare($query)) {
            // Gunakan 'sii' untuk tipe data (s = string, i = integer)
            $stmt->bind_param('sii', $siteCategory, $siteCount, $idSite);
    
            // Eksekusi query
            if ($stmt->execute()) {
                // Redirect ke halaman lain setelah berhasil update
                header('Location: ../siteexp.php?status=success');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
            }
    
            // Tutup statement
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
        }
    }
    if (isset($_POST['insert_project'])) {
        // Ambil data dari form
        $customer = $_POST['customer'];
        $periode = $_POST['periode'];
        $operator_provider = $_POST['operator_provider'];
        $area = $_POST['area'];
        $scope_of_works = $_POST['scope_of_works'];
    
        // Query untuk memasukkan data
        $query = "INSERT INTO project_experience (customer, periode, operator_provider, area, scope_of_works) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('sssss', $customer, $periode, $operator_provider, $area, $scope_of_works);
    
            // Eksekusi query
            if ($stmt->execute()) {
                header('Location: ../projectexp.php?status=insert_success');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Gagal menambah data: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
        }
    }
    
    
    if (isset($_POST['updatedataproduk'])) {
        // Logika update data produk
         // Ambil data dari form
         $idProduk = $_POST['id'];
         $namaProduk = $_POST['productName'];
         $deskripsiProduk = $_POST['productDescription'];
 
         // Proses file gambar jika ada
         if (!empty($_FILES['productImage']['name'])) {
             $namaFile = $_FILES['productImage']['name'];
             $tmpName = $_FILES['productImage']['tmp_name'];
             $uploadDir = '../../gam_produk/';
 
             // Pastikan direktori upload ada
             if (!is_dir($uploadDir)) {
                 mkdir($uploadDir, 0777, true);
             }
 
             // Acak nama file untuk menghindari duplikasi
             $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
             $uniqueFileName = uniqid('img_', true) . '.' . $ext;
             $targetFile = $uploadDir . $uniqueFileName;
 
             if (move_uploaded_file($tmpName, $targetFile)) {
                 // Siapkan query SQL untuk update dengan gambar
                 $query = "UPDATE produk SET nama_produk = ?, penjelasan_produk = ?, gambar = ? WHERE no = ?";
                 $params = [$namaProduk, $deskripsiProduk, $uniqueFileName, $idProduk];
             } else {
                 echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
                 exit;
             }
         } else {
             // Siapkan query SQL untuk update tanpa gambar
             $query = "UPDATE produk SET nama_produk = ?, penjelasan_produk = ? WHERE no = ?";
             $params = [$namaProduk, $deskripsiProduk, $idProduk];
         }
 
         // Gunakan prepared statement untuk keamanan
         if ($stmt = $conn->prepare($query)) {
             $stmt->bind_param(str_repeat('s', count($params) - 1) . 'i', ...$params);
 
             // Eksekusi query
             if ($stmt->execute()) {
                header('Location: ../produk.php');
                exit;
             } else {
                 echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
             }
 
             // Tutup statement
             $stmt->close();
         } else {
             echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
         }
    }

    if (isset($_POST['updatedatalayanan'])) {
        // Logika update data produk
         // Ambil data dari form
         $idlayanan = $_POST['id'];
         $namalayanan = $_POST['layananName'];
         $deskripsilayanan = $_POST['layananDescription'];
 
         // Proses file gambar jika ada
         if (!empty($_FILES['layananImage']['name'])) {
             $namaFile = $_FILES['layananImage']['name'];
             $tmpName = $_FILES['layananImage']['tmp_name'];
             $uploadDir = '../../gam_layanan/';
 
             // Pastikan direktori upload ada
             if (!is_dir($uploadDir)) {
                 mkdir($uploadDir, 0777, true);
             }
 
             // Acak nama file untuk menghindari duplikasi
             $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
             $uniqueFileName = uniqid('img_', true) . '.' . $ext;
             $targetFile = $uploadDir . $uniqueFileName;
 
             if (move_uploaded_file($tmpName, $targetFile)) {
                 // Siapkan query SQL untuk update dengan gambar
                 $query = "UPDATE layanan SET nama_layanan = ?, penjelasan_layanan = ?, gambar = ? WHERE no = ?";
                 $params = [$namalayanan, $deskripsilayanan, $uniqueFileName, $idlayanan];
             } else {
                 echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
                 exit;
             }
         } else {
             // Siapkan query SQL untuk update tanpa gambar
             $query = "UPDATE layanan SET nama_layanan = ?, penjelasan_layanan = ? WHERE no = ?";
             $params = [$namalayanan, $deskripsilayanan, $idlayanan];
         }
 
         // Gunakan prepared statement untuk keamanan
         if ($stmt = $conn->prepare($query)) {
             $stmt->bind_param(str_repeat('s', count($params) - 1) . 'i', ...$params);
 
             // Eksekusi query
             if ($stmt->execute()) {
                header('Location: ../layanan.php');
                exit;
             } else {
                 echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
             }
 
             // Tutup statement
             $stmt->close();
         } else {
             echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
         }
    }

    if (isset($_POST['update_project'])) {
        // Ambil data dari form
        $id = $_POST['id'];
        $customer = $_POST['customer'];
        $periode = $_POST['periode'];
        $operator_provider = $_POST['operator_provider'];
        $area = $_POST['area'];
        $scope_of_works = $_POST['scope_of_works'];
    
        // Query untuk mengupdate data
        $query = "UPDATE project_experience SET customer = ?, periode = ?, operator_provider = ?, area = ?, scope_of_works = ? WHERE id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('sssssi', $customer, $periode, $operator_provider, $area, $scope_of_works, $id);
    
            // Eksekusi query
            if ($stmt->execute()) {
                header('Location: ../projectexp.php?status=update_success');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Gagal memperbarui data: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
        }
    }
    $email = $_POST['id']; // ID atau email sebagai identifikasi unik
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah password diisi
    if (!empty($password)) {
        // Jika password diisi, hash password baru
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Query untuk memperbarui username dan password
        $query = "UPDATE users SET username = ?, password = ? WHERE email = ?";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('sss', $username, $hashedPassword, $email);

            // Eksekusi query
            if ($stmt->execute()) {
                header("Location: ../akun.php?status=update_success");
                $_SESSION['username'] = $username;
                exit;
            } else {
                echo "<div class='alert alert-danger'>Gagal memperbarui data: " . $stmt->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
        }
    } else {
        // Jika password kosong, gunakan password lama
        $query = "UPDATE users SET username = ? WHERE email = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('ss', $username, $email);

            // Eksekusi query
            if ($stmt->execute()) {
                header("Location: ../akun.php?status=update_success");
                $_SESSION['username'] = $username;
                exit;
            } else {
                echo "<div class='alert alert-danger'>Gagal memperbarui data: " . $stmt->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Gagal mempersiapkan query: " . $conn->error . "</div>";
        }
    }
    // Tutup koneksi
    $conn->close();
}
?>

<!-- Form HTML tetap di sini -->
