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

    <div class="card shadow mb-4">
        <div class="card-header py-5 px-5">
            <div class="form group row">
                <div class="col-md-2">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="My Profile Photos">
                    <hr>
                    <a href="<?= base_url('user/edit'); ?>" class="btn btn-secondary btn-icon-split btn-block">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-edit"></i>
                        </span>
                        <span class="text">Ubah</span>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="form group row">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="text" style="font-family:'Roboto';font-size:25;"> &nbsp; <?= $user['name']; ?></h3>
                                <hr>
                                <p class="card-text"> <i class="fas fa-envelope"></i> &nbsp; <?= $user['email']; ?></p>
                                <p class="card-text"> <i class="fas fa-suitcase-rolling"></i> &nbsp; <?= $user['role']; ?></p>
                                <p class="card-text"> <i class="far fa-smile"></i> &nbsp; <?= $user['bio']; ?></p>
                                <p class="card-text"> <i class="fas fa-clock"></i> &nbsp; <small class="text-muted">Bergabung sejak
                                        <?= date('d F Y', $user['date_created']);  ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-4 px-5 ">
                            <img src="<?= base_url('assets/img/favicon/logopng.png') ?>" alt="Logo Disnaker Jatim" width="200" height="250">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Content tab profile start -->

    <!--  Content tab profile end -->

</div>
</div>
<!-- End of Main Content -->