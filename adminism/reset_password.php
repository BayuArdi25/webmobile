<?php
// Koneksi ke database
include 'config/config.php';

if (isset($_POST['check_email'])) {
    $email = $_POST['email'];

    // Periksa apakah email ada di database
    $query = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email valid, tampilkan modal
        echo "<script>
                document.getElementById('hiddenEmail').value = '$email';
                $('#resetPasswordModal').modal('show');
              </script>";
    } else {
        // Email tidak ditemukan
        echo "<div class='alert alert-danger'>Email not found!</div>";
    }
}
if (isset($_POST['set_password'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Periksa apakah password cocok
    if ($new_password === $confirm_password) {
        // Hash password baru
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update password di database
        $query = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $hashed_password, $email);

        if ($stmt->execute()) {
            // Redirect ke halaman login setelah berhasil
            header('Location: login.php?status=password_reset');
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error updating password: " . $stmt->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Passwords do not match!</div>";
    }
}

?>
