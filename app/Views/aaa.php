<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <style>
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px; /* Atur ukuran logo sesuai kebutuhan */
            height: auto;
        }
        .judul {
            font-size: 24px;
            font-weight: bold;
        }
        .alamat {
            font-size: 14px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th{
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="header">
   
        <div class="judul mt-2">Sekolah GT</div>
        <div class="alamat">Jl. Raya Pahlawan No. 123, Kel. Sukajadi, Kec. Sukasari, Kota Batam 29424.</div>
        <div class="notel">Telp: (0778) 417852 Fax: (0778) 517523</div>
    </div>

   
    <table class="table table-striped table-bordered" border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Izin</th>
            <th>Tanpa Keterangan</th>
            <!-- <th>Total</th> -->
            <th>Presentase</th>
        </tr>
    </thead>
    <?php
    $no = 1;

    foreach ($a as $riz) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $riz['nama_siswa'] ?></td>
            <td><?= $riz['hadir'] ?></td>
            <td><?= $riz['sakit'] ?></td>
            <td><?= $riz['izin'] ?></td>
            <td><?= $riz['tanpa_keterangan'] ?></td>
            <!-- <td><?= $riz['hadir'] + $riz['sakit'] + $riz['izin'] + $riz['tanpa_keterangan'] ?></td> -->
            <td><?= $riz['persen'] ?>%</td>
        </tr>
        <?php
    }
    ?>
</table>



</body>
</html>