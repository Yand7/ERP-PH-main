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
							<li class="breadcrumb-item"><a href="<?=base_url('agendapkl/dashboard')?>">Dashboard</a></li>
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
				<div class="card-header">
					<a href="<?php echo base_url('agendapkl/data_siswa/create/'. $riz->user_siswa)?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
					Tambah</button></a>
					<div class="btn-group">
						<div class="dropdown">
							<button class="btn btn-success btn-block dropdown-toggle me-1 mt-2" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Import
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
								<a class="dropdown-item" href="<?=base_url('agendapkl/template/template-siswa/template-siswa.xlsx')?>"><i class="faj-button fa-solid fa-download"></i>Download Template
								</a>
								<a class="dropdown-item" data-bs-toggle="modal"
								data-bs-target="#modal-import">
								<i class="faj-button fa-solid fa-upload"></i>Import Data
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Import -->

			<div class="modal fade text-left" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="myModalLabel1">
								Import Data
							</h5>
							<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
								<i data-feather="x"></i>
							</button>
						</div>

						<form action="<?=base_url('agendapkl/data_siswa/import_excel')?>" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<label class="mb-2">File Excel</label>
								<input type="file" name="file_excel" class="form-control" required>
							</div>
							<div class="modal-footer">
								<?php if (session()->get('level')==1) { ?>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
										<i class="bx bx-x d-block d-sm-none"></i>
										<span class="d-none d-sm-block">Cancel</span>
									</button>
									<button type="submit" class="btn btn-primary ms-1">
										<i class="bx bx-check d-block d-sm-none"></i>
										<span class="d-none d-sm-block">Upload</span>
									</button>
								<?php } ?>
							</div>
						</form>

					</div>
				</div>
			</div>

			<!-- =================================================================================== -->

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Jenis Kelamin</th>
								<th>TTL</th>				
								<th>Telpon</th>
								<th>Jurusan</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$no=1;
						foreach ($jojo as $riz) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?php echo $riz->nis ?></td>         
								<td><?php echo $riz->nama_siswa ?></td>
								<td><?php 
								if ($riz->jenis_kelamin == '1') {
									echo "Laki-laki";
								}else{
									echo "Perempuan";
								}
							?></td>
							<td><?php echo $riz->tempat_lahir . ', ' . date('d F Y', strtotime($riz->tanggal_lahir)) ?></td>
							<td><?php echo $riz->telpon_siswa?></td>
							<td><?php echo $riz->nama_jurusan?></td>
							<td>
								<a href="<?php echo base_url('agendapkl/data_siswa/edit/'. $riz->user_siswa)?>" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
								<?php if(session()->get('level')== 1) { ?>
									<a href="<?php echo base_url('agendapkl/data_siswa/delete/'. $riz->user_siswa)?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
