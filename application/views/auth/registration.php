<div class="container" >

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0" class="bg-gradient-light" style="background:url('assets/img/auth/asia3.jpg');  background-size:cover; opacity: 98%;  ">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <!-- <img src="<?= base_url('assets/img/auth/disnakertrans.png') ?> " width="350" height="45"> -->
                            <img src="<?php echo base_url() ?>assets/img/auth/authlogin.png" alt="logo" class="img-fluid " style="width: 90px; ">
                       
                            
                                    <p><small> Sistem Informasi Geografis Tenaga Kerja Jatim</small> </p>
                                    <hr style="margin-top: 10px; margin-bottom: 10px ;">
                            <h1 class="h4 text-gray-900 mb-4"> Registrasi Akun Baru!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-floating mb-3 "> 
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap. . ." value="<?= set_value('name'); ?>">
                                
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat E-mail" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size:15; font-weight:bold;">
                                BUAT AKUN
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url() ?>auth">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>