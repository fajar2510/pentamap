<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kwitansi PMI-B </title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;

        }

        table,
        th {
            height: 5px;
            border: 0px solid black;
            padding: 8px;
        }

        td {
            border: 0px solid black;
            padding: 4px;
            text-align: justify;
        }
    </style>

    <style>
        div {
            width: 80px;
            height: 80px;
            float: left;
            margin: 20px;
            text-align: center;
        }

        .satu {
            border: 10px solid green;
        }

        .dua {
            border: 10px dotted green;
        }

        .tiga {
            border: 10px dashed green;
        }

        .empat {
            border: 10px double green;
        }

        .lima {
            border: 10px groove green;
        }

        .enam {
            border: 10px ridge green;
        }

        .tujuh {
            border: 10px inset green;
        }

        .delapan {
            border: 1px dotted black;

        }
    </style>
</head>

<body>
    <span><small> <i>
                <font color="grey"> Tanggal cetak : <?= date('d-m-Y'); ?></font>
            </i> </small></span>
    <br>
    <br>
    <p align="center">
        <b> <big>PEMULANGAN PEKERJA MIGRAN INDONESIA (PMI)-B NON PRSEDURAL <br> TAHUN <?= date('Y') ?> </big> </b>
    </p>
    <br>
    <table>
        <thead>
            <tr>
                <td width="25%">NAMA</td>
                <td width="5%">:</td>
                <td width="35%"><?= $semua_data_kwitansi->nama ?></td>
                <td width="25%" rowspan="8"><img src="<?= base_url('assets/img/pmi/') . $semua_data_kwitansi->image; ?>" alt="Profil" width="150" height="150"></td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR (USIA)</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->tgl_lahir ?>
                    (<?php $lahir    = new DateTime($semua_data_kwitansi->tgl_lahir);
                        $today        = new DateTime();
                        $umur = $today->diff($lahir);
                        echo $umur->y;
                        // echo " Tahun, ";
                        // echo $umur->m;
                        // echo " Bulan, dan ";
                        // echo $umur->d;
                        // echo " Hari";
                        ?>) tahun</td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>:</td>
                <td> <?php if ($semua_data_kwitansi->gender == 'L') {
                            echo 'Laki-Laki';
                        } else {
                            echo 'Perempuan';
                        } ?></td>
            </tr>
            <tr>
                <td>DESA</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->nama_kelurahan ?></td>
            </tr>
            <tr>
                <td>KECAMATAN</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->nama_kecamatan ?></td>
            </tr>
            <tr>
                <td>KABUPATEN/KOTA</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->nama_kabupaten ?></td>
            </tr>
            <tr>
                <td>NEGARA TEMPAT BEKERJA</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->negara_bekerja ?></td>
            </tr>
            <tr>
                <td>JENIS PEKERJAAN</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->jenis_pekerjaan ?></td>
            </tr>
            <tr>
                <td>KEBERANGKATAN MELALUI</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->berangkat_melalui ?></td>
            </tr>
            <tr>
                <td>PENGIRIM</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->pengirim ?></td>
            </tr>
            <tr>
                <td>LAMA BEKERJA</td>
                <td>:</td>
                <td><?= $semua_data_kwitansi->lama_bekerja ?></td>
            </tr>
        </thead>
    </table>
    <br>
    <br>
    <br>
    <!-- <table width="100%">
        <thead>
            <tr>
                <th> -->
    <p align="center">
        <b> <big><u>KWITANSI</u> </big> </b>
    </p>
    <!-- </th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table> -->
    <br>
    <table class="table" width="100%">
        <thead>
            <tr>
                <td align="left">Sudah diterima dari</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td></td>
                <td align="left" colspan="2">Kepala Dinas Tenaga Kerja Dan Transmigrasi <br> Provinsi Jawa Timur</td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td align="left">Banyaknya uang</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td></td>
                <td align="left"> <b>
                        <div class="delapan">
                            Lima puluh ribu rupiah
                        </div>
                    </b></td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td align="left">Untuk Pembayaran</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td></td>
                <td align="left" colspan="2">Biaya Transport bagi pemulangan PMI Non Prosedural <br> dari Surabaya ke daerah asal PMI </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td align="left">Jumlah</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td></td>
                <td>
                    <div class="delapan">
                        <b> Rp.&nbsp;&nbsp; 50.000,-</b>
                    </div>

                </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <br>
            <!-- <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr> -->

            <tr>
                <td align="center" colspan="2">Setuju dibayar :</td>
                <td align="center" colspan="2">Lunas dibayar :</td>
                <td align="center">Surabaya,<?= date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td align="center" colspan="2"> Kuasa Pengguna Anggaran</td>
                <td align="center" colspan="2">Bendahara Pengeluaran Pembantu</td>
                <td align="center">Yang Menerima </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td align="center" colspan="2"> <b> <u> SUNARYA, SE., MM</u></b></td>
                <td align="center" colspan="2"><b> <u>ENDY BAGUS SUHARTANTO, SE. </u> </b></td>
                <td align="center"> <b> <u><?= $semua_data_kwitansi->nama ?> </u> </b> </td>
            </tr>
            <tr>
                <td align="center" colspan="2"> NIP. 19670812 199003 1 013</td>
                <td align="center" colspan="2">NIP. 19821110 200901 1 006</td>
            </tr>
        </tbody>
    </table>

</body>

</html>