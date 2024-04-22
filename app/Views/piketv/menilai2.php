 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">

         <div class="row">
             <div class="col-md-12">
                 <div class="card mb-4">
                     <h5 class="card-header">Nilai Piket Kelas <?= $kls->nama_jurusan ?>
                         <?= $kls->nama_kelas ?><?= $kls->nama_r ?> || Tanggal <?= $tgl?></h5>
                 </div>
                 <div class="card mb-4">
                     <div class="card-body">
                         <form class="form-horizontal form-material mx-2"
                             action="<?= base_url('/piket/Home/output_menilai')?>" method="post"
                             enctype="multipart/form-data">
                             <input type="hidden" name="rmbl" value="<?= $kls->id_rombel?>">
                             <input type="hidden" name="tgl" value="<?= $tgl?>">
                             <input type="hidden" name="hri" value="<?= $hri?>">
                             <div class="row">
                                 <div class="mb-3 col-md-5">
                                     <label for="" class="form-label">Pilih Nilai</label>
                                     <select class="form-select" aria-label="" name="n">
                                         <option hidden value="">Pilih Nilai</option>
                                         <option value="Baik">Baik</option>
                                         <option value="Tidak Baik">Tidak Baik</option>
                                     </select>
                                 </div>
                                 <div class="mb-3 col-md-2 d-flex align-items-end justify-content-end">
                                     <button type="submit" class="btn btn-success">
                                         Submit
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