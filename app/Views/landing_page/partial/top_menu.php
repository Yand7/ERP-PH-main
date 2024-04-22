<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">

    <!-- TOP NAV -->
<!--     <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i> info@example.com</p>
                    <p> <i class='bx bxs-phone-call'></i> 123 456-7890</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <img src="<?=base_url('prixier/img/logo_sph.png')?>" alt="logo" style="max-width: 10%; height: auto; margin-top: 10px; margin-bottom: 10px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#jenjang">Jenjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#fasilitas">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portofolio">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#biaya">Biaya</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#reviews">Reviews</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog</a>
                </li> -->
            </ul>
            <a href="<?= base_url('data_pendaftaran/pendaftaran_baru')?>"
            class="btn btn-brand ms-lg-3"><i class="faj-button fa-solid fa-user-plus"></i>Pendaftaran</a>

            <a href="<?= base_url('landinpage')?>"
            class="btn btn-brand ms-lg-3"><i class="faj-button fa-regular fa-users"></i>ERP</a>
        </div>
    </div>
</nav>



