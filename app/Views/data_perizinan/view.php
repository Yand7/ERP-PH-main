<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3><?=$title?></h3>
					<p class="text-subtitle text-muted">Anda dapat melihat data <?=$title?> di bawah</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=base_url('login/dashboard')?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<?php if (empty($izinSakitHariIni)) : ?>
					<div class="card-header">
						<a href="<?php echo base_url('data_perizinan/create/') ?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i> Tambah</button></a>
					</div>
				<?php endif; ?>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>Siswa</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Alasan</th>
									<th>Foto</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$no=1;
							foreach ($jojo as $riz) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?php echo $riz->nama_siswa ?></td>         
									<td><?php echo date('d M Y', strtotime($riz->tanggal)) ?></td>         
									<td><?php echo $riz->nama_keterangan ?></td>         
									<td><?php echo $riz->alasan ?></td>         
									<td>
										<?php
										if ($riz->foto == '-') {
											echo $riz->foto;
										} else {
											echo '<a href="' . base_url('surat/' . $riz->foto) . '" target="_blank"><img src="' . base_url('surat/' . $riz->foto) . '" style="width: 150px; height: 150px; object-fit: fill;" class=""></a>';
										}
										?>
									</td>
									<td>
										<a href="<?php echo base_url('surat/' . $riz->foto)?>" class="btn btn-success my-1" download><i class="fa-solid fa-download"></i></a>
									<?php } ?>
								</td>
							</body>
						</tr>
					</table>
				</div>
			</div>
		</div>