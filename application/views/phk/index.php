<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('phk/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>

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
                <div class="card-header py-3 ">
                    <div class="d-sm-flex align-items-center justify-content-end mb-0">


                        <div class="dropdown mb-0">
                            <!-- <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modalImport" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </button>
                            <a href="<?= base_url('exportimport/export_pdf_pmi/'); ?>" target="_blank" class=" btn btn-danger " class=" d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">PDF</span>
                            </a> -->
                            <!-- <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Eksport</span>
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Excel</a>
                                <a class="dropdown-item" href="#">PDF</a>
                            </div> -->
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th>Nama</th>
                                        <th>Asal</th>
                                        <th>Perusahaan</th>
                                        <th class="text-center">Disabilitas</th>
                                        <th class="text-center">Status</th>
                                        <!-- <th>Kontak</th> -->
                                        <th width="14%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_phk as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></small> </th>
                                            <td> <?= $p['nama_tk']; ?>
                                            <td><small> <?= $p['nama_kabupaten']; ?></small> </td>
                                            <td> <?= $p['nama_perusahaan']; ?></td>
                                            <td class="text-center"><?php if ($p['disabilitas'] == 'Y') {
                                                            echo '<span class="badge badge-info">Ya</span>';
                                                        } else {
                                                            echo '<span class="badge badge-light">Tidak</span>';
                                                        } ?> </td>
                                            <td class="text-center"><?php if ($p['status_kerja'] == 'aktif') {
                                                            echo '<span class="badge badge-success">Aktif</span>';
                                                        } else {
                                                            echo '<span class="badge badge-light">Nonaktif</span>';
                                                        } ?></span> </td>
                                            <td class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#modalInfo<?= $p['id_phk']; ?>" class="btn btn-sm btn-light">  <i class="fa-solid fa-eye"></i></button>
                                                <!-- <a href="<?= base_url('phk/edit/') . $p['id_phk']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a> -->
                                                <button type="button" data-toggle="modal" data-target="#modalHapus<?= $p['id_phk']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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


<?php foreach ($data_phk as $p) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $p['id_phk']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                    <form action="<?= base_url('phk/hapus/' . $p['id_phk']); ?>">
                        <div class="modal-body">Data&nbsp; <b>
                                <font color="red"><?= $p['nama_tk']; ?></font>
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

<!-- penampil view info data -->
<?php foreach ($data_phk as $p) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $p['id_phk']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info <?= $title; ?></h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                        <p > <small><b> DATA INDEKS PERUSAHAAN</b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Lengkap </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?= $p['nama_tk']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">NIK </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nomor_identitas']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Jenis Kelamin </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['jenis_kel']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">KPJ (BPJS) </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['kpj']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">No.Telp. (kontak) </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['kontak']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Alamat </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['alamat']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Kabupaten/kota </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_kabupaten']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Perusahaan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_perusahaan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Kode Segmen</label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['kode_segmen']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Status </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?php if ($p['status_kerja'] == 'aktif') {
                                                            echo '<span class="badge badge-success">Aktif</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Nonakti(phk)</span>';
                                                        } ?> </label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Peny. Disabilitas </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?php if ($p['disabilitas'] == '1') {
                                                            echo '<span class="badge badge-info">Iya</span>';
                                                        } else {
                                                            echo '<span class="badge badge-light">Tidak</span>';
                                                        } ?> </label>
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

<!-- Modal -->
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
                    <?= form_open_multipart('exportimport/import_data_phk') ?>
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
</div>