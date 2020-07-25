<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan TKA</title>
</head>

<body>
    <table class="table" width="100%">
        <thead>
            <tr>
                <th>
                    <center>
                        <b>LAPORAN TKA (TENAGA KERJA ASING) DAN PERUSAHAAN PENEMPATAN <br>
                            TAHUN <?= date('Y'); ?>
                        </b>
                    </center>
                </th>
            </tr>
        </thead>
    </table>

    <span><small> <i>
                <font color="grey">Tanggal cetak : <?= date('d-m-Y'); ?> </font>
            </i> </small></span>
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th rowspan="2">NO.</th>
                <th rowspan="2">Nama Perusahaan</th>
                <th rowspan="2">Alamat Perusahaan</th>
                <th colspan="9">Data TKA</th>
            </tr>
            <tr align="center">

                <th>Nama TKA</thth>
                <th>Kewarganegaraan</th>
                <th>JK(L/P)</th>
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
                    <td><?= $i; ?></td>
                    <td><?= $row['nama_perusahaan'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['nama_tka'] ?></td>
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