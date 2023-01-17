<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="h5 mb-4 text-gray-800"><?= $title; ?></p>
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
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table table-sm">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th class="text-center">Hak Akses</th>
                                    <!-- <th>Kontak</th> -->
                                    <th class="text-center">Profil</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user_role as $ur) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <?= $ur['name']; ?></td>
                                        <td class="text-center"> <i> <?= $ur['role']; ?></i></td>
                                        <!-- <td><?= $ur['kontak']; ?></td> -->
                                        <td class="text-center"> <img src="<?= base_url('assets/img/profile/') . $ur['image']; ?>" class="img-profile rounded-circle" width="50" height="50"" alt="Profile Picture" style="width: 60px; height: 60px; object-fit: cover ; "></td>
                                        <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#modalInfo<?= $ur['id']; ?>" class="btn btn-sm btn-light"> <i class="fa-solid fa-eye"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#modalEdit<?= $ur['id']; ?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                        
                                        <?php if ($ur['id'] == 1) { ?>
                                            <button type="button" disabled class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
                                        <?php } ?>
                                         
                                        <?php if ($ur['id'] != 1) { ?>
                                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $ur['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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




<!-- adduserModal -->
<div class=" modal fade" id="modalTambah">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Tambah Data Pengguna</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <form action="<?= base_url('datamaster/user'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" >
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-3">
                            <input class="form-control" type="date" value="<?= date('Y-m-d'); ?>" id="tanggal_lahir" name="tanggal_lahir">
                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-3">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="L"> Laki-Laki </option>
                                <option value="P"> Perempuan </option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <label for="NIK/NIP" class="col-sm-3 col-form-label">NIK/NIP</label>
                        <div class="col-sm-4">
                            <input type="NIK" class="form-control" id="NIK" name="NIK" placeholder="NIK">
                            <?= form_error('NIK', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-4">
                            <input type="NIP" class="form-control" id="NIP" placeholder="NIP" name="NIP" >
                            <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kontak" class="col-sm-3 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="Nomor HP" name="kontak">
                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="jabatan" placeholder="" name="jabatan">
                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bio" class="col-sm-3 col-form-label">Bio/tentang kamu</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="bio" placeholder="tentang kamu . . . " name="bio" rows="2"></textarea>
                            <?= form_error('bio', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Hak Akses</label>
                        <div class="col-sm-5">
                            <select name="role" id="role" class="form-control">
                                <?php foreach ($role as $ro) : ?>
                                    <option value="<?= $ro['id']; ?>"> <?= $ro['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label">Unggah Foto Profil</label>
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/img/profile/') . $ur['image'] ?>" class="img-thumbnail" alt="Profile Picture">
                            </div>
                            <div class="col-sm-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 1 MB. </i></small>
                            </div>
                        </div>
                    </div> -->
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
    <div class=" modal fade" id="modalEdit<?= $ur['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Ubah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('datamaster/user_edit/' . $ur['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?= $ur['name']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-3">
                                <input class="form-control" type="date" value="<?= $ur['tanggal_lahir']; ?>" id="tanggal_lahir" name="tanggal_lahir">
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-3">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="L" <?php if ($ur ['jenis_kelamin'] == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-Laki</option>
                                                <option value="P" <?php if ($ur ['jenis_kelamin'] == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                        </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" placeholder=" " name="email" value="<?= $ur['email']; ?>" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIK/NIP" class="col-sm-3 col-form-label">NIK/NIP</label>
                            <div class="col-sm-4">
                                <input type="NIK" class="form-control" id="NIK" name="NIK" placeholder="NIK" value="<?= $ur['NIK']; ?>">
                                <?= form_error('NIK', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="NIP" class="form-control" id="NIP" placeholder="NIP" name="NIP" value="<?= $ur['NIP']; ?>">
                                <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"><?= $ur['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kontak" class="col-sm-3 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="Nomor HP" name="kontak" value="<?= $ur['kontak']; ?>">
                                <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" aria-describedby="uploadHelp1" id="jabatan" placeholder="" name="jabatan" value="<?= $ur['jabatan']; ?>">
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-sm-3 col-form-label">Bio/tentang kamu</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="bio" placeholder="tentang kamu . . . " name="bio" rows="2"> <?= $ur['bio']; ?></textarea>
                                <?= form_error('bio', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-3 col-form-label">Hak Akses</label>
                            <div class="col-sm-5">
                                <select name="role" id="role" class="form-control">
                                    <?php foreach ($role as $ro) : ?>
                                        <option value="<?= $ro['id']; ?>" <?php if ($ur['role_id'] == $ro['id']) {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>> <?= $ro['role']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Unggah Foto Profil</label>
                                <div class="col-sm-2">
                                    <img src="<?= base_url('assets/img/profile/') . $ur['image'] ?>" class="img-thumbnail" alt="Profile Picture">
                                </div>
                                <div class="col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                    <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 1 MB. </i></small>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Status User Aktif?
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
                             <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- penampil view info data -->
<?php foreach ($user_role as $ur) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $ur['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info <?= $title; ?></h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-sm-8">
                                <p > <small><b> DATA <?= $title; ?> </b></small></p>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Nama </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?= $ur['name']; ?></label> 
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Jenis Kelamin </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?php if ($ur['jenis_kelamin'] == 'L') {
                                                            echo 'Laki-laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        } ?> &nbsp; (&nbsp;<?= $ur['jenis_kelamin']; ?>&nbsp;)</label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['tanggal_lahir']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['alamat']; ?></label>
                                    
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Jabatan</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['jabatan']; ?></label>
                                </div>
                                
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">NIK / NIP</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['NIK']; ?> &nbsp;/&nbsp;<?= $ur['NIP']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Kontak(HP,Telp.)</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['kontak']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Email  </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['email']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Bio </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $ur['bio']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Hak Akses </label>
                                    <label for="name" class="col-sm-8 col-form-label">: <?php if ($ur['role'] == 'Super Admin') {
                                                            echo '<span class="badge badge-danger badge-pill">Super Admin</span> ' ;
                                                        } else {
                                                            echo '<span class="badge badge-success badge-pill">Just Admin</span> ';
                                                        } ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Status Aktif </label>
                                    <label for="name" class="col-sm-8 col-form-label">:  <?php if ($ur['is_active'] == '1') {
                                                            echo '<span class="badge badge-success badge-pill">AKTIF</span> ' ;
                                                        } else {
                                                            echo '<span class="badge badge-dark badge-pill">NONAKTIF</span> ';
                                                        } ?></label>
                                </div>
                            </div>
                            <div class="col">
                                <p > <small><b> <br> </b></small></p>
                                <img src="<?= base_url('assets/img/profile/') . $ur['image']; ?>"  class="img-fluid img-thumbnail" alt="Picture" tyle="width: 300px; height: 300px;">
                                <p class="text-center" ><small> Foto Profil. &nbsp; <?= $ur['name']; ?></small></p>
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
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="170" height="150">
                    <form action="<?= base_url('datamaster/deleteUser/' . $ur['id']); ?>">
                        <div class="modal-body">Akun&nbsp;<b>
                                <font color="black"><?= $ur['name']; ?></font>
                            </b> akan dihapus permanen !</div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value=<?= $ur['id']; ?>>
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>