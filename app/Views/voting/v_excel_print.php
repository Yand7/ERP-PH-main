<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma:no-cache");
header("Expires:0");
?>

<table border="1" cellpadding="5" align="center">
    <thead align="center">
        <tr class="table1">
            <th>NO</th>
            <th>Ketua OSIS</th>
            <th>Wakil Ketua OSIS</th>
            <th>Wakil Ketua OSIS 2</th> <!-- Tambahkan kolom Wakil Ketua OSIS 2 -->
            <th>Visi & Misi</th>
            <th>Total Vote</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    foreach ($a as $b) {
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $b->ketua_username ?> </td>
            <td><?php echo $b->wakil_username ?> </td>
            <td><?php echo $b->wakil2_username ?> </td> <!-- Tampilkan Wakil Ketua OSIS 2 -->
            <td><?php echo $b->visimisi ?> </td>
            <td><?php echo $b->total_vote ?> </td>
        </tr>
    <?php
    }
    ?>
</table>
