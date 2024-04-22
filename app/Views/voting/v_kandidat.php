 
 <?php
        if(session()->get('level')== 1){
          ?>
<title>Kandidat</title>
 
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
                        <h4 class="card-title">Data Kandidat</h4>
                        <a href="<?= base_url('/voting/Kandidat/tambah/') ?>" style="position: absolute; top: 10px; right: 10px;">
                        <button class="btn btn-primary">Tambah Kandidat</button>
</a>
                        <a href="<?=base_url('/voting/Kandidat/store/')?>" style="position: absolute; top: 10px; right: 165px;">
                        <button class="btn btn-warning">Store Data</button>
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
                                            <th>Ketua OSIS</th>
                                            <th>Wakil Ketua OSIS</th>
                                            <th>Wakil Ketua OSIS 2</th> <!-- Tambahkan kolom Wakil Ketua OSIS 2 -->
                                            <th>Visi & Misi</th>
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
                                                <img src="<?=base_url('images/'.$b->foto)?>"  height="100px">
                                            </td>
                                            <td><?php echo $b->ketua_username?> </td>
                                            <td><?php echo $b->wakil_username?> </td>
                                            <td><?php echo $b->wakil2_username?> </td> <!-- Tampilkan Wakil Ketua OSIS 2 -->
                                            <td><?php echo $b->visimisi?> </td>
                                            <td>
                                                <a href="<?=base_url('/voting/Kandidat/edit/'.$b->id)?>"><button class="btn btn-primary">Edit</button></a>
                                                <a href="<?=base_url('/voting/Kandidat/delete/'.$b->id)?>"><button class="btn btn-danger">Delete</button></a>
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
        </div>
    </section>
</div>
<?php
        }else if(session()->get('level')== 2){
          ?>
          <title>Kandidat</title>
 
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
                         <h4 class="card-title">Data Kandidat</h4>
                         <a href="<?= base_url('/voting/Kandidat/tambah/') ?>" style="position: absolute; top: 10px; right: 10px;">
                         <button class="btn btn-primary">Tambah Kandidat</button>
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
                                             <th>Ketua OSIS</th>
                                             <th>Wakil Ketua OSIS</th>
                                             <th>Wakil Ketua OSIS 2</th> <!-- Tambahkan kolom Wakil Ketua OSIS 2 -->
                                             <th>Visi & Misi</th>
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
                                                 <img src="<?=base_url('images/'.$b->foto)?>"  height="100px">
                                             </td>
                                             <td><?php echo $b->ketua_username?> </td>
                                             <td><?php echo $b->wakil_username?> </td>
                                             <td><?php echo $b->wakil2_username?> </td> <!-- Tampilkan Wakil Ketua OSIS 2 -->
                                             <td><?php echo $b->visimisi?> </td>
                                             <td>
                                                 <a href="<?=base_url('/voting/Kandidat/edit/'.$b->id)?>"><button class="btn btn-primary">Edit</button></a>
                                                 <a href="<?=base_url('/voting/Kandidat/delete/'.$b->id)?>"><button class="btn btn-danger">Delete</button></a>
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
         </div>
     </section>
 </div>
 <?php } ?>