<?php
$session_login = isset($_SESSION['is_login']) ? '<a href="profile.php"><img class="img-tumbnail rounded-5" width="50px" height="50px" src="../assets/img/default.png" alt=""></a>' : '<div>
<a href="../login.php" class="btn btn-primary">Masuk</a>
<a href="../register.php" class="btn btn-outline-primary">Daftar</a>
</div>';
?>

<nav class="navbar fixed-top navbar-expand-lg border-bottom shadow-sm bg-body-tertiary">
    <div class="container-fluid py-2" id="nav-container">
        <span>
            <a class="navbar-brand fs-3" href="../index.php"><b>DesaJatisari</b></a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <div></div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php">Beranda</a>
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
                    <a class="nav-link" href="../pages/berita.php">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/pengaduan.php">Pengaduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/galeri.php">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>
            <div>
                <?= $session_login ?>
            </div>
        </div>
    </div>
</nav>