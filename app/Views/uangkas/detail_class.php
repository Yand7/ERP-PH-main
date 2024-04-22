<section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                  <h1></h1>
                  <a onclick="history.back()" type="submit" class="btn btn-primary"><i class="fa fa-undo"></i> Back</a></button>
                  <h1></h1>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    
                    <tr>
<?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4 || session()->get('level')== 5) { ?>
                      <th>NIK</th>
                      <th>E-mail</th>
                      <th>Name</th>
                      <th>Class Name</th>
                      <th>Gender</th>
                      <th>Place and Date of Birth</th>
                      <th>Petty Cash</th>
                   <?php if(session()->get('level')== 3) { ?>                 
                      <th>Action</th>
                  <?php }else{} ?>
<?php }else{} ?>
                    </tr>
                  </thead>
                  <tbody>
                    
<?php if(session()->get('level')== 2 || session()->get('level')== 3 || session()->get('level')== 4 || session()->get('level')== 5) { 
  foreach ($gass as $gas){
  ?>
                        <tr>
                        <td><?php echo $gas->nik?></td>
                        <td><?php echo $gas->email?></td>
                        <td class="text-capitalize"><?php echo $gas->nama?></td>
                        <td class="text-uppercase"><?php echo $gas->nama_kelas?></td>
                        <td class="text-capitalize"><?php echo $gas->jk?></td>
                        <td class="text-capitalize"><?php echo $gas->ttl?></td>
                        <td class="text-capitalize"><?php echo $gas->uangkas?></td>
                  <?php if(session()->get('level')== 3) { ?>                 
                        <td>
                          <a href="<?= base_url('/home/edit_fs/'.$gas->id_user_user)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                        </td>
                  <?php }else{} ?>
<?php }

}else{} ?>   
                  </tbody>
                </table>
              </div>
              </div>
            </div>