<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <h1></h1>
          <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
            <a href="<?= base_url('uangkas/home/add_petty_cash/') ?>"><button class="btn btn-success"><i
                  class="fa fa-plus"></i> Add</button></a>
          <?php } else {
          } ?>
          <h1></h1>
          <table id="datatable-buttons" class="table table-striped table-bordered">

            <thead>
              <tr>
                <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                  <th>No</th>
                  <th>Student Name</th>
                  <th>Class Name</th>
                  <th>Payment Per</th>
                  <th>Transaction Type</th>
                  <th>Currency</th>
                  <th>Nominal</th>
                  <th>Approval By The Treasurer</th>
                  <th>Maker</th>
                  <?php if (session()->get('level') == 2 || session()->get('level') == 3) { ?>
                    <th>Action</th>
                  <?php } else {
                  } ?>
                <?php } else {
                } ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($duar as $gas) {
                ?>
                <tr>
                  <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                    <th>
                      <?php echo $no++ ?>
                    </th>
                    <td class="text-capitalize">
                      <?php echo $gas->nama_bayar ?>
                    </td>
                    <td class="text-uppercase">
                      <?php echo $gas->nama_kelas ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->pembayar_per ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->jenis_transaksi ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->mata_uang ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->nominal ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->persetujuan_uk ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->username ?>
                    </td>
                  <?php } else {
                  } ?>
                  <?php if (session()->get('level') == 2 || session()->get('level') == 3) { ?>
                    <td>
                      <?php if (session()->get('level') == 3 && $gas->persetujuan_uk != "Approved") { ?>
                        <a href="<?= base_url('/home/check_petty_cash/' . $gas->id_uangkas) ?>"><button
                            class="btn btn-success"><i class="fa fa-check"></i> </button></a>
                      <?php } else {
                      } ?>
                      <?php if (session()->get('level') == 2) { ?>
                        <a href="<?= base_url('/home/delete_petty_cash/' . $gas->id_uangkas) ?>"><button
                            class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                      <?php } else {
                      } ?>
                    </td>
                  <?php } else {
                  } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>