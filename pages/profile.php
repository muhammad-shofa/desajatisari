<?php

include "../service/connection.php";
include "../service/select.php";
session_start();

// check login
if ($_SESSION["is_login"] == false) {
    header("location: ../index.php");
}

// $user_id = $_SESSION['user_id'];

// $select = new select();
$sql = $select->selectTable($table_name = "users", $fields = "*", $condition = "WHERE user_id={$_SESSION['user_id']}");
$result_user = $connected->query($sql);
$data_user = $result_user->fetch_assoc();


// get pesan user
$sql_pesan = $select->selectTable($table_name = "pengaduan", $fields, $condition = "WHERE user_id={$_SESSION['user_id']}");
$result_pesan = $connected->query($sql_pesan);

// logout
if (isset ($_POST["logout"])) {
    session_unset();
    session_destroy();
    $status_login = false;
    global $status_login;
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 2px solid #ffc107;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }
    </style>
    <title>Desa Jatisari</title>
</head>

<body>
    <!-- <div class="page-wrapper"> -->
    <div class="main-container">
        <!-- nav start -->
        <?php include "../layout/navbar.php" ?>
        <!-- nav end -->
        <!-- content -->
        <!-- container start -->
        <div class="container-fluid emp-profile pt-5">
            <form class="pt-5" action="profile.php" method="POST">
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="profile-img">
                            <img src="../assets/img/default.png" alt="" />
                            <br>
                            <br>
                            <?php if ($_SESSION["role"] != "Admin") { ?>
                                <a href="admin-dashboard.php" class="btn btn-primary d-none" name="dashboard">Dashboard</a>
                            <?php } else { ?>
                                <a href="admin-dashboard.php" class="btn btn-primary" name="dashboard">Dashboard</a>
                            <?php } ?>
                            <button class="btn btn-primary" name="edit">Edit</button>
                            <button class="btn btn-danger" name="logout">keluar</button>
                            <!-- <div class="file btn btn-lg btn-primary ">
                                Change Photo
                                <input type="file" name="file" />
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="profile-head pt-5">
                            <h5>
                                <?= $data_user['username'] ?>
                            </h5>
                            <h6>
                                <?= $data_user['role'] ?>
                            </h6>
                            <br>
                            <ul class="nav nav-tabs" id="customTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-one" data-bs-toggle="tab" href="#data-diri"
                                        role="tab" aria-controls="one" aria-selected="true">Data Diri</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-three" data-bs-toggle="tab" href="#pesan" role="tab"
                                        aria-controls="three" aria-selected="false">Pesan</a>
                                </li>
                            </ul>
                            <!-- container tab start -->
                            <div class="custom-tabs-container">
                                <!-- content tabs -->
                                <div class="tab-content" id="customTabContent">
                                    <div class="tab-pane fade show active" id="data-diri" role="tabpanel">
                                        <!-- data diri -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <?= $data_user['username'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <?= $data_user['nama_lengkap'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <?= $data_user['email'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <?= $_SESSION['role'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- data diri end -->
                                    <!-- pencapaian start -->
                                    <div class="tab-pane fade" id="pencapaian" role="tabpanel">
                                        <h3>Ini pencapaian</h3>
                                    </div>
                                    <!-- pencapaian end -->
                                    <!-- pesan start -->
                                    <div class="tab-pane fade" id="pesan" role="tabpanel">
                                        <?php if ($result_pesan->num_rows > 0) { ?>
                                            <h2>Pengaduan Anda</h2>
                                            <?php while ($data_pesan = $result_pesan->fetch_assoc()) { ?>
                                                <a class="link-underline link-underline-opacity-0 text-dark"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-pengaduan-<?= $data_pesan["pengaduan_id"] ?>">
                                                    <div class="d-flex justify-content-between border p-2">
                                                        <?= $data_pesan["judul"] ?>
                                                        <?= $data_pesan["tanggal_pengaduan"] ?>
                                                        <?php if ($data_pesan["status_dibaca"] == 'Belum') { ?>
                                                            <div class="float-end">
                                                                <?= $data_pesan["status_dibaca"] ?> dibaca
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="float-end text-secondary">
                                                                <?= $data_pesan["status_dibaca"] ?> dibaca
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </a>
                                                <!-- Modal start -->
                                                <div class="modal fade" id="modal-pengaduan-<?= $data_pesan["pengaduan_id"] ?>"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                    <?= $data_pesan["judul"] ?>
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Tanggal Pengaduan :<br>
                                                                    <?= $data_pesan['tanggal_pengaduan'] ?>
                                                                </p>
                                                                <p>
                                                                    Teks Aduan :<br>
                                                                    <?= $data_pesan['aduan'] ?>
                                                                </p>
                                                                <p>
                                                                    Status :<br>
                                                                    Pesan kamu
                                                                    <?php if ($data_pesan["status_dibaca"] == 'Sudah') { ?>
                                                                        <b class="text-success">
                                                                            <?= $data_pesan["status_dibaca"] ?>
                                                                        </b>
                                                                    <?php } else { ?>
                                                                        <b class="text-warning">
                                                                            <?= $data_pesan["status_dibaca"] ?>
                                                                        </b>
                                                                    <?php } ?>
                                                                    dibaca oleh pihak desa.
                                                                </p>
                                                            </div>
                                                            <!-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal end -->
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="d-flex justify-content-between border p-2">
                                                <p>Kamu belum pernah mengirim / menerima pesan</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- pesan end -->
                                </div>
                            </div>
                            <!-- container tab end -->
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                       
                    </div> -->
                    <!-- <div class="col-md-2">
                        <input type="button" class="profile-edit-btn" name="btn-edit-profile" data-toggle="modal"
                            data-target="#modal-edit-profile" value="Edit Profile" />
                    </div> -->
                </div>
            </form>
        </div>
        <!-- container end -->
    </div>

    </div>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>