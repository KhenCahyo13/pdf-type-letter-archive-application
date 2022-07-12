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
                        <h1 class="main-header mb-4">ARSIP SURAT >> UNGGAH</h1>
                        <p class="notes">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
                        <p class="note">Catatan :</p>
                        <li class="text-note">Gunakanlah file berformat PDF</li>
                        <form action="config/postpdf.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto label-surat">
                                  <label for="nomorSurat" class="col-form-label">Nomor Surat</label>
                                </div>
                                <div class="col-4">
                                  <input type="text" name="nomor_surat" id="nomorSurat" class="form-control" required>
                                </div>
                            </div>
                            <div class="mt-2 row g-3 align-items-center">
                                <div class="col-auto label-kategori">
                                  <label for="kategori" class="col-form-label">Kategori</label>
                                </div>
                                <div class="col-4">
                                    <select class="form-select" name="kategori" aria-label="Default select example" required>
                                        <option value="Undangan">Undangan</option>
                                        <option value="Pengumuman">Pengumuman</option>
                                        <option value="Nota Dinas">Nota Dinas</option>
                                        <option value="Pemberitahuan">Pemberitahuan</option>
                                      </select>
                                </div>
                            </div>
                            <div class="mt-2 row g-3 align-items-center">
                                <div class="col-auto label-judul">
                                  <label for="nomorSurat" class="col-form-label">Judul</label>
                                </div>
                                <div class="col-4">
                                  <input type="text" name="judul" id="judul" class="form-control" required>
                                </div>
                            </div>
                            <div class="mt-2 row g-3 align-items-center">
                                <div class="col-auto label-file">
                                  <label for="nomorSurat" class="col-form-label">File Surat (PDF)</label>
                                </div>
                                <div class="col-4">
                                  <input type="file" name="file" id="file" accept="application/pdf" class="form-control" required>
                                </div>
                            </div>
                            <div class="mt-5 mb-3 button-grup">
                                <a href="index.php" style="text-decoration: none;">
                                    <input type="button" class="btn btn-warning" value="Kembali">
                                </a>
                                    <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                            </div>
                        </form>
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
