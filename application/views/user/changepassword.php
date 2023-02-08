<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password">Password Saat ini</label>
                            <input required type="password" class="form-control" id="current_password" name="current_password" aria-describedby="pasnow">
                            <small id=" pasnow" class="form-text text-muted"> <i> *Password kamu saat ini. </i></small>
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1">Password Baru</label>
                            <input required type="password" class="form-control" id="new_password1" name="new_password1" aria-describedby="pashelp">
                            <small id=" pashelp" class="form-text text-muted"> <i> *Gunakan karakter unik dan minimal 4 huruf. </i></small>
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Ulangi Password</label>
                            <input required type="password" class="form-control" id="new_password2" name="new_password2" aria-describedby="ulangihelp">
                            <small id=" ulangihelp" class="form-text text-muted"> <i> *Ulangi dan harus sama dengan password baru kamu </i></small>
                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group row justify justify-content-end">
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-icon-split btn-user btn-block">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Konfirmasi</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->