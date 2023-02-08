<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('datamaster/upt'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-angle-left"></i>
            </span>
            <span class="text">Kembali</span>
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


            <div class="card shadow mb-0">
                <div class="card-header py-3 ">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">

                    </div>
                    <div class="card-body">
                        <div>
                            <form action="<?= base_url('datamaster/upt_add'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body"> 

                                <div class="form-group row">
                                        <div class="col-sm-7">
                                            <div id="mapupt"></div>
                                        </div>
                                        <div class="col-sm-5"> 
                                            
                                            <div class="form-group">
                                            <div  class="foto2"><img src="<?= base_url("assets/img/profile/default.png")?>" class="img-fluid" style="width: 320px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                            <div  class="foto1"></div> 
                                            <div class="custom-file" >
                                                <input type="file"  class="custom-file-input"  onchange="readURL(this);"  id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                            </div>
                                            <label for="nama_upt" style="padding-top:8px;">Nama UPT BLK</label>
                                       
                                                <input required type="text" class="form-control" id="nama_upt" placeholder="" name="nama_upt" >
                                                <?= form_error('nama_upt', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            
                                            <div class="form-group">
                                            <!-- <label for="kab" >Kabupaten/Kota</label> -->
                                                <select required name="kab" id="kab" class="form-control">
                                                    <option value="">~ Pilih Kabupaten/kota ~</option>
                                                    <?php foreach ($kabupaten as $kab) : ?>
                                                        <option value="<?= $kab['id_kabupaten']; ?>"> <?= $kab['nama_kabupaten']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                                <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_upt" >Alamat Lengkap </label>
                                                <textarea required type="text" class="form-control" id="alamat_upt" placeholder=". . ." name="alamat_upt" row="1" cols="1"></textarea>
                                                <?= form_error('alamat_upt', '<small class="text-danger pl-3">', '</small>'); ?>
                                          
                                            </div> 
                                            <div class="form-group">
                                                <label for="ket_upt" >Keterangan Cakupan </label>
                                                <textarea required type="text" class="form-control" id="ket_upt" placeholder=". . . cakupan upt" name="ket_upt" row="1" cols="1"></textarea>
                                                <?= form_error('ket_upt', '<small class="text-danger pl-3">', '</small>'); ?>
                                          
                                            </div>
                                            <div class="form-group">
                                            <!-- <label for="latitude"  >Latitude</label> -->
                                                <input type="text" id="lat" class="form-control" name="lat" readonly  value="" placeholder="Latitude. . .">                          
                                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                            <!-- <label for="longitude" >Longitude</label> -->
                                                <input type="text" id="long" class="form-control" name="long" readonly value="" placeholder="Longitude. . .">
                                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div   div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Tambahkan</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->