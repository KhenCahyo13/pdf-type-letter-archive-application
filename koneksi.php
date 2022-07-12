<?php 
    $koneksi = mysqli_connect('localhost','root','','apk_pdf');

    // Cek Koneksi
    if(mysqli_connect_errno()){
        echo "Koneksi Database Gagal :" . mysqli_connect_errno();
    }
?>