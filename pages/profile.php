<?php

include "../service/config.php";
session_start();

// check login
if ($_SESSION["is_login"] == false) {
    header("location: ../index.php");
}

// get data user
$sql_user = "SELECT * FROM users WHERE user_id={$_SESSION['user_id']}";
$result_user = $db->query($sql_user);
$data_user = $result_user->fetch_assoc();

$db->close();

// logout
if (isset($_POST["logout"])) {
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
    <link rel="stylesheet" href="./css/style.css" />
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
            width: 70%;
            height: 100%;
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
        <nav class="navbar fixed-top navbar-expand-lg border-bottom shadow-sm bg-body-tertiary">
            <div class="container-fluid py-2" id="nav-container">
                <span>
                    <a class="navbar-brand fs-3" href="../index.php"><b>DesaJatisari</b></a>
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                    <div></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active-link" aria-current="page" href="../index.php">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Profil Desa
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="#">Sejarah Desa</a></li>
                                <li><a class="dropdown-item" href="#">Aset Desa</a></li>
                                <li><a class="dropdown-item" href="#">Peta Desa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                    </ul>
                    <?php if ($_SESSION["is_login"]) { ?>
                        <a href="profile.php">
                            <img class="img-tumbnail rounded-5" width="50px" height="50px" src="../img/default.png" alt="">
                        </a>
                    <?php } else { ?>
                        <div>
                            <a href="login.php" class="btn btn-primary">Masuk</a>
                            <a href="register.php" class="btn btn-outline-primary">Daftar</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- nav end -->
        <!-- content -->
        <!-- Container starts -->

        <!-- Container ends -->
        <div class="container-fluid emp-profile pt-5">
            <form class="pt-5" action="profile.php" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="../img/default.png" alt="" />
                            <div class="file btn btn-lg btn-primary ">
                                Change Photo
                                <input type="file" name="file" />
                            </div>
                        </div>
                        <!-- tes alert -->
                        <!-- <button type="button" class="btn btn-warning swalDefaultWarning1">
                                    Launch Warning Toast
                                </button> -->
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                <?= $data_user['username'] ?>
                            </h5>
                            <h6>
                                <?= $data_user['role'] ?>
                            </h6>
                            <br>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <input type="button" class="profile-edit-btn" name="btn-edit-profile" data-toggle="modal"
                            data-target="#modal-edit-profile" value="Edit Profile" />
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                        <label>Name</label>
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
                                        <?= $data_user['email'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Role</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $_SESSION['role'] ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--  -->


        <div class="" style="padding-top: 300px;">
            <form action="profile.php" method="POST">
                <button class="btn btn-danger" name="logout">Logout</button>
            </form>
        </div>
    </div>

    </div>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>