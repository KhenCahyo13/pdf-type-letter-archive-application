<?php 
    include '../koneksi.php';

    // Menangkap data id yang dikirim dari URL
    $id = $_GET['id'];

    // Pilih data yang akan dihapus berdasar id
    $sql1 = mysqli_query($koneksi,"SELECT * FROM surat WHERE id='$id'");
    $data = mysqli_fetch_array($sql1);

    // Eksekusi Hapus Data
    $sql2 = mysqli_query($koneksi, "DELETE FROM surat WHERE id='$id'");

    // Direktori Penyimpanan
    $path = "../file/".$data['file'];

    // Cek File
    if(file_exists($path)){
        unlink($path);
    }

    // Mengalihkan Halaman kembali ke index.php
    header('location:../index.php?alert=berhasil_dihapus');
?>