<?php
        if(session()->get('level')==1 ||  session()->get('level')==2){
          ?>
<title>Hasil Voting</title>
 
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
                        <h4 class="card-title">Hasil Voting</h4>
						<a href="<?=base_url('/voting/Hasil/pdf/')?>" style="position: absolute; top: 10px; right: 88px;"><button class="btn btn-danger">PDF</button></a>
						<a href="<?=base_url('/voting/Hasil/excel_print/')?>" style="position: absolute; top: 10px; right: 10px;"><button class="btn btn-success">EXCEL</button></a>
                        <a href="<?=base_url('/voting/Hasil/diagram/')?>" style="position: absolute; top: 10px; right: 149px;"><button class="btn btn-primary">DIAGRAM</button></a>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ketua OSIS</th>
                                        <th>Wakil Ketua OSIS</th>
                                        <th>Wakil Ketua OSIS 2</th>
                                        <th>Visi & Misi</th>
                                        <th>Jumlah Vote</th>
                                        
                                    </tr>
                                </thead>
                                <tbody> 
            <?php $no = 1; foreach ($k as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['ketua_username']; ?></td>
                <td><?= $row['wakil_username']; ?></td>
                <td><?= $row['wakil2_username']; ?></td>
                <td><?= $row['visimisi']; ?></td>
                <td><?= $row['total_vote']; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                </section>
                                <?php
        }else if(session()->get('level')==3 ||  session()->get('level')==4){
          ?>
                     <title>Hasil Voting</title>
 
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
                        <h4 class="card-title">Hasil Voting</h4>
                        <a href="<?=base_url('/voting/Hasil/diagram/')?>" style="position: absolute; top: 10px; right: 10px;"><button class="btn btn-primary">DIAGRAM</button></a>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ketua OSIS</th>
                                        <th>Wakil Ketua OSIS</th>
                                        <th>Wakil Ketua OSIS 2</th>
                                        <th>Visi & Misi</th>
                                        <th>Jumlah Vote</th>
                                        
                                    </tr>
                                </thead>
                                <tbody> 
            <?php $no = 1; foreach ($k as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['ketua_username']; ?></td>
                <td><?= $row['wakil_username']; ?></td>
                <td><?= $row['wakil2_username']; ?></td>
                <td><?= $row['visimisi']; ?></td>
                <td><?= $row['total_vote']; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                </section>      
                                <?php } ?>     
