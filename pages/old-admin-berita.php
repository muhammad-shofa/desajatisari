<?php

session_start();

// get data berita
$sql_berita = $select->selectTable($table_name = "berita");
$result = $connected->query($sql_berita);

// posting
if (isset($_POST['posting'])) {
    $judul = $_POST['judul_berita'];
    $penulis = $_POST['penulis_berita'];
    // $gambar = $_POST['gambar_berita'];
    $isi = $_POST['isi_berita'];
    $tanggal_publish = $_POST['tanggal_publish'];

    // $gambar_fix = addslashes(file_get_contents($_FILES["gambar_berita"]["tmp_name"]));
    // $sql = "INSERT INTO images (image) VALUES ('$file')";

    //
    // Lokasi penyimpanan file yang diunggah
    $target_dir = "../assets/uploads/";
    // Nama file gambar setelah diunggah
    $target_file = $target_dir . basename($_FILES["gambar_berita"]["name"]);

    // Periksa apakah file gambar sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file gambar sudah ada.";
    } else {
        // Pindahkan file gambar ke lokasi penyimpanan
        if (move_uploaded_file($_FILES["gambar_berita"]["tmp_name"], $target_file)) {
            echo "File gambar " . basename($_FILES["gambar_berita"]["name"]) . " berhasil diunggah.";
            // Simpan lokasi file gambar ke dalam database
            $gambar_path = $target_file;
            // Lakukan koneksi ke database dan jalankan query INSERT untuk menyimpan lokasi file gambar ke dalam tabel
            // Contoh:
            // $sql_gambar_berita = $insert->selectTable($table_name = "berita", $condition = "(gambar) VALUES ('$gambar_path')");
            // $connected->query($sql_gambar_berita);
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file gambar.";
        }
    }

    //

    $sql_posting = $insert->selectTable($table_name = "berita", $condition = "(judul, penulis, gambar, isi, tanggal_publish) VALUES
    ('$judul', '$penulis', '$gambar_path', '$isi', '$tanggal_publish')");
    $result_posting = $connected->query($sql_posting);
    if ($result_posting) {
        header("location: admin-berita.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Desa Jatisari | Berita</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- navbar start -->
        <?php include "../layout/navbar-dashboard.php" ?>
        <!-- navbar end -->

        <!-- sidebar start -->
        <?php include "../layout/sidebar.php" ?>
        <!-- sidebar end -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Berita</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Berita</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- card start -->
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                Tambah Berita
                            </button>
                            <!-- modal tambah berita start -->
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="admin-berita.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Berita Baru</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="judul_berita">Judul</label>
                                                        <input type="text" class="form-control" id="judul_berita"
                                                            name="judul_berita" placeholder="Masukan Judul berita"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penulis_berita">Penulis</label>
                                                        <input type="text" class="form-control" id="penulis_berita"
                                                            name="penulis_berita" value="<?= $_SESSION['username'] ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gambar_berita">Gambar</label>
                                                        <input type="file" class="form-control" id="gambar_berita"
                                                            name="gambar_berita" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="isi_berita">isi</label>
                                                        <textarea type="text" class="form-control" id="isi_berita"
                                                            name="isi_berita" placeholder="Masukan content berita"
                                                            required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_publish">Tanggal Publish</label>
                                                        <input type="date" class="form-control" id="tanggal_publish"
                                                            name="tanggal_publish" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="submit" class="btn btn-primary"
                                                    name="posting">Posting</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- modal tambah berita end -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- card berita start -->
                            <div class="container container-fluid d-flex justify-content-start flex-wrap">
                                <?php if ($result) { ?>
                                    <?php while ($data_berita = $result->fetch_assoc()) { ?>
                                        <!-- card start -->
                                        <div class="card m-2" style="width: 18rem">
                                            <img src="data:image/jpeg;base64,<?= base64_encode($data_berita['gambar']) ?>"
                                                class="card-img-top" alt="sawah" />
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="#" class="link-underline link-underline-opacity-0 text-dark">
                                                        <?= $data_berita["judul"] ?>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- card end -->
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <!-- card berita end -->
                        </div>
                    </div>
                    <!-- card end -->
                </div>
            </section>
        </div>
    </div>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>