<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style=" color:#5b5b5b;"><?= $title; ?> (TKA)</h5>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <?php if ($is_admin == 1) { ?>
        <a href="<?= base_url('tka/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <?php } ?>

        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print </a> -->
    </div>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>


            <div class="card shadow mb-0">
                <div class="card-header py-1 ">
                    <div class="d-sm-flex align-items-center justify-content-start mb-0">

                        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <form action="<?= base_url('exportimport/export_pdf_tka') ?>" method="post" target="_blank"> -->
                                <!-- <a href="#" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-filter"></i>
                                    </span>
                                    <span class="text">Filter</span>
                                </a>
                                <div>
                                    <div class="container"> -->
                                <!-- Filter : <input type="text" width="276" name="awal" id="awal"> -->
                                <!-- </div>
                                </div> -->
                                <!-- <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text">Cetak PDF</span>
                                </button>
                            </form>
                        </div> -->

                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <!-- <form action="<?= base_url('exportimport/export_pdf_pppmi') ?>" method="post" target="_blank">
                                <div class="dropdown mb-0">
                                    <div class="d-flex flex-row " >
                                    <label for="bulan" class="d-none d-sm-inline-block p-2" style="margin:10px; font-weight:bold; font-family:roboto;"> Bulan:</label>
                                    <input style="margin:10px; " name="bulan" id="bulan" class="form-control p-2 " type="month" value= "<?= date('Y-m'); ?>">
                                    <span style="margin:10px;"> 
                                            <button class="btn btn-info btn-icon-split" type="submit"  aria-haspopup="true" aria-expanded="false">
                                                <span class="icon text-white-50">
                                                    <i class="fa-solid fa-print"></i>
                                                </span>
                                            <span class="text" >Print</span>
                                            </button>
                                    </span>
                                    </div>
                                </div>
                            </form> -->
                        </div>


                        <div class="dropdown mb-0">

                            <!-- <a class="btn btn-danger btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </span>
                                <span class="text"><b>PDF</b> </span>
                            </a> -->
                            <!-- <a href="<?= base_url('exportimport/export_excel_tka'); ?>" target="_blank" class="btn btn-success " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">CSV</span>
                            </a> -->
                        </div>
                        <!-- </form> -->
                    </div>
                    <div class="card-body">
                        <div class="table table-sm">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Tanggal </th>
                                        <th rowspan="2">Perusahaan</>
                                            <!-- <th rowspan="2">Alamat Perusahaan</th> -->
                                        <th colspan="4">Data TKA</th>
                                        <th rowspan="2" class="text-center">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Negara</th>
                                        <!-- <th>Jabatan</th> -->
                                        <th>RPTKA</th>
                                        <!-- <th>No. RPTKA</th>
                                        <th>Masa Berlaku</th>
                                        <th>No. IMTA</th>
                                        <th>Masa Berlaku</th> -->
                                        <th>IMTA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tb_tka as $t) : ?>
                                        <tr align="left">
                                         <th scope="row"><small><center>  <?= $i; ?></center></small> </th>

                                            <td> <small> <?= $t['date_created']; ?> </small></td>
                                            <td> <small> <?= $t['nama_perusahaan']; ?> </small></td>
                                            <td> <small> <?= $t['nama_tka']; ?> </small> </td>
                                            <td><small> <?= $t['nama_negara']; ?> <img src="<?= base_url('assets/img/img-country-flag/') . $t['flag']; ?>"  class="img-fluid img-thumbnail" alt="Bendera" style="width: 100;" ></small></td>
                                            <!-- <td> <small> <?= $t['jabatan']; ?> </small></td> -->
                                            <!-- <td class="text-center"><small> <?= $t['jenis_kel']; ?> </small></td> -->
                                            <td>
                                                <small>
                                                <?php
                                                    $rptka = $t['masa_rptka'];
                                                    $masaRptka = strtotime(date('Y-m-d', strtotime($rptka) ) );
                                                    $currentDate = strtotime(date('Y-m-d'));
                                                    if($masaRptka < $currentDate) {
                                                        echo '<span class="badge badge-light badge-pill" style="font-size:12px; ">Nonaktif</span> ';
                                                    } else {
                                                        echo '<span class="badge badge-success badge-pill" style="font-size:12px; ">Aktif</span>';
                                                    }?>
                                                </small>
                                            </td>
                                            <td> 
                                                <small>
                                                <?php
                                                    $imta = $t['masa_imta'];
                                                    $masaImta = strtotime(date('Y-m-d', strtotime($imta) ) );
                                                    $currentDate = strtotime(date('Y-m-d'));
                                                    if($masaImta < $currentDate) {
                                                        echo '<span class="badge badge-light badge-pill" style="font-size:12px; ">Nonaktif</span>';
                                                    } else {
                                                        echo '<span class="badge badge-success badge-pill" style="font-size:12px; ">Aktif</span>';
                                                    }?>
                                                </small>
                                            </td>
                                            <!--<td> <small> <?= $t['nama_kabupaten']; ?></small> </td>-->
                                            <td class="text-center">
                                                <!-- <button type="button" data-toggle="modal" data-target="#modalPrint" class="btn btn-sm btn-info"> <i class="fa fa-print"></i></button> -->
                                                <button type="button" data-toggle="modal" data-target="#modalInfo<?= $t['id']; ?>" class="btn btn-sm btn-light">  <i class="fa-solid fa-eye"></i></i></button>
                                                <?php if ($is_admin == 1) { ?>
                                                    <a href="<?= base_url('tka/edit_tka/') . $t['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#modalHapus<?= $t['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- penampil view info data -->
<?php foreach ($tb_tka as $t) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $t['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info <?= $title; ?></h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                       
                        <div class="row">
                            <div class="col-8">
                            <p> <small><b> DATA <?= $title; ?> </b></small></p>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <strong><?= $t['nama_tka']; ?></strong> </label>
                                </div>
                                
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Jenis Kelamin </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?php if ($t['jenis_kel'] == 'L') {
                                                            echo 'Laki-laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        } ?> &nbsp; (&nbsp;<?= $t['jenis_kel']; ?>&nbsp;)</label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Negara </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['nama_negara']; ?>
                                    <img src="<?= base_url('assets/img/img-country-flag/') . $t['flag']; ?>"  class="img-fluid img-thumbnail" alt="Bendera" style="width: 100;" >
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Kontak</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['kontak']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Jabatan </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['jabatan']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Kabupaten/kota </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['nama_kabupaten']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Perusahaan </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['nama_perusahaan']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">No. RPTKA</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['no_rptka']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Masa RPTKA </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['masa_rptka']; ?>
                                    <?php
                                    $rptka = $t['masa_rptka'];
                                    $masaRptka = strtotime(date('Y-m-d', strtotime($rptka) ) );
                                    $currentDate = strtotime(date('Y-m-d'));
                                    if($masaRptka < $currentDate) {
                                        echo '<span class="badge badge-danger badge-pill" style="font-size:12px; ">Izin Habis</span> ';
                                    } else {
                                        echo '<span class="badge badge-success badge-pill" style="font-size:12px; ">Aktif</span>';
                                    }?>
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">No. IMTA </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['no_imta']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Masa IMTA </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $t['masa_imta']; ?> 
                                    <?php
                                        $imta = $t['masa_imta'];
                                        $masaImta = strtotime(date('Y-m-d', strtotime($imta) ) );
                                        $currentDate = strtotime(date('Y-m-d'));
                                        if($masaImta < $currentDate) {
                                            echo '<span class="badge badge-danger badge-pill" style="font-size:12px; ">Izin Habis</span>';
                                        } else {
                                            echo '<span class="badge badge-success badge-pill" style="font-size:12px; ">Aktif</span>';
                                        }?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                    <!-- <p > <small><b> <br> </b></small></p> -->
                                    <?php if ($t['image'] != null) { ?>
                                                            <center><img src="<?= base_url("assets/img/tka/") . $t['image'] ?> "alt="profile" class=" img-responsive" style="width: 130px; height: 180px; object-fit: cover;"></center>
                                                    <?php }else{ ?>
                                                            <center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class=" img-responsive" style="width: 130px; height: 180px; object-fit: cover;"></center><?php } ?>
                                    
                                    <p class="text-center" ><small> Foto. &nbsp; <?= $t['nama_tka']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-600">
                            <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modalhapus -->
<?php foreach ($tb_tka as $t) : ?>

    <div class="modal fade" id="modalHapus<?= $t['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="170" height="150">
                    <form action="<?= base_url('tka/hapus/' . $t['id']); ?>">
                        <div class="modal-body">Data&nbsp; <b>
                                <font color="red"><?= $t['nama_tka']; ?>
                            </b> </font> dari <b>
                                <font color="red"><?= $t['nama_perusahaan']; ?></font>
                            </b> akan dihapus </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Berkas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?= form_open_multipart('exportimport/import_data_tka') ?>
                    <div class="form-group column">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="importexcel" name="importexcel" accept=".xlsx, .xls" aria-describedby="uploadHelp">
                            <label class="custom-file-label" for="image">Pilih Berkas</label>
                            <small id="uploadHelp" class="form-text text-muted"> <i>
                                    <font color="orange">file format hanya .xls .xlsx (pilih dokumen excel anda terlebih dahulu!!) </font>
                                </i></small>
                        </div>
                        <hr>
                        <center>
                            <button type="submit" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">IMPORT</span>
                            </button>
                        </center>
                        <!-- <div class="col">
                            <b><?= $this->session->flashdata('message'); ?></b>
                        </div> -->
                    </div>
                    <?= form_close();  ?>
                </div>
            </div>
        </div>
    </div>
</div>

