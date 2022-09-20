<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
        <a href="<?= base_url('cpmi'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-angle-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a> -->

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
                    <p style="font-family:'helvetica';font-size:15;">Edit Data <b> <?= $lokasi->nama_pmi ?></b>  <?= $title; ?> <b> <?= date('Y'); ?></b></p>
                            <a href="<?= base_url('beranda'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-angle-left"></i>
                                </span>
                                <span class="text">Peta</span>
                            </a>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="<?= base_url('cpmi/edit_cpmi/' . $lokasi->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- <p> <small><b> DATA TANGGAL INPUTAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="tanggal_data" class="col-sm-3 col-form-label">Tanggal Data</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $lokasi->date_created ?>" id="tanggal_data" name="tanggal_data">
                                            <?= form_error('tanggal_data', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> -->
                                    <!-- <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama PT/Organisasi</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="perusahaan" placeholder="Edit Nama PT" name="perusahaan" value="<?= $lokasi->perusahaan ?>">
                                            <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> -->
                                    <!-- <hr> -->

                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <div id="mapltlg"></div>
                                        </div>
                                        <div class="col-sm-3"> 
                                            
                                        <?php if ($lokasi->image == null) { ?>
                                            <div  class="foto2"><img src="<?= base_url('assets/img/profile/default.png') ?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                        <?php } else { ?>
                                            <div  class="foto2"><img src="<?= base_url('assets/img/tka/').$lokasi->image ?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                         <?php } ?>
                                            <div  class="foto1"></div>
                                                                          
                                            <div class="custom-file" >
                                                <input type="file"  class="custom-file-input" onchange="readURL(this);" id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                            </div>

                                            <div class="form-group">
                                            <label for="latitude" style="padding-top:8px;" >Latitude</label>
                                                <input type="text" id="lat" class="form-control" name="lat" readonly  value="<?= $lokasi->latitude ?>" placeholder="Latitude. . .">                          
                                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                            <label for="longitude" >Longitude</label>
                                                <input type="text" id="long" class="form-control" name="long" readonly value="<?= $lokasi->longitude ?>" placeholder="Longitude. . .">
                                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small><b> DATA CPMI</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_pmi" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_pmi" placeholder="Masukkan Nama" name="nama_pmi" value="<?= $lokasi->nama_pmi ?>">
                                            <?= form_error('nama_pmi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat PMI</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"><?= $lokasi->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Wilayah/Kota</label>
                                        <div class="col-sm-3">
                                            <select name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $lokasi->wilayah) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id=" lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>


                                    <div class=" form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="L" <?php if ($lokasi->jenis_kelamin == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-Laki</option>
                                                <option value="P" <?php if ($lokasi->jenis_kelamin == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                            <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $lokasi->tempat_lahir ?>" name="tempat_lahir">
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $lokasi->tanggal_lahir ?>" id="tanggal_lahir" name="tanggal_lahir">
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                   
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Sektor Jabatan</label>
                                        <div class="col-sm-5">
                                            <select name="jabatan" id="pendidikan" class="form-control">
                                                <option value="FORMAL" <?php if ($lokasi->jabatan == 'FORMAL') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>FORMAL </option>
                                                <option value="INFORMAL" <?php if ($lokasi->jabatan == 'INFORMAL') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>INFORMAL </option>
                                            </select>
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Formal</label>
                                        <div class="col-sm-4">
                                            <select name="pendidikan" id="pendidikan" class="form-control">
                                                <option value="SD" <?php if ($lokasi->pendidikan_formal == 'SD') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>SD (Sekolah Dasar)</option>
                                                <option value="SMP" <?php if ($lokasi->pendidikan_formal == 'SMP') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>SMP (Sekolah Menengah Pertama)</option>
                                                <option value="SMA" <?php if ($lokasi->pendidikan_formal == 'SMA') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>SMA/SMU (Sekolah Menengah Atas)</option>
                                                <option value="S1/S2" <?php if ($lokasi->pendidikan_formal == 'S1/S2') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>S1/S2/Insiyur (Strata 1-2)</option>
                                                <option value="-" <?php if ($lokasi->pendidikan_formal == '-') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>-</option>
                                            </select>
                                            <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="gaji" placeholder="Masukkan Nominal Gaji" name="gaji" value="<?= $lokasi->gaji ?>">
                                            <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paspor" class="col-sm-3 col-form-label">Paspor</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="paspor" placeholder="Nomor Paspor" name="paspor" value="<?= $lokasi->paspor ?>">
                                            <?= form_error('paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara_penempatan" class="col-sm-3 col-form-label">Negara Penempatan</label>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="negara_penempatan" id="negara_penempatan" class="form-control">
                                                <option value="">~ Pilih Negara ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id_negara']; ?>" <?php if ($n['id_negara'] == $lokasi->negara_penempatan) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_pesawat" class="col-sm-3 col-form-label">Kode Pesawat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="kode_pesawat" placeholder="Kode Pesawat" name="kode_pesawat" value="<?= $lokasi->kode_pesawat ?>">
                                            <?= form_error('kode_pesawat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <p> <small> <b>DATA PENGGUNA JASA </b></small></p>
                                    <div class="form-group row">
                                        <label for="pengguna_jasa" class="col-sm-3 col-form-label">Nama Pengguna Jasa</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="pengguna_jasa" placeholder="Masukkan Nama Pengguna Jasa" name="pengguna_jasa" value="<?= $lokasi->pengguna_jasa ?>">
                                            <?= form_error('pengguna_jasa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat_pengguna_jasa" class="col-sm-3 col-form-label">Alamat Pengguna Jasa</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat_pengguna_jasa" placeholder="Alamat Lengkap. . . " name="alamat_pengguna_jasa" rows="2"><?= $lokasi->alamat_pengguna_jasa ?></textarea>
                                            <?= form_error('alamat_pengguna_jasa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <a href="<?= base_url('cpmi'); ?>" class="btn btn-light btn-icon-split">
                                            <span class="icon text-gray-600">
                                                <i class="fas fa-window-close"></i>
                                            </span>
                                            <span class="text">Batal</span>
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan Data</span>
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