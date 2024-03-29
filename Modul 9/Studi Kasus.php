<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tag untuk karakter set, kompatibilitas, dan tampilan pada perangkat berbeda -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Studi Kasus</title>

        <!-- Memuat file CSS dari library Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Memuat file jQuery dan JavaScript dari library Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
        <title>Login Page</title>

        <!-- CSS untuk mengubah warna tombol submit -->
        <style>
            input[type="submit"] {
                background-color: #1273EB; /*Mengganti warna pada box button submit*/
                color: white;  /*Mengganti warna teks pada button submit*/
            }
        </style>
        
        <!-- JavaScript untuk validasi form -->
        <script>
            // Fungsi untuk validasi form
            function validateForm() {
                // Mengambil nilai dari inputan username dan password
                var uname = document.getElementById("username").value;
                var pass = document.getElementById("password").value;
                // Validasi inputan username dan password
                if (uname == "" || pass == "") { // Jika username dan password kosong
                    alert("ID/Username dan Password harus diisi."); // Memunculkan pesan
                    document.getElementById("username").focus(); // Fokus ke inputan username
                    document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                    return false; 
                }
                if (!/^[a-zA-Z]+$/.test(uname) || !/^[a-zA-Z]+$/.test(pass)) { // Jika username dan password tidak berupa huruf
                    alert("Username dan Password harus berupa huruf."); // Memunculkan pesan
                    document.getElementById("username").focus(); // Fokus ke inputan username
                    document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                    return false; 
                }
                return true;
            }
        </script>
</head>
<body>
    <!-- Form HTML sederhana -->
    <div class="container text-center col-12 col-md-8 col-lg-3">
        <h1 style="margin-top: 20px; margin-bottom: 15px; color:#374957;">Log in</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
            <div class="container text-center">
                <div>
                    <p style="text-align: left; color:#5F7D95;">Email</p>
                    <input class="form-control" type="text" name="username" id="username" style="margin-bottom: 10px;">
                </div>
                <div>
                    <p style="text-align: left; color:#5F7D95;">Password</p>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
            </div>
            <br>
            <label style="display: flex; align-items: center; color: #374957; font-size: 16px;">
            <input type="checkbox" name="checkbox" value="Stay Logged In" style="margin-right: 10px;"> 
            <span style="margin-right: 5px;">Stay logged in</span>
            </label>

            <input type="submit" value="Log In" style="margin-top: 20px; margin-bottom: 30px; width: 350px; height: 35px; outline: none;">
        </form>
    </div>

    <!-- PHP -->
    <?php
        // jika form sudah diisi
        if (isset($_POST['nama']) || isset($_POST['password'])) { 
            // jika username dan password sesuai dengan ketentuan
            if ($_POST['username'] === "admin" && $_POST['password'] === "admin") {
                // memunculkan pesan login berhasil
                echo "<p align=center> <font color=green size=3px> Welcome, " . $_POST['username'] . "!";
            } else { // jika username dan password tidak sesuai dengan ketentuan
                // memunculkan pesan login gagal
                echo "<p align=center> <font color=red size=3px> Login failed.";
            }
        }
    ?>
</body>
</html>