<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css" type="text/css">
    <title>Dashboard</title>
</head>
<body>
    <video id="bg-video" src="bgvid.mp4" loop muted autoplay></video>
    <div class="content">
    <header style="display: flex; justify-content: space-between; align-items: center;">
    <h3 class="mt-4" style="text-align: center; color: white; font-weight: bold; margin: 0; flex: 1;">Menampilkan Data Mahasiswa</h3>
    <a href="logout.php" class="btn btn-outline-light mt-4" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
    </header>
    <br>
    <table class="table table-striped" style="background-color: rgba(200, 255, 255, 0.1);">
        <thead>
            <tr>
                <th style="text-align: center;" scope="col">No.</th>
                <th style="text-align: center;" scope="col">NIM</th>
                <th style="text-align: center;" scope="col">Nama</th>
                <th style="text-align: center;" scope="col">Prodi</th>
                <th style="text-align: center;" scope="col">Jenis Kelamin</th>
                <th style="text-align: center;" scope="col">Status</th>
                <th style="text-align: center;" scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

            // Cek jika parameter status bernilai success
            if (isset($_GET['status']) && $_GET['status'] === 'success') {
                echo '<div class="alert alert-success">Data berhasil ditambahkan.</div>';
            }

            while ($d = mysqli_fetch_array($data)) {
            ?>
            
                <tr>
                    <td style="text-align: center; color: white;"><?php echo $no++; ?></td>
                    <td style="text-align: center; color: white;"><?php echo $d['NIM']; ?></td>
                    <td style="text-align: center; color: white;"><?php echo $d['Nama']; ?></td>
                    <td style="text-align: center; color: white;"><?php echo $d['Prodi']; ?></td>
                    <td style="text-align: center; color: white;"><?php echo $d['Gender']; ?></td>
                    <td style="text-align: center; color: white;"><?php echo $d['StatusMhs']; ?></td>
                    <td style="text-align: center; color: white;"><?php echo $d['Alamat']; ?></td>
                    <td>
                    <a href="edit.php?NIM=<?php echo $d["NIM"]; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?NIM=<?php echo $d["NIM"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="add.php" class="btn btn-primary btn-block mb-3">Tambahkan Data</a>
    </div>
</body>
</html>