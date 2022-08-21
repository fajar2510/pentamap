<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('pmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <form enctype="multipart/form-data" method="post" action="<?= base_url('pmi'); ?>">
                                <div>
                                    <div class="container">
<!-- 
                                        Rentang Awal: <input id="startDate" width="276" name="tawal">
                                        Rentang Akhir: <input id="endDate" width="276" name="takhir">
                                        <button type="submit" class="btn btn-success btn-icon-split " name="filter" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-filter"></i>
                                            </span>
                                            <span class="text">Filter</span>
                                        </button> -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="dropdown mb-0">
                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modalImport" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
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
                            </a>
                            <a href="<?= base_url('exportimport/export_excel_pmi'); ?> " target="_blank" class="btn btn-success " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">CSV</span>
                            </a>
                        </div> -->

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead align="center">
                            <tr>
                                <th> No</th>
                                <!-- <th>Tanggal</th> -->
                                <th>Nama (umur)</th>
                                <th>Alamat</th>
                                <th>Negara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pmi as $p) : ?>
                                <tr>
                                    <td align="center"><?= $i; ?></td>
                                    <!-- <td><small><?= $p['date_created']; ?></small> </td> -->

                                    <!-- <td><img src="<?= base_url('assets/img/pmi/') . $p['image']; ?>" alt="Profil" width="60" height="60"></td> -->
                                    <td><?= $p['nama']; ?> <sup>
                                            (<?php $lahir    = new DateTime($p['tgl_lahir']);
                                                $today        = new DateTime();
                                                $umur = $today->diff($lahir);
                                                echo $umur->y;
                                                // echo " Tahun, ";
                                                // echo $umur->m;
                                                // echo " Bulan, dan ";
                                                // echo $umur->d;
                                                // echo " Hari";
                                                ?>)th</sup> </td>
                                    <td ><small> <?= $p['nama_kelurahan']; ?>, <?= $p['nama_kecamatan']; ?>, <?= $p['nama_kabupaten']; ?> </small></td>
                                    <td align="center"><?= $p['negara_bekerja']; ?></td>
                                    <td align="center">
                                        <a href=" <?= base_url('exportimport/pmi_negara/') . $p['negara_bekerja'] . '/' . $p['date_created']; ?>" target="_blank" class="btn btn-sm btn-light  "> lap. <i class="fa fa-book" aria-hidden="true"></i></i></a>
                                        <a href="<?= base_url('exportimport/export_pdf_kwitansi/') . $p['id']; ?>" target="_blank" class="btn btn-sm btn-light"> nota<i class="fa-solid fa-receipt"></i></a>
                                        <button type="button" data-toggle="modal" data-target="#modalInfo<?= $p['id']; ?>" class="btn btn-sm btn-success">  <i class="fa-solid fa-eye"></i></i></button>
                                        <a href="<?= base_url('pmi/edit/') . $p['id']; ?>" class="btn btn-sm btn-warning "> <i class="fa fa-edit"></i></a>
                                        <button type=" button" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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


<?php foreach ($pmi as $p) : ?>
    <!-- modalhapus -->
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
                    <form action="<?= base_url('pmi/deletePmi/' . $p['id']); ?>">
                        <div class="modal-body">Data&nbsp; <b>
                                <font color="red"><?= $p['nama']; ?> <sup>
                                        (<?php $lahir    = new DateTime($p['tgl_lahir']);
                                            $today        = new DateTime();
                                            $umur = $today->diff($lahir);
                                            echo $umur->y;
                                            // echo " Tahun, ";
                                            // echo $umur->m;
                                            // echo " Bulan, dan ";
                                            // echo $umur->d;
                                            // echo " Hari";
                                            ?>)th</sup></font>
                            </b> akan dihapus ! </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value=<?= $p['id']; ?>>
                            <button class="btn btn-secondary" type="button" id="btn-ok" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- end main -->

<!-- Button trigger modal -->


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
                    <?= form_open_multipart('exportimport/import_data_pmi') ?>
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