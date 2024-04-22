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
      <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_change_pw')?>" method="post">

        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Change Password<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input id="password" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="password" placeholder="Change Your Password" required="required" type="text">
          </div>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-12 col-md-offset-12">
          <a href="<?= base_url('/home/dashboard')?>" type="submit" class="btn btn-primary">Cancel</a></button>
          <button id="send" type="submit" class="btn btn-success">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
