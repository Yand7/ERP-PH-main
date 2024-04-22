<title>Dashboard</title>
<div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <section id="groups">
                <div class="row match-height">
                    
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
             
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
      <div class="w-100">
        <div class="card mb-4">
          <div class="card-body text-center">
            <h1 class="mb-3">Welcome <?php echo session()->get('nama') ?></h1>
            <p class="lead">Terimakasih sudah mengunjungi website ini. Semoga hari anda menyenangkan. Silahkan pilih menu voting untuk melakukan voting.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

                    </div>
                </div>
            </section>
        </div>