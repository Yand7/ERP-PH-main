<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        /* Styles for red color if nilai < 75 */
        .red {
            color: red;
        }
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Beri jarak sebelum table */
        }
        /* Add your existing styles here */

    </style>
    <!-- Add your existing CSS and JS links here -->
</head>
<body>
<div>
    <h2>Laporan Nilai Seluruh Siswa</h2>
    <p>Blok <?= $blok->nama_b; ?> Semester <?= ($blok->semester == 1) ? 'Ganjil' : 'Genap'; ?> TP. <?= $tahun->nama_t; ?></p>
    <p>Rombel: <?= $rombel->nama_kelas . '.' . $rombel->nama_r . ' - ' . $rombel->nama_jurusan; ?></p>
</div>

<!-- Your existing header and information -->

<table class="table table-striped table-bordered" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Nama Mapel</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $currentNIS = null;
        foreach ($allStudentsData as $nis => $nilaiPerSiswa) :
            foreach ($nilaiPerSiswa as $nilai) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <?php if ($currentNIS !== $nis) : ?>
                        <!-- Tampilkan NIS dan Nama Siswa hanya pada baris pertama per siswa -->
                        <td><?= $nis; ?></td>
                        <td><?= $nilai->nama_siswa; ?></td>
                        <?php $currentNIS = $nis; ?>
                    <?php endif; ?>
                    <td><?= $nilai->nama_mapel; ?></td>
                    <td class="<?= ($nilai->pengetahuan < 75) ? 'red' : ''; ?>"><?= $nilai->pengetahuan; ?></td>
                    <td class="<?= ($nilai->keterampilan < 75) ? 'red' : ''; ?>"><?= $nilai->keterampilan; ?></td>
                </tr>
                <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
