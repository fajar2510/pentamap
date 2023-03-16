<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style="font-size:15;color:#5b5b5b;"><?= $title; ?>(Calon Pekerja Migran Indonesia) </h5>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <?php if ($is_admin == 1) { ?>
        <a href="<?= base_url('cpmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <?php } ?>
    </div>

    <!-- parsing data -->
    <!-- <?php foreach ($formal as $pot_formal); ?> -->
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
                        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-0"> -->

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
                        <!-- </div> -->
                        <div class="dropdown mb-0">
                            <span style="margin:10px;"> 
                                    <button class="btn btn-info btn-icon-split" type="button" data-toggle="modal" data-target="#modalfiltercpmi" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-print"></i>
                                        </span>
                                    <span class="text" style = "font-family:roboto; ">Cetak Laporan Penempatan</span>
                                    </button>
                            </span>
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
                        <div class="modal fade" id="modalfiltercpmi" tabindex="-1" role="dialog" aria-labelledby="modalfiltercpmi" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Filter Cetak CPMI</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <form action="<?= base_url('exportimport/export_pdf_cpmi')?>" target="_blank" method="POST">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="tahun" class="d-none d-sm-inline-block p-2" style="font-weight:bold; font-family:roboto;"> Bulan</label>
                                                    <label for="tahun" class="d-none d-sm-inline-block p-2" style="font-weight:bold; font-family:roboto;"> Negara</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input style="margin:10px; font-family:roboto;" readonly name="tahun" id="tahun_bulan" class="form-control p-2 " type="text" value="<?= date('Y-m'); ?>">
                                                    <select style="margin:10px; font-family:roboto;" name="negara" id="" class="form-control" required>
                                                        <option value="">- Pilih Negara -</option>
                                                        <?php foreach ($negara as $v) { ?>
                                                            <option value="<?php echo $v->id_negara ?>"><?php echo $v->nama_negara ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <span style="margin:10px;"> 
                                                            <button class="btn btn-info btn-icon-split" type="submit" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                                                <span class="icon text-white-50">
                                                                    <i class="fa-solid fa-print"></i>
                                                                </span>
                                                            <span class="text" style = "font-family:roboto; ">Cetak</span>
                                                            </button>
                                                    </span>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table table-sm">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama_PMI </th>
                                        <th>Domisili</th>
                                        <!-- <th>L/P</th> -->
                                        <!-- <th>Perusahaan</th> -->
                                        <th>Pengguna Jasa </th>
                                        <th>Negara</th>
                                        <th>&nbsp;Aksi__&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody align="left">
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_cpmi as $p) : ?>
                                        <tr>
                                            <th scope="row"><small><center>  <?= $i; ?></center></small> </th>
                                            <td> <small> <?= $p['date_created']; ?> </small> </td>
                                            <td> <small> <?= $p['nama_pmi']; ?> </small> </td>
                                            <td><small> <?= $p['nama_kabupaten']; ?> </small> </td>
                                            <!-- <td><small> <?= $p['perusahaan']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['jenis_kelamin']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['nama_perusahaan']; ?> </small> </td> -->
                                            <td><small> <?= $p['pengguna_jasa']; ?> </small> </td>
                                            <td><small> <?= $p['nama_negara']; ?> 
                                                <img src="<?= base_url('assets/img/img-country-flag/') . $p['flag']; ?>"  class="img-fluid img-thumbnail" alt="Bendera" style="width: 100;" ></small> 
                                            </td>
                                            <!-- <td> <?php echo $aa->tka + $bb->pmib; ?></td> -->
                                            <td>
                                                <?php if ($is_admin == 1) { ?>
                                                    <!-- <a href="<?= base_url('exportimport/export_pdf_cpmi/') . $p['perusahaan'] . '/' . $p['negara_penempatan'] . '/' . $p['date_created']; ?>" target="_blank" class="btn btn-sm btn-light"><i class="fa fa-book" aria-hidden="true"></i> <b>lap.</b></i></a> -->
                                                <?php } ?>
                                                <button type="button" data-toggle="modal" data-target="#modalInfo<?= $p['id']; ?>" class="btn btn-sm btn-light"> <i class="fa-solid fa-eye"></i></button>
                                                <?php if ($is_admin == 1) { ?>
                                                    <a href="<?= base_url('cpmi/edit_cpmi/') . $p['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class=" btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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
<?php foreach ($data_cpmi as $p) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info <?= $title; ?></h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8">
                                <p > <small><b> DATA <?= $title; ?> </b></small></p>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <strong><?= $p['nama_pmi']; ?></strong> </label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Jenis Kelamin </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?php if ($p['jenis_kelamin'] == 'L') {
                                                            echo 'Laki-laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        } ?> &nbsp; (&nbsp;<?= $p['jenis_kelamin']; ?>&nbsp;)</label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Tempat Lahir </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['tempat_lahir']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['tanggal_lahir']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Perusahaan </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['perusahaan']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Domisili</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_kabupaten']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Asal</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['alamat']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Jabatan </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['jabatan']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Pendidikan Formal </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['pendidikan_formal']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Gaji</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['gaji']; ?></label>
                                </div>
                                
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Paspor </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['paspor']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Negara Penempatan </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_negara']; ?>
                                    <img src="<?= base_url('assets/img/img-country-flag/') . $p['flag']; ?>"  class="img-fluid img-thumbnail" alt="Bendera" style="width: 100;" >
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Kode Penerbangan</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['kode_pesawat']; ?></label>
                                </div>
                                <div class="row"><br></div>
                                <p > <small><b> DATA PENGGUNA JASA </b></small></p>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama/Instansi </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['pengguna_jasa']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">Alamat  </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['alamat_pengguna_jasa']; ?></label>
                                </div>
                            </div>
                            <div class="col-4">
                                    <!-- <p > <small><b> <br> </b></small></p> -->
                                    <?php if ($p['image'] != null) { ?>
                                                            <center><img src="<?= base_url("assets/img/cpmi/") . $p['image'] ?> "alt="profile" class=" img-responsive" style="width: 130px; height: 180px; object-fit: cover;"></center>
                                                    <?php }else{ ?>
                                                            <center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class=" img-responsive" style="width: 130px; height: 180px; object-fit: cover;"></center><?php } ?>

                                    <p class="text-center" ><small> Foto. &nbsp; <strong><?= $p['nama_pmi']; ?></strong> </small></p>
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