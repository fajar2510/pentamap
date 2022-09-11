
 
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="h5 mb-0 text-gray-800"><?= $title; ?></p>
        <button class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </button>
    </div>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- menampilkan jika terjadi tindakan berhasil atau error -->
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ragam Disabilitas</th>
                                    <th>Jenis Disabilitas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data_disabilitas as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <?= $row['disabilitas_ragam']; ?></td>
                                        <td> <?= $row['jenis_disabilitas']; ?></td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $row['id_jenis']; ?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $row['id_jenis']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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




<!-- adduserModal -->
<div class=" modal fade" id="modalTambah">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Tambah Klasifikasi Disabilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('datamaster/disabilitas'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="ragam_disabilitas" class="col-sm-3 col-form-label">Ragam Disabilitas</label>
                        <div class="col-sm-3">
                            <select name="ragam_disabilitas" id="ragam_disabilitas" class="form-control">
                                <?php foreach ($ragam as $row) : ?>
                                    <option value="<?= $row['id_ragam']; ?>"> <?= $row['disabilitas_ragam']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('ragam_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_disabilitas" class="col-sm-3 col-form-label">Jenis Disabilitas</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jenis_disabilitas" placeholder="Masukkan Jenis" name="jenis_disabilitas" >
                            <?= form_error('jenis_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                        <span class="icon text-gray-600">
                            <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambahkan</span>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($data_disabilitas as $row) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalEdit<?= $row['id_jenis']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Ubah Klasifikasi Disabilitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('datamaster/disabilitas_edit/' . $row['id_jenis']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="ragam_disabilitas" class="col-sm-3 col-form-label">Ragam Disabilitas</label>
                            <div class="col-sm-3">
                                    <select  class="custom-select" name="ragam_disabilitas" id="ragam_disabilitas" class="form-control input-sm">
                                                <?php foreach ($ragam as $r) : ?>
                                                    <option value="<?= $r['id_ragam']; ?>" <?php if ($r['id_ragam'] == $row['ragam_id']) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $r['disabilitas_ragam']; ?> </option>
                                                <?php endforeach; ?>
                                    </select>
                                <?= form_error('ragam_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_disabilitas" class="col-sm-3 col-form-label">Jenis Disabilitas</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="jenis_disabilitas" placeholder="" name="jenis_disabilitas" value="<?= $row['jenis_disabilitas']; ?>">
                                <?= form_error('jenis_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                            <span class="icon text-gray-600">
                                <i class="fas fa-window-close"></i>
                            </span>
                            <span class="text">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($data_disabilitas as $row) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $row['id_jenis']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                </div>
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="170" height="150">
                    <form action="<?= base_url('datamaster/delete_disabilitas/' . $row['id_jenis']); ?>">
                        <div class="modal-body">Ragam jenis disabilitas&nbsp;<b>
                                <font color="black"><?= $row['disabilitas_ragam']; ?> </font>, &nbsp;<font color="black"> <?= $row['jenis_disabilitas']; ?></font>
                                <br>
                            <font color="red">akan dihapus !</b>  </font> </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value=<?= $row['id_jenis']; ?>>
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?> -->

