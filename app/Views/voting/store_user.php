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
                        <h4 class="card-title">Data Deleted User</h4>
                        <a href="<?=base_url('/voting/User/hilang/')?>" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn btn-danger">Delete All SoftDelete Data</button>
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
                                            <a href="<?=base_url('/voting/User/balik/'.$b->id_user)?>"><button class="btn btn-primary">Store Data</button></a>
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