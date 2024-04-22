<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <h1></h1>
          <table id="datatable-buttons" class="table table-striped table-bordered">

            <thead>
              <tr>
<?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4 || session()->get('level')== 5) { ?>
                <th>No</th>
                <th>Class Name</th>
                <th>Total Students</th>
                <th>Classroom Teacher</th>
                <th>Remark</th>
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
                  <td class="text-uppercase"><?php echo $gas->nama_kelas?></td>
                  <td class="text-capitalize"><?php echo $gas->total_siswa?></td>
                  <td class="text-capitalize"><?php echo $gas->wali_kelas?></td>
                  <td class="text-capitalize"><?php echo $gas->remark_k?></td>
                  
                  <td>
                    <a href="<?= base_url('/home/detail_class/'.$gas->id_kelas)?>"><button class="btn btn-info"><i class="fa fa-bars"></i> </button></a>
                  </td>
<?php }else{} ?>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    