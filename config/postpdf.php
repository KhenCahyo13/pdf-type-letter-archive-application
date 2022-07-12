<?php
include '../koneksi.php';
$nomor_surat = $_POST['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$formatTanggal = date('Y-m-d H:i:s');

$allowedExts = array("pdf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"],"../file/" . $_FILES["file"]["name"]);
$sql=mysqli_query($koneksi,"INSERT INTO surat VALUES(NULL,'$nomor_surat', '$kategori', '$judul', '$upload_pdf','$formatTanggal')");
if($sql){
	header("location:../index.php?alert=berhasil_upload");
}
else{
	header("location:../index.php?alert=gagal_upload");
}
?>