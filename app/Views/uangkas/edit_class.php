<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <ul class="nav navbar-right panel_toolbox">
        </li>
      </ul>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('uangkas/home/aksi_edit_class') ?>"
        method="post">
        <input type="hidden" name="id" value="<?= $duar->id_kelas ?>">

        <div class="item form-group">
          <label class="control-label col-12">Class Name<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_kelas" class="form-control col-12 text-uppercase" data-validate-length-range="6"
              data-validate-words="2" name="nama_kelas" required="required" placeholder="Class Name"
              value="<?= $duar->nama_kelas ?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">Total Students<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="total_siswa" class="form-control col-12 text-capitalize"
              data-validate-length-range="6" data-validate-words="2" name="total_siswa" required="required"
              placeholder="Total Students" value="<?= $duar->total_siswa ?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">Classroom Teacher<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="wali_kelas" class="form-control col-12 text-capitalize"
              data-validate-length-range="6" data-validate-words="2" name="wali_kelas" required="required"
              placeholder="Classroom Teacher" value="<?= $duar->wali_kelas ?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">Remark<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="remark_k" class="form-control col-12 text-capitalize" data-validate-length-range="6"
              data-validate-words="2" name="remark_k" required="required" placeholder="Remark"
              value="<?= $duar->remark_k ?>">
          </div>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-12 col-md-offset-12">
        <a href="<?= base_url('uangkas/home/class') ?>" type="submit" class="btn btn-primary">Cancel</a></button>
        <button id="send" type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>