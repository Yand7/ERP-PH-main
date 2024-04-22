<?php 
if (session()->get('level')== '1' ) {
?>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="<?= base_url('/piket/Home/mpg')?>" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="<?= base_url('/@public_piket/login/unnamed.png')?>" alt="" style="width: 100px;">
                    </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="<?= base_url('/piket/Home/mpg')?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-calendar"></i>
                        <div data-i18n="Layouts">Penilaian</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/piket/Home/menilai')?>" class="menu-link">
                                <div data-i18n="Without menu">Menilai</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url('/piket/Home/cek')?>" class="menu-link">
                                <div data-i18n="Without menu">Cek Nilai</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="<?= base_url('/piket/Home/print')?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-printer"></i>
                        <div data-i18n="Analytics">Laporan Penilaian</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="<?=base_url('landinpage/home/dashboard')?>">
                        <i class="menu-icon tf-icons bx bx-log-out"></i>
                        Back</a>
                </li>

                <!-- Layouts -->
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">

                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">


                    </ul>
                </div>
            </nav>
            <?php 
}else if (session()->get('level')== '10' || session()->get('level')== '3' ) {
?>
            <!-- Layout wrapper -->
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    <!-- Menu -->

                    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                        <div class="app-brand demo">
                            <a href="<?= base_url('/piket/Home/mpg')?>" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="<?= base_url('/@public_piket/login/unnamed.png')?>" alt=""
                                        style="width: 100px;">
                                </span>
                            </a>

                            <a href="javascript:void(0);"
                                class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                                <i class="bx bx-chevron-left bx-sm align-middle"></i>
                            </a>
                        </div>

                        <div class="menu-inner-shadow"></div>

                        <ul class="menu-inner py-1">
                            <!-- Dashboard -->
                            <li class="menu-item">
                                <a href="<?= base_url('/piket/Home/mpg')?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-home"></i>
                                    <div data-i18n="Analytics">Dashboard</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                                    <div data-i18n="Layouts">Penilaian</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/piket/Home/menilai')?>" class="menu-link">
                                            <div data-i18n="Without menu">Menilai</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?= base_url('/piket/Home/cek')?>" class="menu-link">
                                            <div data-i18n="Without menu">Cek Nilai</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="<?= base_url('/piket/Home/jadwal')?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-book-content"></i>
                                    <div data-i18n="Analytics">Jadwal Piket</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="<?= base_url('/piket/Home/print')?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-printer"></i>
                                    <div data-i18n="Analytics">Laporan Penilaian</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a class="menu-link" href="<?=base_url('landinpage/home/dashboard')?>">
                                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                                    Back</a>
                            </li>

                        </ul>
                    </aside>
                    <!-- / Menu -->

                    <!-- Layout container -->
                    <div class="layout-page">
                        <!-- Navbar -->

                        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                            id="layout-navbar">
                            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                    <i class="bx bx-menu bx-sm"></i>
                                </a>
                            </div>

                            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                                <!-- Search -->
                                <div class="navbar-nav align-items-center">

                                </div>
                                <!-- /Search -->

                                <ul class="navbar-nav flex-row align-items-center ms-auto">

                                </ul>
                            </div>
                        </nav>
                        <?php 
}else if (session()->get('level')== '4' || session()->get('level')== '5') {
?>
                        <!-- Layout wrapper -->
                        <div class="layout-wrapper layout-content-navbar">
                            <div class="layout-container">
                                <!-- Menu -->

                                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                                    <div class="app-brand demo">
                                        <a href="<?= base_url('/piket/Home/mpg')?>" class="app-brand-link">
                                            <span class="app-brand-logo demo">
                                                <img src="<?= base_url('/@public_piket/login/unnamed.png')?>" alt=""
                                                    style="width: 100px;">
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);"
                                            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                                        </a>
                                    </div>

                                    <div class="menu-inner-shadow"></div>

                                    <ul class="menu-inner py-1">
                                        <!-- Dashboard -->
                                        <li class="menu-item">
                                            <a href="<?= base_url('/piket/Home/mpg')?>" class="menu-link">
                                                <i class="menu-icon tf-icons bx bx-home"></i>
                                                <div data-i18n="Analytics">Dashboard</div>
                                            </a>
                                        </li>

                                        <?php if(session()->get('level')== '5'){?>
                                        <li class="menu-item">
                                            <a href="<?= base_url('/piket/Home/print')?>" class="menu-link">
                                                <i class="menu-icon tf-icons bx bx-printer"></i>
                                                <div data-i18n="Analytics">Laporan Penilaian</div>
                                            </a>
                                        </li>
                                        <?php }?>

                                        <li class="menu-item">
                                            <a class="menu-link" href="<?=base_url('landinpage/home/dashboard')?>">
                                                <i class="menu-icon tf-icons bx bx-log-out"></i>
                                                Back</a>
                                        </li>

                                    </ul>
                                </aside>
                                <!-- / Menu -->

                                <!-- Layout container -->
                                <div class="layout-page">
                                    <!-- Navbar -->

                                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                                        id="layout-navbar">
                                        <div
                                            class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                                <i class="bx bx-menu bx-sm"></i>
                                            </a>
                                        </div>

                                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                                            <!-- Search -->
                                            <div class="navbar-nav align-items-center">

                                            </div>
                                            <!-- /Search -->

                                            <ul class="navbar-nav flex-row align-items-center ms-auto">

                                            </ul>
                                        </div>
                                    </nav>
                                    <?php } ?>