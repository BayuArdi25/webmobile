<?php
// Koneksi ke database
include 'config/config.php';

// Variabel untuk pesan error/sukses
$message = "";
$showModal = false; // Untuk menentukan apakah modal harus ditampilkan

// Periksa apakah tombol reset password diklik
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
        $showModal = true;
    } else {
        // Email tidak ditemukan
        $message = "<div class='alert alert-danger'>Email not found!</div>";
    }
}

// Periksa apakah password baru telah diset
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
            $message = "<div class='alert alert-danger'>Error updating password: " . $stmt->error . "</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>Passwords do not match!</div>";
        $showModal = true; // Tampilkan kembali modal untuk memperbaiki input
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">Enter your email below to reset your password!</p>
                                    </div>
                                    <?php echo $message; ?> <!-- Tampilkan pesan sukses/gagal -->
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Enter Email Address..." required>
                                        </div>
                                        <button type="submit" name="check_email" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Set Password Baru -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true" <?php if ($showModal) echo 'style="display:block;"'; ?>>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPasswordModalLabel">Set New Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email ?? '', ENT_QUOTES); ?>">
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirmPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="set_password" class="btn btn-primary">Save Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Tampilkan Modal Jika Dibutuhkan -->
    <?php if ($showModal): ?>
    <script>
        $(document).ready(function() {
            $('#resetPasswordModal').modal('show');
        });
    </script>
    <?php endif; ?>
</body>
</html>
