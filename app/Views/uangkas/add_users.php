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
      <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_add_users')?>" method="post">

        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">NIK<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="nik" name="nik" placeholder="NIK" required="required" class="form-control col-md-12 col-xs-12">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">E-mail<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="email" name="email" placeholder="E-mail" required="required" class="form-control col-md-12 col-xs-12">
          </div>
        </div>
       <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Name<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="nama" name="nama" placeholder="Name" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">Class Name <span class="required"></span>
          </label>
          <div class="col-12">
            <select  name="id_kelas" class="form-control text-capitalize" id="id_kelas" required>
              <option>Select Class</option>
              <?php 
              foreach ($duar as $kelas) {
              ?>
              <option class="text-uppercase" value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Age<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="usia" name="usia" placeholder="Age" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-12" >Gender <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
              <option>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Adress<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="alamat" name="alamat" placeholder="Adress" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Place And Date Of Birth<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="ttl" name="ttl" placeholder="Place And Date Of Birth" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Username<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="username" name="username" placeholder="Username" required="required" class="form-control col-12 text-capitalize">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Password<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="password" name="password" placeholder="Password" required="required" class="form-control col-12">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Level <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
              <option>Select Level</option>
              <option value="1">Admin</option>
              <option value="5">Teacher</option>
              <option value="2">Class Leader</option>
              <option value="3">Treasurer</option>
              <option value="4">Student</option>
            </select>
          </div>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-12 col-md-offset-12">
          <a href="<?= base_url('/home/users')?>" type="submit" class="btn btn-primary">Cancel</a></button>
          <button id="send" type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
