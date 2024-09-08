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
    <title>Desa Jatisari | Pengguna</title>

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
                            <h1 class="m-0">Dashboard Pengguna</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pengguna</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- pengguna start -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Pengguna</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- btn trigger modal tambah pengguna -->
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-target="#modalTambah">
                                Tambah Pengguna
                            </button>

                            <!-- <button class="tambahPengguna btn btn-primary my-2">Tambah Pengguna</button> -->
                            <!-- <button type="button" class="edit btn btn-primary" data-user_id="' . $row['user_id'] . '" data-toggle="modal">Tambah</button> -->
                            <table id="pengguna_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->

                        <!-- Modal tambah pengguna -->
                        <div class="modal fade" id="modalTambah">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Pengguna</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formTambah">
                                            <!-- <input type="hidden" id="user_id" name="user_id"> -->
                                            <div class="form-group">
                                                <label for="username">Username:</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap:</label>
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir">
                                            </div>

                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                                <select class="form-control select2" name="jenis_kelamin"
                                                    id="jenis_kelamin" style="width: 100%;">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="role">Role:</label>
                                                <select class="form-control select2" name="role" id="role"
                                                    style="width: 100%;">
                                                    <option value="Admin">Admin</option>
                                                    <option value="Petugas">Petugas</option>
                                                    <option value="User">User</option>
                                                </select>
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
                        <!-- Modal tambah pengguna End -->

                        <!-- Modal Edit User -->
                        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
                            aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditLabel">Edit Pengguna</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk menampilkan data user pada modal -->
                                        <form id="formEdit">
                                            <input type="hidden" id="edit_user_id" name="user_id">
                                            <div class="form-group">
                                                <label for="edit_username">Username:</label>
                                                <input type="text" class="form-control" id="edit_username"
                                                    name="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_nama_lengkap">Nama Lengkap:</label>
                                                <input type="text" class="form-control" id="edit_nama_lengkap"
                                                    name="nama_lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_email">Email:</label>
                                                <input type="email" class="form-control" id="edit_email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_tanggal_lahir">Tanggal Lahir:</label>
                                                <input type="text" class="form-control" id="edit_tanggal_lahir"
                                                    name="tanggal_lahir">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_jenis_kelamin">Jenis Kelamin:</label>
                                                <select class="form-control select2" name="jenis_kelamin"
                                                    id="edit_jenis_kelamin" style="width: 100%;">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_role">Role:</label>
                                                <select class="form-control select2" name="role" id="edit_role"
                                                    style="width: 100%;">
                                                    <option value="Admin">Admin</option>
                                                    <option value="Petugas">Petugas</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="simpanEdit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit User End -->

                    </div>
                    <!-- pengguna end -->
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
            var table = $('#pengguna_table').DataTable({
                "ajax": "../service/ajax/ajax-pengguna.php",
                "columns": [{
                    "data": "no"
                },
                {
                    "data": "username"
                },
                {
                    "data": "nama_lengkap"
                },
                {
                    "data": "email"
                },
                {
                    "data": "tanggal_lahir"
                },
                {
                    "data": "jenis_kelamin"
                },
                {
                    "data": "role"
                },
                {
                    "data": "action",
                    "orderable": true,
                    "searchable": true
                }
                ]
            });

            // Tambah pengguna
            $('#simpanTambah').click(function () {
                var data = $('#formTambah').serialize();
                $.ajax({
                    url: '../service/ajax/ajax-pengguna.php',
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

            // Menampilkan modal Edit User
            $('#pengguna_table').on('click', '.edit', function () {
                let user_id = $(this).data('user_id');
                $.ajax({
                    url: '../service/ajax/ajax-pengguna.php?user_id=' + user_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#edit_user_id').val(data.user_id);
                        $('#edit_username').val(data.username);
                        $('#edit_nama_lengkap').val(data.nama_lengkap);
                        $('#edit_email').val(data.email);
                        $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                        $('#edit_jenis_kelamin').val(data.jenis_kelamin);
                        $('#edit_role').val(data.role);
                        $('#modalEdit').modal('show');
                    }
                });
            });

            // Simpan edit user
            $('#simpanEdit').click(function () {
                var data = $('#formEdit').serialize();
                $.ajax({
                    url: '../service/ajax/ajax-pengguna.php',
                    type: 'PUT',
                    data: data,
                    success: function (response) {
                        $('#modalEdit').modal('hide');
                        table.ajax.reload();
                        alert(response);
                    }
                });
            });

            // Delete User
            $('#pengguna_table').on('click', '.delete', function () {
                var user_id = $(this).data('user_id');
                if (confirm('Kamu yakin ingin menghapus pengguna ini?')) {
                    $.ajax({
                        url: '../service/ajax/ajax-pengguna.php',
                        type: 'DELETE',
                        data: {
                            user_id: user_id
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