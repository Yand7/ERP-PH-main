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

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="<?=base_url('/data_master/tambah_sekretaris/')?>">
                        <button class="btn btn-primary">Tambah Sekretaris</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sekretaris</th>
                                    <th>Rombel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                $no=1;
                foreach ($a as $b) {
                  ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $b->nama_siswa?> </td>
                                    <td><?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?></td>
                                    <td>
                                        <a href="<?=base_url('/data_master/delete_sekre/'.$b->id_siswa)?>"><button
                                                class="btn btn-danger">Delete</button></a>

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
        </section>
        <!-- Basic Tables end -->
    </div>