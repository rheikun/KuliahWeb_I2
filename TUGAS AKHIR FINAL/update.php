<?php
include 'koneksi.php';

if (isset($_POST['NIM'])) {
    $nim = $_POST['NIM'];
    $nama = $_POST['Nama'];
    $prodi = $_POST['Prodi'];
    $gender = $_POST['Gender'];
    $statusmhs = $_POST['StatusMhs'];
    $alamat = $_POST['Alamat'];

    // Mengupdate database
    $updateQuery = "UPDATE mahasiswa SET Nama='$nama', Prodi='$prodi', Gender ='$gender', StatusMhs='$statusmhs', Alamat='$alamat' WHERE NIM='$nim'";
    mysqli_query($koneksi, $updateQuery) or die(mysqli_error($koneksi));
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil diperbarui.";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Gagal memperbarui data.";
        header("Location: dashboard.php");
        exit();
    }
}
?>