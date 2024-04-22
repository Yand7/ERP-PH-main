<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('/piket/home/output_jadwal')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ide" value="<?= $ss->id_siswa?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Jadwal Piket</label>
                        <select class="form-select" id="" aria-label="" name="hri">
                            <?php
                            foreach ($hri as $b) {

                            $selected = ($ss->jadwal_piket == $b->id_hari) ? "selected" : "";
                            ?>
                            <option value="<?= $b->id_hari ?>" <?= $selected ?>>
                                <?php echo $b->hari?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/piket/home/jadwal')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>