<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    

    <?= $this->session->flashdata('message'); ?>


    <section style="background-color: #eee;">
    <div class="container py-5">

        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
            <div class="card-body text-center">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="Profile Picture"
                class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">John Smith</h5>
                <p class="text-muted mb-1">Full Stack Developer</p>
                <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                </div>
            </div>
            </div>
        
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Nama Lengkap</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $user['name']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $user['email']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Kontak</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $user['kontak']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">NIK/NIP</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $user['NIK']; ?>/<?= $user['NIP']; ?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $user['alamat']; ?></p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">(097) 234-5678</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Bio</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">(097) 234-5678</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Jenis Kelamin</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">(097) 234-5678</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Tanggal Lahir</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Jabatan</p>
                </div>

                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Bergabung sejak</p>
                </div>
                </div>
            </div>
        </div>
        
        </div>
        </div>
    </div>
    </section>
    <!--  Content tab profile start -->

    <!--  Content tab profile end -->

</div>
</div>
<!-- End of Main Content -->



    <!-- edituserModal -->
    <div class=" modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Ubah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/edit/' . $user['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?= $user['name']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-3">
                                <input class="form-control" type="date" value="<?= $user['tanggal_lahir']; ?>" id="tanggal_lahir" name="tanggal_lahir">
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-3">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="L" <?php if ($user ['jenis_kelamin'] == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-Laki</option>
                                                <option value="P" <?php if ($user ['jenis_kelamin'] == 'P') {
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
                                <input type="text" class="form-control" id="email" placeholder=" " name="email" value="<?= $user ['email']; ?>" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIK/NIP" class="col-sm-3 col-form-label">NIK/NIP</label>
                            <div class="col-sm-4">
                                <input type="NIK" class="form-control" id="NIK" name="NIK" placeholder="NIK" value="<?= $user ['NIK']; ?>">
                                <?= form_error('NIK', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="NIP" class="form-control" id="NIP" placeholder="NIP" name="NIP" value="<?= $user['NIP']; ?>">
                                <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"><?= $user['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kontak" class="col-sm-3 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="Nomor HP" name="kontak" value="<?= $user['kontak']; ?>">
                                <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" aria-describedby="uploadHelp1" id="jabatan" placeholder="" name="jabatan" value="<?= $user['jabatan']; ?>">
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-sm-3 col-form-label">Bio/tentang kamu</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="bio" placeholder="tentang kamu . . . " name="bio" rows="2"> <?= $user['bio']; ?></textarea>
                                <?= form_error('bio', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    
                        
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Unggah Foto Profil</label>
                                <div class="col-sm-2">
                                    <!-- <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="My Profile Photos"> -->
                                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail" alt="Profile Picture">
                                </div>
                                <div class="col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                    <label class="custom-file-label" for="image">Pilih File</label>
                                    <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 1 MB. </i></small>
                                </div>
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
                            <span class="text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    