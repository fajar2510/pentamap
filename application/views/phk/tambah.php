<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('phk'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <form action="<?= base_url('phk/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body"> 

                                    <p> <small><b> DATA TENAGA KERJA</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_tk" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nama_tk" placeholder="Masukkan Nama Lengkap" name="nama_tk" ">
                                            <?= form_error('nama_tk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="wilayah" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-4">
                                            <select name="wilayah" id="wilayah" class="form-control">
                                                <option value="">~ Pilih Kabupaten/kota ~</option>
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>"> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('wilayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>                            
                                    </div>

                                    <div class="form-group row">
                                        <label for="koordinat" class="col-sm-3 col-form-label">Koordinat</label>
                                        <div class="col-sm-3"> 
                                            <input type="text" id="lat" class="form-control" name="lat" readonly  value="" placeholder="Latitude. . .">
                                            <!-- <div id="mapltlg"></div> -->
                                             <?= form_error('koordinat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="long" class="form-control" name="long" readonly value="" placeholder="Longitude. . .">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tampilanMap" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <div id="mapltlg"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_identitas" class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="no_identitas" placeholder="" name="no_identitas">
                                            <?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="kpj" class="col-sm-3 col-form-label">No.KPJ (BPJS)</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"  id="kpj" placeholder="" name="kpj">
                                            <?= form_error('kpj', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="alamat lengkap . . ." name="alamat" rows="2"></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="kontak" class="col-sm-3 col-form-label">Nomor Handphone</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="" name="kontak">
                                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_kerja" class="col-sm-3 col-form-label">Masih Bekerja?</label>
                                        <div class="col-sm-3">
                                            <select name="status_kerja" id="status_kerja" class="form-control">
                                                <option value="aktif">Aktif (masih bekerja)</option>
                                                <option value="phk">Nonaktif (ter-PHK)</option>
                                            </select>
                                            <?= form_error('status_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="disabilitas" class="col-sm-3 col-form-label">Berkebutuhan Khusus ?</label>
                                        <div class="col-sm-3">
                                            <select name="disabilitas" id="disabilitas" class="form-control">
                                                <option value="T">Tidak</option>
                                                <option value="Y">Ya</option>
                                            </select>
                                            <?= form_error('disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_segmen" class="col-sm-3 col-form-label">Kode Segmen</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kode_segmen" placeholder="" name="kode_segmen">
                                            <?= form_error('kode_segmen', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label">Unggah Foto</label>
                                        <div class="col-sm-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                                <label class="custom-file-label" for="image">Pilih File</label>
                                                <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 1 MB. </i></small>
                                            </div>
                                        </div>
                                    </div>

                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-6">
                                            <select name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    

                                  
                                    
                                    <!-- <div class="form-group row">
                                        <label for="disabilitas" class="col-sm-3 col-form-label">Ragam Disabilitas</label>
                                        <div class="col-sm-3">
                                            <select name="disabilitas" id="disabilitas" class="form-control">
                                                <option value="-">-Tidak-</option>
                                                <option value="Fisik">Fisik</option>
                                                <option value="Sensorik">Sensorik</option>
                                                <option value="Intelektual">Intelektual</option>
                                                <option value="Mental">Mental</option>
                                                <option value="Sensorik">Ganda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rincian" class="col-sm-3 col-form-label">Jenis Disabilitas</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="rincian" placeholder="Rincian . . ." name="rincian">
                                            <?= form_error('rincian', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> -->
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