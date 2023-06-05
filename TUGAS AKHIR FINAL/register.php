<?php
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "db_buku");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Mengecek apakah username sudah terdaftar
    $checkQuery = "SELECT * FROM user WHERE username = '$username'";
    $checkResult = mysqli_query($koneksi, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Jika username sudah terdaftar, tampilkan pesan kesalahan
        echo "Username sudah terdaftar. Silakan gunakan username lain.";
    } else {
        // Jika username belum terdaftar, lakukan proses registrasi
        $insertQuery = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $insertResult = mysqli_query($koneksi, $insertQuery);

        if ($insertResult) {
            // Registrasi berhasil, redirect ke halaman login
            header("Location: login.php");
            exit();
        } else {
            // Registrasi gagal, tampilkan pesan kesalahan
            echo "Registrasi gagal. Silakan coba lagi.";
        }
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>