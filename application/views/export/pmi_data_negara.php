<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Cetak Laporan PMI-B</title> -->


    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon/logo.ico">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;

        }

        table,
        th {
            height: 30px;
            border: 1px solid black;
            padding: 10px;
        }

        td {
            /* height: 50px; */
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<?php if ($ada == 1) { ?>
<?php foreach ($semua_data_pmi as $p); ?>

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

<body>
    <span><small> <i>
                <font color="grey">Tanggal cetak : <?= date('d-m-Y'); ?> </font>
            </i> </small></span>
    <div class="card-body">
        <div class="table-responsive">
            <!-- <table class="table table-bordered" width="100%" cellspacing="0">
                <tr style="border: 0px;">
                    <td align="center"> -->
            <p align="center"><b>DAFTAR HADIR PEMULANGAN<br>
                    PEKERJA MIGRAN INDONESIA NON PROSEDURAL (PMI-B) DARI <?= $nama_negara ?>
                    <?php
                    $bln = explode('-',  $p['date_created']);
                    $bulanBahasaInggris = date('m');
                    $bulanBahasaIndonesia = bulanIndo($bulanBahasaInggris);
                    ?><br> BULAN <?= bulanIndo($bln[1]) ?>
                    TAHUN <?= date('Y'); ?></b></p>
            <!-- 
                    </td>
                </tr>
            </table> -->

            <?php
            function hariIndo($hariInggris)
            {
                switch ($hariInggris) {
                    case 'Sunday':
                        return 'Minggu';
                    case 'Monday':
                        return 'Senin';
                    case 'Tuesday':
                        return 'Selasa';
                    case 'Wednesday':
                        return 'Rabu';
                    case 'Thursday':
                        return 'Kamis';
                    case 'Friday':
                        return 'Jumat';
                    case 'Saturday':
                        return 'Sabtu';
                    default:
                        return 'hari tidak valid';
                }
            }
            ?>

            <p align="left"><small> <b> Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php
                                                                                                $hariBahasaInggris = date('l');
                                                                                                $hariBahasaIndonesia = hariIndo($hariBahasaInggris);

                                                                                                // echo "Bahasa Inggris: {$hariBahasaInggris} <br>";
                                                                                                echo " {$hariBahasaIndonesia}";
                                                                                                ?></b> <br> <b> Tanggal &nbsp;&nbsp;&nbsp;: <?= date('d-m-Y'); ?></b></small></p>
            <!-- <br>
            <span><small> <i>
                        <font color="grey">Tanggal cetak : <?= date('d-m-Y'); ?> </font>
                    </i> </small></span>
            <br> -->
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th rowspan="2" width="7%"> NO</th>
                        <th rowspan="2" width="17%">NAMA</th>
                        <th colspan="3">ALAMAT</th>
                        <th rowspan="2" colspan="2" width="36%">TANDA TANGAN</th>
                    </tr>
                    <tr align="center">
                        <th width="19%">DESA</th>
                        <th width="18%">KECAMATAN</th>
                        <th width="18%">KAB./ KOTA</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $i = 1;  ?>
                    <?php foreach ($semua_data_pmi as $p) : ?>
                        <tr style="border-style: dotted; border: 1;">
                            <th><?= $i; ?></th>
                            <td style="text-align: left;"><?= $p['nama']; ?> </td>
                            <td> <small> <?= $p['nama_kelurahan']; ?></small> </td>
                            <td><small><?= $p['nama_kecamatan']; ?></small> </td>
                            <td><small><?= $p['nama_kabupaten']; ?></small> </td>
                            <td style="text-align: left;" style="border: 0;" align="left">
                                <?php if ($i % 2 == 1) {
                                    echo "$i . . . . .";
                                } ?>
                                <?php if ($i % 2 == 0) {
                                    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i . . . . .";
                                } ?>
                            </td>
                            <td style="text-align: left;" style="border: 0;">

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
    <?php } ?>
</body>

</html>