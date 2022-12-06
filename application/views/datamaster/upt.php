
 
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-5">
             <div id="mapgeojson"></div>
        </div>
        <div class="col-7">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- menampilkan jika terjadi tindakan berhasil atau error -->
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-0 px-3" style="padding-top:10px;">
                    <h6 class="m-0 font-weight-bold text-primary">Data <?= $title; ?>(Unit Pelaksana Teknis)</h6>
                    <a href="<?= base_url('datamaster/upt_add/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" >
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
                </div>
               
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama UPT</th>
                                    <th>Kabupaten/kota</th>
                                    <th>Ket.Cakupan</th>
                                    <th >Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kantorUPT as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <?= $row['nama_upt'] ?></td>
                                        <td> <?= $row['nama_kabupaten']; ?></td>
                                         <td> <?= $row['ket_upt']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('datamaster/upt_edit/') . $row['id_upt']; ?>"  class="btn btn-sm btn-warning" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $row['id_upt']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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
<!-- <div class=" modal fade" id="modalTambah">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Tambah Jenis Sektor Usaha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('datamaster/upt'); ?>" method="post">
            <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama_upt" class="col-sm-3 col-form-label">Nama UPT</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_upt" placeholder="" name="nama_upt" >
                                <?= form_error('nama_upt', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="fungsi" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                            <div class="col-sm-5">
                                <select name="fungsi" id="fungsi" class="form-control">
                                    <option value="">~ Pilih Kabupaten/kota ~</option>
                                    <?php foreach ($kabupaten as $kab) : ?>
                                        <option value="<?= $kab['id_kabupaten']; ?>"> <?= $kab['nama_kabupaten']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                <?= form_error('fungsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket_upt" class="col-sm-3 col-form-label">Keterangan Cakupan </label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="ket_upt" placeholder=". . . cakupan upt" name="ket_upt" row="3" cols="2"></textarea>
                                <?= form_error('ket_upt', '<small class="text-danger pl-3">', '</small>'); ?>
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
</div> -->




<?php foreach ($kantorUPT as $row) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $row['id_upt']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
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
                    <form action="<?= base_url('datamaster/delete_sektor/' . $row['id_upt']); ?>">
                        <div class="modal-body">Data&nbsp;<b>
                                <font color="red"><?= $row['nama_upt']; ?></font>
                            </b> akan dihapus </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value=<?= $row['id_upt']; ?>>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?> -->



