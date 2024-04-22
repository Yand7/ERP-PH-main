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
      <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_add_expenditure')?>" method="post">


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
          <label class="control-label col-12" >Transaction Type<span class="required"></span>
          </label>
          <div class="col-12">
            <select id="jenis_transaksi" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="jenis_transaksi" required="required">
              <option>Select Transaction Type </option>
              <option value="Cash">Cash</option>
              <option value="Debit">Debit</option>
              <option value="Transfer">Transfer</option>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Currency <span class="required"></span>
          </label>
          <div class="col-12">
            <select id="mata_uang" class="form-control col-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="mata_uang" required="required">
              <option>Select Currency</option>
              <option value="Singapore Dollar (SGD)">SGD</option>
              <option value="Brunei Dolar (BND)">BND</option>
              <option value="Malaysian Ringgits (MYR)">MYR</option>
              <option value="Baht Thailand (Baht)">Baht</option>
              <option value="Philippine Peso (PHP)">PHP</option>
              <option value="Myanmar Kyat (MMK)">MMK</option>
              <option value="Cambodian Riel (KHR)">KHR</option>
              <option value="Laotian Kip (KIP)">KIP</option>
              <option value="Rupiah (RP)">RP</option>
              <option value="Vietnamese Dong (VND)">VND</option>
            </select>
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Nominal<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="nominal" name="nominal" placeholder="Nominal" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-md-12 col-sm-12 col-xs-12">Remark<span class="required"></span>
          </label>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="text" id="remark_p" name="remark_p" placeholder="Remark" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
          </div>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-12 col-md-offset-12">
          <a href="<?= base_url('/home/expenditure')?>" type="submit" class="btn btn-primary">Cancel</a></button>
          <button id="send" type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
