<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>ERP - SPH</title>
    <base href="<?php echo base_url('assets_landing_page') ?>/">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-topic-listing.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script src="https://kit.fontawesome.com/c0c79d4e21.js" crossorigin="anonymous"></script>
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <span>ERP - SPH</span>
                </a>

                <div class="header-left">
                </div>

                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <style>
                        .header-info {
                            display: flex;
                            align-items: center;
                        }

                        .avatar-image {
                            width: 30px;
                            /* Sesuaikan lebar gambar sesuai kebutuhan */
                            height: 30px;
                            /* Sesuaikan tinggi gambar sesuai kebutuhan */
                            border-radius: 50%;
                            /* Agar gambar menjadi lingkaran (opsional) */
                            margin-left: 10px;
                            /* Sesuaikan dengan margin yang diinginkan */
                        }
                        </style>

                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="header-info">
                                <span>Hello, <strong class="text-capitalize">
                                        <?php 
                                        if (session()->has('nama')) {
                                            echo session()->get('nama');
                                        }
                                        ?>
                                    </strong></span>
                                <img src="<?= base_url('images/default.png') ?>" class="avatar-image" alt="Avatar">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('/landinpage/home/user_s')?>" class="dropdown-item ai-icon">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span class="ms-2">Change Password </span>
                            </a>
                            <a href="<?= base_url('landinpage/home/logout')?>" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
        </nav>

        <section class="explore-section section-padding" id="section_2">
            </div>
            <br>
            <div class="container">
                <div class="row">

                    <?php if (session()->get('level')!=10 && session()->get('level')!=0){?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal"
                        data-bs-target="#project-05">
                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png"
                                class="custom-block-image img-fluid" alt="">
                            <br>
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">E-Voting</h5>
                                    <p class="mb-0">Aplikasi E-Voting</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="project-05" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">E-Voting</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a href="/voting"><button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal">Membuka APP</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if (session()->get('level')!=10 && session()->get('level')!=0 && session()->get('level')!=4 && session()->get('level')!=5){?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal"
                        data-bs-target="#project-02">
                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png"
                                class="custom-block-image img-fluid" alt="">
                            <br>
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Absensi</h5>
                                    <p class="mb-0">Aplikasi Absensi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="project-02" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a href="/dashboard"><button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal">Membuka APP</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if (session()->get('level')>0){?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal"
                        data-bs-target="#project-03">
                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                            <img src="images/topics/colleagues-working-cozy-office-medium-shot.png"
                                class="custom-block-image img-fluid" alt="">
                            <br>
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Penilaian Piket</h5>
                                    <p class="mb-0">Aplikasi Penilaian Piket</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="project-03" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Penilaian Piket</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a href="/piket"><button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal">Membuka APP</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <?php }?>


                <div class="row">
                    <style>
                    #webDesignCard {
                        cursor: pointer;
                    }
                    </style>

                    <?php if (session()->get('level')==1 || session()->get('level')==2){?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal"
                        data-bs-target="#project-06">
                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                            <img src="images/topics/colleagues-working-cozy-office-medium-shot.png"
                                class="custom-block-image img-fluid" alt="">
                            <br>
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Data Master</h5>
                                    <p class="mb-0">Aplikasi Data Master</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="project-06" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Project 06</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a href="<?= base_url('/data_master')?>"><button type="button"
                                            class="btn btn-success" data-bs-dismiss="modal">Membuka APP</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <?php }?>


                <!-- <div class="row">
        <style>
            #webDesignCard {
                cursor: pointer;
            }
        </style>

        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard"
        data-bs-toggle="modal" data-bs-target="#project-07">
        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
            <img src="images/topics/undraw_Remote_design_team_re_urdx.png"
            class="custom-block-image img-fluid" alt="">
            <br>
            <div class="d-flex">
                <div>
                    <h5 class="mb-2">Project 07</h5>
                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="project-07" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project 07</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Cancel</button>
                <a href="/project-07"><button type="button" class="btn btn-success"
                    data-bs-dismiss="modal">Membuka APP</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard"
    data-bs-toggle="modal" data-bs-target="#project-08">
    <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
        <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png"
        class="custom-block-image img-fluid" alt="">
        <br>
        <div class="d-flex">
            <div>
                <h5 class="mb-2">Project 08</h5>
                <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="project-08" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Project 08</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Cancel</button>
            <a href="/project-08"><button type="button" class="btn btn-success"
                data-bs-dismiss="modal">Membuka APP</button></a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard"
data-bs-toggle="modal" data-bs-target="#project-09">
<div class="custom-block bg-white shadow-lg" data-aos="fade-up">
    <img src="images/topics/colleagues-working-cozy-office-medium-shot.png"
    class="custom-block-image img-fluid" alt="">
    <br>
    <div class="d-flex">
        <div>
            <h5 class="mb-2">Project 09</h5>
            <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="project-09" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Project 09</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Cancel</button>
            <a href="/project-09"><button type="button" class="btn btn-success"
                data-bs-dismiss="modal">Membuka APP</button></a>
            </div>
        </div>
    </div>
</div> -->
            </div><br>

            </div>
            </div>
            </div>
            </div>
        </section>

    </main>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
<style>
*::-webkit-scrollbar {
    display: none;
}
</style>
<script>
AOS.init();
</script>
<!-- End Col -->

<!-- Log Out Otomatis -->
<script>
// Fungsi untuk mengatur timer otomatis logout
function startLogoutTimer() {
    let timeoutId;

    function resetTimer() {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(logout, 30 * 60 * 1000); //30 Menit
    }

    function logout() {
        window.location.href = '<?= base_url('landinpage/home/logout') ?>';
    }

    // Resep timer setiap kali ada aktivitas
    window.addEventListener('mousemove', resetTimer);
    window.addEventListener('click', resetTimer);
    window.addEventListener('keypress', resetTimer);
    resetTimer();
}

// Panggil fungsi untuk memulai timer otomatis logout
startLogoutTimer();
</script>
<!-- Log Out Otomatis -->