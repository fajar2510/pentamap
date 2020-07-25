<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kwitansi PMI-B </title>
</head>

<body>
    <span><small> <i>
                <font color="grey"> Tanggal cetak : <?= date('d-m-Y'); ?></font>
            </i> </small></span>
    <br>
    <table width="100%">
        <thead>
            <tr>
                <th>
                    <h2>KWITANSI</h2>
                </th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table>
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
                <td align="left"> <b> Lima puluh ribu rupiah</b></td>
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
                <td><b>Rp.&nbsp;&nbsp; 50.000,-</b></td>
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