<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Data Mahasiswa</title>
    <style>
        h3{
            color:#274156;
        }
        body {
            background-color: #D0CCD0;
        }
        .form-control {
            width: 400px;                           /* Mengatur lebar input */
            height: 30px;                           /* Mengatur tinggi input */
            font-size: 12px;                        /* Mengatur ukuran font */
            border-color: #1E1F22;                  /* Mengatur warna border */
        }   
        .form-floating {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
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
    <script>
        function showConfirmation(nim) {
        var result = confirm("Apakah anda yakin ingin menghapus data?");

        if (result) {
            // Apabila iya
            window.location.href = 'hapus.php?nim=' + nim; // Redirect to hapus.php with the specified nim parameter
        } else {
            // Apabila tidak yakin
            return;
        }
        }
    </script>
</head>

<body>
<form method="post" action="update.php">
    <div class="container p-5 vertical-center">     <!-- Mengatur container -->
        <div class="row">
            <div class="card mx-auto">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4"><strong>Data Mahasiswa</strong></h3>
                    <p style="color: #1C6E8C; text-align: center;">Masukkan NIM, Nama dan Alamat lalu klik "Tambahkan"</p>
                    <br>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-floating mb-3">
                        <!-- Membuat tempat input -->
                        <label for="NIM" style="font-size: 12px;">NIM</label>
                        <input type="number" class="form-control bg-custom" name="NIM">
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <!-- Membuat tempat input -->
                        <label for="NAMA" style="font-size: 12px;">Nama</label>
                        <input type="text" class="form-control bg-custom" name="NAMA">
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <!-- Membuat tempat input -->
                        <label for="ALAMAT" style="font-size: 12px;">Alamat</label>
                        <input type="text" class="form-control bg-custom" name="ALAMAT">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
        <br>
        
    <h5 align="center">Menampilkan Data Mahasiswa</h5>
    <table border="1" align="center" cellspacing="10" cellpadding="15">
        <tr>
            <th width="20">No</th>
            <th width="100">NIM</th>
            <th width="200">Nama</th>
            <th width="200">Alamat</th>
            <th width="80">Menu</th>
        </tr>
        <?php
        include ("koneksi.php");
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * from mahasiswa");
        while($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NIM']; ?></td>
                <td><?php echo $d['NAMA']; ?></td>
                <td><?php echo $d['ALAMAT']; ?></td>
                <td>
                    <a href="edit.php?nim=<?php echo $d['NIM']; ?>">Edit</a>
                    <a href="#" onclick="showConfirmation('<?php echo $d['NIM']; ?>')">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>