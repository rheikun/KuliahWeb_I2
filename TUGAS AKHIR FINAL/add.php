<?php
if (isset($_POST['submit_data'])) { //Memeriksa apakah tombol dengan atribut name="submit_data" telah dikirim dalam permintaan POST
    $nim = $_POST['NIM']; //Mengambil nilai yang dikirim melalui metode POST dengan nama elemen 'NIM' dari formulir yang dikirim
    $nama = $_POST['Nama']; //Mengambil nilai yang dikirim melalui metode POST dengan nama elemen 'Nama' dari formulir yang dikirim
    $prodi = $_POST['Prodi']; //Mengambil nilai yang dikirim melalui metode POST dengan nama elemen 'Prodi' dari formulir yang dikirim
    $gender = $_POST['Gender']; //Mengambil nilai yang dikirim melalui metode POST dengan nama elemen 'Gender' dari formulir yang dikirim
    $statusmhs = $_POST['StatusMhs']; //Mengambil nilai yang dikirim melalui metode POST dengan nama elemen 'StatusMhs' dari formulir yang dikirim
    $alamat = $_POST['Alamat']; //Mengambil nilai yang dikirim melalui metode POST dengan nama elemen 'Alamat' dari formulir yang dikirim


    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "db_tugasakhir1") or die("Koneksi gagal");

    // Query tambah mahasiswa
    $query = "INSERT INTO mahasiswa (NIM, Nama, Prodi, Gender, StatusMhs, Alamat) VALUES ('$nim', '$nama', '$prodi', '$gender', '$statusmhs', '$alamat')";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek jika proses tambah data berhasil
    if ($result) {
        // Redirect ke homepage.php dengan parameter success
        header("Location: dashboard.php?status=success");
        exit;
    } else {
        // Jika proses tambah data gagal
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="add.css" type="text/css">
    <title>Menambahkan Data</title>
    <script>
        function confirmAdd() {
            return confirm("Apakah Anda yakin akan menambahkan data?");
        }
    </script>
</head>

<body>
    <video id="bg-video" src="bgyellow.mp4" loop muted autoplay></video>
    <div class="box">
        <div class="content">
                <div class="container"> <!-- Mengatur container -->
                    <div class="row">
                        <div class="card mx-auto">
                            <div class="card-body p-5">
                                <h2 class="text-center mb-4"><strong>Data Mahasiswa</strong></h2>
                                <p style="font-size: 16px; color: white; text-align: center;">Masukkan Data lalu klik "Tambahkan"</p>
                                <br>
                                <form action="add.php" method="POST">
                                    <div class="form-floating mb-3">
                                        <!-- Membuat tempat input -->
                                        <label for="NIM" style="font-size: 16px;">NIM</label>
                                        <input type="number" class="form-control oval-input" name="NIM" placeholder="   NIM">
                                    </div>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <!-- Membuat tempat input -->
                                        <label for="Nama" style="font-size: 16px; ">Nama</label>
                                        <input type="text" class="form-control oval-input" name="Nama" placeholder="Nama">
                                    </div>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <!-- Membuat tempat input -->
                                        <label for="Prodi" style="font-size: 16px;">Prodi</label>
                                        <input type="text" class="form-control oval-input" name="Prodi" placeholder="Contoh : S1 Teknologi Informasi">
                                    </div>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <!-- Membuat tempat input -->
                                        <label for="Gender" style="font-size: 16px;">Jenis Kelamin</label>
                                        <input type="text" class="form-control oval-input" name="Gender" placeholder="Laki-Laki atau Perempuan">
                                    </div>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <!-- Membuat tempat input -->
                                        <label for="StatusMhs" style="font-size: 16px;" >Status Mahasiswa</label>
                                        <input type="text" class="form-control oval-input" name="StatusMhs" placeholder="Aktif atau Tidak Aktif">
                                    </div>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <!-- Membuat tempat input -->
                                        <label for="Alamat" style="font-size: 16px;">Alamat</label>
                                        <input type="text" class="form-control oval-input" name="Alamat" placeholder="Alamat">
                                    </div>
                                    <br>
                                    <div style="text-align: center;">
                                        <button type="submit" class="btn btn-primary btn-block mb-3 custom-button" onclick="confirmAdd()" name="submit_data">Tambahkan</button>
                                    </div>
                                    <div style="text-align: right;">
                                        <a href="dashboard.php" button type="submit" class="btn btn-success">Kembali ke Dashboard</a>
                                    </div>
                                </form>
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