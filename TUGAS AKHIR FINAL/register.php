<?php
session_start();

$error = "";

if (isset($_POST['register'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "db_tugasakhir1");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Mengecek apakah email sudah terdaftar
    $checkQuery = "SELECT * FROM admin WHERE Email = '$email'";
    $checkResult = mysqli_query($koneksi, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Jika email sudah terdaftar, simpan pesan kesalahan
        $error = "Email sudah terdaftar. Silakan gunakan email lain yang belum terdaftar.";
    } else {
        // Jika email belum terdaftar, lakukan proses registrasi
        $insertQuery = "INSERT INTO admin (Email, Password) VALUES ('$email', '$password')";
        $insertResult = mysqli_query($koneksi, $insertQuery);

        if ($insertResult) {
            // Registrasi berhasil, redirect ke halaman login
            header("Location: login.php");
            exit();
        } else {
            // Registrasi gagal, simpan pesan kesalahan
            $error = "Registrasi gagal. Silakan coba lagi.";
        }
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Tugas Akhir</title>
</head>

<body>
    <div class="box">
        <video id="bg-video" src="bg2.mp4" loop muted autoplay></video>
        <section>
            <div class="container">
                <div class="top">
                    <!-- Judul Form Register -->
                    <header> Create an Account </header>
                </div>
                <!-- Form Register -->
                <form id="login-form" method="POST" action="">
                    <div class="input-field">
                        <!-- Input Email -->
                        <input type="text" class="input" name="Email" placeholder="Email" id="email">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <!-- Input Password -->
                        <input type="password" class="input" name="Password" placeholder="Password" id="password">
                        <i class='bx bx-lock-alt'></i>
                    </div>
                    <div class="input-field">
                        <!-- Tombol Submit -->
                        <input type="submit" class="submit" name="register" value="Register">
                    </div>
                    <!-- Pesan kesalahan jika terdapat error -->
                    <?php if (!empty($error)): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </section>
    </div>
</body>

</html>
