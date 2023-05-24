<?php
    session_start(); // memulai session
    // apabila log out ditekan
    if (isset($_POST['logout'])) {
        unset($_SESSION);
        session_destroy();          // menghancurkan sesi login
        echo "<p align=center> Anda telah berhasil Log Out.";
        echo "<p align=center> Silakan klik <a href='Login Screen.php'>disini</a> untuk login lagi.</p>";
        exit;
    }
    // setelah form diisi
    if (isset($_POST['email']) || isset($_POST['password'])) { 
        // apabila email dan password sesuai
        if ($_POST['email'] === "admin" && $_POST['password'] === "admin") {
            // masuk ke halaman login
            if (!isset($_SESSION['login'])) { ?>
                <html lang="en">
                <head>
                    <!-- Latest compiled and minified CSS -->
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

                    <!-- jQuery library -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

                    <!-- Latest compiled JavaScript -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

                    <style>
                        body {
                            background-color: #D0CCD0;
                        }
                        .form-control {
                            color: #fff;                              /* Mengatur warna */
                            border-color: #1E1F22;                    /* Mengatur warna border */
                        }
                        .btn {
                            width: 300px; /* Mengatur lebar tombol */
                        }
                        .btn-block {
                            display: block;
                            margin-left: auto;
                            margin-right: auto;
                        }
                    </style>

                    <title>Home Page</title>
                </head>
                <body>
                <div class="container p-5 vertical-center">     <!-- Mengatur container -->
                    <div class="row">
                    <div class="card mx-auto">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4"><strong>Selamat Datang Anda Berhasil Login</strong></h3>
                            <p style="color:#274156; text-align: center;">Klik <a href='full.php'>disini</a> untuk mengakses Menu</p>
                            <br>
                            <form method="post">
                                <button type="submit" class="btn btn-primary btn-block mb-3" name="logout">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
                </body>
                </html> <?php
            }
        } else { // jika email dan password tidak sesuai
            echo "<p align=center> <size=7px> Login gagal. Mohon periksa email dan/atau Password.</size=7px>";
            echo "<p align=center> <size=7px> Silakan klik <a href='Login Screen.php'>disini</a> untuk login lagi.</size=7px></p>";
        }
    } else { ?>
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
                    body {
                        background-color: #D0CCD0;
                    }
                    input[type="submit"] {
                        background-color: #1273EB; /*Mengganti warna pada box button submit*/
                        color: white;  /*Mengganti warna teks pada button submit*/
                    }
                </style>
                
                <!-- JavaScript untuk validasi form -->
                <script>
                    // Fungsi untuk validasi form
                    function validateForm() {
                        // Mengambil nilai dari inputan email dan password
                        var email = document.getElementById("email").value;
                        var pass = document.getElementById("password").value;
                        // Validasi inputan email dan password
                        if (email == "" || pass == "") { // Jika email dan password kosong
                            alert("Email dan Password harus diisi."); // Memunculkan pesan
                            document.getElementById("email").focus(); // Fokus ke inputan email
                            document.getElementById("email").select(); // Pilih semua teks yang ada di inputan email
                            return false; 
                        }
                        if (!/^[a-zA-Z]+$/.test(email) || !/^[a-zA-Z]+$/.test(pass)) { // Jika email dan password tidak berupa huruf
                            alert("email dan Password harus berupa huruf."); // Memunculkan pesan
                            document.getElementById("email").focus(); // Fokus ke inputan email
                            document.getElementById("email").select(); // Pilih semua teks yang ada di inputan email
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
                            <input class="form-control" type="text" name="email" id="email" style="margin-bottom: 10px;">
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
        </body>
        </html> <?php
    }
?>