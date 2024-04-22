<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Jadwal Piket</h5>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th style="padding-left: 0.5rem;">Nama</th>
                                    <th style="padding-left: 0.5rem;">Jadwal</th>
                                    <th style="padding-left: 0.5rem;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mrd as $data) { ?>
                                <tr>
                                    <td><?= $data->nama_siswa ?></td>
                                    <td><?= $data->hari ?></td>
                                    <td>

                                        <a href="<?= base_url('/piket/home/e_jadwal/'.$data->id_siswa)?>">
                                            <button class="btn btn-sm btn-warning text-white me-1 mb-1 mt-1">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </a>

                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>