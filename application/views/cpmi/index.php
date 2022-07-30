<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('cpmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>

    <!-- parsing data -->
    <!-- <?php foreach ($formal as $tot_formal); ?> -->
    <?php foreach ($a as $aa); ?>
    <?php foreach ($b as $bb); ?>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>


            <div class="card shadow mb-0">
                <div class="card-header py-3 ">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">

                            <!-- <a href="#" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-filter"></i>
                                </span>
                                <span class="text">Filter</span>
                            </a>
                            <div>
                                <div class="container">
                                    Rentang Awal: <input id="startDate" width="276" />
                                    Rentang Akhir: <input id="endDate" width="276" />
                                </div>
                            </div> -->
                        </div>
                        <div class="dropdown mb-0">
                            <!-- <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modalImport" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </button> -->
                            <!-- <a href="<?= base_url('exportimport/export_pdf_cpmi'); ?>" target="_blank" class="btn btn-danger " class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">PDF</span>
                            </a>
                            <a href="<?= base_url('exportimport/export_excel_cpmi'); ?>" target="_blank" class="btn btn-success " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">CSV</span>
                            </a> -->
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th> No</th>
                                        <th>Tanggal</th>
                                        <th>Nama_PMI </th>
                                        <th>Domisili</th>
                                        <!-- <th>L/P</th> -->
                                        <th>Perusahaan</th>
                                        <!-- <th>Pengguna Jasa </th> -->
                                        <th>Negara</th>
                                        <th>&nbsp;Aksi__&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_cpmi as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td> <small> <?= $p['date_created']; ?> </small> </td>
                                            <td> <small> <?= $p['nama_pmi']; ?> </small> </td>
                                            <td><small> <?= $p['nama_kabupaten']; ?> </small> </td>
                                            <td><small> <?= $p['perusahaan']; ?> </small> </td>
                                            <!-- <td><small> <?= $p['jenis_kelamin']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['nama_perusahaan']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['pengguna_jasa']; ?> </small> </td> -->
                                            <td><small> <?= $p['nama_negara']; ?> </small> </td>
                                            <!-- <td> <?php echo $aa->tka + $bb->pmib; ?></td> -->
                                            <td>
                                                <a href="<?= base_url('exportimport/export_pdf_cpmi/') . $p['perusahaan'] . '/' . $p['negara_penempatan'] . '/' . $p['date_created']; ?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-book" aria-hidden="true"></i> <b>LAP.</b></i></a>
                                                <a href="<?= base_url('cpmi/edit/') . $p['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class=" btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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

<!--  <!-- modalhapus -->
<?php foreach ($data_cpmi as $p) : ?>

    <div class="modal fade" id="modalHapus<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="170" height="150">
                    <form action="<?= base_url('cpmi/hapus/' . $p['id']); ?>">
                        <div class="modal-body">Data&nbsp; <b>
                                <font color="red"><?= $p['nama_pmi']; ?></font>
                            </b> perusahaan <b>
                                <font color="red"><?= $p['perusahaan']; ?></font>
                            </b> akan dihapus permanen </div>
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
                    <?= form_open_multipart('exportimport/uploaddata_cpmi') ?>
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
                    </div>
                    <?= form_close();  ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>