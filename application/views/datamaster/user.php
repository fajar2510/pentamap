<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newUser">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hak Akses</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user_role as $ur) : ?>
                                    <tr>
                                        <th align="center" scope="row"><?= $i; ?></th>
                                        <td> <?= $ur['name']; ?></td>
                                        <td> <i> <?= $ur['email']; ?></i></td>
                                        <td align="center">[ <?= $ur['role']; ?> ]</td>
                                        <td align="center">

                                            <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-sm btn-warning" id="btn-edit" class="btn btn-sm btn-warning" data-id="<?= $ur['id']; ?>" data-nisn="<?= $ur['name']; ?>" data-nama="<?= $ur['email']; ?>" data-role="<?= $ur['role_id']; ?>" data-status="<?= $ur['is_active']; ?>"> <i class="fa fa-edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id="<?= $ur['id']; ?>"> <i class="fa fa-trash-alt"></i></button>

                                            <!-- <a class="badge badge-warning fas fa-ban" href="<?= base_url('datamaster/editUser/' . $ur['id']); ?>">&nbsp;edit</a>
                                <a class="badge badge-danger fas fa-trash-alt" href="<?= base_url('datamaster/deleteUser/' . $ur['id']); ?>" onclick="return confirm('Are you sure ?')">&nbsp;delete</a> -->
                                            <!-- <a class="badge badge-danger" href="<?= base_url('datamaster/deleteUser'); ?>" onclick="hapusModal('$ur['id']')" data-toggle="modal" data-target="#hapusModal">
                                    Hapus pake modal
                                </a> -->
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
<div class=" modal fade" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('datamaster/user'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password" value="<?= set_value('password1'); ?>">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2" value="<?= set_value('password2'); ?>">
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Akses</label>
                        <div class="col-sm-5">
                            <select name="role" id="role" class="form-control">
                                <option value=""> Pilih Hak Akses </option>
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


<!-- edituserModal -->
<div class=" modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUbahLabel">Ubah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('datamaster/user'); ?>" method="post">
                <input type="text" name="id" id="id-user">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" disabled placeholder=" " name="email" value="<?= $user['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-5">
                            <select name="role" id="role" class="form-control">
                                <option value=""> Pilih </option>
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
                                <option value=""> Select Role </option>
                                <?php
                                while ($role = mysqli_fetch_array($user)) {
                                    if ($data['id'] == $r['id']) {
                                        $s = "selected";
                                    } else {
                                        $s = "";
                                    }
                                    // echo "<option $s>".$r['id']."</option>";
                                    echo "<option value='$r[id]' $s>$r[role]</option>";
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




<!-- modalhapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data akan dihapus secara permanen </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('datamaster/deleteUser/' . $ur['id']); ?>">Delete</a>
            </div>
        </div>
    </div>
</div>