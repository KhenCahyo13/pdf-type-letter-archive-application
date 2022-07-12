<?php 
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>APLIKASI PDF</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="src/styles/style.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Aplikasi PDF</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sidenav-header">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                HOME
                            </a>
                            <a class="nav-link" href="about.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                                ABOUT
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="main-header">ARSIP SURAT</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="main-text">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
                            Klik "Lihat" pada kolom aksi untuk menampilkan surat.
                            </li>
                        </ol>
                        <!-- Alert Berhasil/Gagal -->
                        <?php 
                            if(isset($_GET['alert'])){
                                if($_GET['alert'] == 'gagal_upload'){
                                    ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                                        <h4><i class="fa-solid fa-triangle-exclamation"></i> Peringatan !</h4>
                                        Ekstensi Tidak Diperbolehkan Silahkan Cek Kembali Ekstensi Anda
                                    </div>
                                    <?php
                                } else if($_GET['alert'] == 'berhasil_upload'){
                                    ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                                            <h4><i class="fa-solid fa-circle-check"></i> Berhasil !</h4>
                                            Surat Anda Berhasil Diarsipkan Ke Halaman Utama
                                        </div>
                                    <?php
                                } else if($_GET['alert'] == 'file_tidak_ditemukan'){
                                    ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                                            <h4><i class="fa-solid fa-triangle-exclamation"></i> Tidak Ditemukan !</h4>
                                            Maaf, File Yang Anda Unduh Tidak Ditemukan
                                        </div>
                                    <?php
                                } else if($_GET['alert'] == 'berhasil_dihapus'){
                                    ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                                            <h4><i class="fa-solid fa-circle-check"></i> Berhasil !</h4>
                                            Data Anda Berhasil Dihapus
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                         <!-- Navbar Search-->
                        <form action="" method="GET" class="search-input">
                            <label for="searchInput" class="form-label">Cari Surat:</label>
                            <input type="text" name="cari" class="form-control" placeholder="&#128269; search...">
                            <input type="submit" value="Cari" class="btn btn-success">
                        </form>
                        <!-- Teks Pencarian -->
                        <?php 
                            if(isset($_GET['cari'])){
	                        $cari = $_GET['cari'];
	                        echo "<b>Hasil Pencarian : ".$cari."</b>";
                        }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Arsip Surat
                            </div>
                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Pengarsipan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Menampilkan Data & Search Data -->
                                    <?php
                                    
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        $data = mysqli_query($koneksi,"SELECT * FROM surat WHERE nomor_surat LIKE '%".$cari."%' or kategori LIKE '%".$cari."%' or judul LIKE '%".$cari."%' or waktu_pengarsipan LIKE '%".$cari."%' ");				
                                    }else{
                                        $data = mysqli_query($koneksi,"SELECT * FROM surat");		
                                    }

                                        $no = 1;
                                        while($tampil = mysqli_fetch_array($data)){
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $tampil['nomor_surat']; ?></td>
                                            <td><?php echo $tampil['kategori']; ?></td>
                                            <td><?php echo $tampil['judul']; ?></td>
                                            <td><?php echo $tampil['waktu_pengarsipan']; ?></td>
                                            <td>
                                                <!-- Hapus -->
                                                <a style="text-decoration: none;" href="config/hapus.php?id=<?php echo $tampil['id']; ?>">
                                                    <button onclick="return confirm('Anda Yakin Ingin Menghapus Data.?')" class="btn btn-danger btn-sm">Hapus</button>
                                                </a>
                                                <!-- Unduh -->
                                                <a style="text-decoration: none;" href="config/download.php?filename=<?php echo $tampil['file'];?>">
                                                    <button class="btn btn-warning btn-sm">Unduh</button>
                                                </a>
                                                <!-- Lihat -->
                                                <a style="text-decoration: none;" href="lihat.php?id=<?php echo $tampil['id']; ?>">
                                                    <button class="btn btn-primary btn-sm">Lihat</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="arsip.php"><button class="btn btn-danger">Arsipkan Surat</button></a>
                                <!-- <div class="right-btn">
                                    <button class="btn btn-primary">Tambah Surat</button>
                                    <button class="btn btn-warning">Edit Surat</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Aplikasi PDF 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/255fd51aa4.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="src/scripts/script.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    </body>
</html>
