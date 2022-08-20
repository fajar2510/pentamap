<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-start mb-4">

        <a href="<?= base_url('user/'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-angle-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        &nbsp; &nbsp; &nbsp; &nbsp;
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print </a> -->
    </div>

    <div class="row">
        <div class="col-lg-8">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!--  Content tab profile start -->
                    <?= form_open_multipart('user/edit'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label" aria-describedby="emailHelp">Email</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            <small id="emailHelp" class="form-text text-muted"> <i>email tidak bisa diubah, hubungi administrator atau pengembang.</i> </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bio" name="bio" value="<?= $user['bio']; ?>">
                            <?= form_error('bio', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto Profil</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" alt="Profile Picture">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file"> 
                                        <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                        <label class="custom-file-label" for="image">Pilih File </label>
                                        <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 2 MB. </i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify justify-content-end">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary btn-icon-split btn-user">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>

                        </div>
                    </div>
                    </form>
                    <!--  Content tab profile end -->
                </div>
            </div>



        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>


