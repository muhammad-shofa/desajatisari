<?php

include "service/config.php";
session_start();

$message_login = "";


if (isset($_POST['masuk'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hash_password = hash('sha256', $password);

    $sql_login = "SELECT * FROM users WHERE username='$username' AND password='$hash_password'";
    $result = $db->query($sql_login);
    if ($result->num_rows > 0) {
        $data_user = $result->fetch_assoc();
        $_SESSION["user_id"] = $data_user["user_id"];
        $_SESSION["username"] = $data_user["username"];
        $_SESSION["role"] = $data_user["role"];
        $_SESSION["is_login"] = true;
        if ($_SESSION["role"] === "Admin") {
            header("location: pages/admin-dashboard.php");
        } else {
            header("location: pages/profile.php");
        }
    } else {
        $message_login = "Pastikan anda memasukkan username dan password yang benar!";
    }

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
        <!-- nav start -->
        <?php include "layout/navbar.php" ?>
        <!-- nav end -->
        <div class="row justify-content-center" style="padding-top: 50px;">
            <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
                <!-- fomr start -->
                <form action="login.php" method="POST" class="my-5">
                    <div class="border rounded-2 p-4 mt-5">
                        <div class="login-form">
                            <a href="index.html" class="mb-4 d-flex">
                                Desa Jatisari
                                <!-- <img src="./imgimages/logo.svg" class="img-fluid login-logo"
                                    alt="Mars Admin Dashboard" /> -->
                            </a>
                            <h5 class="fw-bold mb-3">Masuk</h5>
                            <p>
                                <?= $message_login ?>
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

                            <div class="d-grid py-3 mt-3">
                                <button type="submit" name="masuk" class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">
                                    Masuk
                                </button>
                            </div>
                            <div class="text-center pt-4">
                                <span>Belum memiliki akun?</span>
                                <a href="register.php" class="text-blue text-decoration-underline ms-2">
                                    Daftar</a>
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