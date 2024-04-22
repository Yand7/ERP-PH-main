<div align="center">

<img align="center" src="data:image/jpg;base64,<?= $foto?>" width="100%" height="18%" >
<div>
  <br>
  <br>
</div>

 <table id="datatable-buttons" align="center" border="1" align="center" width="100%" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Student Name</th>
      <th>Class Name</th>
      <th>Payment Per</th>
      <th>Transaction Type</th>
      <th>Currency</th>
      <th>Nominal</th>
      <th>Total</th>
      <th>Approval By The Treasurer</th>
      <th>Maker</th>
      <th>Date</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $no=1;
    $data = []; 
    $total = 0;

    foreach ($duar as $gas){
    $total += $gas->nominal;
      ?>
      <tr>
          <th><?php echo $no++ ?></th>
          <td class="text-capitalize"><?php echo $gas->nama_bayar?></td>
          <td class="text-uppercase"><?php echo $gas->nama_kelas?></td>
          <td class="text-capitalize"><?php echo $gas->pembayar_per?></td>
          <td class="text-capitalize"><?php echo $gas->jenis_transaksi?></td>
          <td class="text-capitalize"><?php echo $gas->mata_uang?></td>
          <td class="text-capitalize"><?php echo $gas->nominal?></td>
          <?php echo "<td>" . $total . "</td>"; ?>
          <td class="text-capitalize"><?php echo $gas->persetujuan_uk?></td>
          <td class="text-capitalize"><?php echo $gas->username?></td>
          <td><?php echo $gas->tanggal_uk?></td>
      </tr>
    <?php }?>
  </tbody>
</table>
</div>
<script>
  window.print();
</script>