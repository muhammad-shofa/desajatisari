<?php

include "service/config.php";

$status_register = "";

if (isset($_POST["daftar"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];

    $hash_password = hash('sha256', $password);

    $sql_regis = "INSERT INTO users (username, password, nama_lengkap, email, tanggal_lahir, jenis_kelamin) VALUES ('$username', '$hash_password', '$nama_lengkap', '$email', '$tanggal_lahir', '$jenis_kelamin')";
    $result = $db->query($sql_regis);
    if ($result) {
        $status_register = "<b>Berhasil daftar, silahkan <a href='login.php'>Login!</a></b>";
    }

    $db->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>Daftar | Desa Jatisari</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
                <form action="register.php" method="POST" class="my-5">
                    <div class="border rounded-2 p-4 mt-5">
                        <div class="login-form">
                            <a href="index.php" class="mb-4 d-flex">
                                Desa Jatisari
                                <!-- <img src="./imgimages/logo.svg" class="img-fluid login-logo"
                                    alt="Mars Admin Dashboard" /> -->
                            </a>
                            <h5 class="fw-bold mb-3">Daftar untuk mengakses semua fitur.</h5>
                            <p>
                                <?= $status_register ?>
                            </p>
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Masukkan username" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                    placeholder="Masukkan nama lengkap" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan email" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"
                                    aria-label="Default select example">
                                    <option value="Laki-Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="checkbox" value="" id="termsConditions" />
                                    <label class="form-check-label" for="termsConditions">I agree to the terms and
                                        conditions</label>
                                </div>
                            </div>
                            <div class="d-grid py-3 mt-3">
                                <button type="submit" name="daftar" class="btn btn-lg btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    Daftar
                                </button>
                            </div>
                            <div class="text-center pt-4">
                                <span>Sudah memiliki akun?</span>
                                <a href="login.php" class="text-blue text-decoration-underline ms-2">
                                    Masuk</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /form end -->

            </div>
        </div>
    </div>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>