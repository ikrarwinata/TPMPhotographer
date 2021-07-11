<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="admin/Home">
                    <h3>TPM Photography</h3>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="admin/Home">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="admin/Pengunjung">
                        <i class="fas fa-chart-bar"></i>Pengunjung</a>
                </li>
                <li>
                    <a href="admin/Booking">
                        <i class="fas fa-book"></i>Booked
                        <?php if ($this->session->userdata("booked") >= 1) : ?>
                            <span class="badge badge-warning"><?php echo ($this->session->userdata("booked")) ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li>
                    <a href="admin/News">
                        <i class="fas fa-calendar-alt"></i>Informasi</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-camera"></i>Produk&nbsp;<i class="fa fa-angle-down"></i></a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="admin/Produk">Paket</a>
                        </li>
                        <li>
                            <a href="admin/Kategori_produk">Kategori Paket</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/Gallery">
                        <i class="far fa-image"></i>Gallery</a>
                </li>
                <li>
                    <a href="admin/Perusahaan">
                        <i class="fas fa-desktop"></i>Profil Perusahaan</a>
                </li>
                <li>
                    <a href="admin/Users_admin">
                        <i class="fas fa-lock"></i>Akun Admin</a>
                </li>
                <li>
                    <a href="admin/Users">
                        <i class="fas fa-users"></i>Akun Pengguna</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <h3>TPM Photography</h3>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="admin/Home">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="admin/Pengunjung">
                        <i class="fas fa-chart-bar"></i>Pengunjung</a>
                </li>
                <li>
                    <a href="admin/Booking">
                        <i class="fas fa-book"></i>Booked
                        <?php if ($this->session->userdata("booked") >= 1) : ?>
                            <span class="badge badge-warning"><?php echo ($this->session->userdata("booked")) ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li>
                    <a href="admin/News">
                        <i class="fas fa-calendar-alt"></i>Informasi</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-camera"></i>Produk&nbsp;<i class="fa fa-angle-down"></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="admin/Produk">Paket Produk</a>
                        </li>
                        <li>
                            <a href="admin/Kategori_produk">Kategori Produk</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/Gallery">
                        <i class="far fa-image"></i>Gallery</a>
                </li>
                <li>
                    <a href="admin/Perusahaan">
                        <i class="fas fa-desktop"></i>Profil Perusahaan</a>
                </li>
                <li>
                    <a href="admin/Users_admin">
                        <i class="fas fa-lock"></i>Akun Admin</a>
                </li>
                <li>
                    <a href="admin/Users">
                        <i class="fas fa-users"></i>Akun Pengguna</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->