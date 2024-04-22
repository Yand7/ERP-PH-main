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

        <section class="section">
            <div class="card">
                <form action="<?= base_url('/data_master/aksi_create_pendaftaran/')?>" method="post" class="row g-3"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama"
                                        name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir" name="tempat_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir"
                                        placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jk" placeholder="Masukkan Jenis Kelamin" name="jk"
                                        required>
                                        <option value="">- Pilih -</option>
                                        <?php 
									foreach ($jk as $jenis_kelamin) {
										?>
                                        <option value="<?= $jenis_kelamin->id_jk?>"><?= $jenis_kelamin->nama_jk?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Agama</label>
                                    <select class="form-select" id="agama" placeholder="Masukkan Agama" name="agama"
                                        required>
                                        <option value="">- Pilih -</option>
                                        <?php 
									foreach ($agama as $a) {
										?>
                                        <option value="<?= $a->id_agama?>"><?= $a->nama_agama?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telepon"
                                        placeholder="Masukkan Telepon (Max 15 Digit)" name="telepon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Alamat Tempat Tinggal</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"
                                        placeholder="Masukkan Alamat Tempat Tinggal"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- form bagian kanan -->
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Jenjang</label>
                                    <select class="form-select" id="agama" placeholder="Masukkan Jenjang" name="jenjang"
                                        required>
                                        <option value="">- Pilih -</option>
                                        <?php 
									foreach ($rombel as $r) {
										?>
                                        <option value="<?= $r->id_rombel ?>">
                                            <?php echo $r->nama_kelas . ' - ' . $r->nama_jurusan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asal"
                                        placeholder="Masukkan Asal Sekolah" name="asal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah"
                                        placeholder="Masukkan Nama Ayah" name="nama_ayah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu"
                                        placeholder="Masukkan Nama Ibu" name="nama_ibu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Pekerjaan Orang Tua</label>
                                    <input type="text" class="form-control" id="pekerjaan_ortu"
                                        placeholder="Masukkan Pekerjaan Orang Tua" name="pekerjaan_ortu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namasiswa" class="form-label">Alamat Kantor Orang Tua</label>
                                    <textarea class="form-control" id="alamat_kantor" rows="3" name="alamat_kantor"
                                        placeholder="Masukkan Alamat Kantor Orang Tua"></textarea>
                                </div>
                                <!-- form bagian kanan -->
                            </div>

                            <!-- bagian tombol submit -->
                            <div class="col-12">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-0 col-md-offset-0">
                                        <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!-- bagian tombol submit -->
                </form>
            </div>

            </body>

            </html>