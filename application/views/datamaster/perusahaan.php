<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h5>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('datamaster/perusahaan_add/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <!-- <a href="#" class="btn btn-info btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </a>
                            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Eksport</span>
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Excel</a>
                                <a class="dropdown-item" href="#">PDF</a>
                            </div>
                            </> -->
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table table-sm">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Kabupaten/kota</th>
                                        <!-- <th class="text-center">Pimpinan</th> -->
                                        <th>Sektor</th>
                                        <th>Skala</th>
                                        
                                        <th width="14%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tb_perusahaan as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td> <?= $p['nama_perusahaan']; ?>
                                            <td><small><?= $p['nama_kabupaten']; ?> </small></td> 
                                            <!-- <td><?= $p['nama_pimpinan']; ?></td> -->
                                           
                                            <td> <?= $p['nama_sektor']; ?>
                                            <!-- <td>
                                                <?php if ($p['kontak'] == null) {
                                                    echo '-';
                                                } else {
                                                    echo $p['kontak'];
                                                } ?>
                                            </td> -->
                                            <td>
                                                <?= $p['jenis_perusahaan']; ?>
                                            </td>
                                            
                                            <td class="text-center"> 
                                                <!-- <button type="button" data-toggle="modal" data-target="#modalPrint" class="btn btn-sm btn-info"> <i class="fa fa-print"></i></button> -->
                                                <button type="button" data-toggle="modal" data-target="#modalInfo<?= $p['id']; ?>" class="btn btn-sm btn-success">  <i class="fa-solid fa-eye"></i></i></button>
                                                <a href="<?= base_url('datamaster/perusahaan_edit/') . $p['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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
<?php foreach ($tb_perusahaan as $p) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info Perusahaan</h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                        <p > <small><b> DATA INDEKS PERUSAHAAN</b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Perusahaan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?= $p['nama_perusahaan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Kabupaten/kota </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_kabupaten']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Pimpinan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_pimpinan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Alamat </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['alamat']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">No.Telp. Perusahaan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['kontak']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">E-mail </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['email_perusahaan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Status Kantor </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?php if ($p['status'] == 'P') {
                                                    echo 'Pusat';
                                                } else {
                                                    echo 'Cabang';
                                                } ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Kode Kantor </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['kode_kantor']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Jenis(Skala) </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['jenis_perusahaan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Sektor </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_sektor']; ?> &nbsp;<?= $p['keterangan']; ?></label>
                        </div>

                        <p> <small><b> KONTAK PERSON</b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Kontak Person </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_kontak_person']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">No. Kontak Person </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['no_kontak_person']; ?></label>
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

<?php foreach ($tb_perusahaan as $p) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->

                </div>
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="210" height="150">
                    <form action="<?= base_url('datamaster/hapusPerusahaan/' . $p['id']); ?>">
                        <div class="modal-body">&nbsp; <b>
                                <font color="black"><?= $p['nama_perusahaan']; ?></font>
                            </b> akan dihapus ?</div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>