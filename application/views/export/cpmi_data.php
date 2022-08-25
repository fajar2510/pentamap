<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan (CPMI) Calon Pekerja Migran Indonesia </title>

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
            text-align: justify;
        }
    </style>
</head>

<body>
    <span><small> <i>
                <font color="grey"> Tanggal cetak : <?= date('d-m-Y'); ?></font>
            </i> </small></span>
    <br>
    <!-- <table width="100%">
        <thead>
            <tr>
                <th> -->
    <p align="center"> <b>LAPORAN BULANAN PPPMI PENEMPATAN CALON TKI KE LUAR NEGERI</b> </p>
    <!-- </th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table> -->

    <?php
    function bulanIndo($bulanInggris)
    {
        switch ($bulanInggris) {
            case '01':
                return 'JANUARI';
            case '02':
                return 'FEBRUARI';
            case '03':
                return 'MARET';
            case '04':
                return 'APRIL';
            case '05':
                return 'MEI';
            case '06':
                return 'JUNI';
            case '07':
                return 'JULI';
            case '08':
                return 'AGUSTUS';
            case '09':
                return 'SEPTEMBER';
            case '10':
                return 'OKTOBER';
            case '11':
                return 'NOVEMBER';
            case '12':
                return 'DESEMBER';
            default:
                return 'Bulan tidak valid';
        }
    }
    ?>

    <?php foreach ($semua_data_cpmi as $row); ?>
    <?php foreach ($data_total_orang as $total_cpmi); ?>
    <p align="left"><small><b>Nama Perusahaan &nbsp; : <?= $row['nama_perusahaan'] ?></b> <br>
            <b>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row['alamat'] ?></b> <br>
            <b>Negara Tujuan_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['nama_negara'] ?></b>
            <br> <b>Bulan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                <?php
                $bln = explode('-',  $row['date_created']);
                $bulanBahasaInggris = date('m');
                $bulanBahasaIndonesia = bulanIndo($bulanBahasaInggris);
                ?> <?= bulanIndo($bln[1]) ?> <?= $bln[0]; ?></b> <br>
            <b>Jumlah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <?php echo $total_cpmi->cpmi ?> orang</></small></p>

    <table width="100%">
        <thead>

            <tr align="center">
                <td align="center" style="font-weight: bold; font-size: small">NO.</td>
                <td align="center" style="font-weight: bold; font-size: small">Nama PMI/ Alamat <br> Tempat, Tgl Lahir</td>
                <td align="center" style="font-weight: bold; font-size: small">(L/P)</td>
                <td align="center" style="font-weight: bold; font-size: small">Sektor Jabatan</td>
                <td align="center" style="font-weight: bold; font-size: small">Pendi. Formal</td>
                <td align="center" style="font-weight: bold; font-size: small">Nama_Pengguna_Jasa/ Alamat</td>
                <td align="center" style="font-weight: bold; font-size: small">Gaji</td>
                <td align="center" style="font-weight: bold; font-size: small">Paspor</td>
                <td align="center" style="font-weight: bold; font-size: small">Negara Penempatan</td>
                <td align="center" style="font-weight: bold; font-size: small">Kode Pesawat</td>
            </tr>
        </thead>
        <tbody align="center" class="items">
            <?php $i = 1; ?>
            <?php foreach ($semua_data_cpmi as $row) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td align="left"> <small> <b><?= $row['nama_pmi'] ?> </b> <br> <?= $row['alamat'] ?> <br> <?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></small></td>
                    <td align="center"><small> <?= $row['jenis_kelamin'] ?></small></td>
                    <td align="center"><small> <?= $row['jabatan'] ?></small></td>
                    <td align="center"><small> <?= $row['pendidikan_formal'] ?></small></td>
                    <td align="center"><small> <b> <?= $row['pengguna_jasa'] ?></b> <br> <?= $row['alamat_pengguna_jasa'] ?></small></td>
                    <td><small> <?= $row['gaji'] ?></small></td>
                    <td><small> <?= $row['paspor'] ?></small></td>
                    <td align="center"><small> <?= $row['nama_negara'] ?></small></td>
                    <td align="center"><small> <?= $row['kode_pesawat'] ?></small></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>