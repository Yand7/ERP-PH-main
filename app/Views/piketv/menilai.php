 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">

         <div class="row">
             <div class="col-md-12">
                 <div class="card mb-4">
                     <h5 class="card-header">Penilaian Piket</h5>
                 </div>
                 <div class="card mb-4">
                     <div class="card-body">
                         <form class="form-horizontal form-material mx-2"
                             action="<?= base_url('/piket/Home/menilai2')?>" method="post"
                             enctype="multipart/form-data">
                             <input type="hidden" name="ide" value="<?= $us->id_user?>">
                             <div class="row">
                                 <div class="mb-3 col-md-5">
                                     <label for="" class="form-label">Pilih Hari</label>
                                     <select class="form-select" aria-label="" name="hri">
                                         <option hidden value="">Pilih Hari Sesuai Tanggal Hari Ini</option>
                                         <option value="1">Senin</option>
                                         <option value="2">Selasa</option>
                                         <option value="3">Rabu</option>
                                         <option value="4">Kamis</option>
                                         <option value="5">Jumat</option>
                                     </select>
                                 </div>
                                 <div class="mb-3 col-md-5">
                                     <label for="" class="form-label">Pilih Kelas</label>
                                     <select class="form-select" aria-label="" name="kls">
                                         <?php foreach ($kls as $k) { ?>
                                         <option value="" hidden>Pilih Kelas</option>
                                         <option value="<?php echo $k->id_rombel ?>"><?= $k->nama_jurusan ?>
                                             <?= $k->nama_kelas ?> <?= $k->nama_r ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                                 <div class="mb-3 col-md-2 d-flex align-items-end justify-content-end">
                                     <button type="submit" class="btn btn-primary">
                                         Find
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <!-- /Account -->
                 </div>
             </div>
         </div>
     </div>
     <!-- / Content -->