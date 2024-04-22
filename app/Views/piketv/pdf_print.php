<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        text-transform: capitalize;
    }

    .container {
        max-width: 8000px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header img {
        width: 100%;
        height: auto;
    }

    .table-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #e8e9ef;
    }

    td:nth-child(4) {
        text-align: justify;
        text-transform: capitalize;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Hasil Penilaian Tanggal <?=$tgl?></h1>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Rombel</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($duar as $data) { ?>
                    <tr>
                        <td><?= $data->nama_jurusan ?> <?= $data->nama_kelas ?><?= $data->nama_r ?></td>
                        <td><?= $data->nilai ?></td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>

    <script>
    window.print();
    </script>
</body>

</html>