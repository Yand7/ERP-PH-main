<div align="center">

<img align="center" src="data:image/jpg;base64,<?= $foto?>" width="82%" height="18%" >
<div>
  <br>
  <br>
</div>

 <table id="datatable-buttons" align="center" border="1" align="center" width="100%" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Class Name</th>
      <th>Transaction Type</th>
      <th>Currency</th>
      <th>Nominal</th>
      <th>Remark</th>
      <th>Approval By Class Leader</th>
      <th>Maker</th>
      <th>Date</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $no=1;
    foreach ($duar as $gas){
      ?>
      <tr>
          <th><?php echo $no++ ?></th>
            <td class="text-uppercase"><?php echo $gas->nama_kelas?></td>
            <td class="text-capitalize"><?php echo $gas->jenis_transaksi?></td>
            <td class="text-capitalize"><?php echo $gas->mata_uang?></td>
            <td class="text-capitalize"><?php echo $gas->nominal?></td>
            <td class="text-capitalize"><?php echo $gas->remark_p?></td>
            <td class="text-capitalize"><?php echo $gas->persetujuan_k?></td>
            <td class="text-capitalize"><?php echo $gas->username?></td>
          <td><?php echo $gas->tanggal_p?></td>
      </tr>
    <?php }?>
  </tbody>
</table>
</div>
<script>
  window.print();
</script>