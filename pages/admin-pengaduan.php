<?php

include "../service/connection.php";
include "../service/select.php";
include "../service/update.php";
session_start();

// check login and role
if ($_SESSION["is_login"] == false && $_SESSION["role"] != 'Admin') {
    header("location: ../index.php");
    exit;
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
    <title>Desa Jatisari | Pengaduan</title>

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
                            <table id="pengaduan_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengirim</th>
                                        <th>Judul</th>
                                        <th>Aduan</th>
                                        <th>Status Dibaca</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal detail pengaduan start -->
                        <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog"
                            aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditLabel">Detail Pengaduan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk mengedit siswa -->
                                        <form id="formDetail">
                                            <input type="hidden" id="detail_user_id" name="user_id">
                                            <input type="hidden" id="detail_pengaduan_id" name="pengaduan_id">
                                            <div class="form-group">
                                                <label for="detail_pengirim">Pengirim:</label>
                                                <input type="text" class="form-control" id="detail_pengirim"
                                                    name="pengirim" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_judul">Judul:</label>
                                                <input type="text" class="form-control" id="detail_judul" name="judul"
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_aduan">Aduan</label>
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                    id="detail_aduan" style="height: 200px; resize: none !important;"
                                                    name="aduan" readonly></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_status_dibaca">Status Dibaca:</label>
                                                <input type="text" class="form-control" id="detail_status_dibaca"
                                                    name="status_dibaca" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="detail_tanggal_pengaduan">Tanggal Pengaduan:</label>
                                                <input type="text" class="form-control" id="detail_tanggal_pengaduan"
                                                    name="tanggal_pengaduan" readonly>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="tandaiDibaca">Tandai Sudah
                                            Dibaca</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal detail pengaduan End -->
                        <!-- /.card-body -->
                    </div>
                    <!-- pengaduan end -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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

    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- Page specific script -->
    <script>
        // $(function () {
        //     $("#pengaduan_table").DataTable({
        //         "responsive": true, "lengthChange": false, "autoWidth": false,
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });

        $(document).ready(function () {
            var table = $('#pengaduan_table').DataTable({
                "ajax": "../service/ajax/ajax-pengaduan.php",
                "columns": [{
                    "data": "no"
                },
                {
                    "data": "pengirim"
                },
                {
                    "data": "judul"
                },
                {
                    "data": "aduan"
                },
                {
                    "data": "status_dibaca"
                },
                {
                    "data": "tanggal_pengaduan"
                },
                {
                    "data": "action",
                    "orderable": true,
                    "searchable": true
                }
                ]
            });

            // Tandai dibaca
            $('#pengaduan_table').on('click', '.baca', function () {
                let pengaduan_id = $(this).data('pengaduan_id');
                $.ajax({
                    url: '../service/ajax/ajax-pengaduan.php?pengaduan_id=' + pengaduan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#detail_user_id').val(data.user_id);
                        $('#detail_pengaduan_id').val(data.pengaduan_id);
                        $('#detail_pengirim').val(data.pengirim);
                        $('#detail_judul').val(data.judul);
                        $('#detail_aduan').val(data.aduan);
                        $('#detail_status_dibaca').val(data.status_dibaca);
                        $('#detail_tanggal_pengaduan').val(data.tanggal_pengaduan);
                        $('#modalDetail').modal('show');
                    }
                });
            });

            // Menampilkan modal detail pengaduan
            $('#pengaduan_table').on('click', '.detail', function () {
                let pengaduan_id = $(this).data('pengaduan_id');
                $.ajax({
                    url: '../service/ajax/ajax-pengaduan.php?pengaduan_id=' + pengaduan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#detail_user_id').val(data.user_id);
                        $('#detail_pengaduan_id').val(data.pengaduan_id);
                        $('#detail_pengirim').val(data.pengirim);
                        $('#detail_judul').val(data.judul);
                        $('#detail_aduan').val(data.aduan);
                        $('#detail_status_dibaca').val(data.status_dibaca);
                        $('#detail_tanggal_pengaduan').val(data.tanggal_pengaduan);
                        $('#modalDetail').modal('show');
                    }
                });
            });

            // simpan tandai dibaca
            $('#tandaiDibaca').click(function () {
                var data = $('#formDetail').serialize();
                $.ajax({
                    url: '../service/ajax/ajax-pengaduan.php',
                    type: 'PUT',
                    data: data,
                    success: function (response) {
                        $('#modalDetail').modal('hide');
                        table.ajax.reload();
                        alert(response);
                    }
                });
            });


        });

    </script>
</body>

</html>