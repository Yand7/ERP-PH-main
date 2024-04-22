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
							<a href="<?=base_url('agendapkl/login/dashboard')?>">Dashboard</a>
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
			<form action="<?= base_url('agendapkl/data_instruktur/aksi_create/')?>" method="post" class="row g-3" enctype="multipart/form-data">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-md-12">	
							<div class="mb-3">
								<label for="fotoprofil" class="form-label">Foto Profil</label>
								<div class="mb-3">
									<div class="custom-file">
										<div class="col-12 col-md-12">
											<input type="file" class="image-preview-filepond" id="foto" name="foto" accept="image/*" onchange="previewImage()">
										</div>
									</div>
								</div>
								<div id="preview"></div>
							</div>
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" required>
							</div>
							<div class="mb-3">
								<label for="pwd" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" required>
							</div>
						</div>

						<div class="col-md-6">
							<!-- form bagian kanan -->
							<div class="mb-3">
								<label for="namasiswa" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
							</div>
							<div class="mb-3">
								<label for="namasiswa" class="form-label">Nama Perusahaan</label>
								<input type="text" class="form-control" id="nama_pt" placeholder="Masukkan Nama PT" name="nama_pt" required>
							</div>
							<div class="mb-3">
								<label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
								<select class="form-select" id="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" name="jenis_kelamin" required>
									<option value="">- Pilih -</option>
									<option value="1">Laki-laki</option>
									<option value="2">Perempuan</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="namasiswa" class="form-label">Telpon</label>
								<input type="text" class="form-control" id="telpon" placeholder="Masukkan Telpon (Max 13 Digit)" name="telpon" required>
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

