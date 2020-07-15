<div class="container">


    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">
            <hr>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img/auth/disnakertrans.png') ?> " width="350" height="60">
                                    <hr>
                                    <h1 class="h4 text-gray-900 mb-4"> <b>PENTA</b> |
                                        <span>DISNAKERTRANS</span> </h1>

                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="form-group" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan E-mail..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-icon-split  btn-block">
                                        <span class=" icon text-white-50">
                                            <i class="fas fa-sign-in-alt"></i>
                                        </span>
                                        <span class="text" style="font-family:'Roboto';font-size:15;"><b>M A S U K</b></span>
                                    </button>
                                    <!-- <button type="submit" class="btn btn-info btn-user btn-block">
                                        <h6><b style="font-family:'Roboto';font-size:20px;">L O G I N</b> </h6>
                                    </button> -->
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url() ?>auth/registration">Buat Akun Baru</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>