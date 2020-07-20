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
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

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
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr align="center">
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td> <?php if ($sm['is_active'] == 1) {
                                                    echo 'Aktif';
                                                } else {
                                                    echo 'Tidak Aktif';
                                                } ?>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $sm['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $sm['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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


<!-- Modal  Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah SubMenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Judul Sub</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="title" placeholder="Judul Sub" name="title" value="<?= set_value('title'); ?>">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="negara" class="col-sm-3 col-form-label">Menu</label>
                        <div class="col-sm-5">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value=""> Pilih Menu </option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"> <?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-3 col-form-label">URL</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url. . . ">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-3 col-form-label">Font Awesome Ikon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon. . . ">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Status Aktif?
                            </label>
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
<?php foreach ($subMenu as $sm) : ?>
    <div class="modal fade" id="modalEdit<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/editSubMenu/' . $sm['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Judul Sub</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" placeholder="Judul Sub" name="title" value="<?= $sm['title']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="negara" class="col-sm-3 col-form-label">Menu</label>
                            <div class="col-sm-5">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value=""> Pilih Menu </option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"> <?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-sm-3 col-form-label">URL</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url. . . " value="<?= $sm['url']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label">Ikon</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon. . . " value="<?= $sm['icon']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Status Aktif?
                                </label>
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
<?php foreach ($subMenu as $sm) : ?>

    <div class="modal fade" id="modalHapus<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/hapusSubMenu/' . $sm['id']); ?>">
                    <div class="modal-body">Data&nbsp; <b>
                            <font color="red"><?= $sm['title']; ?></font>
                        </b> akan dihapus secara permanen </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value=<?= $sm['id']; ?>>
                        <button class="btn btn-secondary" type="button" id="btn-ok" data-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->