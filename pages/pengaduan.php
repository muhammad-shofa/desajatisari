<?php

include "../service/config.php";
session_start();

$message_aduan = "";

// check login
if ($_SESSION["is_login"] == false) {
    header("location: ../index.php");
}

// kirim aduan
if (isset($_POST["kirim"])) {
    $pengirim = $_POST["pengirim"];
    $judul = $_POST["judul"];
    $aduan = $_POST["aduan"];
    $sql_kirim_aduan = "INSERT INTO pengaduan (pengirim, judul, aduan) VALUES ('$pengirim', '$judul', '$aduan')";
    $result = $db->query($sql_kirim_aduan);
    if ($result) {
        echo "<script>
            let alert_message_aduan = document.getElementById('alert_message_aduan');
            alert_message_aduan.style.display = 'block';
        </script>";
        $message_aduan = "Pesan anda berhasil terkirim, silahkan cek status aduan anda di <a href='profile.php'>profile</a>";
    }
}

$db->close();

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
    <div class="main-container container-fluid">
        <!-- nav start -->
        <?php include "../layout/navbar.php" ?>
        <!-- nav end -->

        <div class="wrapper">
            <div class="text-center" style="padding-top: 100px;">
                <h1>Pengaduan Masyarakat</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat quam facere dicta quia voluptate,
                    minus, sit doloremque ipsum at quis voluptatum numquam neque ea, ex vero quae repellendus. Facilis,
                    error!</p>
            </div>
            <div class="alert border border-success alert-dismissible fade show text-success" id="alert_message_aduan"
                role="alert" style="display: none;">
                <?= $message_aduan ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- form start -->
            <form action="pengaduan.php" method="POST" class="my-5">
                <div class="border rounded-2 p-4 mt-5">
                    <div class="mb-3">
                        <label class="form-label" for="pengirim">Pengirim</label>
                        <input type="text" name="pengirim" id="pengirim" class="form-control" placeholder=""
                            value="<?= $_SESSION["username"] ?>" readonly />
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
                    <button class="btn btn-primary rounded" type="submit" name="kirim">Kirim</button>
                </div>
            </form>
            <!-- /form end -->
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