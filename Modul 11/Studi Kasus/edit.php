<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Memuat file CSS dari library Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Memuat file jQuery dan JavaScript dari library Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        /* Mengatur warna font untuk elemen h3 */
        h3 {
            color: #274156;
        }

        /* Mengatur warna latar belakang untuk body */
        body {
            background-color: #D0CCD0;
        }

        /* Mengatur properti untuk elemen dengan kelas .form-control */
        .form-control {
            width: 400px; /* Mengatur lebar input */
            height: 30px; /* Mengatur tinggi input */
            font-size: 12px; /* Mengatur ukuran font */
            border-color: #1E1F22; /* Mengatur warna border */
        }

        /* Mengatur tata letak (layout) untuk elemen dengan kelas .form-floating */
        .form-floating {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Mengatur properti untuk elemen tombol */
        .btn {
            width: 300px; /* Mengatur lebar tombol */
        }

        /* Mengatur tata letak (layout) untuk elemen dengan kelas .btn-block */
        .btn-block {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <script>
    function confirmEdit() {
            return confirm("Apakah Anda yakin akan mengedit data ini? Yakin sudah benar?");
        }
    </script>
    <title>Mengedit Data</title>
</head>
    
<body>
    <?php
    include "koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nim = $_POST['NIM'];
        $nama = $_POST['NAMA'];
        $alamat = $_POST['ALAMAT'];

        // Mengupdate database
        $updateQuery = "UPDATE mahasiswa SET NAMA='$nama', ALAMAT='$alamat' WHERE NIM='$nim'";
        mysqli_query($koneksi, $updateQuery) or die(mysqli_error($koneksi));

        // Mengalihkan ke full.php (dashboard) lagi
        header("Location: full.php");
        exit();
    }

    $nim = $_GET['nim'];

    $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE NIM='$nim'") or die(mysqli_error($koneksi));
    $d = mysqli_fetch_array($data);
    ?>
    <!-- Mengatur container -->
    <div class="container p-5 vertical-center">     
        <div class="row">
            <div class="card mx-auto">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4"><strong>Edit Data Mahasiswa</strong></h3>
                    <p style="color: #1C6E8C; text-align: center;">Masukkan Data Mahasiswa yang Ingin Diedit</p>
                    <br>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-floating mb-3">
                            <!-- Membuat tempat input -->
                            <input type="hidden" class="form-control bg-custom" name="NIM" value="<?php echo $d['NIM']; ?>">
                            <label for="NAMA" style="font-size: 12px;">Nama</label>
                            <input type="text" class="form-control bg-custom" name="NAMA" value="<?php echo $d['NAMA']; ?>">
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <!-- Membuat tempat input -->
                            <label for="ALAMAT" style="font-size: 12px;">Alamat</label>
                            <input type="text" class="form-control bg-custom" name="ALAMAT" value="<?php echo $d['ALAMAT']; ?>">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block mb-3" onclick="confirmEdit()" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
