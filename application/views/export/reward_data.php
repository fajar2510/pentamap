<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Usulan Penghargaan Perusahaan</title>

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
            color:solid black;
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
    <p align="center"> <b>USULAN PENGHARGAAN PERUSAHAAN YANG MEMPEKERJAKAN TENAGA KERJA DISABILITAS <br> TAHUN <?php echo $tahun ?> se-PROVINSI JAWA TIMUR
            <!-- <?php
            $bln = explode('/',  $tanggal);
            ?> <?= bulanIndo($bln[0]) ?>
            TAHUN <?= $bln[2]; ?>
        </b> </p> -->
    <!-- </th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table> -->


    <!-- 
    <?php foreach ($semua_data_reward as $row); ?>
    <?php foreach ($data_total_orang as $total_cpmi); ?> -->
    <!-- <p align="left"><small><b>Nama Perusahaan &nbsp; : </b> <br> <b>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row['alamat'] ?></b> <br> <b>Negara Tujuan_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['nama_negara'] ?></b> <br> <b>Bulan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $bulanBahasaInggris = date('m');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $bulanBahasaIndonesia = bulanIndo($bulanBahasaInggris);

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            // echo "Bahasa Inggris: {$bulanBahasaInggris} <br>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo " {$bulanBahasaIndonesia}";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?> <?= date('Y') ?></b> <br><b>Jumlah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <?php echo $total_cpmi->cpmi ?> orang</b></small></p> -->

    <table width="100%" class="table table-sm">
        <thead align="center">
            <tr>
                <th rowspan="2"> Kabupaten/kota </th>
                <th rowspan="2">Nama Perusahaan</th>
                <th rowspan="2">Nama Pimpinan</th>
                <th rowspan="1" colspan="2" >Kontak Person</th>
                <th rowspan="2">Alamat Perusahan</th>
                <th rowspan="2">No.Telp. Perusahaan</th>
                <th rowspan="2">E-mail</th>
                <th rowspan="2">Jenis (kecil, menengah, besar)</th>
                <th rowspan="2">Sektor</th>
                <th rowspan="1" colspan="3" >Jumlah Tenaga Kerja Disabilitas</th>
                <th rowspan="1" colspan="3" >Jumlah Tenaga Kerja</th>
                <th rowspan="2">Presentase</th>
                <th rowspan="2">Ragam Disabilitas</th>
                <th rowspan="2">Jenis Disabilitas</th>
            </tr>
            <tr>
                <th> Nama</th>
                <th> No. HP</th>
                <th> L</th>
                <th> P</th>
                <th> Total</th>
                <th> L</th>
                <th> P</th>
                <th> Total</th>

            </tr>
            <tr>
                
            </tr>
        </thead>
        <tbody align="center">
           
            <?php foreach ($semua_data_reward as $pp) : ?>
                <tr>
                    <td align="left"> <small> <?= $pp['nama_kabupaten']; ?></small></td>
                    <td align="left"> <small> <?= $pp['nama_perusahaan']; ?></small></td>
                    <td align="left"> <small> <?= $pp['nama_pimpinan']; ?></small></td>
                    <td align="left"> <small> <?= $pp['nama_kontak_person']; ?></small></td>
                    <td align="left"> <small> <?= $pp['no_kontak_person']; ?></small></td>
                    <td align="left"> <small> <?= $pp['alamat']; ?></small></td>
                    <td align="left"> <small> <?= $pp['kontak']; ?></small></td>
                    <td align="left"> <small> <?= $pp['email_perusahaan']; ?></small></td>
                    <td align="left"> <small> <?= $pp['jenis_perusahaan']; ?></small></td>
                    <td align="left"> <small> <?= $pp['nama_sektor']; ?></small></td>
                    <td align="left"> <small> <?= $pp['disabilitas_L']; ?></small></td>
                    <td align="left"> <small> <?= $pp['disabilitas_P']; ?></small></td>
                    <td align="left"> <small> <?= $pp['disabilitas_total']; ?></small></td>
                    <td align="left"> <small> <?= $pp['tenaga_kerja_L']; ?></small></td>
                    <td align="left"> <small> <?= $pp['tenaga_kerja_L']; ?></small></td>
                    <td align="left"> <small> <?= $pp['tenaga_kerja_total']; ?></small></td>
                    <td align="left"> <small> <?= $pp['presentase']; ?></small></td>
                    <td align="left"> <small> <?php  
                                $arr_ragam = explode(",",$pp['jenis_disabilitas']);
                                foreach($arr_ragam as $arr){
                                    $query = "SELECT DISTINCT dis_jenis.ragam_id, dis_ragam.disabilitas_ragam
                                    FROM dis_jenis 
                                    JOIN dis_ragam
                                    ON dis_jenis.ragam_id = dis_ragam.id_ragam 
                                    WHERE id_jenis  = '$arr'";

                                    $arr_result = $this->db->query($query)->result_array();
                                    foreach ($arr_result as $key => $val) {
                                        echo $val['disabilitas_ragam'];
                                            echo ", ";
                                        }
                                 }    
                            ?></small></td>
                    <td align="left"> <small>  <?php  
                                $jenis = explode(",",$pp['jenis_disabilitas']);
                                foreach($jenis as $jenis){
                                    $query = "SELECT dis_jenis.jenis_disabilitas
                                    FROM dis_jenis
                                    WHERE id_jenis = '$jenis'";
                                    $test = $this->db->query($query)->result_array();
                                    // $last_key = end(array_keys($test));
                                    // $count = count($test);
                                    // echo $count;
                                    foreach ($test as $key => $val) {
                                        // echo $key;
                                        echo $val['jenis_disabilitas'];
                                        // if($key != count($test)-1) {
                                            echo ", ";
                                            // This is the last $element
                                    //    }
                                        // if (next($test)==true) $ret .= ", ";
                                        // if ($key != $count) {
                                        //     echo ", ";
                                        // }

                                    }
                                }
                                
                                ?></small></td>
                    
                   

                </tr>
               
            <?php endforeach; ?>

        </tbody>
    </table>


</body>

</html>