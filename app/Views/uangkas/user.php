<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <h1></h1>
          <?php if (session()->get('level') == 1) { ?>
            <a href="<?= base_url('/home/add_users/') ?>"><button class="btn btn-success"><i class="fa fa-plus"></i>
                Add</button></a>
          <?php } else {
          } ?>
          <h1></h1>
          <table id="datatable-buttons" class="table table-striped table-bordered">

            <thead>
              <tr>
                <?php if (session()->get('level') == 1) { ?>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <!-- <th>Gender</th> -->
                  <th>Maker</th>
                  <th>Action</th>
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
                  <?php if (session()->get('level') == 1) { ?>
                    <th>
                      <?php echo $no++ ?>
                    </th>
                    <td>
                      <?php echo $gas->nik ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->nama_siswa ?>
                    </td>
                    <td>
                      <?php echo $gas->email ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->jk ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->username ?>
                    </td>

                    <td>
                      <a href="<?= base_url('uangkas/home/detail_users/' . $gas->id_user_user) ?>"><button
                          class="btn btn-info"><i class="fa fa-bars"></i> Details</button></a>
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