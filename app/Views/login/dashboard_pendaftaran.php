<?php
$db         = \Config\Database::connect();

$builder = $db->table('website');
$namaweb = $builder->select('nama_website')
->where('deleted_at', null)
->get()
->getRow();

?>

<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row justify-content-center">
        <img src="<?=base_url('prixier/img/logo_sph.png')?>" alt="logo" style="max-width: 10%; height: auto; margin-top: 50px;">
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">

          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="card col-md-6 col-12 d-flex align-items-center">
          <div class="card-body py-4 px-4 text-center">
            <div class="d-flex align-items-center">
              <div class="name">
                <h5 class="font-bold">Selamat Datang, <?=session()->get('nama_pendaftar')?></h5>
                <h5 class="font-bold">Harap Lengkapi Data di bawah ini.</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6 col-12">
        <div class="card">
          <form action="<?= base_url('dashboard_pendaftaran/aksi_create_dokumen/')?>" method="post" class="row g-3" enctype="multipart/form-data">
            <div class="card-header bg-primary">
              <h4 class="card-title text-white d-flex justify-content-center align-items-center" style="margin-bottom: 0px;">Form Dokumen Siswa</h4>
            </div>
            <div class="card-body">
              <div class="row">


               <div class="mb-3">
                <label for="logo_perusahaan" class="form-label">Foto Copy Akta Lahir</label>
                <div class="mb-3">
                  <div class="custom-file">
                    <div class="col-12 col-md-12">
                      <input type="file" class="logo-perusahaan" id="akta_lahir" name="akta_lahir" accept="image/*" onchange="previewImage()" required>
                    </div>
                  </div>
                </div>
                <div id="preview"></div>
              </div>

              <div class="mb-3">
                <label for="logo_pdf" class="form-label">Foto Copy Kartu Keluarga</label>
                <div class="mb-3">
                  <div class="custom-file">
                    <div class="col-12 col-md-12">
                      <input type="file" class="logo-pdf" id="kartu_keluarga" name="kartu_keluarga" accept="image/*" onchange="previewImage()" required>
                    </div>
                  </div>
                </div>
                <div id="preview"></div>
              </div>

              <div class="mb-3">
                <label for="favicon" class="form-label">Foto Copy Ijazah SMP</label>
                <div class="mb-3">
                  <div class="custom-file">
                    <div class="col-12 col-md-12">
                      <input type="file" class="favicon" id="ijazah" name="ijazah" accept="image/*" onchange="previewImage()" required>
                    </div>
                  </div>
                </div>
                <div id="preview"></div>
              </div>

              <div class="mb-3">
                <label for="foto_3x4" class="form-label">Foto 3x4</label>
                <div class="mb-3">
                  <div class="custom-file">
                    <div class="col-12 col-md-12">
                      <input type="file" class="foto_3x4" id="foto_3x4" name="foto_3x4" accept="image/*" onchange="previewImage()" required>
                    </div>
                  </div>
                </div>
                <div id="preview"></div>
              </div>

              <div class="mb-3">
                <label for="invoice" class="form-label">Invoice Pembayaran Uang Pendaftaran</label>
                <div class="mb-3">
                  <div class="custom-file">
                    <div class="col-12 col-md-12">
                      <input type="file" class="invoice" id="invoice" name="invoice" accept="image/*" onchange="previewImage()" required>
                    </div>
                  </div>
                </div>
                <div id="preview"></div>
              </div>

              <!-- bagian tombol submit -->
              <div class="col-12">
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-0 col-md-offset-0">
                    <!-- <a href="javascript:history.back()" class="btn btn-danger">Cancel</a> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
              <!-- bagian tombol submit -->
            </form>
          </div>
        </body>
        </html>

      </div>
    </section>
  </div>
