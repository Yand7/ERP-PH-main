<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input <?=$title?></h3>
                    <p class="text-subtitle text-muted">
                        Silakan Masukkan <?=$title?>
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?=base_url('data_master')?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input <?=$title?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-label-left" novalidate
                                    action="<?= base_url('data_master/aksi_tambah_rombel')?>" method="post"
                                    enctype="multipart/form-data">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="first-name-horizontal">Nama</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="first-name-horizontal" class="form-control"
                                                        name="nama" placeholder="Nama" />
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-select" id="basicSelect" name="kelas">
                                                        <option>-PILIH-</option>
                                                        <?php
                          foreach ($g as $h) {
                            $selected = ($jojo->id_kelas == $h->id_kelas) ? "selected" : "";
                            ?>
                                                        <option value="<?= $h->id_kelas ?>" <?= $selected ?>>
                                                            <?php echo $h->nama_kelas ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Jurusan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-select" id="basicSelect" name="jurusan">
                                                        <option>-PILIH-</option>
                                                        <?php
                          foreach ($a as $b) {
                            $selected = ($jojo->id_jurusan == $b->id_jurusan) ? "selected" : "";
                            ?>
                                                        <option value="<?= $b->id_jurusan ?>" <?= $selected ?>>
                                                            <?php echo $b->nama_jurusan ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>