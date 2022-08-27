<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Pengguna</h1>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    

    <?= $this->session->flashdata('message'); ?>

   
    <section style="background-color: #FFFFFF; ">
    <!-- <section  class="bg-gradient-light" style="background:url('assets/img/auth/4565.jpg');  background-size:cover"> -->
    <div class="container py-4 px-0" >

        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4" >
            <div class="card-body text-center">
                
                <div class="edit-foto ">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>"  alt="Profile Picture" 
                        class="rounded-circle img-fluid " style="width: 200px; height: 200px; object-fit: cover;"> 
                        <div class="diatas-gambar font-weight: bold;"> 
                            <!-- <button type="button" data-toggle="modal" data-target="#modalEditPicture" class="btn btn btn-light btn-block"">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button> -->
                        </div>
                </div>
                <p class="my-2 mb-0" style = " font-size:20px;"> <b><?= $user['name']; ?></b> </p>
                <p class="text-muted mb-0 "> <small> <i><?php if ($user['jenis_kelamin'] == 'L') {
                                                            echo 'Laki-laki';
                                                        } else if ($user['jenis_kelamin'] == 'P'){ 
                                                            echo 'Perempuan';
                                                        } else 
                                                            echo '<small?><i> belum disebutkan </i> </small>'
                                                         ?> &nbsp; </i></small></p>
                <p class="text-muted mb-4"><?= $user['jabatan']; ?></p>
                <div class="card mb-4">
                
                <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-primary">Edit Profile</button>
               
                <button type="button" data-toggle="modal" data-target="#modalPassword" class="btn btn-light ms-1">Edit Password</button>
                </div>
            </div>
            </div>
        
        </div>
        <div class="col-lg-8">
            <div class="card mb-4 " >
                <!-- <div class="card-body rounded float-left" style="background:url('assets/img/auth/disnakerlogo.png');  background-size:cover;  "> -->
                <div class="card-body "  style="color:#635f5f">    
                <div class="row ">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-user-graduate"></i>&nbsp; Nama Lengkap</p>
                    </div>
                    <div class="col-sm-9 " >
                        <p class="font-weight-normal">: &nbsp;<?= $user['name']; ?></p>
                    </div>
                    
                    </div>
                    <hr>
                    <div class="row p-0" >
                    <div class="col-sm-3 ">
                        <p class="mb-0"><i class="fa-solid fa-envelope"></i> &nbsp;Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="font-weight-normal p-0">: &nbsp; <i> <?= $user['email']; ?> </i>
                        <span class="badge badge-success" style="font-weight:thin;"> <i class="bi bi-patch-check-fill"></i> terverifikasi</span> </p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-address-book">&nbsp;</i>No. Handphone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="font-weight-normal">: &nbsp;<?php if ($user['kontak'] == null) {
                                                            echo '<span class="text-muted"><i>( belum diatur )</i></span>';
                                                        } else {
                                                            echo $user['kontak'];
                                                        } ?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-id-card"></i>&nbsp;NIK/NIP</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="font-weight-normal">: &nbsp;<?php if ($user['NIK'] == null) {
                                                            echo '<span class="text-muted"><i>( belum diatur )</i></span>';
                                                        } else {
                                                            echo $user['NIK'];
                                                        } ?> /<span> <span><?php if ($user['NIP'] == null) {
                                                            echo '<span class="text-muted"><i>( belum diatur )</i></span>';
                                                        } else {
                                                            echo $user['NIP'];
                                                        } ?></span></span></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-map-location-dot"></i>&nbsp;Alamat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="font-weight-normal">: &nbsp;<?php if ($user['alamat'] == null) {
                                                            echo '<span class="text-muted"><i>( belum diatur )</i></span>';
                                                        } else {
                                                            echo $user['alamat'];
                                                        } ?></p>
                    </div>
                    
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-quote-left"></i>&nbsp;Bio</p>
                    </div>
                    
                    
                    <div class="col-sm-9">
                        <p class="font-weight-normal">: &nbsp;<?php if ($user['bio'] == null) {
                                                            echo '<span class="text-muted"><i>( belum diatur )</i></span>';
                                                        } else {
                                                            echo $user['bio'];
                                                        } ?></p>
                    </div>

                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-12">
                        <p class="mb-0">&nbsp; <small> <i> Bergabung sejak&nbsp;<?= date('d F Y', $user['date_created']);  ?></i> </small></p>
                    </div>

                    <!-- <div class="col-sm-4">
                        <p class="text-muted mb-0"></p>
                    </div> -->
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
                    <h5 class="modal-title" id="modalEditLabel">Edit Profile</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                
                <form action="<?= base_url('user/edit/' . $user['id']); ?>" method="post" enctype="multipart/form-data">
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
                                <input type="email" class="form-control" id="email" placeholder=" " name="email" value="<?= $user ['email']; ?>" readonly>
                                <!-- <input type="hidden" name="id_user" value="<?= $user ['id']; ?>"> -->
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
                            <label for="bio" class="col-sm-3 col-form-label">Bio tentang kamu</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="bio" placeholder="tentang kamu . . . " name="bio" rows="2"> <?= $user['bio']; ?></textarea>
                                <?= form_error('bio', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    
                        
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Unggah Foto Profil</label>
                                <div class="col-sm-3">
                                <div id="gambar_pertama"><img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail" alt="Profile Picture" style="width: 200px; height: 200px; object-fit: cover;"></div>
                                    
                                <div id="gambar_pertama"><img id="fotoBaru" type="hidden" src="http://placehold.it/180" class="img-thumbnail" alt="Foto Profil Baru" /></div>                             
                                </div>
                                <div class="col-sm-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" onchange="readURL(this);"  id="image" name="image" aria-describedby="uploadHelp">
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




     <!-- edituserModal -->
     <div class=" modal fade" id="modalEditPicture" tabindex="-1" role="dialog" aria-labelledby="modalEditPictureLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPictureLabel">Edit Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="<?= base_url('user/edit/' . $user['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div   div class="col-sm-12 center">
                                   
                            <!-- <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="My Profile Photos"> -->
                            <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-fluid " alt="Profile Picture">
                            <img id="blah" src="http://placehold.it/180" alt="your image" class="img-fluid "/>                             
                        </div>
                        <hr>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" onchange="readURL(this);"  id="image" name="image" aria-describedby="uploadHelp">
                            <label class="custom-file-label" for="image">Pilih File</label>
                            <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 1 MB. </i></small>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                            <span class="icon text-gray-600">
                                <i class="fas fa-window-close"></i>
                            </span>
                            <span class="text">Batal</span>
                        </button> -->
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                             <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="text">Sunting Foto</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <!-- edit password modal -->
    <div class=" modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Password</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>

                
                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="current_password" class="col-sm-5 col-form-label">Password Sekarang*</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="current_password" placeholder="" name="current_password" >
                                <small id=" pasnow" class="form-text text-muted"> <i> *Password kamu saat ini. </i></small>
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password1" class="col-sm-5 col-form-label">Password Baru*</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="new_password1" placeholder="" name="new_password1" >
                                <small id=" pashelp" class="form-text text-muted"> <i> *Gunakan karakter unik dan minimal 4 huruf. </i></small>
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password2" class="col-sm-5 col-form-label">Ulangi Password*</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="new_password2" placeholder="" name="new_password2" >
                                <small id=" ulangihelp" class="form-text text-muted"> <i> *Ulangi untuk konfirmasi password </i></small>
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <span class="text">Konfirmasi</span>
                            </button>``
                        </div>
                    </div>
                    </form>
                    
               
                    
            </div>
        </div>
    </div>
    


    