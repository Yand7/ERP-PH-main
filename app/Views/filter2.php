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

<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Windows Print</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal form-label-left" novalidate
                        action="
                        <?php if ($kunci=='lap') {
                            echo base_url('semester/print_in'); 
                        }
                    ?>" method="post">
                    <div class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="blok">Semester</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" id="basicSelect" name="semester" >
                                      <option>-Pilih-</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                  </select>
                              </div>
                              <div class="col-md-4">
                                <label for="tahun">Tahun</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="basicSelect" name="tahun" >
                                    <option>-PILIH-</option>
                                    <?php
                                    foreach ($a as $b) {
                                       ?>
                                       <option value ="<?= $b->id_tahun?>"><?php echo $b->nama_t?>
                                   </option>
                               <?php } ?>
                           </select>
                       </div>
                       <div class="col-md-4">
                        <label for="rombel">Rombel</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <select class="form-select" id="basicSelect" name="rombel" >
                            <option>-PILIH-</option>
                            <?php
                            foreach ($e as $f) {
                               ?>
                               <option value="<?= $f->id_rombel ?>"><?php echo $f->nama_kelas . '.' . $f->nama_r . ' - ' . $f->nama_jurusan ?></option>
                           <?php } ?>
                       </select>
                   </div>
                   <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>

<section id="basic-horizontal-layouts">
    <div class="row match-height">
      <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">PDF</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form-horizontal form-label-left" novalidate
                    action="
                    <?php if ($kunci=='lap') {
                        echo base_url('semester/pdf_in'); 
                    }
                ?>" method="post">
                
                <div class="form-body">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="blok">Semester</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <select class="form-select" id="basicSelect" name="semester" >
                          <option>-Pilih-</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                      </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tahun">Tahun</label>
                </div>
                <div class="col-md-8 form-group">
                    <select class="form-select" id="basicSelect" name="tahun" >
                        <option>-PILIH-</option>
                        <?php
                        foreach ($a as $b) {
                           ?>
                           <option value ="<?= $b->id_tahun?>"><?php echo $b->nama_t?>
                       </option>
                   <?php } ?>
               </select>
           </div>
           <div class="col-md-4">
            <label for="rombel">Rombel</label>
        </div>
        <div class="col-md-8 form-group">
            <select class="form-select" id="basicSelect" name="rombel" >
                <option>-PILIH-</option>
                <?php
                foreach ($e as $f) {
                   ?>
                   <option value="<?= $f->id_rombel ?>"><?php echo $f->nama_kelas . '.' . $f->nama_r . ' - ' . $f->nama_jurusan ?></option>
               <?php } ?>
           </select>
       </div>
       <div class="col-sm-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            Submit
        </button>
        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
            Reset
        </button>
    </div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<section id="basic-horizontal-layouts">
    <div class="row match-height">
      <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Excel</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form-horizontal form-label-left" novalidate
                    action="
                    <?php if ($kunci=='lap') {
                        echo base_url('semester/excel_in'); 
                    }
                ?>" method="post">
                
                <div class="form-body">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="blok">Semester</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <select class="form-select" id="basicSelect" name="semester" >
                          <option>-Pilih-</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                      </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tahun">Tahun</label>
                </div>
                <div class="col-md-8 form-group">
                    <select class="form-select" id="basicSelect" name="tahun" >
                        <option>-PILIH-</option>
                        <?php
                        foreach ($a as $b) {
                           ?>
                           <option value ="<?= $b->id_tahun?>"><?php echo $b->nama_t?>
                       </option>
                   <?php } ?>
               </select>
           </div>
           <div class="col-md-4">
            <label for="rombel">Rombel</label>
        </div>
        <div class="col-md-8 form-group">
            <select class="form-select" id="basicSelect" name="rombel" >
                <option>-PILIH-</option>
                <?php
                foreach ($e as $f) {
                   ?>
                   <option value="<?= $f->id_rombel ?>"><?php echo $f->nama_kelas . '.' . $f->nama_r . ' - ' . $f->nama_jurusan ?></option>
               <?php } ?>
           </select>
       </div>
       <div class="col-sm-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            Submit
        </button>
        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
            Reset
        </button>
    </div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>


