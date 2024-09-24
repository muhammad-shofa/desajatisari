<?php

include "../service/connection.php";
include "../service/select.php";
session_start();

$session_login = isset($_SESSION['is_login']) ? '<a href="pages/profile.php"><img class="img-tumbnail rounded-5" width="50px" height="50px" src="assets/img/default.png" alt=""></a>' : '<div>
<a href="login.php" class="btn btn-primary">Masuk</a>
<a href="register.php" class="btn btn-outline-primary">Daftar</a>
</div>';
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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
            <?php
            // get data berita
            if (isset($_GET["d"])) {
                $berita_uuid = $_GET['d'];
                $sql_get_berita = $select->selectTable($table_name = "berita", $fields = "*", $condition = "WHERE uuid = '$berita_uuid'");
                $result_berita = $connected->query($sql_get_berita);
                if ($result_berita->num_rows > 0) {
                    $data_baca_berita = $result_berita->fetch_assoc(); ?>
                    <!-- container baca start -->
                    <div class="container-xl px-2" style="padding: 130px 0px 130px 0px">
                        <div class="p-3 border border-2 rounded">
                            <h2 class="text-dark"><?= $data_baca_berita["judul"] ?></h2>
                            <p><?php $formatted_date = date("d/m/Y", strtotime($data_baca_berita["tanggal_publish"]));
                            echo $formatted_date ?>
                            </p>
                            <p><b>DesaJatisari - </b><?= $data_baca_berita['isi'] ?></p>
                        </div>
                        <div class="p-3 my-3 border border-2 rounded">
                            <i class="fa-regular fa-comment-dots fs-3" id="toggleButton"></i>
                        </div>
                        <div id="commentSection" class="commentSection p-3 border border-2 rounded" style="display: none">
                            <h2>Komentar</h2>

                            <div class="all-comments">
                                <div class="your-comment border border-2 rounded p-3 my-2">
                                    <h4>Berikan Komentarmu</h4>
                                    <?php if (isset($_SESSION['is_login'])) { ?>
                                        <form action="" method="post" id="formKomentar">
                                            <div class="form-floating">
                                                <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">
                                                <input type="hidden" name="berita_id" value="<?= $data_baca_berita['berita_id'] ?>">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                    id="floatingTextarea2" name="isi_komentar"
                                                    style="height: 200px; resize: none;"></textarea>
                                                <label for="floatingTextarea2">Tuis komentarmu di sini!</label>
                                            </div>
                                            <input type="button" class="btn text-light bg-primary mt-3" id="kirimKomentarBtn"
                                                value="Kirim">

                                        </form>
                                    <?php } else { ?>
                                        <p class="text-success">Masuk terlebih dahulu untuk menulis komentar!</p>
                                    <?php } ?>
                                </div>
                                <div class="other-comments border border-2 rounded p-3">
                                    <h4>Komentar lain</h4>
                                    <div class="content-other-comments" id="contentOtherComments">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- container baca end -->
                    <?php
                }
            } else {
                echo "Berita tidak ditemukan";
            }
            ?>

        </div>
        <!-- baca end -->
    </div>
    <!-- main container end -->

    <!-- js -->
    <script src="../js/main.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e91d75df7f.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        var toggleButton = document.getElementById('toggleButton');
        var commentSection = document.getElementById('commentSection');

        toggleButton.addEventListener('click', function () {
            if (commentSection.style.display === 'none') {
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        });

        function getUUIDFromURL() {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('d');
        }


        function loadDataKomentar() {
            var berita_uuid = getUUIDFromURL();
            $.ajax({
                url: '../service/ajax/ajax-baca.php',
                type: 'GET',
                data: { d: berita_uuid },
                dataType: 'json',
                success: function (response) {
                    var data = response.data;
                    var contentOtherComments = $('#contentOtherComments');
                    contentOtherComments.empty();

                    $.each(data, function (index, item) {
                        var html = $('<div class="p-2 border border-2 rounded my-2">');
                        html.append("User ID : " + item.user_id + " ");
                        html.append('<br>');
                        html.append(item.isi_komentar);
                        html.append('</div>');
                        contentOtherComments.append(html);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error: ' + status + ' - ' + error);
                    console.log(xhr.responseText);
                }
            });
        }

        loadDataKomentar();

        // 
        // Tambah komentar
        $('#kirimKomentarBtn').click(function () {
            var data = $('#formKomentar').serialize();
            $.ajax({
                url: '../service/ajax/ajax-baca.php',
                type: 'POST',
                data: data,
                success: function (response) {
                    alert(response);
                    $('#formKomentar')[0].reset();
                    loadDataKomentar();
                }, error: function (xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });


    </script>

</body>

</html>