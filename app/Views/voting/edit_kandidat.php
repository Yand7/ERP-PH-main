<title>Edit Kandidat</title>
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
<?php if (isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif; ?>
<form novalidate action="<?= base_url('/voting/Kandidat/update/' . $a['id'])?>" method="post" enctype="multipart/form-data">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Edit Kandidat</h4>
                <a href="<?= site_url('/voting/kandidat') ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                        <?php if (!empty($a['foto'])): ?>
                                        <div class="mt-3">
                                            <label>Foto Lama</label>
                                            <br>
                                            <img src="<?= base_url('images/' . $a['foto']) ?>"  class="img-fluid rounded" width="100">
                                         </div>
                                         <?php endif; ?>
                                         <br>
                                         <div class="col-md-4">
                                            
                                            <label>Foto Baru</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                    <input type="file" class="form-control" placeholder="Foto" name="foto" id="foto" onchange="previewImage()">
                                                    <img id="preview" src="" alt="" style="max-width: 100px; margin-top: 10px;">
                                                </div>
                                            </div>
                                        </div>
                            <div class="col-md-4">
                                <label>Ketua OSIS</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <fieldset class="form-group">
                                           <select class="form-select" id="basicSelect" name="ketua" >
                                            <option>-PILIH-</option>
                                            <?php foreach ($b as $c) {
                                                if ($c->level == 4 && $c->deleted_at == null) {
                                                    ?>
                                                    <option value ="<?= $c->id_user?>" <?php if ($a['ketua'] == $c->id_user) echo 'selected' ?>>
                                                        <?php echo $c->nama?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Wakil Ketua OSIS</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <fieldset class="form-group">
                                           <select class="form-select" id="basicSelect" name="wakil" >
                                            <option>-PILIH-</option>
                                            <?php foreach ($b as $c) {
                                                if ($c->level == 4 && $c->deleted_at == null) {
                                                    ?>
                                                    <option value ="<?= $c->id_user?>" <?php if ($a['wakil'] == $c->id_user) echo 'selected' ?>>
                                                        <?php echo $c->nama?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Wakil Ketua OSIS 2</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="wakil2">
                                                <option>-PILIH-</option>
                                                <?php foreach ($b as $c) {
                                                    if ($c->level == 4 && $c->deleted_at == null) {
                                                        ?>
                                                        <option value="<?= $c->id_user ?>" <?php if ($a['wakil2'] == $c->id_user) echo 'selected' ?>>
                                                            <?= $c->nama ?>
                                                        </option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                            <label>Visi & Misi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="visimisi"><?= $a['visimisi'] ?></textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-pencil"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <label>Periode</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="periode_id">
                                                        <option>-PILIH-</option>
                                                        <?php foreach ($d as $e): ?>
                                                            <?php if ($e->status == 'Aktif' && $e->deleted_at == null) { ?>
                                                                <option value="<?= $e->id ?>" <?= ($a['periode_id'] == $e->id) ? 'selected' : '' ?>>
                                                                    <?= $e->periode ?>
                                                                </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> 
    </section>

<script>
function previewImage() {
  var preview = document.querySelector('#preview');
  var file = document.querySelector('#foto').files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
</script>
