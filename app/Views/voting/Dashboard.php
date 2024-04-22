<title>Dashboard</title>
<div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <section id="groups">
                <div class="row match-height">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="section-title text-uppercase">Dashboard</h4>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-12">
                        <!-- Check if success_message flash session exists -->
                        <?php if (session()->has('success_message')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success_message') ?>
                            </div>
                        <?php endif; ?>

                        <!-- Your existing card content goes here -->
                        <div class="card-group">
                            <div class="card">
                                <div class="card-content">
                                    <img
                                        class="card-img-top img-fluid"
                                        src="<?php echo base_url('./assets/compiled/png/1.png')?>"
                                        alt="Card image cap"
                                    />
                                    <div class="card-body">
                                        <h4 class="card-title">Langkah 1</h4>
                                        <p class="card-text">Pilih menu Voting, apabila tidak muncul silahkan klik list tiga di pojok kiri atas. Kamu juga dapat ganti password di menu.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <img
                                        class="card-img-top img-fluid"
                                        src="<?php echo base_url('./assets/compiled/png/2.png')?>"
                                        alt="Card image cap"
                                    />
                                    <div class="card-body">
                                        <h4 class="card-title">Langkah 2</h4>
                                        <p class="card-text">
                                        Vote kandidat sesuai dengan pilihanmu, pilih dengan benar ya karena hanya dapat memilih 1 kali saja.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <img
                                        class="card-img-top img-fluid"
                                        src="<?php echo base_url('./assets/compiled/png/3.png')?>"
                                        alt="Card image cap"
                                    />
                                    <div class="card-body">
                                        <h4 class="card-title">Langkah 3</h4>
                                        <p class="card-text">
                                        Hasil voting akan muncul saat periode pemilihan sudah berakhir, hasil dapat dilihat di menu Hasil.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <img
                                        class="card-img-top img-fluid"
                                        src="<?php echo base_url('./assets/compiled/png/4.png')?>"
                                        alt="Card image cap"
                                    />
                                    <div class="card-body">
                                        <h4 class="card-title">Langkah 4</h4>
                                        <p class="card-text">
                                        Silahkan Log Out jika sudah, apabila ingin Log in lagi jangan lupa username dan password mu ya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>