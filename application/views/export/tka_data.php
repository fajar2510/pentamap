<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan TKA</title>

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
    <span><small> <i>
                <font color="grey">Tanggal cetak : <?= date('d-m-Y'); ?> </font>
            </i> </small></span>
    <!-- <table class="table" width="100%">
        <thead>
            <tr>
                <th> -->
    <center>
        <p align="center"> <b>LAPORAN TKA (TENAGA KERJA ASING) DAN PERUSAHAAN PENEMPATAN <br>
                TAHUN <?= date('Y'); ?> </b>
        </p>
    </center>
    <!-- </th>
            </tr>
        </thead>
    </table> -->
    <br>

    <table>
        <thead>
            <tr>
                <th rowspan="2">NO.</th>
                <th rowspan="2">Nama_Perusahaan</th>
                <th rowspan="2">Alamat_Perusahaan</th>
                <th colspan="9">Data TKA</th>
            </tr>
            <tr align="center">

                <th>Nama_TKA</thth>
                <th>Negara</th>
                <th>(L/P)</th>
                <th>Jabatan</th>
                <th>No.RPTKA</th>
                <th>Masa Berlaku</th>
                <th>No.IMTA</th>
                <th>Masa Berlaku</th>
                <th>Lokasi Kerja</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $i = 1; ?>
            <?php foreach ($semua_data_tka as $row) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td align="left"><?= $row['nama_perusahaan'] ?></td>
                    <td align="left"><?= $row['alamat'] ?></td>
                    <td align="left"><?= $row['nama_tka'] ?></td>
                    <td><?= $row['kewarganegaraan'] ?></td>
                    <td><?= $row['jenis_kel'] ?></td>
                    <td><?= $row['jabatan'] ?></td>
                    <td><?= $row['no_rptka'] ?></td>
                    <td><?= $row['masa_rptka'] ?></td>
                    <td><?= $row['no_imta'] ?></td>
                    <td><?= $row['masa_imta'] ?></td>
                    <td><?= $row['lokasi_kerja'] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>