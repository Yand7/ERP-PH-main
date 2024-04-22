
<title>Detail</title>
 
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
<section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Vote</h4>
                        <h6>Periode <?php echo $periode['p_mulai'] ?> - <?php echo $periode['p_selesai'] ?></h6>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Ketua OSIS</th>
                                        <th>Wakil Ketua OSIS</th>
                                        <th>Wakil Ketua OSIS 2</th>
                                        <th>Visi & Misi</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php 
                                $no=1;
                                foreach ($kandidat as $row) { ?>
                                    
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="<?php echo base_url('images/' . $row['foto']) ?>" width="100px"></td>
                                        <td><?php echo $row['ketua_username'] ?></td>
                                        <td><?php echo $row['wakil_username'] ?></td>
                                        <td><?php echo $row['wakil2_username'] ?></td>
                                        <td><?php echo $row['visimisi'] ?></td>
                                    <?php
                                    }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                </section>
