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
					<nav
					aria-label="breadcrumb"
					class="breadcrumb-header float-start float-lg-end"
					>
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?=base_url('login/dashboard')?>">Dashboard</a>
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
			<form action="<?= base_url('data_perizinan/aksi_create/')?>" method="post" class="row g-3" enctype="multipart/form-data">

				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="mb-3">
								<label for="Foto" class="form-label">Foto Surat Izin / Sakit</label>
								<div class="custom-file">
									<div class="col-12 col-md-12">
										<input type="file" class="logo-perusahaan" id="foto" name="foto" accept="image/*">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="date" class="form-label">Tanggal</label>
								<input type="date" class="form-control" id="tanggal" placeholder="Masukkan Tanggal" name="tanggal" required>
							</div>
							<!-- form bagian kiri -->
						</div>

						<div class="col-md-6">
							<!-- form bagian kanan -->
							<div class="mb-3">
								<label for="namasiswa" class="form-label">Status</label>
								<select class="form-select" id="status" name="status" required>
									<option>- Pilih -</option>
									<?php 
									foreach ($keterangan as $k) {
										?>
										<option value="<?=$k->kode_keterangan?>"><?= $k->nama_keterangan?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group mb-3">
								<label for="exampleFormControlTextarea1" class="form-label">Alasan</label>
								<textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
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


				<script>
					function previewImage() {
						var preview = document.querySelector('#preview');
						var file = document.querySelector('#foto').files[0];
						var reader = new FileReader();

						reader.addEventListener("load", function () {
							var image = new Image();
							image.src = reader.result;
							image.style.width = '25%';
							preview.innerHTML = '';
							preview.appendChild(image);
						}, false);

						if (file) {
							reader.readAsDataURL(file);
						}
					}
				</script>

			</body>
			</html>