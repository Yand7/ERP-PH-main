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
                <?php if (session()->get('level') == 1) { ?>
                  <th>Username</th>
                  <th>NIK</th>
                  <th>E-mail</th>
                  <th>Name</th>
                  <th>Full Name</th>
                  <th>Class Name</th>
                  <th>Age</th>
                  <!-- <th>Gender</th> -->
                  <th>Adress</th>
                  <!-- <th>Place and Date of Birth</th> -->
                  <th>Action</th>
                <?php } else {
                } ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php if (session()->get('level') == 1) { ?>
                  <td class="text-capitalize">
                    <?php echo $gas->username ?>
                  </td>
                  <td>
                    <?php echo $gas->nik ?>
                  </td>
                  <td>
                    <?php echo $gas->email ?>
                  </td>
                  <td class="text-capitalize">
                    <?php echo $gas->nama_lengkap ?>
                  </td>
                  <td class="text-capitalize">
                    <?php echo $gas->nama_siswa ?>
                  </td>
                  <td class="text-uppercase">
                    <?php echo $gas->nama_kelas ?>
                  </td>
                  <td class="text-capitalize">
                    <?php echo $gas->usia ?>
                  </td>
                  <!-- <td class="text-capitalize">
                    <?php echo $gas->jk ?>
                  </td> -->
                  <td class="text-capitalize">
                    <?php echo $gas->alamat ?>
                  </td>
                  <!-- <td class="text-capitalize">
                    <?php echo $gas->ttl ?>
                  </td> -->
                  <td>
                    <a href="<?= base_url('uangkas/home/reset_p/' . $gas->id_user_user) ?>"><button class="btn btn-info"
                        title="Reset Password"><i class="fa fa-edit"></i> Reset Password</button></a>
                    <a href="<?= base_url('uangkas/home/edit_users/' . $gas->id_user_user) ?>"><button
                        class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                    <a href="<?= base_url('uangkas/home/delete_users/' . $gas->id_user_user) ?>"><button
                        class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                    <a onclick="history.back()" type="submit" class="btn btn-primary"><i
                        class="fa fa-undo"></i></a></button>
                  </td>
                <?php } else {
                } ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>