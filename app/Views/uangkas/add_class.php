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
      <form class="form-horizontal form-label-left" novalidate action="<?= base_url('uangkas/home/aksi_add_class') ?>"
        method="post">

        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Class Name<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input id="nama_kelas" class="form-control col-md-12 col-xs-12 text-uppercase"
              data-validate-length-range="6" data-validate-words="2" name="nama_kelas" placeholder="Class Name"
              required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Total Students <span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="total_siswa" name="total_siswa" required="required" placeholder="Total Students"
              class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Classroom Teacher <span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="wali_kelas" name="wali_kelas" placeholder="Classroom Teacher" required="required"
              class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Remark <span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="remark_k" name="remark_k" placeholder="Remark" required="required"
              class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-12 col-md-offset-12">
        <a href="<?= base_url('/home/class') ?>" type="submit" class="btn btn-primary">Cancel</a></button>
        <button id="send" type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>