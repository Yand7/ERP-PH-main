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
      <form class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate  action="<?= base_url('home/aksi_change_profile')?>" method="post">

      <div class="item form-group">
          <label class="control-label col-12">Replace New Profile
          </label>
          <div class="col-12">
            <input class="form-control col-12" type="file" name="foto">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >NIK <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nik" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="nik" required="required" placeholder="NIK" value="<?= $users->nik?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >E-mail<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="email" class="form-control col-12 " data-validate-length-range="6" data-validate-words="2" name="email" required="required" placeholder="E-mail" value="<?= $users->email?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Name<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="nama" required="required" placeholder="Name" value="<?= $users->nama?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Gender <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
              <option  value="<?= $users->jk?>"><?= $users->jk; ?></option>
              <!-- <option>Select Gender</option> -->
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Adress<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="alamat" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="alamat" required="required" placeholder="Adress" value="<?= $users->alamat?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Place And Date Of Birth<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="ttl" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="ttl" required="required" placeholder="Place And Date Of Birth" value="<?= $users->ttl?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Username<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="username" name="username" placeholder="Username" required="required" class="form-control col-12 text-capitalize" value="<?= $use->username?>">
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
