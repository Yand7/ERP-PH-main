<?php 
  use App\Models\piketm\M_model;
  $model =new M_model();
  $a = session()->get('id');

  $nm = $model->useRow("SELECT * from user where id_user='{$a}'");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Selamat Datang <?= $nm->username?></h5>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="<?= base_url('/piket/Home/find')?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="ide" value="<?= $us->id_user?>">
                            <div class="row">
                                <div class="mb-3 col-md-5">
                                    <label for="" class="form-label">Pilih Tanggal</label>
                                    <input class="form-control" type="date" id="" name="tgl" placeholder="" />
                                </div>
                                <div class="mb-3 col-md-2 d-flex align-items-end justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        Find
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="padding-left: 0.5rem;">Kelas Nilai Baik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($averageBaik as $rombel => $avg) { ?>
                                <tr>
                                    <td><?= $rombel ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="padding-left: 0.5rem;">Kelas Nilai Tidak Baik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($averageTidakBaik as $rombel => $avg) { ?>
                                <tr>
                                    <td><?= $rombel ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->