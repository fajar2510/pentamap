<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
        <a href="<?= base_url('pmi/'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                        <div  style="color:#5b5b5b;">
                            <form action="<?= base_url('pmi/tambah'); ?>" method="post" enctype="multipart/form-data">
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
                                            <!-- <img src="<?= base_url('assets/img/pmi/') . $lokasi->image ?>" class="img-fluid " 
                                            style="width: 180px; height: 190px; object-fit: cover; padding-bottom:20px;" alt="Profile Picture"> -->
                                            <!-- <div  id="foto1"><img src="" class="img-fluid" hidden="hidden" alt="Profile Picture" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div> -->
                                            <div  class="foto1"></div>                                                       
                                            <div  class="foto2"><img src="<?= base_url("assets/img/profile/default.png")?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                           
                                            <div class="custom-file" >
                                                <input type="file"  class="custom-file-input"  onchange="readURL(this);"  id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                            </div>

                                            <div class="form-group">
                                            <?php 
                                            $defaultLat = -7.5409737;
                                            $defaultLong = 112.5288216;
                                            ?>
                                            <label for="latitude" style="padding-top:8px;" >Latitude</label>
                                                <input  style="font-weight: bold;" type="text" id="lat" class="form-control" name="lat" readonly  value="<?php echo $defaultLat ?>" placeholder="Latitude. . .">                          
                                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                            <label for="longitude" >Longitude</label>
                                                <input  style="font-weight: bold;" type="text" id="long" class="form-control" name="long" readonly value="<?php echo $defaultLong ?>" placeholder="Longitude. . .">
                                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small><b> DATA PMI-B</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-6">
                                            <input required type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" >
                                            <!-- pattern="[a-zA-Z]+" title="Input hanya boleh menggunakan huruf" -->
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-4">
                                            <select required name="kabupaten" id="kabupaten" class="form-control">
                                                <option value="">~ Pilih Kabupaten/kota ~</option>
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>"> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>                            
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea required class="form-control" class="custom-select" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir / <sup>*umur</sup></label>
                                        <div class="col-3">
                                            <input required class="form-control" type="date" value="1990-09-05" id="tgl_lahir" name="tgl_lahir">
                                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select required class="custom-select" name="gender" id="gender" class="form-control">
                                                <option value=""> ~ Pilih Jenis Kelamin ~ </option>
                                                <option value="L"> Laki-Laki </option>
                                                <option value="P"> Perempuan </option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Negara Bekerja</label>
                                        <div class="col-sm-3">
                                            <select required class="custom-select" name="negara" id="negara" class="form-control">
                                                <option value="">~ Pilih Negara ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id_negara']; ?>"> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                                        <div class="col-sm-5">
                                            <select required class="custom-select" name="jenis" id="jenis" onchange="handleChangeJenis(this)">
                                                <option value="">~ Pilih Jenis Pekerjaan ~</option>
                                                <option value="Asisten Rumah Tangga">Asisten Rumah Tangga</option>
                                                <option value="Buruh Pabrik">Buruh Pabrik</option>
                                                <option value="Tukang Bangunan">Tukang Bangunan</option>
                                                <option value="Restoran">Restoran</option>
                                                <option value="Tenaga Kesehatan">Tenaga Kesehatan</option>
                                                <option value="jenisLain">*Lainnya</option>
                                            </select>
                                            <div id="jenisBlok" style="display: none; padding-top:10px;">
                                                <input type="text" name="jenis" id="jenisInput" class="form-control" 
                                                placeholder="Silahkan isi. . ." pattern="[a-zA-Z]+" title="Hanya gunakan huruf">
                                            </div>
                                            <!-- <input required type="text" class="form-control" id="jenis" placeholder="" name="jenis" value="<?= set_value('jenis_pekerjaan'); ?>"> -->
                                            <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="berangkat" class="col-sm-3 col-form-label">Berangkat Melalui</label>
                                        <div class="col-sm-5">
                                            <select required class="custom-select" name="berangkat" id="berangkat" onchange="handleChangeBerangkat(this)">
                                                <option value="">~ Pilih Berangkat Melalui ~</option>
                                                <option value="Batam">Batam</option>
                                                <option value="Serawak">Serawak</option>
                                                <option value="Pangkal Pinang">Pangkal Pinang</option>
                                                <option value="Tanjung Pinang">Tanjung Pinang</option>
                                                <option value="Tekong">Tekong</option>
                                                <option value="Lainnya">*Lainnya</option>
                                            </select>
                                            <div id="berangkatBlok" style="display: none; padding-top:10px;">
                                                <input type="text" name="berangkat" id="berangkatInput" class="form-control" placeholder="Silahkan isi. . ." pattern="[a-zA-Z]+" title="Hanya gunakan huruf">
                                               
                                            </div>
                                            <!-- <input required type="text" class="form-control" id="berangkat" placeholder="" name="berangkat"> -->
                                            <?= form_error('berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                                        <div class="col-sm-5">
                                            <input required type="text" class="form-control" id="pengirim" placeholder="" name="pengirim" pattern="[a-zA-Z]+" title="Hanya gunakan huruf">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lama" class="col-sm-3 col-form-label">Lama Bekerja</label>
                                        <div class="col-sm-5">

                                            <select required class="custom-select" name="lama" id="lama" class="form-control" onchange="handleChangeLama(this)">
                                                <option value=""> ~ Pilih Lama Bekerja ~ </option>
                                                <?php 
                                                for ($i=1; $i<=11; $i++) {
                                                    if ($i <= 10) {
                                                        echo "<option value='$i'> $i tahun </option>";
                                                    } else {
                                                        echo "<option value='$i'> lebih dari 10 tahun </option>";
                                                    }
                                                }
                                                ?>
                                                <!-- <option value="Lainnya"> Lebih dari 10 tahun </option> -->
                                            </select>
                                            <div id="lamaBlok" style="display: none; padding-top:10px; ">
                                                <!-- <label for="berangkat_lainnya">Lainnya:</label> -->
                                                <input type="text" style="width:180px;" name="lamaInput" id="lamaInput" class="form-control" placeholder="Silahkan isi . . ." pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka" >
                                                <small id="helpInfo" class="form-text text-muted"> <i> *hanya angka! </i></small>
                                            </div>
                                            <!-- <input required type="text" class="form-control" id="lama" placeholder="" name="lama"> -->
                                            <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('pmi'); ?>" class="btn btn-light btn-icon-split">
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