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
                return 'Januari';
            case '02':
                return 'Februari';
            case '03':
                return 'Maret';
            case '04':
                return 'April';
            case '05':
                return 'Mei';
            case '06':
                return 'Juni';
            case '07':
                return 'Juli';
            case '08':
                return 'Agustus';
            case '09':
                return 'September';
            case '10':
                return 'Oktober';
            case '11':
                return 'November';
            case '12':
                return 'Desember';
            default:
                return 'Bulan tidak valid';
        }
    }
    ?>
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
                <th rowspan="2">NAMA_PPPMI</th>
                <th>STATUS</th>
                <th colspan="2">TAIWAN</th>
                <th colspan="2">HONGKONG</th>
                <th colspan="2">SING</th>
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
            <?php foreach ($data_pppmi as $row) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            <?php endforeach; ?>
            <?php $i++; ?>
        </tbody>
    </table>


</body>

</html>