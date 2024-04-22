 
 <?php
        if(session()->get('level')== 1){
          ?>
 <title>User</title>
 
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
                        <h4 class="card-title">Data User</h4>
                        <a href="<?=base_url('/voting/User/tambah/')?>" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn btn-primary">Tambah User</button>
                    </a>
                    <a href="<?=base_url('/voting/User/excel/')?>" style="position: absolute; top: 10px; right: 135px;">
                        <button class="btn btn-success">Import From Excel</button>
                    </a>
                    <a href="<?=base_url('/voting/User/store/')?>" style="position: absolute; top: 10px; right: 295px;">
                        <button class="btn btn-danger">Store Data</button>
                    </a>
                    <a href="<?=base_url('/voting/User/generateExcel/')?>" style="position: absolute; top: 10px; right: 400PX;">
                        <button class="btn btn-warning">Download Template Import Excel</button>
                    </a>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php 
                                $no=1;
                                foreach ($a as $b) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <img src="<?=base_url('images/'.$b->foto)?>" height="100px">
                                        </td>
                                        <td><?php echo $b->nama?> </td>
                                        <td><?php echo $b->username?> </td>
                                        <td><?php echo $b->nama_level?> </td>
                                        <td>
                                        <a class="btn btn-warning" href="<?php echo base_url('/voting/User/reset_password/'.$b->id_user) ?>">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg> Reset Password
</a>
                                            <a href="<?=base_url('/voting/User/edit/'.$b->id_user)?>"><button class="btn btn-primary">Edit</button></a>
                                            <a href="<?=base_url('/voting/User/delete/'.$b->id_user)?>"><button class="btn btn-danger">Delete</button></a>
                                        </td>

                                    </tr>
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
                                <?php
        }else if(session()->get('level')== 2){
          ?>
           <title>User</title>
 
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
                        <h4 class="card-title">Data User</h4>
                        <a href="<?=base_url('/voting/User/tambah/')?>" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn btn-primary">Tambah User</button>
                    </a>
                    <a href="<?=base_url('/voting/User/excel/')?>" style="position: absolute; top: 10px; right: 135px;">
                        <button class="btn btn-success">Import From Excel</button>
                    </a>
            
                    <a href="<?=base_url('/voting/User/generateExcel/')?>" style="position: absolute; top: 10px; right: 295px;">
                        <button class="btn btn-warning">Download Template Import Excel</button>
                    </a>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php 
                                $no=1;
                                foreach ($a as $b) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <img src="<?=base_url('images/'.$b->foto)?>" height="100px">
                                        </td>
                                        <td><?php echo $b->nama?> </td>
                                        <td><?php echo $b->username?> </td>
                                        <td><?php echo $b->nama_level?> </td>
                                        <td>
                                        <a class="btn btn-warning" href="<?php echo base_url('/voting/User/reset_password/'.$b->id_user) ?>">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg> Reset Password
</a>
                                            <a href="<?=base_url('/voting/User/edit/'.$b->id_user)?>"><button class="btn btn-primary">Edit</button></a>
                                            <a href="<?=base_url('/voting/User/delete/'.$b->id_user)?>"><button class="btn btn-danger">Delete</button></a>
                                        </td>

                                    </tr>
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
           <?php } ?>