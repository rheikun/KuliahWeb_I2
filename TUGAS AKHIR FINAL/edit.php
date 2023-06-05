<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="edit.css" type="text/css">
    <title>Edit Data</title>
    <script>
        function confirmEdit() {
            return confirm("Apakah Anda yakin akan mengedit data ini? Yakin sudah benar?");
        }
    </script>
</head>

<body>
    <?php
    include "koneksi.php";

    // Memeriksa jika metode permintaan adalah POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nim = $_POST['NIM'];
        $nama = $_POST['Nama'];
        $prodi = $_POST['Prodi'];
        $gender = $_POST['Gender'];
        $statusmhs = $_POST['StatusMhs'];
        $alamat = $_POST['Alamat'];

        // Mengupdate database
        $updateQuery = "UPDATE mahasiswa SET Nama='$nama', Prodi='$prodi', Gender ='$gender', StatusMhs='$statusmhs', Alamat='$alamat' WHERE NIM='$nim'";
        mysqli_query($koneksi, $updateQuery) or die(mysqli_error($koneksi));

        // Mengalihkan ke dashboard lagi
        header("Location: dashboard.php");
        exit();
    }

    $nim = $_GET['NIM'];

    $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE NIM='$nim'") or die(mysqli_error($koneksi));
    $d = mysqli_fetch_array($data);
    ?>

    <video id="bg-video" src="bgvid.mp4" loop muted autoplay></video>
    <div class="box">
        <div class="content">
            <div class="container p-5 vertical-center"> <!-- Mengatur container -->
                <div class="row">
                    <div class="card mx-auto">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4"><strong>Data Mahasiswa</strong></h2>
                            <p style="font-size: 16px; color: white; text-align: center;">Masukkan Data lalu klik "Tambahkan"</p>
                            <br>
                            <form method="POST" action="edit.php">
                                <div class="form-floating mb-3">
                                    <!-- Membuat tempat input -->
                                    <input type="hidden" class="form-control oval-input" name="NIM" value="<?php echo $d['NIM']; ?>">
                                    <label for="Nama" style="font-size: 16px;">Nama</label>
                                    <input type="text" class="form-control oval-input" name="Nama" value="<?php echo $d['Nama']; ?>">
                                </div>
                                <br>
                                <div class="form-floating mb-3">
                                    <!-- Membuat tempat input -->
                                    <label for="Prodi" style="font-size: 16px;">Prodi</label>
                                    <input type="text" class="form-control oval-input" name="Prodi" value="<?php echo $d['Prodi']; ?>">
                                </div>
                                <br>
                                <div class="form-floating mb-3">
                                    <!-- Membuat tempat input -->
                                    <label for="Gender" style="font-size: 16px;">Jenis Kelamin</label>
                                    <input type="text" class="form-control oval-input" name="Gender" value="<?php echo $d['Gender']; ?>">
                                </div>
                                <br>
                                <div class="form-floating mb-3">
                                    <!-- Membuat tempat input -->
                                    <label for="StatusMhs" style="font-size: 16px;">Status Mahasiswa</label>
                                    <input type="text" class="form-control oval-input" name="StatusMhs" value="<?php echo $d['StatusMhs']; ?>">
                                </div>
                                <br>
                                <div class="form-floating mb-3">
                                    <!-- Membuat tempat input -->
                                    <label for="Alamat" style="font-size: 16px;">Alamat</label>
                                    <input type="text" class="form-control oval-input" name="Alamat" value="<?php echo $d['Alamat']; ?>">
                                </div>
                                <br>
                                <div style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-block mb-3 custom-button" onclick="confirmEdit()" name="submit_data">Simpan</button>
                                </div>
                            </form>
                            <div style="text-align: right;">
                                <a href="dashboard.php" button type="submit" style="margin-top: 90px;" class="btn btn-success">Kembali ke Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>