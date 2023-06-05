<?php
session_start();

// Memeriksa apakah form login telah disubmit
if (isset($_POST['submit'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $koneksi = mysqli_connect('localhost', 'root', '', 'db_tugasakhir1');
    if (!$koneksi) {
        die('koneksi gagal: ' . mysqli_connect_error());
    }

    // Membuat query untuk memeriksa kecocokan email dan password di tabel admin
    $query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa jumlah baris hasil query
    if (mysqli_num_rows($result) == 1) {
        // Jika ditemukan satu baris, berarti login berhasil
        $_SESSION['submit'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika tidak ditemukan baris yang cocok, berarti login gagal
        header("Location: login.php?error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Tugas Akhir</title>
</head>

<body>
    <div class="box">
        <video id="bg-video" src="bgregist.mp4" loop muted autoplay></video>
        <section>
            <div class="container">
                <div class="top">
                    <!-- Judul Form Login -->
                    <header> Account Login </header>
                </div>
                <!-- Form login -->
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
                        <input type="submit" class="submit" name="submit" value="Login">
                    </div>
                    <div class="or-text">
                        <span>or</span>
                    </div>
                    <a href="register.php" class="my-link">Create an Account</a>
                </form>
                <!-- Pesan kesalahan jika login gagal -->
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo '<p style="color: red;">Email atau password salah</p>';
                }
                ?>
            </div>
        </section>
    </div>
</body>

</html>
