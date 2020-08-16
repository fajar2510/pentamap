<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Bulanan Penempatan Pekerja Migran Indonesia (P3MI)</title>

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
    <p align="center"> <b>LAPORAN PPPMI PENEMPATAN CALON TKI KE LUAR NEGERI <br> BULAN
            <?php
            $bln = explode('/',  $tanggal);
            ?> <?= bulanIndo($bln[0]) ?>
            TAHUN <?= $bln[2]; ?>
        </b> </p>
    <!-- </th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table> -->


    <!-- 
    <?php foreach ($semua_data_cpmi as $row); ?>
    <?php foreach ($data_total_orang as $total_cpmi); ?> -->
    <!-- <p align="left"><small><b>Nama Perusahaan &nbsp; : </b> <br> <b>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row['alamat'] ?></b> <br> <b>Negara Tujuan_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['nama_negara'] ?></b> <br> <b>Bulan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $bulanBahasaInggris = date('m');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $bulanBahasaIndonesia = bulanIndo($bulanBahasaInggris);

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            // echo "Bahasa Inggris: {$bulanBahasaInggris} <br>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo " {$bulanBahasaIndonesia}";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?> <?= date('Y') ?></b> <br><b>Jumlah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <?php echo $total_cpmi->cpmi ?> orang</b></small></p> -->

    <table width="100%">
        <thead align="center">
            <tr>
                <th rowspan="2"> NO </th>
                <th rowspan="2">NAMA_PPPMI__</th>
                <th>STATUS</th>
                <th colspan="2">TAIWAN</th>
                <th colspan="2">HONGKONG</th>
                <th colspan="2">SIN</th>
                <th colspan="2">MALAYSIA</th>
                <th colspan="2">BRUNEI_D.</th>
                <th colspan="2">LAINNYA</th>
                <th colspan="2">SEKTOR</th>
                <th colspan="2">DOMISILI</th>
                <th colspan="2">JUMLAH</th>
                <th rowspan="2">TOTAL</th>
            </tr>
            <tr>
                <th>(P/C)</th>
                <th> L</th>
                <th> P</th>
                <th> L</th>
                <th> P</th>
                <th> L</th>
                <th> P</th>
                <th> L</th>
                <th> P</th>
                <th> L</th>
                <th> P</th>
                <th> L</th>
                <th> P</th>
                <th> Formal</th>
                <th> Informal</th>
                <th> Jatim</th>
                <th> L.Jatim</th>
                <th> L</th>
                <th> P</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $i = 1; ?>
            <?php foreach ($semua_data_cpmi as $pp) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td align="left"> <small> <?= $pp['nama_perusahaan']; ?></small></td>
                    <td align="center"><?= $pp['status']; ?></td>
                    <td align="center"><?= $pp['lt']; ?></td>
                    <td align="center"><?= $pp['pt']; ?></td>
                    <td align="center"><?= $pp['lh']; ?></td>
                    <td align="center"><?= $pp['ph']; ?></td>
                    <td align="center"><?= $pp['ls']; ?></td>
                    <td align="center"><?= $pp['ps']; ?></td>
                    <td align="center"><?= $pp['lm']; ?></td>
                    <td align="center"><?= $pp['pm']; ?></td>
                    <td align="center"><?= $pp['lb']; ?></td>
                    <td align="center"><?= $pp['pb']; ?></td>
                    <td align="center"><?= $pp['ll']; ?></td>
                    <td align="center"><?= $pp['lp']; ?></td>
                    <td align="center"><?= $pp['formal']; ?></td>
                    <td align="center"><?= $pp['informal']; ?></td>
                    <td align="center"><?= $pp['ljatim']; ?></td>
                    <td align="center"><?= $pp['jatim']; ?></td>
                    <td align="center"><?= $pp['lta']; ?></td>
                    <td align="center"><?= $pp['pta']; ?></td>
                    <td align="center"><?= $pp['total']; ?></td>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>


</body>

</html>