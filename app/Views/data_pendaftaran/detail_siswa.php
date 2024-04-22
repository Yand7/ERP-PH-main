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
							<li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<div class="card-header">
					<a href="javascript:history.back()"><button class="btn btn-danger mt-2"><i class="fa-solid fa-backward"></i>
					Kembali</button></a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Lengkap</th>
									<th>Akta Lahir</th>
									<th>Kartu Keluarga</th>
									<th>Ijazah</th>
									<th>Foto Diri</th>
									<th>Invoice</th>
									<!-- <th>Action</th> -->
								</tr>
							</thead>
							<?php
							$no = 1;
							foreach ($jojo as $riz) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td ><?php echo $riz->nama_lengkap ?></td>
									<td style="width: 200px; height: 100px; overflow: hidden; border-radius: 5px;">
										<?php
										if ($riz->gambar_akta_lahir == NULL) {
											echo 'Belum Mengirim';
										} else {
											$image_url = base_url('dokumen_pendaftar/akta_lahir/' . $riz->gambar_akta_lahir);
											echo '<a href="' . $image_url . '" target="_blank"><img src="' . $image_url . '" style="width: 100%; height: 100%; object-fit: contain;"></a>';
										}
										?>
									</td>
									<td style="width: 200px; height: 100px; overflow: hidden; border-radius: 5px;">
										<?php
										if ($riz->gambar_kk == NULL) {
											echo 'Belum Mengirim';
										} else {
											$image_url = base_url('dokumen_pendaftar/kartu_keluarga/' . $riz->gambar_kk);
											echo '<a href="' . $image_url . '" target="_blank"><img src="' . $image_url . '" style="width: 100%; height: 100%; object-fit: contain;"></a>';
										}
										?>
									</td>
									<td style="width: 200px; height: 100px; overflow: hidden; border-radius: 5px;">
										<?php
										if ($riz->gambar_ijazah == NULL) {
											echo 'Belum Mengirim';
										} else {
											$image_url = base_url('dokumen_pendaftar/ijazah/' . $riz->gambar_ijazah);
											echo '<a href="' . $image_url . '" target="_blank"><img src="' . $image_url . '" style="width: 100%; height: 100%; object-fit: contain;"></a>';
										}
										?>
									</td>
									<td style="width: 200px; height: 100px; overflow: hidden; border-radius: 5px;">
										<?php
										if ($riz->gambar_3x4 == NULL) {
											echo 'Belum Mengirim';
										} else {
											$image_url = base_url('dokumen_pendaftar/foto_3x4/' . $riz->gambar_3x4);
											echo '<a href="' . $image_url . '" target="_blank"><img src="' . $image_url . '" style="width: 100%; height: 100%; object-fit: contain;"></a>';
										}
										?>
									</td>
									<td style="width: 200px; height: 100px; overflow: hidden; border-radius: 5px;">
										<?php
										if ($riz->gambar_invoice == NULL) {
											echo 'Belum Mengirim';
										} else {
											$image_url = base_url('dokumen_pendaftar/invoice/' . $riz->gambar_invoice);
											echo '<a href="' . $image_url . '" target="_blank"><img src="' . $image_url . '" style="width: 100%; height: 100%; object-fit: contain;"></a>';
										}
										?>
									</td>
									<!-- <td>
										<a href="<?php echo base_url('data_pendaftaran/siswa_diterima/' . $riz->id_pendaftaran) ?>" class="btn btn-success my-1">
											<i class="fa-sharp fa-solid fa-check"></i>
										</a>
									</td> -->
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
