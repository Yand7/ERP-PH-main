<?php 
  use App\Models\piketm\M_model;
  $model =new M_model();
  $a = session()->get('id');

  $nm = $model->useRow("SELECT * from user where id_user='{$a}'");
?>
<?php 
if(session()->get('level')==1) {
?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Selamat Datang <?= $nm->username?></h5>
            </div>
        </div>
    </div>
    <?php 
}else if (session()->get('level')== '10' || session()->get('level')== '3') {
?>
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
                            <form class="form-horizontal form-material mx-2" action="<?= base_url('/piket/home/find')?>"
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
        </div>
        <!-- / Content -->
        <?php 
}else if (session()->get('level')== '5' || session()->get('level')== '4' ) {
?>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Hasil Penilaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($aaa as $data) { ?>
                                        <tr>
                                            <td>Penilaian pada tanggal <?= $data->tanggal?>, <?= $data->isi ?></td>
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
            <?php }?>