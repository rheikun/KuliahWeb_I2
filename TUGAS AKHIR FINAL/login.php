<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $koneksi = mysqli_connect('localhost', 'root', '', 'db_tugasakhir');
    if (!$koneksi) {
        die('koneksi gagal: ' . mysqli_connect_error());
    }

    $query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['Email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
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
        <video id="bg-video" src="bglogin.mp4" loop muted autoplay></video>
        <section>
            <div class="container">
                <div class="top">
                    <header> Log in </header>
                </div>
                <form id="login-form" method="POST" action="">
                    <div class="input-field">
                        <input type="text" class="input" name="Email" placeholder="Email" id="email">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" name="Password" placeholder="Password" id="password">
                        <i class='bx bx-lock-alt'></i>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" name="submit" value="Login">
                    </div>
                </form>
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
