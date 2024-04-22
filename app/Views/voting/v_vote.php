<?php
   use App\Models\voting\K_model;
        if(session()->get('level')== 1){
          ?>

<title>Vote</title>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end"
                    >
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Vote</h4>
                    <a href="<?= base_url('/voting/Vote/tambah/') ?>" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn btn-primary">Tambah Vote</button>
                    </a>
                    <a href="<?=base_url('/voting/Vote/store/')?>" style="position: absolute; top: 10px; right: 135px;">
                        <button class="btn btn-warning">Store Data</button>
                    </a>
                 
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Periode Mulai</th>
                                        <th>Periode Selesai</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 $model = new K_model();
$no = 1;
foreach ($periodes as $periode) {
    // Mengambil data kandidat untuk periode tersebut
    $allKandidat = $model->getAllKandidatByPeriodeId($periode->id);

    // Menginisialisasi variabel untuk menghitung kandidat dengan status2 'Tampil'
    $countTampil = 0;

    // Memeriksa status2 kandidat
    foreach ($allKandidat as $kandidat) {
        if ($kandidat['status2'] == 'Tampil') {
            $countTampil++;
        }
    }
    ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $periode->periode ?> </td>
        <td><?php echo $periode->p_mulai ?> </td>
        <td><?php echo $periode->p_selesai ?> </td>
        <td><?php echo $periode->status ?> </td>
        <td>
            <a href="<?= base_url('/voting/Vote/detail/'.$periode->id) ?>"><button class="btn btn-warning">Detail</button></a>
            <a href="<?= base_url('/voting/Vote/edit/'.$periode->id) ?>"><button class="btn btn-primary">Edit</button></a>
            <a href="<?= base_url('/voting/Vote/delete/'.$periode->id) ?>"><button class="btn btn-danger">Delete</button></a>
            
            <?php
            // Menampilkan tombol "Tampilkan Hasil" jika ada kandidat yang belum memiliki status2 'Tampil'
            if ($countTampil < count($allKandidat)) {
                echo '<a href="'.base_url('/voting/Vote/aksi/'.$periode->id).'"><button class="btn btn-success">Tampilkan Hasil</button></a>';
            } else {
                echo '<button class="btn btn-secondary" disabled>Tampilkan Hasil</button>';
            }
            
            // Menampilkan tombol "Matikan Hasil" jika ada kandidat yang memiliki status2 'Tampil'
            if ($countTampil > 0) {
                echo '<a href="'.base_url('/voting/Vote/matikanHasil/'.$periode->id).'"><button class="btn btn-danger">Matikan Hasil</button></a>';
            }
            ?>
        </td>
    </tr>
    <?php
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                                </div>
<?php
        }else if(session()->get('level')== 2){
          ?>

          
          <title>Vote</title>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end"
                    >
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Vote</h4>
                    <a href="<?= base_url('/voting/Vote/tambah/') ?>" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn btn-primary">Tambah Vote</button>
        </a>
                  
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Periode Mulai</th>
                                        <th>Periode Selesai</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 $model = new K_model();
$no = 1;
foreach ($periodes as $periode) {
    // Mengambil data kandidat untuk periode tersebut
    $allKandidat = $model->getAllKandidatByPeriodeId($periode->id);

    // Menginisialisasi variabel untuk menghitung kandidat dengan status2 'Tampil'
    $countTampil = 0;

    // Memeriksa status2 kandidat
    foreach ($allKandidat as $kandidat) {
        if ($kandidat['status2'] == 'Tampil') {
            $countTampil++;
        }
    }
    ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $periode->periode ?> </td>
        <td><?php echo $periode->p_mulai ?> </td>
        <td><?php echo $periode->p_selesai ?> </td>
        <td><?php echo $periode->status ?> </td>
        <td>
            <a href="<?= base_url('/voting/Vote/detail/'.$periode->id) ?>"><button class="btn btn-warning">Detail</button></a>
            <a href="<?= base_url('/voting/Vote/edit/'.$periode->id) ?>"><button class="btn btn-primary">Edit</button></a>
            <a href="<?= base_url('/voting/Vote/delete/'.$periode->id) ?>"><button class="btn btn-danger">Delete</button></a>
            
            <?php
            // Menampilkan tombol "Tampilkan Hasil" jika ada kandidat yang belum memiliki status2 'Tampil'
            if ($countTampil < count($allKandidat)) {
                echo '<a href="'.base_url('/voting/Vote/aksi/'.$periode->id).'"><button class="btn btn-success">Tampilkan Hasil</button></a>';
            } else {
                echo '<button class="btn btn-secondary" disabled>Tampilkan Hasil</button>';
            }
            
            // Menampilkan tombol "Matikan Hasil" jika ada kandidat yang memiliki status2 'Tampil'
            if ($countTampil > 0) {
                echo '<a href="'.base_url('/voting/Vote/matikanHasil/'.$periode->id).'"><button class="btn btn-danger">Matikan Hasil</button></a>';
            }
            ?>
        </td>
    </tr>
    <?php
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php } ?>