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
                        <h1 class="main-header mb-4">ARSIP SURAT >> LIHAT</h1>
                        <?php 
                            include 'koneksi.php';
                            $id = $_GET['id'];
                            $data = mysqli_query($koneksi,"SELECT * FROM surat WHERE id='$id'");
                            while($tampil = mysqli_fetch_array($data)){
                        ?>
                        <div class="main-content">
                            <p>Nomor : <?php echo $tampil['nomor_surat']; ?></p>
                            <p>Kategori : <?php echo $tampil['kategori']; ?></p>
                            <p>Judul : <?php echo $tampil['judul']; ?></p>
                            <p>Waktu Unggah : <?php echo $tampil['waktu_pengarsipan']; ?></p>
                        </div>
                        <div class="main-image mt-4">
                            <iframe src="file/<?php echo $tampil['file']; ?>" width="100%" height="400" frameborder="0"></iframe>
                        </div>
                        <div class="main-button mt-4 mb-3">
                            <a href="index.php"><button class="btn btn-info btn-sm">Kembali</button></a>

                            <a style="text-decoration: none;" href="config/download.php?filename=<?php echo $tampil['file'];?>">
                                <button class="btn btn-success btn-sm">Unduh</button>
                            </a>

                            <a href="#"><button class="btn btn-warning btn-sm">Edit/Ganti File</button></a>
                        </div>
                        <?php 
                            }
                        ?>
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

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="src/scripts/script.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    </body>
</html>
