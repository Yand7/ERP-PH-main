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
        <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_fs')?>" method="post">
        <input type="hidden" name="id" value="<?= $duar->id_user?>">

        <div class="item form-group">
          <label class="control-label col-12" >NIK<span class="required"></span>
          </label>
          <div class="col-12">
            <input disabled type="text" id="nik" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="nik" required="required" placeholder="NIK" value="<?= $duar->nik?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >E-mail<span class="required"></span>
          </label>
          <div class="col-12">
            <input disabled type="text" id="email" class="form-control col-12 " data-validate-length-range="6" data-validate-words="2" name="email" required="required" placeholder="E-mail" value="<?= $duar->email?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Name<span class="required"></span>
          </label>
          <div class="col-12">
            <input disabled type="text" id="nama" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="nama" required="required" placeholder="Name" value="<?= $duar->nama?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">Class Name <span class="required"></span>
          </label>
          <div class="col-12">
            <select disabled name="id_kelas" class="form-control text-uppercase" id="id_kelas" required>
              <option class="text-uppercase" value="<?= $duar->id_kelas?>"><?= $duar->nama_kelas?></option>

              <?php 
              foreach ($ok as $kelas) {
              ?>

              <option class="text-uppercase" value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Username<span class="required"></span>
          </label>
          <div class="col-12">
            <input disabled type="text" id="username" name="username" placeholder="Username" required="required" class="form-control col-12 text-capitalize" value="<?= $duar->username?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Petty Cash<span class="required"></span>
          </label>
          <div class="col-12">
            <select id="uangkas" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="uangkas" required="required">
              <option value="<?= $duar->uangkas?>"><?= $duar->uangkas; ?></option>
              <option value="Already Paid">Already Paid</option>
              <option value="Haven't Paid Yet">Haven't Paid Yet</option>
            </select>
          </div>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-12 col-md-offset-12">
          <a onclick="history.back()" type="submit" class="btn btn-primary">Cancel</a></button>
          <button id="send" type="submit" class="btn btn-success">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
