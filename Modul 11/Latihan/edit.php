<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mengedit Data</title>
</head>

<body>
    <div class="judul">
        <h1>Edit Data</h1>
    </div>

    <br>

    <a href="full.php">Lihat Semua Data</a>
    
    <br>
    <h3>Edit Data</h3>

    <?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE NIM='$nim'") or die();
    $no = 1;
    while($d = mysqli_fetch_array($data)) {
        ?>
        <form action="update.php" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="nim" value="<?php echo $d['NIM'] ?>">
                        <input type="text" name="Nama" value="<?php echo $d['Nama'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="Alamat" value="<?php echo $d['Alamat'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php } ?>
</body>
</html>