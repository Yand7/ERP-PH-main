<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <h1></h1>
          <?php if (session()->get('level') == 1) { ?>
            <a href="<?= base_url('uangkas/home/add_class/') ?>"><button class="btn btn-success"><i
                  class="fa fa-plus"></i>
                Add</button></a>
          <?php } else {
          } ?>
          <h1></h1>
          <table id="datatable-buttons" class="table table-striped table-bordered">

            <thead>
              <tr>
                <?php if (session()->get('level') == 1) { ?>
                  <th>No</th>
                  <th>Class Name</th>
                  <th>Total Students</th>
                  <th>Classroom Teacher</th>
                  <th>Remark</th>
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
                    <td class="text-uppercase">
                      <?php echo $gas->nama_kelas ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->total_siswa ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->wali_kelas ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->remark_k ?>
                    </td>
                    <td class="text-capitalize">
                      <?php echo $gas->username ?>
                    </td>

                    <td>
                      <a href="<?= base_url('uangkas/home/edit_class/' . $gas->id_kelas) ?>"><button
                          class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                      <a href="<?= base_url('uangkas/home/delete_class/' . $gas->id_kelas) ?>"><button
                          class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
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