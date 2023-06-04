<?php
session_start(); //Membuka sesi untuk mengakses variabel sesi yang tersimpan.
session_destroy(); // Menghapus semua data yang terkait dengan sesi saat ini. 
header("Location: login.php"); //Mengarahkan pengguna ke halaman login.php setelah proses logout selesai.
exit(); //Menghentikan eksekusi skrip PHP lebih lanjut setelah mengarahkan pengguna ke halaman login.
?> 