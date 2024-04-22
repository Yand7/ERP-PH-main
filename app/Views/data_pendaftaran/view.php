<!-- <style>
  .btn-stack {
    display: flex;
    flex-direction: column;
  }

  .btn-stack .btn {
    margin-bottom: 5px;
    width: 100%; /* Atur lebar tombol sesuai kebutuhan */
    text-align: center; /* Pusatkan teks di dalam tombol */
  }
</style>
-->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?=$title?></h3>
                    <p class="text-subtitle text-muted">Anda dapat melihat <?=$title?> di bawah</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url('data_master')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo base_url('data_master/create_pendaftaran')?>"><button
                            class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
                            Tambah</button></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Rombel</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat</th>
                                    <th>Asal Sekolah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
							$no = 1;
							foreach ($jojo as $riz) {
								?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?php echo $riz->nama_lengkap ?></td>
                                <td><?php echo $riz->nik ?></td>
                                <td><?php echo $riz->nama_kelas . ' - ' . $riz->nama_jurusan ?></td>
                                <td><?php echo $riz->nama_jk ?></td>
                                <td><?php echo $riz->nama_agama ?></td>
                                <td><?php echo $riz->no_hp ?></td>
                                <td><?php echo $riz->alamat ?></td>
                                <td><?php echo $riz->asal_sekolah ?></td>
                                <td>
                                    <?php if ($riz->kondisi == 0) { ?>
                                    <!-- <div class="btn-stack"> -->
                                    <!-- <a href="<?php echo base_url('data_master/siswa_diterima/' . $riz->id_pendaftaran) ?>" class="btn btn-success my-1"> -->
                                    <a class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modal-import-<?= $riz->id_pendaftaran ?>">
                                        <i class="fa-sharp fa-solid fa-check"></i>
                                    </a>
                                    <a href="<?php echo base_url('data_master/siswa_ditolak/' . $riz->id_pendaftaran) ?>"
                                        class="btn btn-danger my-1">
                                        <i class="fa-sharp fa-solid fa-xmark"></i>
                                    </a>
                                    <a href="<?php echo base_url('data_master/detail_siswa/' . $riz->id_pendaftaran) ?>"
                                        class="btn btn-warning my-1" style="color: #ffffff;">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <!-- </div> -->

                                    <!-- Modal Import -->

                                    <div class="modal fade text-left" id="modal-import-<?= $riz->id_pendaftaran ?>"
                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">
                                                        Masukkan NIS
                                                    </h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                <form
                                                    action="<?= base_url('data_master/siswa_diterima/' . $riz->id_pendaftaran) ?>"
                                                    method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <label for="nis">NIS</label>
                                                        <input type="text" id="nis" class="form-control"
                                                            placeholder="Masukkan NIS" name="nis" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Modal Import -->

                                    <?php } else if ($riz->kondisi == 1) { ?>
                                    <span class="rounded-pill bg-success text-white px-3 py-2">Diterima</span>
                                    <?php } else if ($riz->kondisi == 2) { ?>
                                    <span class="rounded-pill bg-danger text-white px-3 py-2">Ditolak</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>