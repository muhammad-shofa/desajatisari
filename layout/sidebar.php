<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Desa Jatisari</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <a href="profile.php" class="d-block">
                <div class="image">
                    <img src="../assets/img/default.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <?= $_SESSION["username"] ?>
                </div>
            </a>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="admin-dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin-pengaduan.php" class="nav-link">
                        <i class="nav-icon fas fa-exclamation"></i>
                        <p>
                            Pengaduan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin-berita.php" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin-acara.php" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Acara
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin-galeri.php" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>