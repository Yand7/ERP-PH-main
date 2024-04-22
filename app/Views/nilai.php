<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3><?=$title?></h3>
					<p class="text-subtitle text-muted">Silahkan Input <?=$title?> di bawah</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<?php if (session()->getFlashdata('error')) : ?>
		<div class="alert alert-danger alert-dismissible show fade">
			<?= session()->getFlashdata('error') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<!-- Tampilkan pesan sukses jika ada -->
	<?php if (session()->getFlashdata('success')) : ?>
	<div class="alert alert-success alert-dismissible show fade">
		<?= session()->getFlashdata('success') ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif; ?>

<section class="section">
	<div class="card">
	
	<!-- Modal Import -->

	

	<!-- =================================================================================== -->

    <form class="form-horizontal form-label-left" novalidate action="<?= base_url('nilai/aksi_tambah_nilai')?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
    <div class="row">
    <div class="col-md-4">
        <label for="first-name-horizontal">Mapel</label>
    </div>
    <div class="col-md-8 form-group">
        <select class="form-select" id="basicSelect" name="mapel">
            <option>-PILIH-</option>
            <?php foreach ($c as $d) { ?>
                <option value="<?= $d->id_mapel?>"><?php echo $d->nama_mapel?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="first-name-horizontal">Blok</label>
    </div>
    <div class="col-md-8 form-group">
        <select class="form-select" id="basicSelect" name="blok">
            <option>-PILIH-</option>
            <?php foreach ($e as $f) { ?>
                <option value="<?= $f->id_blok?>"><?php echo $f->nama_b?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="first-name-horizontal">Guru</label>
    </div>
    <div class="col-md-8 form-group">
        <select class="form-select" id="basicSelect" name="guru">
            <option>-PILIH-</option>
            <?php foreach ($g as $h) { ?>
                <option value="<?= $h->id_guru?>"><?php echo $h->nama?></option>
            <?php } ?>
        </select>
    </div>
</div>

        <div class="table-responsive">
            <table class="table table-striped" id="table2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Siswa</th>
                        <th>Rombel</th>
                        <th>Pengetahuan</th>
                        <th>Keterampilan</th>
                    </tr>
                </thead>
                <?php
                $no=1;
                foreach ($a as $b) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $b->nis?> </td>
                        <td><?php echo $b->nama_siswa?> </td>
                        <td><?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?></td>
                        <td>
                            <input type="text" name="pengetahuan[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="keterampilan[]" class="form-control">
                        </td>
                        <input type="hidden" name="id_siswa[]" value="<?php echo $b->id_siswa ?>">
                        <input type="hidden" name="id_rombel[]" value="<?php echo $b->rombel ?>">
                    </tr>
                    <?php
                }
                ?>
            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>



<script>
	$(document).ready(function() {
		$('#table2').DataTable({
		});
	});
</script>