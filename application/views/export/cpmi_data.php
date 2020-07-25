<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan (CPMI) Calon Pekerja Migran Indonesia </title>
</head>

<body>
    <table width="100%">
        <thead>
            <tr>
                <th>

                    <b>LAPORAN BULANAN PPPMI PENEMPATAN CALON PMI KE LUAR NEGERI<br>
                        TAHUN <?= date('Y'); ?>
                    </b>

                </th>
            </tr>
        </thead>
    </table>
    <table>
        <tr align="left">
            <th>
                Nama Perusahaan
            </th>
        </tr>
        <tr>
            <th>
                Alamat
            </th>
        </tr>
        <tr>
            <th>
                Negara Tujuan
            </th>
        </tr>
        <tr>
            <th>
                Tanggal
            </th>
        </tr>
        <tr>
            <th>
                Jumlah
            </th>
        </tr>
    </table>

    <span><small> <i>
                <font color="grey">Tanggal cetak : <?= date('d-m-Y'); ?> </font>
            </i> </small></span>
    <br>
    <br>

    <table>
        <thead>

            <tr align="center">
                <th>NO.</th>
                <th>Nama PMI/ Alamat <br> Tempat, Tgl Lahir</thth>
                <th>JK (L/P)</th>
                <th>Jabatan</th>
                <th>Pendi.Formal</th>
                <th>Nama Pengguna Jasa/ Alamat</th>
                <th>Gaji</th>
                <th>Paspor</th>
                <th>Negara Penempatan</th>
                <th>Kode Pesawat</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $i = 1; ?>
            <?php foreach ($semua_data_cpmi as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['nama_pmi'] ?> <br> <?= $row['alamat'] ?> <br> <?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['jabatan'] ?></td>
                    <td><?= $row['pendidikan_formal'] ?></td>
                    <td><?= $row['pengguna_jasa'] ?> <br> <?= $row['alamat_pengguna_jasa'] ?></td>
                    <td><?= $row['gaji'] ?></td>
                    <td><?= $row['paspor'] ?></td>
                    <td><?= $row['negara_penempatan'] ?></td>
                    <td><?= $row['kode_pesawat'] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>