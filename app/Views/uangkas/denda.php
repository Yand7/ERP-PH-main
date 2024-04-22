<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <h1></h1>
        <?php if(session()->get('level')== 2 || session()->get('level')== 3) { ?>
          <a href="<?= base_url('/home/add_fine/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add</button></a>
        <?php }else{} ?>
          <h1></h1>
          <table id="datatable-buttons" class="table table-striped table-bordered">

            <thead>
              <tr>
<?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4 || session()->get('level')== 5) { ?>
                <th>No</th>
                <th>Student Name</th>
                <th>Class Name</th>
                <th>Nominal Fine</th>
                <th>Transaction Type</th>
                <th>Currency</th>
                <th>Nominal</th>
                <th>Remark</th>
                <th>Approval By Class Leader  </th>
                <th>Maker</th>
<?php }else{} ?>
              <?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { ?>
                <th>Action</th>
              <?php }else{} ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($duar as $gas){
                ?>
                <tr>
<?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4 || session()->get('level')== 5) { ?>
                  <th><?php echo $no++ ?></th>
                  <td class="text-capitalize"><?php echo $gas->nama_denda?></td>
                  <td class="text-uppercase"><?php echo $gas->nama_kelas?></td>
                  <td class="text-uppercase"><?php echo $gas->denda?></td>
                  <td class="text-capitalize"><?php echo $gas->jenis_transaksi?></td>
                  <td class="text-capitalize"><?php echo $gas->mata_uang?></td>
                  <td class="text-capitalize"><?php echo $gas->nominal?></td>
                  <td class="text-capitalize"><?php echo $gas->remark_denda?></td>
                  <td class="text-capitalize"><?php echo $gas->persetujuan_k?></td>
                  <td class="text-capitalize"><?php echo $gas->username?></td>
<?php }else{} ?>

              <?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4) { ?>
                  <td>
              <?php if(session()->get('level')== 3 || session()->get('level')== 4) { ?>
                    <a href="<?= base_url('/home/edit_fine_b/'.$gas->id_denda)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                  <?php }else{} ?>
              <?php if(session()->get('level')== 2 && $gas->persetujuan_k != "Approved") { ?>
                    <a href="<?= base_url('/home/check_fine/'.$gas->id_denda)?>"><button class="btn btn-success"><i class="fa fa-check"></i> </button></a>
              <?php }else{} ?>                  
              <?php if(session()->get('level')== 2) { ?>
                    <a href="<?= base_url('/home/edit_fine/'.$gas->id_denda)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                    <a href="<?= base_url('/home/delete_fine/'.$gas->id_denda)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                  <?php }else{} ?>
                  </td>
                  <?php }else{} ?>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    