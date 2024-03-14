<?php

include "../service/connection.php";
include "../service/select.php";
include "../service/update.php";
session_start();

// $messsage_dibaca = "";

// check login and role
if ($_SESSION["is_login"] == false && $_SESSION["role"] != 'Admin') {
    header("location: ../index.php");
    exit;
}

// sql readed
if (isset($_POST["tandai-dibaca"])) {
    $pengaduan_id = $_POST["target_pengaduan_id"];
    $sql_readed = $update->selectTable($table_name = "pengaduan", $condition = "status_dibaca='Sudah' WHERE pengaduan_id = $pengaduan_id");
    $result_readed = $connected->query($sql_readed);
    if ($result_readed) {
        header("location: admin-pengaduan.php");
        exit;
    }
}

// sql pengaduan
$sql_pengaduan = $select->selectTable($table_name = "pengaduan", $fields = "*");
$result_pengaduan = $connected->query($sql_pengaduan);

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
    <title>AdminLTE 3 | Dashboard</title>

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

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pengaduan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Container starts -->
                    <!-- pengaduan start -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Pengaduan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pengirim</th>
                                        <th>Judul</th>
                                        <th>Aduan</th>
                                        <th>Status Dibaca</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_pengaduan->num_rows > 0) { ?>
                                        <?php while ($data_pengaduan = $result_pengaduan->fetch_assoc()) { ?>
                                            <tr>
                                                <td>
                                                    <?= $data_pengaduan["pengaduan_id"] ?>
                                                </td>
                                                <td>
                                                    <?= $data_pengaduan["pengirim"] ?>
                                                </td>
                                                <td>
                                                    <?= $data_pengaduan["judul"] ?>
                                                </td>
                                                <td>
                                                    <?php if (strlen($data_pengaduan["aduan"]) >= 20) {
                                                        $new_string = substr($data_pengaduan["aduan"], 0, 20) . "...";
                                                        echo $new_string;
                                                    } else {
                                                        $new_string = substr($data_pengaduan["aduan"], 0, 20) . "...";
                                                        echo $new_string;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?= $data_pengaduan["status_dibaca"] ?>
                                                </td>
                                                <td>
                                                    <?= $data_pengaduan["tanggal_pengaduan"] ?>
                                                </td>
                                                <td>
                                                    <?php if ($data_pengaduan["status_dibaca"] == "Belum") { ?>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#modal-pengaduan-<?= $data_pengaduan["pengaduan_id"] ?>">
                                                            Baca
                                                        </button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#modal-pengaduan-<?= $data_pengaduan["pengaduan_id"] ?>">
                                                            Detail
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <!-- modal start -->
                                            <div class="modal fade" id="modal-pengaduan-<?= $data_pengaduan["pengaduan_id"] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                <?= $data_pengaduan["judul"] ?>
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                ID :<br>
                                                                <?= $data_pengaduan['pengaduan_id'] ?>
                                                            </p>
                                                            <p>
                                                                Judul :<br>
                                                                <?= $data_pengaduan['judul'] ?>
                                                            </p>
                                                            <p>
                                                                Pengirim :<br>
                                                                <?= $data_pengaduan['pengirim'] ?>
                                                            </p>
                                                            <p>
                                                                Teks Aduan :<br>
                                                                <?= $data_pengaduan["aduan"] ?>
                                                            </p>
                                                            <p>
                                                                Status dibaca :<br>
                                                                <?php if ($data_pengaduan["status_dibaca"] == 'Sudah') { ?>
                                                                    <b class="text-success">
                                                                        <?= $data_pengaduan["status_dibaca"] ?>
                                                                    </b>
                                                                <?php } else { ?>
                                                                    <b class="text-warning">
                                                                        <?= $data_pengaduan["status_dibaca"] ?>
                                                                    </b>
                                                                <?php } ?>
                                                            </p>
                                                            <p>
                                                                Tanggal Pengaduan :<br>
                                                                <?= $data_pengaduan['tanggal_pengaduan'] ?>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <form action="admin-pengaduan.php" method="POST">
                                                                <input type="hidden" name="target_pengaduan_id"
                                                                    value="<?= $data_pengaduan['pengaduan_id'] ?>">
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="tandai-dibaca" value>Tandai Dibaca</button>
                                                            </form>
                                                            <!--  -->
                                                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#modal-confirm">
                                                                Tandai Dibaca
                                                            </button> -->
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- Modal end -->
                                            <!-- modal confirm start -->
                                            <!-- modal start -->
                                            <!-- <div class="modal fade" id="modal-confirm">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah kamu yakin ingin menandai pesan ini sebagai Sudah Dibaca?
                                                            </p>
                                                        </div>
                                                        <form action="admin-pengaduan.php" method="POST">
                                                            <div class="modal-footer justify-content-end">
                                                                <input type="hidden" name="target_pengaduan_id"
                                                                    value="">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="tandai-dibaca" value>Iya</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- modal confirm end -->
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- pengaduan end -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>