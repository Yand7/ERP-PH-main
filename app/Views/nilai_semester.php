<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            text-align: left; /* Adjust text alignment */
            margin: 20px; /* Add margin for better spacing */
            font-family: Arial, sans-serif; /* Set font family */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <p>
        NIS: <?= $siswa->nis; ?>
    </p>
    <p>
        Nama: <?= $siswa->nama_siswa; ?>
    </p>
    <p>
        Semester: <?= $semesterText; ?>
    </p>
    <p>
        Kelas: <?= $rombel->nama_kelas . '.' . $rombel->nama_r . ' - ' . $rombel->nama_jurusan; ?>
    </p>

    <table class="table table-striped table-bordered" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Nilai Akhir</th>
            <th>Predikat</th>
        </tr>
    </thead>
    <?php
$no = 1;
$jenisMapel = ''; // Inisialisasi variabel jenisMapel
$flagMuatanKejuruan = false; // Inisialisasi variabel flagMuatanKejuruan

foreach ($a as $nilaiPerMapel) {
    // Periksa jenis mapel
    if ($nilaiPerMapel->jenis != $jenisMapel) {
        // Jika jenis mapel berbeda, buat baris baru untuk judul jenis mapel
        echo '<tr><td colspan="6"><strong>';
        switch ($nilaiPerMapel->jenis) {
            case 'Muatan Nasional':
                echo 'A. Muatan Nasional';
                break;
            case 'Muatan Kewilayahan':
                echo 'B. Muatan Kewilayahan';
                break;
            case 'Dasar Bidang Keahlian':
                echo 'C. Dasar Bidang Keahlian';
                break;
            case 'Dasar Program Keahlian':
                echo 'D. Dasar Program Keahlian';
                break;
            case 'Muatan Lokal':
                echo 'Muatan Lokal';
                break;
            default:
                echo 'Lainnya';
        }
        echo '</strong></td></tr>';

      
        

        // Perbarui jenisMapel
        $jenisMapel = $nilaiPerMapel->jenis;
        
    }
    // Hitung rata-rata nilai akhir
    $nilaiAkhir = ($nilaiPerMapel->rata_pengetahuan + $nilaiPerMapel->rata_keterampilan) / 2;

    // Tentukan predikat berdasarkan rentang nilai
    if ($nilaiAkhir >= 92) {
        $predikat = 'A';
    } elseif ($nilaiAkhir >= 83) {
        $predikat = 'B';
    } elseif ($nilaiAkhir >= 73) {
        $predikat = 'C';
    } elseif ($nilaiAkhir >= 63) {
        $predikat = 'D';
    } else {
        $predikat = 'E';
    }
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $nilaiPerMapel->nama_mapel; ?></td>
        <td><?= number_format($nilaiPerMapel->rata_pengetahuan, 2); ?></td>
        <td><?= number_format($nilaiPerMapel->rata_keterampilan, 2); ?></td>
        <td><?= number_format($nilaiAkhir, 2); ?></td>
        <td><?= $predikat; ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>
