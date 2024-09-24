<?php

include "../service/connection.php";
include "../service/select.php";
session_start();

// get data berita 
// $sql_berita = $select->selectTable($table_name = "berita", $fields = "*");
$sql_berita = $select->selectTable($table_name = "berita", $fields = "*", $condition = "ORDER BY berita_id DESC LIMIT 6");
$results_berita = $connected->query($sql_berita);

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
        <div class="container-fluid">
            <!-- berita start -->
            <div class="berita pt-5">
                <div class="container-xl px-5">
                    <!-- -->
                    <div class="p-5 mb-10">
                        <h2 class="line-in-top-start fw-bold" data-aos="fade-up" data-aos-duration="500">
                            Berita Desa
                        </h2>
                        <!-- card berita start -->
                        <div class="container container-fluid d-flex justify-content-between flex-wrap">
                            <?php if ($results_berita->num_rows > 0) { ?>
                                <?php while ($data_berita = $results_berita->fetch_assoc()) {
                                    ?>
                                    <a href="baca.php?d=<?= $data_berita["uuid"] ?>"
                                        class="link-underline link-underline-opacity-0 text-dark">
                                        <div class="card m-2" style="width: 18rem" data-aos="fade-up" data-aos-duration="600">
                                            <!-- <img src="assets/img/sawah-1.jpg" class="card-img-top" alt="sawah" /> -->
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?= $data_berita["judul"] ?>
                                                </h5>
                                                <p class="text-secondary"><?php
                                                $formatted_date = date("d/m/Y", strtotime($data_berita["tanggal_publish"]));
                                                echo $formatted_date ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <!-- card berita end -->
                    </div>
                </div>
            </div>
            <!-- berita start -->
        </div>
    </div>

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