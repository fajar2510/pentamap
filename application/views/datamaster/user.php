<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user_role as $ur) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <?= $ur['name']; ?></td>
                                        <td> <i> <?= $ur['email']; ?></i></td>
                                        <td> <?= $ur['role']; ?> </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $ur['id']; ?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $ur['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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
                <h5 class="modal-title" id="modalEditLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('datamaster/user'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password" value="<?= set_value('password1'); ?>">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="password2" placeholder="Konfirmasi Password" name="password2" value="<?= set_value('password2'); ?>">
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-5">
                            <select name="role" id="role" class="form-control">
                                <option value=""> Pilih Jabatan </option>
                                <?php foreach ($role as $ru) : ?>
                                    <option value="<?= $ru['id']; ?>"> <?= $ru['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
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

<?php foreach ($user_role as $ur) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalEdit<?= $ur['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Ubah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('datamaster/editUser'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?= $ur['name']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" disabled placeholder=" " name="email" value="<?= $ur['email']; ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-sm-3 col-form-label">Hak Akses</label>
                            <div class="col-sm-5">
                                <select name="role" id="role" class="form-control">
                                    <option value=""> Pilih Role </option>
                                    <?php foreach ($role as $ru) : ?>
                                        <option value="<?= $ru['id']; ?>"> <?= $ru['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class=" form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-5">
                                <select name="role" id="role" class="form-control">
                                    <option value=""> Pilih Jabatan/Level </option>
                                    <?php
                                    while ($data_role = mysqli_fetch_array($ur)) {
                                        if ($data['role_id'] == $data_role['id']) {
                                            $select = "selected";
                                        } else {
                                            $select = "";
                                        }
                                        echo "<option $select>" . $data_role['id'] . "</option>";
                                        // echo "<option value='.$data_role[role_id]' $select>$data_role[role]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($user_role as $ur) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $ur['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('datamaster/deleteUser/' . $ur['id']); ?>">
                    <div class="modal-body">Data&nbsp;<b>
                            <font color="red"><?= $ur['name']; ?></font>
                        </b> akan dihapus secara permanen </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value=<?= $ur['id']; ?>>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>