 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">

         <div class="row">
             <div class="col-md-12">
                 <div class="card mb-4">
                     <h5 class="card-header">Print Laporan Penilaian</h5>
                 </div>
                 <div class="card mb-4">
                     <div class="card-body">
                         <form class="form-horizontal form-material mx-2" action="<?= base_url('/piket/Home/pdf')?>"
                             method="post" enctype="multipart/form-data">

                             <div class="mb-3">
                                 <label for="" class="form-label">Pilih Tanggal</label>
                                 <input class="form-control" type="date" id="" name="tgl" placeholder="" />
                             </div>
                             <div class="mb-3">
                                 <label for="" class="form-label">Pilih Kelas</label>
                                 <select class="form-select" aria-label="" name="kls">
                                     <option value="" hidden>Pilih Kelas</option>
                                     <?php if(session()->get('level')!=='5'){?>
                                     <option value="all">Semua Kelas</option>
                                     <?php foreach ($kls as $k) { ?>
                                     <option value="<?php echo $k->id_rombel ?>"><?= $k->nama_jurusan ?>
                                         <?= $k->nama_kelas ?> <?= $k->nama_r ?></option>
                                     <?php } ?>
                                     <?php }else if(session()->get('level')=='5'){?>
                                     <option value="<?php echo $kls->id_rombel ?>"><?= $kls->nama_jurusan ?>
                                         <?= $kls->nama_kelas ?> <?= $kls->nama_r ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <button type="submit" class="btn btn-primary">
                                     Print <i class="tf-icons bx bx-file"></i>
                                 </button>
                             </div>

                         </form>
                     </div>
                     <!-- /Account -->
                 </div>
             </div>
         </div>
     </div>
     <!-- / Content -->