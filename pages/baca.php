<?php

include "../service/connection.php";
include "../service/select.php";
session_start();

$session_login = isset($_SESSION['is_login']) ? '<a href="pages/profile.php"><img class="img-tumbnail rounded-5" width="50px" height="50px" src="assets/img/default.png" alt=""></a>' : '<div>
<a href="login.php" class="btn btn-primary">Masuk</a>
<a href="register.php" class="btn btn-outline-primary">Daftar</a>
</div>';

// get data berita
// if (isset($_GET["berita_id"])) {
//     return $get_berita_id = $_GET['berita_id'];
//     $sql_get_berita = $select->selectTable($table_name = "berita", $fields = "*", $condition = "WHERE $get_berita_id");
//     $result_berita = $connected->query($sql_get_berita);
//     if ($result_berita->num_rows > 0) {
//         $data_baca_berita = $result_berita->fetch_assoc();
//     }
// }
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
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Desa Jatisari</title>
</head>

<body>
    <!-- <div class="page-wrapper"> -->
    <div class="main-container">
        <!-- nav start -->
        <?php include "../layout/navbar.php" ?>
        <!-- nav end -->
        <!-- baca start -->
        <div class="baca">
            <!-- container baca start -->
            <div class="container-xl px-2 d-flex flex-wrap" style="padding-top: 200px">
                <?php
                // get data berita
                if (isset($_GET["d"])) {
                    $berita_uuid = $_GET['d'];
                    $sql_get_berita = $select->selectTable($table_name = "berita", $fields = "*", $condition = "WHERE uuid = '$berita_uuid'");
                    $result_berita = $connected->query($sql_get_berita);
                    if ($result_berita->num_rows > 0) {
                        $data_baca_berita = $result_berita->fetch_assoc(); ?>
                        <div class="bg-secondary">
                            <h2 class="text-dark"><?= $data_baca_berita["judul"] ?></h2>
                        </div>
                        <?php
                    }
                } else {
                    echo "Berita tidak ditemukan";
                }
                ?>
            </div>
            <!-- container baca end -->
        </div>
        <!-- baca end -->
    </div>
    <!-- main container end -->

    <!-- js -->
    <script src="./js/main.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>