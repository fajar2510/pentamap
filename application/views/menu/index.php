<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu',  '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope="col" width="7%">#</th>
                                    <th scope="col" width="73%">Menu</th>
                                    <th scope="col" width="15%">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr align="center">
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <b>[ </b> <i><?= $m['menu']; ?></i> <b> ]</b> </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $m['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $m['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>

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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL -->


<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Menu Sidebar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/index'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="menu" class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="menu" placeholder="Judul Menu" name="menu">
                            <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
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
<!-- Modal Tambah End -->

<!-- Modal Edit -->
<?php foreach ($menu as $m) : ?>
    <div class="modal fade" id="modalEdit<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Hak Akses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/editMenu/' . $m['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role">Menu</label>
                            <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>">
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
                            <span class="text">Perbarui</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Edit -->

<!-- Modal Hapus -->
<?php foreach ($menu as $m) : ?>

    <div class="modal fade" id="modalHapus<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/hapusMenu/' . $m['id']); ?>">
                    <div class="modal-body">Data&nbsp; <b>
                            <font color="red"><?= $m['menu']; ?></font>
                        </b> akan dihapus secara permanen </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value=<?= $m['id']; ?>>
                        <button class="btn btn-secondary" type="button" id="btn-ok" data-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->