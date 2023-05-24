<?php
    include "koneksi.php";
    $nim = $_POST['NIM'];
    $nama = $_POST['NAMA'];
    $alamat = $_POST['ALAMAT'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (NIM, NAMA, ALAMAT) VALUES ('$nim', '$nama', '$alamat')");
    
        if ($query) {
            $message = (object) [
                'type' => 'success',
                'text' => 'Data berhasil ditambahkan'
            ];
            header("location:full.php?pesan=update");
        } else {
            echo "Data gagal ditambahkan";
        }
?>