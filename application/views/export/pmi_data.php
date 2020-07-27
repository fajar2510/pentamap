<!-- <!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan PMI-B</title>


    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon/logo.ico">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;

        }

        table,
        th {
            height: 50px;
            border: 1px solid black;
            padding: 8px;
        }

        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr style="border: 0px;">
                    <td align="center">
                        <b>DAFTAR HADIR PEMULANGAN<br>
                            PEKERJA MIGRAN INDONESIA NON PROSEDURAL (PMI-B) SEMUA NEGARA<br>
                            TAHUN <?= date('Y'); ?></b>

                    </td>
                </tr>
            </table>
            <br>
            <span><small> <i>
                        <font color="grey">Tanggal cetak : <?= date('d-m-Y'); ?> </font>
                    </i> </small></span>
            <br>
            <br>

            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th rowspan="2" width="5%"> NO</th>
                        <th rowspan="2" width="20%">NAMA</th>
                        <th colspan="3" width="45%">ALAMAT</th>
                        <th rowspan="2" colspan="2" width="30%">TANDA TANGAN</th>
                    </tr>
                    <tr align="center">
                        <th width="20%">DESA</th>
                        <th width="20%">KECAMATAN</th>
                        <th width="20%">KABUPATEN</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $i = 1;  ?>
                    <?php foreach ($semua_data_pmi as $p) : ?>
                        <tr style="border: 0;">
                            <td><?= $i; ?></td>
                            <td style="text-align: left;">&nbsp;<?= $p['nama']; ?> </td>
                            <td> <?= $p['nama_kelurahan']; ?></td>
                            <td><?= $p['nama_kecamatan']; ?></td>
                            <td><?= $p['nama_kabupaten']; ?></td>
                            <td style="text-align: left;">
                                <?php if ($i % 2 == 1) {
                                    echo "$i . . . . .";
                                } ?>
                            </td>
                            <td style="text-align: left;">
                                <?php if ($i % 2 == 0) {
                                    echo "$i . . . . .";
                                } ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html> -->