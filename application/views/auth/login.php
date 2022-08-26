<!-- ---- Include the above in your HEAD tag -------- -->

<div class="container" >


    <!-- Outer Row -->
    <br>
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-4">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img/auth/disnakertrans.png') ?> " width="350" height="45">
                                    <hr style="margin-top: 10px; margin-bottom: 10px ;">
                                    <p><small> Sistem Informasi Geografis Tenaga Kerja Jatim</small> </p>
                                    <h1 class="h4 text-gray-900 mb-4">Login <span></span><b>SiG-PENTA</b>
                                    
                                        
                                    </h1>

                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    
                                    <div class="form-group">
                                        <!-- <label for="email" >E-mail</label> -->
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="E-mail" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                     <!-- <label for="email" >Password</label> -->
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- class="form-control form-control-user" tampilan menarik kolom -->
                                    <!-- <hr> -->
                                    <button  type="submit" onclick="snackbarlogin()" class="btn btn-primary btn-user btn-block center-block py-3 px-3 ">
                                        <!-- <span class=" icon text-white-50">
                                            
                                            <i class="fas fa-sign-in-alt"></i>
                                        </span> -->
                                        <span class="text" style="font-size:15; font-weight:bold;">MASUK</span>
                                    </button>
                                    <div id="snackbar"> Sedang mencoba LOGIN . . . </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url() ?>auth/registration">Buat Akun Baru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>

</div>