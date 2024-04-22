<?php
$db         = \Config\Database::connect();

$level      = session()->get('level');
$on         = 'user.level=level.id_level';
$namalevel  = $db->table('user')->join('level', $on, 'left')->where('level.id_level', $level)->get()->getRow();

$id_user = session()->get('id');
$user = $db->table('user')->where('id_user', $id_user)->get()->getRow();

// if (!empty($user->foto)) {
//   $foto = base_url('agendapkl/images/' . $user->foto);
// } else {
//   $foto = base_url('agendapkl/images/default.png');
// }

?>

<div id="main-content">
  <div class="page-heading">
    <div class="page-heading">
      <h3><?=$title?></h3>
    </div>
    <div class="page-content">

      <div class="card">
        <div class="card-body py-4 px-4">
          <div class="d-flex align-items-center">
            <div class="avatar avatar-xl">
              <img src="<?=base_url('@agendapkl/images/default.png')?>">
            </div>
            <div class="ms-3 name">
              <h5 class="font-bold">Selamat Datang, <?=session()->get('username')?></h5>
              <h6 class="text-muted mb-0">Anda adalah <?=$namalevel->nama_level?></h6>
            </div>
          </div>
        </div>
      </div>

      <section>
        <div class="row match-height">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4>Galeri Sekolah</h4>
                <p>Berikut ini beberapa galeri sekolah.</p>
              </div>

              <div class="card-body">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?=base_url('@agendapkl/assets/compiled/jpg/building.jpg')?>" class="d-block w-100"/>
                    </div>
                    <div class="carousel-item">
                      <img src="<?=base_url('@agendapkl/assets/compiled/jpg/architecture1.jpg')?>" class="d-block w-100"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>           

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4>Aturan Sekolah</h4>
                <p>Bacalah aturan sekolah dibawah ini!</p>
              </div>
              <div class="card-body">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                  </ol>

                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?=base_url('@agendapkl//assets/compiled/png/1.png')?>" class="d-block w-100"/>
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Aturan #1</h5>
                        <p>Datang harus tepat waktu</p>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="<?=base_url('@agendapkl//assets/compiled/png/2.png')?>" class="d-block w-100"/>
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Aturan #2</h5>
                        <p>Alpa dipotong 100.000 Gajinya</p>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="<?=base_url('@agendapkl//assets/compiled/png/3.png')?>" class="d-block w-100"/>
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Aturan #3</h5>
                        <p>Sakit harus melapor ke HRD</p>
                      </div>
                    </div>
                  </div>

                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </a>

                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>