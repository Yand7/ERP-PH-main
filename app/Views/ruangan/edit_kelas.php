<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit <?=$title?></h3>
          <p class="text-subtitle text-muted">
            Silakan Edit <?=$title?>
          </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav
          aria-label="breadcrumb"
          class="breadcrumb-header float-start float-lg-end"
          >
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=base_url('login/dashboard')?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Edit <?=$title?>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section id="basic-horizontal-layouts">
    <div class="row match-height">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Ruangan/aksi_edit_kelas')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $jojo->id_kelas?>">  
                <form class="form form-horizontal">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="first-name-horizontal"
                        >Nama Kelas</label
                        > 
                      </div>
                      <div class="col-md-8 form-group">
                        <input
                        type="text"
                        id="first-name-horizontal"
                        class="form-control"
                        name="nama_kelas"
                        placeholder="Nama Kelas" value="<?php echo $jojo->nama_kelas?>"
                        />
                      </div>
                      
                      <div class="col-sm-12 d-flex justify-content-end">
                        <button
                        type="submit"
                        class="btn btn-primary me-1 mb-1"
                        >
                        Submit
                      </button>
                      <button
                      type="reset"
                      class="btn btn-light-secondary me-1 mb-1"
                      >
                      Reset
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    