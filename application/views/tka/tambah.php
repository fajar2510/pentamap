<!-- Begin Page Content -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.css') ?>" /> -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h5>
        <a href="<?= base_url('tka/'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                            <form action="<?= base_url('tka/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- <p> <small><b> DATA TANGGAL INPUTAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="tanggal_data" class="col-sm-3 col-form-label">Tanggal Data</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= date('Y-m-d'); ?>" id="tanggal_data" name="tanggal_data">
                                            <?= form_error('tanggal_data', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <div id="mapltlg"></div>
                                        </div>
                                        <div class="col-sm-3"> 
                                            <!-- <img src="<?= base_url('assets/img/tka/') . $lokasi->image ?>" class="img-fluid " 
                                            style="width: 180px; height: 190px; object-fit: cover; padding-bottom:20px;" alt="Profile Picture"> -->
                                            <div  class="foto2"><img src="<?= base_url("assets/img/profile/default.png")?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                            <div  class="foto1"></div> 
                                           
                                            <div class="custom-file" >
                                                <input type="file"  class="custom-file-input"  onchange="readURL(this);"  id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                            </div>

                                            <div class="form-group">
                                            <label for="latitude" style="padding-top:8px;" >Latitude</label>
                                                <input type="text" id="lat" class="form-control" name="lat" readonly  value="" placeholder="Latitude. . .">                          
                                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                            <label for="longitude" >Longitude</label>
                                                <input type="text" id="long" class="form-control" name="long" readonly value="" placeholder="Longitude. . .">
                                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan TKA</label>
                                        <div class="col-sm-6">
                                            <select required name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small><b> DATA TKA</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label ">Nama </small></label>
                                        <div class="col-sm-7">
                                            <input required type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Kerja</label>
                                        <div class="col-sm-3">
                                            <select required name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <option value="">~ Pilih Lokasi Kerja ~</option>
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>"> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>


                                            </select>

                                            <small id=" lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select required name="gender" id="gender" class="form-control">
                                                <option value=""> ~ Pilih Jenis Kelamin ~ </option>
                                                <option value="L"> Laki-Laki </option>
                                                <option value="P"> Perempuan </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label ">Kewarganegaraan </small></label>
                                        <div class="col-sm-5">
                                            <select required name="negara" id="negara" class="form-control">
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id_negara']; ?>"> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-5">
                                            <input required type="text" class="form-control" id="jabatan" placeholder="" name="jabatan" value="">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_rptka" class="col-sm-3 col-form-label">NO. RPTKA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input required type="text" class="form-control" id="no_rptka" placeholder="" name="no_rptka"  pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka" >
                                            <?= form_error('no_rptka', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input required class="form-control" type="date" value="<?= date('Y-m-d'); ?>" id="masa_rptka" name="masa_rptka" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_imta" class="col-sm-3 col-form-label">NO. IMTA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input required type="text" class="form-control" id="no_imta" placeholder="" name="no_imta" pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka">
                                            <?= form_error('no_imta', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input required class="form-control" type="date" value="<?= date('Y-m-d'); ?>" id="masa_imta" name="masa_imta">
                                        </div>
                                    </div>
                                   
                                    

                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('tka'); ?>" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-window-close"></i>
                                        </span>
                                        <span class="text">Batal</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                                    </button>

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