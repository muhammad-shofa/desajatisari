<?php

include "service/connection.php";
include "service/select.php";
session_start();

$session_login = isset($_SESSION['is_login']) ? '<a href="pages/profile.php"><img class="img-tumbnail rounded-5" width="50px" height="50px" src="assets/img/default.png" alt=""></a>' : '<div>
<a href="login.php" class="btn btn-primary">Masuk</a>
<a href="register.php" class="btn btn-outline-primary">Daftar</a>
</div>';

// get data berita
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
  <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <title>Desa Jatisari</title>
</head>

<body>
  <!-- <div class="page-wrapper"> -->
  <div class="main-container">
    <!-- nav start -->
    <nav class="navbar fixed-top navbar-expand-lg border-bottom shadow-sm bg-body-tertiary">
      <div class="container-fluid py-2" id="nav-container">
        <span>
          <a class="navbar-brand fs-3" href="./index.php"><b>DesaJatisari</b></a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
          <div></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active-link" aria-current="page" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/berita.php">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/pengaduan.php">Pengaduan</a>
            </li>
          </ul>
          <div>
            <?= $session_login ?>
          </div>
        </div>
      </div>
    </nav>
    <!-- nav end -->
    <!-- hero start -->
    <div class="hero">
      <!-- container hero start -->
      <div class="container-xl px-2 d-flex flex-wrap" style="padding-top: 200px">
        <div class="text-light" style="max-width: 600px">
          <div>
            <h1>Selamat Datang Di <br /><b>Desa Jatisari</b></h1>
            <p>
              Mari jelajahi keunikan Desa Jatisari, saksikan kehidupan
              pedesaan yang autentik, nikmati kelezatan kuliner khas, dan
              temukan pesona alam yang memikat hati. Bersama-sama, mari kita
              bangun dan lestarikan keindahan dan kebersamaan di Desa Jatisari
              untuk generasi-generasi yang akan datang.
            </p>
          </div>
        </div>
        <!-- carousel -->
        <div class="container-fluid mb-4" style="max-width: 450px">
          <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/farmer-1.jpg" class="d-block w-100" alt="Bootstrap Gallery" />
              </div>
              <div class="carousel-item">
                <img src="assets/img/ex-village-1.jpg" class="d-block w-100" alt="Bootstrap Gallery" />
              </div>
              <div class="carousel-item">
                <img src="assets/img/ex-village-2.jpg" class="d-block w-100" alt="Bootstrap Gallery" />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <!-- container hero end -->
      <!-- waves -->
      <div class="waves-btm-hero">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#ffffff" fill-opacity="1"
            d="M0,32L48,53.3C96,75,192,117,288,122.7C384,128,480,96,576,122.7C672,149,768,235,864,234.7C960,235,1056,149,1152,117.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
          </path>
        </svg>
      </div>
    </div>
    <!-- hero end -->

    <!-- about start -->
    <div class="about">
      <!-- container about start -->
      <div class="container-xl px-2">
        <!-- profile singkat desa start -->
        <div class="p-5 mb-10">
          <div class="row flex-lg-row align-items-center">
            <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-duration="500">
              <h2 class="fw-bold">Profile Desa</h2>
              <p class="mb-4">
                Desa Jatisari adalah desa yang terletak di Kecamatan Senori
                Jawa Timur. Desa Jatisari di kenal karena banyaknya pondok
                pesantren dan sekolah yang berdiri, oleh karena inilah banyak
                pendatang dari desa, kecamatan atau bahkan kebupaten lain
                untuk menempa ilmu di Desa Jatisari.
              </p>
              <div class="d-grid gap-2 d-sm-flex">
                <button type="button" class="btn btn-warning">
                  Baca Lebih Lanjut
                </button>
              </div>
            </div>
            <!-- img -->
            <div class="col-10 col-sm-8 col-lg-6" data-aos="fade-up" data-aos-duration="650">
              <div class="mt-4">
                <img src="assets/img/ex-village-3.jpg" class="d-block mx-lg-auto img-fluid" alt="Admin Dashboards" />
              </div>
            </div>
          </div>
        </div>
        <!-- profile singkat desa end -->
        <!-- sejarah singkat desa start -->
        <div class="p-5 mt-5">
          <div class="row flex-lg-row align-items-center">
            <!-- img -->
            <div class="col-10 col-sm-8 col-lg-6" data-aos="fade-up" data-aos-duration="650">
              <div class="mt-4">
                <img src="assets/img/ex-village-3.jpg" class="d-block mx-lg-auto img-fluid" alt="Admin Dashboards" />
              </div>
            </div>
            <div class="col-lg-6 mb-5 text-end" data-aos="fade-up" data-aos-duration="500">
              <h2 class="fw-bold">Sejarah Desa</h2>
              <p class="mb-4">
                Desa Jatisari adalah desa yang terletak di Kecamatan Senori
                Jawa Timur. Desa Jatisari di kenal karena banyaknya pondok
                pesantren dan sekolah yang berdiri, oleh karena inilah banyak
                pendatang dari desa, kecamatan atau bahkan kebupaten lain
                untuk menempa ilmu di Desa Jatisari.
              </p>
              <div class="d-grid gap-2 d-sm-flex float-end">
                <button type="button" class="btn btn-warning">
                  Baca Lebih Lanjut
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- sejarah singkat desa end -->
      </div>
      <!-- container about end -->
    </div>
    <!-- about end -->

    <!-- service start -->
    <div class="service">
      <!-- waves -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
          d="M0,128L40,122.7C80,117,160,107,240,133.3C320,160,400,224,480,229.3C560,235,640,181,720,176C800,171,880,213,960,229.3C1040,245,1120,235,1200,192C1280,149,1360,75,1400,37.3L1440,0L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
      </svg>
      <!-- container service start -->
      <div class="container-xl px-2">
        <div class="p-5 text-center text-light">
          <h2 data-aos="fade-up" data-aos-duration="500">
            Apa saja yang ada di <b>Desa Jatisari?</b>
          </h2>
          <div class="col-lg-6 mx-auto" data-aos="fade-up" data-aos-duration="650">
            <p class="lead mb-4">
              Fasilitas dari Desa Jatisari yang berguna dan bermanfaat bagi
              masyarakatnya.
            </p>
          </div>
        </div>
        <!-- card start -->
        <div class="container container-fluid d-flex flex-wrap justify-content-center">
          <div class="card m-2 shadow-sm" style="width: 12rem" data-aos="fade-up" data-aos-duration="500">
            <img src="./assets/icon/graduation-cap-solid.svg" class="card-img-top p-5" alt="" width="180px"
              height="180px" />
            <div class="card-body text-center">
              <h5 class="card-title">Pendidikan</h5>
              <p class="card-text">
                <!-- Mulai dari sekolah Paud hingga jenjang MA/SMA/SMK. Ponpes
                  Salaf. -->
              </p>
            </div>
          </div>
          <div class="card m-2 shadow-sm" style="width: 12rem" data-aos="fade-up" data-aos-duration="550">
            <img src="./assets/icon/stethoscope-solid.svg" class="card-img-top p-5 img-tumbnail" alt="" width="180px"
              height="180px" />
            <div class="card-body text-center">
              <h5 class="card-title">Kesehatan</h5>
              <p class="card-text">
                <!-- Kesejahteraan masyarakat Desa Jatisari menjadi perhatian
                  utama, dengan fasilitas kesehatan yang tersedia termasuk
                  puskesmas dan posyandu. -->
              </p>
            </div>
          </div>
          <div class="card m-2 shadow-sm" style="width: 12rem" data-aos="fade-up" data-aos-duration="600">
            <img src="./assets/icon/bag-shopping-solid.svg" class="card-img-top p-5 img-tumbnail" alt="" width="180px"
              height="180px" />
            <div class="card-body text-center">
              <h5 class="card-title">UMKM</h5>
              <p class="card-text"></p>
            </div>
          </div>
          <div class="card m-2 shadow-sm" style="width: 12rem" data-aos="fade-up" data-aos-duration="650">
            <img src="./assets/icon/book-solid.svg" class="card-img-top p-5 img-tumbnail" alt="" width="180px"
              height="180px" />
            <div class="card-body text-center">
              <h5 class="card-title">Perpustakaan Umum</h5>
              <p class="card-text"></p>
            </div>
          </div>
          <div class="card m-2 shadow-sm" style="width: 12rem" data-aos="fade-up" data-aos-duration="700">
            <img src="./assets/icon/mosque-solid.svg" class="card-img-top p-5 img-tumbnail" alt="" width="180px"
              height="180px" />
            <div class="card-body text-center">
              <h5 class="card-title">Tempat Beribadah</h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <!-- card end -->
      </div>
      <!-- container service end -->
      <!-- waves -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
          d="M0,96L48,122.7C96,149,192,203,288,197.3C384,192,480,128,576,133.3C672,139,768,213,864,224C960,235,1056,181,1152,165.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
      </svg>
    </div>
    <!-- service end -->
    <!-- berita start -->
    <div class="berita">
      <!-- container berita start -->
      <div class="container-xl px-2">
        <!-- card berita start -->
        <div class="p-5 mb-10">
          <h2 class="fw-bold" data-aos="fade-up" data-aos-duration="500">
            Berita Desa
          </h2>
          <!-- card berita start -->
          <div class="container container-fluid d-flex justify-content-between flex-wrap">
            <?php if ($results_berita->num_rows > 0) { ?>
              <?php while ($data_berita = $results_berita->fetch_assoc()) {
                ?>
                <a href="pages/baca.php?d=<?= $data_berita["uuid"] ?>"
                  class="link-underline link-underline-opacity-0 text-dark">
                  <div class="card m-2" style="width: 18rem" data-aos="fade-up" data-aos-duration="600">
                    <img src="assets/img/sawah-1.jpg" class="card-img-top" alt="sawah" />
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
      <!-- container berita end -->
    </div>
    <!-- berita end -->

    <!-- waves -->
    <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1"
        d="M0,128L40,122.7C80,117,160,107,240,133.3C320,160,400,224,480,229.3C560,235,640,181,720,176C800,171,880,213,960,229.3C1040,245,1120,235,1200,192C1280,149,1360,75,1400,37.3L1440,0L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
      </path>
    </svg>

    <!-- testimoni start -->
    <div class="testimoni">
      <!-- container testimoni start -->
      <div class="container-xl px-2">
        <div class="p-5 mb-10">
          <h2 class="fw-bold text-light text-center">
            Apa Yang Orang - Orang Katakan tentang Desa Jatisari?
          </h2>
          <div class="card-testimoni">

            <!-- carousel start -->
            <div class="all-card-testimoni py-5">
              <div class="splide mx-auto" data-aos=fade-up data-aos-duration=600>
                <div class="splide__track rounded">
                  <ul class="splide__list">
                    <li class="splide__slide bg-light" style=width:150px>
                      <div
                        class="card-testimoni d-flex flex-wrap justify-content-center p-3 rounded border border-light border-2 gap-3">
                        <img src="assets/img/default.png" alt class="img-fluid rounded-circle border border-3"
                          width=200px />
                        <div class="card-text-testimoni text-center">
                          <h4>Fikra</h4>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam expedita iste fuga quaerat
                            commodi corporis eos maiores sunt ad possimus reiciendis, dolorem impedit officia minima
                            laborum autem! Amet, accusantium hic?
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide bg-light" style=width:150px>
                      <div
                        class="card-testimoni d-flex flex-wrap justify-content-center p-3 rounded border border-light border-2 gap-3">
                        <img src="assets/img/default.png" alt class="img-fluid rounded-circle border border-3"
                          width=200px />
                        <div class="card-text-testimoni text-center">
                          <h4>Fikri</h4>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam expedita iste fuga quaerat
                            commodi corporis eos maiores sunt ad possimus reiciendis, dolorem impedit officia minima
                            laborum autem! Amet, accusantium hic?
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide bg-light" style=width:150px>
                      <div
                        class="card-testimoni d-flex flex-wrap justify-content-center p-3 rounded border border-light border-2 gap-3">
                        <img src="assets/img/default.png" alt class="img-fluid rounded-circle border border-3"
                          width=200px />
                        <div class="card-text-testimoni text-center">
                          <h4>Fikru</h4>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam expedita iste fuga quaerat
                            commodi corporis eos maiores sunt ad possimus reiciendis, dolorem impedit officia minima
                            laborum autem! Amet, accusantium hic?
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- carousel end -->

          </div>
        </div>
      </div>

      <!-- waves -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
          d="M0,96L48,122.7C96,149,192,203,288,197.3C384,192,480,128,576,133.3C672,139,768,213,864,224C960,235,1056,181,1152,165.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
      </svg>
    </div>
    <!-- container testimoni end -->

    <!-- kontak start -->
    <div class="kontak">
      <div class="container-xl px-2">
        <div class="p-5 mb-10">
          <h2 class="fw-bold text-center">
            Kontak
          </h2>
        </div>
        <div class="d-flex flex-wrap justify-content-evenly mb-5 gap-5">
          <div class="form-kontak">
            <form class="p-5 border border-3 border rounded">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" aria-describedby="nama"
                  placeholder="Masukkan nama kamu">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email kamu">
              </div>
              <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" placeholder="Tinggalkan pesan kamu di sini" id="pesan"
                  style="width: 300px; height: 150px; resize: none"></textarea>
              </div>
              <button type="submit" class="btn btn-primary float-end">Kirim</button>
            </form>
          </div>

          <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25766585385!2d112.630280370873!3d-7.275441714532518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1726540573786!5m2!1sid!2sid"
              width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

        </div>
      </div>
      <!-- waves -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#273036" fill-opacity="1"
          d="M0,128L34.3,112C68.6,96,137,64,206,58.7C274.3,53,343,75,411,117.3C480,160,549,224,617,224C685.7,224,754,160,823,149.3C891.4,139,960,181,1029,208C1097.1,235,1166,245,1234,234.7C1302.9,224,1371,192,1406,176L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
      </svg>
    </div>
    <!-- kontak end -->

    <!-- footer start -->
    <footer>
      <div class="container-xl p-2 d-flex flex-wrap justify-content-evenly text-light">
        <div class="footer-about" style="max-width: 350px;">
          <h3>Profile Desa</h3>
          <p>Desa Jatisari adalah desa yang terletak di Kecamatan Senori Jawa Timur. Desa Jatisari di kenal karena
            banyaknya pondok pesantren dan sekolah yang berdiri, oleh karena inilah banyak pendatang dari desa,
            kecamatan atau bahkan kebupaten lain untuk menempa ilmu di Desa Jatisari. </p>
        </div>
        <div class="footer-navigation" style="max-width: 300px;">
          <h3>Navigation</h3>
          <ul class="text-decoration-none">
            <li>
              <a href="index.php" class="text-light link-underline link-underline-opacity-0">Beranda</a>
            </li>
            <li>
              <a href="pages/berita.php" class="text-light link-underline link-underline-opacity-0">Berita</a>
            </li>
            <li>
              <a href="pages/pengaduan.php" class="text-light link-underline link-underline-opacity-0">Pengaduan</a>
            </li>
          </ul>
        </div>
        <div class="footer-contact">
          <h3>Kontak</h3>
          <ul class="text-decoration-none">
            <li>+62 88647735565
            </li>
            <li>
              desajatisari@gmail.com
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <div class="copyright">
      <p>Copyright Desa Jatisari 2024</p>
    </div>
    <!-- footer end -->
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
  <!-- splide.js -->
  <script src=https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js></script>
  <script>new Splide(".splide",
      {
        type: "loop",
        perPage: 1,
        width: "65%"
      }).mount();
  </script>

</body>

</html>