
 
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-5">
             <div id="mapupt-index"></div>
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
                    <div class="table table-sm">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama UPT</th>
                                    <th>Kabupaten/kota</th>
                                    <th>Cakupan</th>
                                    <th width="14%" >Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kantorUPT as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <small> <?= $row['nama_upt'] ?></small></td>
                                        <td> <small><?= $row['nama_kabupaten']; ?></small></td>
                                         <td> <small><?= $row['ket_upt']; ?></small></td>
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
                    <form action="<?= base_url('datamaster/upt_delete/' . $row['id_upt']); ?>">
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



