<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            text-align: center; /* Pusatkan elemen-elemen di tengah halaman */
        }

        .header {
            margin-bottom: 20px;
        }

        .header img {
            width: 100px; /* Sesuaikan ukuran logo jika diperlukan */
            height: auto;
        }

        .judul {
            font-size: 24px;
            font-weight: bold;
        }

        .alamat {
            font-size: 14px;
        }

        .notel {
            border-bottom: 1px solid #000; /* Garis bawah untuk notel */
            padding-bottom: 10px; /* Beri jarak setelah garis bawah */
        }

        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Beri jarak sebelum table */
        }

        th, td {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }

        h2, h3 {
            text-align: center; /* Pusatkan judul dan subjudul */
        }

        ol {
            text-align: left; /* Sesuaikan jika perlu */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="judul mt-2">Sekolah Permata Harapan</div>
        <div class="alamat">Jl. Raya Pahlawan No. 123, Kel. Sukajadi, Kec. Sukasari, Kota Batam 29424.</div>
        <div class="notel">Telp: (0778) 417852 Fax: (0778) 517523</div>
    </div>

    <h2>Kartu Hasil Studi (KHS)</h2>
    <p>
        Blok <?= $blok->nama_b; ?> Semester <?= ($blok->semester == 1) ? 'Ganjil' : 'Genap'; ?> TP. <?= $tahun->nama_t; ?>
    </p>

    <p>
        NIS: <?= $siswa->nis; ?> | Nama: <?= $siswa->nama_siswa; ?> | Kelas: <?= $rombel->nama_kelas . '.' . $rombel->nama_r . ' - ' . $rombel->nama_jurusan; ?>
    </p>

    <hr>

    <h3>Petunjuk Umum:</h3>
    <ol>
        <li>Nilai yang tertera adalah hasil pembelajaran siswa yang bersangkutan selama satu blok yang berjalan</li>
        <li>Standar KKM yang ditentukan sekolah adalah 75 untuk semua mata pelajaran</li>
        <li>KHS dibagikan kepada siswa untuk disampaikan kepada orang tua wali dan ditandatangani oleh orang tua sebagai tanda bahwa raport telah diperiksa dan menjadi perhatian orang tua/wali</li>
        <li>Setelah KHS ditandatangan oleh orang tua/wali siswa segera dikembalikan ke sekolah (hagian akademik atau database) maksimum 1 (satu) minggu sejak diterbitkan</li>
    </ol>

    <table class="table table-striped table-bordered" border="1">
    <thead>
    <tr>
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>KKM</th>
        <th>Pengetahuan</th>
        <th>Keterampilan</th>
        <th>Rerata</th>
    
    </tr>
</thead>

<!-- Tambahkan data persentase kehadiran di dalam loop -->


<!-- Di dalam loop nilai -->
<?php
$no = 1;
$totalRataRata = 0;

foreach ($a as $b) {
    // Hitung rata-rata
    $rataRata = ($b->pengetahuan + $b->keterampilan) / 2;
    $totalRataRata += $rataRata;

    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $b->nama_mapel; ?></td>
        <td>75</td>
        <td><?= $b->pengetahuan; ?></td>
        <td><?= $b->keterampilan; ?></td>
        <td><?= number_format($rataRata, 2); ?></td>
    </tr>
<?php
} ?>

        <!-- Tampilkan rata-rata total -->
        <tr>
            <td colspan="5" class="text-center">Rata-rata Total</td>
            <td class="text-center"><?= ($totalRataRata > 0) ? number_format($totalRataRata / count($a), 2) : '0.00'; ?></td>
        </tr>
    </table>
    
</body>
</html>
