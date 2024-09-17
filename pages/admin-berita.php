<?php
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
    <title>Desa Jatisari | berita</title>

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
                            <h1 class="m-0">Dashboard berita</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
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
                    <!-- berita start -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Berita</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- btn trigger modal tambah berita -->
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-target="#modalTambah">
                                Tambah Berita
                            </button>

                            <div class="table-responsive">
                                <table id="berita_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Isi</th>
                                            <th>Tanggal Publish</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- Modal tambah berita -->
                        <div class="modal fade" id="modalTambah">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah berita</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formTambah">
                                            <div class="form-group">
                                                <label for="judul">Judul:</label>
                                                <input type="text" class="form-control" id="judul" name="judul">
                                            </div>
                                            <div class="form-group">
                                                <label for="penulis">Penulis:</label>
                                                <input type="text" class="form-control" id="penulis" name="penulis">
                                            </div>
                                            <div class="form-group">
                                                <label for="isi">Isi Berita</label>
                                                <textarea class="form-control" id="isi" name="isi" rows="5"
                                                    style="resize: none"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_publish">Tangga Publish:</label>
                                                <input type="date" class="form-control" id="tanggal_publish"
                                                    name="tanggal_publish">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-primary" id="simpanTambah">Tambah</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- Modal tambah berita End -->

                        <!-- Modal Edit Berita -->
                        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
                            aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditLabel">Edit berita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk menampilkan data berita pada modal -->
                                        <form id="formEdit">
                                            <input type="hidden" id="edit_berita_id" name="berita_id">
                                            <div class="form-group">
                                                <label for="edit_judul">Judul:</label>
                                                <input type="text" class="form-control" id="edit_judul" name="judul">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_penulis">Penulis:</label>
                                                <input type="text" class="form-control" id="edit_penulis"
                                                    name="penulis">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_isi">Isi:</label>
                                                <textarea class="form-control" id="edit_isi" name="isi" rows="5"
                                                    style="resize: none"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_tanggal_publish">Tanggal Publish:</label>
                                                <input type="date" class="form-control" id="edit_tanggal_publish"
                                                    name="tanggal_publish">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="simpanEdit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit Berita End -->

                    </div>
                    <!-- berita end -->
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
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e91d75df7f.js" crossorigin="anonymous"></script>
    <!-- Page specific script -->
    <script>
        $(document).ready(function () {
            var table = $('#berita_table').DataTable({
                "ajax": "../service/ajax/ajax-berita.php",
                "columns": [{
                    "data": "no"
                },
                {
                    "data": "judul"
                },
                {
                    "data": "penulis"
                },
                {
                    "data": "isi"
                },
                {
                    "data": "tanggal_publish"
                },
                {
                    "data": "action",
                    "orderable": true,
                    "searchable": true
                }
                ],
                "responsive": true
            });

            // Tambah berita
            $('#simpanTambah').click(function () {
                var data = $('#formTambah').serialize();
                $.ajax({
                    url: '../service/ajax/ajax-berita.php',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        $('#modalTambah').modal('hide');
                        table.ajax.reload();
                        $('#formTambah')[0].reset();
                        alert(response);
                    }
                });
            });

            // Menampilkan modal Edit Berita
            $('#berita_table').on('click', '.edit', function () {
                let berita_id = $(this).data('berita_id');
                $.ajax({
                    url: '../service/ajax/ajax-berita.php?berita_id=' + berita_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#edit_berita_id').val(data.berita_id);
                        $('#edit_judul').val(data.judul);
                        $('#edit_penulis').val(data.penulis);
                        $('#edit_isi').val(data.isi);
                        $('#edit_tanggal_publish').val(data.tanggal_publish);
                        $('#modalEdit').modal('show');
                    }
                });
            });

            // Simpan Edit Berita
            $('#simpanEdit').click(function () {
                var data = $('#formEdit').serialize();
                $.ajax({
                    url: '../service/ajax/ajax-berita.php',
                    type: 'PUT',
                    data: data,
                    success: function (response) {
                        $('#modalEdit').modal('hide');
                        table.ajax.reload();
                        alert(response);
                    }
                });
            });

            // Delete Berita
            $('#berita_table').on('click', '.delete', function () {
                var berita_id = $(this).data('berita_id');
                if (confirm('Kamu yakin ingin menghapus berita ini?')) {
                    $.ajax({
                        url: '../service/ajax/ajax-berita.php',
                        type: 'DELETE',
                        data: {
                            berita_id: berita_id
                        },
                        success: function (response) {
                            table.ajax.reload();
                            alert(response);
                        }
                    });
                }
            });

        });

    </script>
</body>

</html>