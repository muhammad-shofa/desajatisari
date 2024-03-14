<?php

include "../service/connection.php";
include "../service/insert.php";
session_start();

$message_aduan = "";

// check session login
$session_username = isset($_SESSION['username']) ? $_SESSION['username'] : "Masuk terlebih dahulu";

// kirim aduan
if (isset($_POST["kirim"])) {
    if ($_SESSION["is_login"] == false) { ?>
        <div class="modal fade" id="modal-masuk-dulu" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Masuk Terlebih Dahulu
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Mohon untuk <a href="../login.php">masuk</a> terlebih dahulu untuk melakukan pengaduan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const modalMasukDulu = document.getElementById("modal-masuk-dulu");
            const modalToggle = document.getElementById("modal-toggle");
            // modalMasukDulu.addEventListener('shown.bs.modal', () => {
            //     myInput.focus()
            // });
            modalMasukDulu.show(modalToggle);
        </script>
    <?php } else {
        $pengirim = htmlspecialchars($_POST["pengirim"]);
        $user_id = htmlspecialchars($_SESSION['user_id']);
        $judul = htmlspecialchars($_POST["judul"]);
        $aduan = htmlspecialchars($_POST["aduan"]);
        $sql_kirim_aduan = $insert->selectTable($table_name = "pengaduan", $condition = "(pengirim, user_id, judul, aduan) VALUES ('$pengirim', '$user_id', '$judul', '$aduan')");
        $result = $connected->query($sql_kirim_aduan);
        //  if ($result) { 
        //  <script>
        //     function showMessage() {
        //         let alert_message_aduan = document.getElementById('alert_message_aduan');
        //         alert_message_aduan.classList.add("show");
        //     }
        // </script> 
        $message_aduan = "Pesan anda berhasil terkirim, silahkan cek status aduan anda pada bagian pesan di <a
     href='profile.php'>profile</a>";
    }
}
?>

<!-- <script>
    function showMessage() {
        let alert_message_aduan = document.getElementById('alert_message_aduan');
        alert_message_aduan.classList.add("show");
    }
</script> -->

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
    <div class="main-container container-fluid">
        <!-- nav start -->
        <?php include "../layout/navbar.php" ?>
        <!-- nav end -->

        <div class="wrapper">
            <div class="text-center" style="padding-top: 100px;">
                <h1>Pengaduan Masyarakat</h1>
                <p>Ajukan pengaduan kepada pihak desa terkait masalah umum atau kritik dan saran.</p>
            </div>
            <div class="alert border border-success alert-dismissible fade  text-success" id="alert_message_aduan"
                role="alert">
                <?= $message_aduan ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- form start -->
            <form action="pengaduan.php" method="POST" class="my-5">
                <div class="border rounded-2 p-4 mt-5">
                    <div class="mb-3">
                        <label class="form-label" for="pengirim">Pengirim</label>
                        <input type="text" name="pengirim" id="pengirim" class="form-control" placeholder=""
                            value="<?= $session_username ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                            placeholder="Masukan judul aduan" required />
                    </div>
                    <div class="mb-3">
                        <!-- <label class="form-label" for="aduan">Aduan</label> -->
                        <label class="form-label" for="aduan">Aduan</label>
                        <textarea class="form-control" rows="3" id="aduan" name="aduan"
                            placeholder="Jelaskan apa yang ingin anda adukan!" required></textarea>
                    </div>
                    <button class="btn btn-primary rounded" type="submit" name="kirim" id="modal-toggle"
                        onclick="showMessage()" data-bs-toggle="modal" data-bs-target="#modal-masuk-dulu">Kirim</button>
                </div>
            </form>
            <!-- /form end -->
            <!-- Modal start -->

            <!-- Modal end -->
        </div>
    </div>
    <!-- main container end -->


    <!-- js -->
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>