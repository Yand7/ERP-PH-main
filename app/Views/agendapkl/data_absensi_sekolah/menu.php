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

			<section class="section">
				<div class="card">
					<div class="card-header d-flex justify-content-center align-items-center gap-2">	
						<a href="<?php echo base_url('agendapkl/data_absensi_sekolah/rpl/')?>" class="btn btn-primary mt-2 mx-2"><i class="faj-button fa-regular fa-computer"></i>
						RPL</a>
						<a href="<?php echo base_url('agendapkl/data_absensi_sekolah/bdp/')?>" class="btn btn-success mt-2 mx-2"><i class="faj-button fa-regular fa-business-time"></i>
						BDP</a>
						<a href="<?php echo base_url('agendapkl/data_absensi_sekolah/akl/')?>" class="btn btn-danger mt-2 mx-2"><i class="faj-button fa-regular fa-calculator"></i>
						AKL</a>
					</div>
					<div class="card-body">
					</div>
				</div>
			</section>