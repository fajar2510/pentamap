<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('pmi/index/'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                    <p style="font-family:'helvetica';font-size:15;">Edit Data <b> <?= $lokasi->nama ?></b>  <?= $title; ?> <b> <?= date('Y'); ?></b></p>
                            <a href="javascript:history.go(-1)" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-angle-left"></i>
                                </span>
                                <span class="text"></span>
                            </a>
                    </div>
                    <div class="card-body">
                        <div  style="color:#5b5b5b;">

                            <form action="<?= base_url('pmi/edit_pmi/' . $lokasi->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- <p> <small><b> DATA TANGGAL INPUTAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="tanggal_data" class="col-sm-3 col-form-label">Tanggal Data</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $lokasi->date_created ?>" id="tanggal_data" name="tanggal_data">
                                            <?= form_error('tanggal_data', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <div id="mapltlg"></div>
                                        </div>
                                        <div class="col-sm-3"> 

                                        <?php if ($lokasi->image == null) { ?>
                                            <div  class="foto2"><img src="<?= base_url('assets/img/profile/default.png') ?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                        <?php } else { ?>
                                            <div  class="foto2"><img src="<?= base_url('assets/img/pmi/').$lokasi->image ?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
                                         <?php } ?>
                                            <div  class="foto1"></div>
                                                                          
                                            <div class="custom-file" >
                                                <input type="file"  class="custom-file-input" onchange="readURL(this);" id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                            </div>

                                            <div class="form-group">
                                            <label for="latitude" style="padding-top:8px;" >Latitude</label>
                                                <input style="font-weight: bold;" type="text" id="lat" class="form-control" name="lat" readonly  value="<?= $lokasi->latitude ?>" placeholder="Latitude. . .">                          
                                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                            <label for="longitude" >Longitude</label>
                                                <input style="font-weight: bold;" type="text" id="long" class="form-control" name="long" readonly value="<?= $lokasi->longitude ?>" placeholder="Longitude. . .">
                                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <p> <small><b> DATA PMI-B</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input required type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $lokasi->nama ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten/kota</label>
                                        <div class="col-sm-3">
                                            <select required name="kabupaten" id="kabupaten" class="form-control" aria-describedby="kabupatenHelp">

                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $lokasi->kabupaten) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>

                                            </select>
                                            <small id="kabupatenHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea required class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"><?= $lokasi->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir / <sup>*umur</sup> </label>
                                        <div class="col-3">
                                            <input required class="form-control" type="date" value="<?= $lokasi->tgl_lahir ?>" id="tgl_lahir" name="tgl_lahir">
                                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <select required name="gender" id="gender" class="form-control">
                                                <option value="L" <?php if ($lokasi->gender == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-Laki</option>
                                                <option value="P" <?php if ($lokasi->gender == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Negara Bekerja</label>
                                        <div class="col-sm-4">
                                             <select required class="custom-select" name="negara" id="negara" class="form-control">
                                                <!-- <option value="">~ Pilih Negara ~</option> -->
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id_negara']; ?>" <?php if ($n['id_negara'] == $lokasi->negara_bekerja) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                                        <div class="col-sm-5">
                                        <select required class="custom-select" name="jenis" id="jenis" onchange="handleChangeJenis(this)">
                                            <!-- <option value="">Pilih jenis pekerjaan</option> -->
                                            <option value="Asisten Rumah Tangga" <?php if($lokasi->jenis_pekerjaan=="Asisten Rumah Tangga"){echo "selected";} ?>>Asisten Rumah Tangga</option>
                                            <option value="Buruh Pabrik" <?php if($lokasi->jenis_pekerjaan=="Buruh Pabrik"){echo "selected";} ?>>Buruh Pabrik</option>
                                            <option value="Tukang Bangunan" <?php if($lokasi->jenis_pekerjaan=="Tukang Bangunan"){echo "selected";} ?>>Tukang Bangunan</option>
                                            <option value="Restoran" <?php if($lokasi->jenis_pekerjaan=="Restoran"){echo "selected";} ?>>Restoran</option>
                                            <option value="Tenaga Kesehatan" <?php if($lokasi->jenis_pekerjaan=="Tenaga Kesehatan"){echo "selected";} ?>>Tenaga Kesehatan</option>
                                            <option value="jenisLain" <?php if(!in_array($lokasi->jenis_pekerjaan, array("Asisten Rumah Tangga", "Buruh Pabrik", "Tukang Bangunan", "Restoran", "Tenaga Kesehatan"))){ echo "selected";} ?>>*Lainnya</option>
                                        </select>

                                        <?php if (!in_array($lokasi->jenis_pekerjaan, array("Asisten Rumah Tangga", "Buruh Pabrik", "Tukang Bangunan", "Restoran", "Tenaga Kesehatan"))) : ?>
                                            <div id="jenisBlok" style="padding-top:10px;">
                                                <input  type="text"  name="jenis" class="form-control" id="jenisInput" placeholder="Silahkan isi. . ."  pattern="[a-zA-Z ]+" title="Hanya gunakan huruf" value="<?= $lokasi->jenis_pekerjaan; ?>">
                                            </div>
                                        <?php else: ?>
                                            <div id="jenisBlok" style="display: none; padding-top:10px;">
                                                <input  type="text"  name="jenis" class="form-control" id="jenisInput" placeholder="Silahkan isi. . ."  pattern="[a-zA-Z ]+" title="Hanya gunakan huruf" value="<?= $lokasi->jenis_pekerjaan; ?>">
                                            </div>
                                        <?php endif; ?>

                                        <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="berangkat" class="col-sm-3 col-form-label">Berangkat Melalui</label>
                                        <div class="col-sm-5">
                                        <select required class="custom-select" name="berangkat" id="berangkat" onchange="handleChangeBerangkat(this)">
                              
                                                <option value="Batam"<?php if($lokasi->berangkat_melalui=="Batam"){echo "selected";} ?>>Batam</option>
                                                <option value="Serawak"<?php if($lokasi->berangkat_melalui=="Serawak"){echo "selected";} ?>>Serawak</option>
                                                <option value="Pangkal Pinang"<?php if($lokasi->berangkat_melalui=="Pangkal Pinang"){echo "selected";} ?>>Pangkal Pinang</option>
                                                <option value="Tanjung Pinang"<?php if($lokasi->berangkat_melalui=="Tanjung Pinang"){echo "selected";} ?>>Tanjung Pinang</option>
                                                <option value="Tekong"<?php if($lokasi->berangkat_melalui=="Tekong"){echo "selected";} ?>>Tekong</option>
                                                <option value="Lainnya"<?php if(in_array($lokasi->berangkat_melalui, ["Batam", "Serawak", "Pangkal Pinang", "Tanjung Pinang", "Tekong"]) === false)
                                                {echo "selected";} ?>>*Lainnya</option>
                                   
                                        </select>

                                        <?php if (in_array($lokasi->berangkat_melalui, 
                                        ["Batam", "Serawak", "Pangkal Pinang", "Tanjung Pinang", "Tekong"]) === false   ) : ?>
                                            <div id="berangkatBlok" style="padding-top:10px;">
                                                <input type="text" name="berangkat" id="berangkatInput" class="form-control" placeholder="Silahkan isi. . ." pattern="[a-zA-Z ]+" title="Hanya gunakan huruf" value="<?= $lokasi->berangkat_melalui; ?>">
                                            </div>
                                            
                                        <?php else : ?>
                                            <div id="berangkatBlok" style="display: none; padding-top:10px;">
                                                <input type="text" name="berangkat" id="berangkatInput" class="form-control" placeholder="Silahkan isi. . ." pattern="[a-zA-Z ]+" title="Hanya gunakan huruf" value="<?= $lokasi->berangkat_melalui; ?>">
                                            </div>
                                        <?php endif; ?>

                                            <!-- <input required type="text" class="form-control" id="berangkat" placeholder="" name="berangkat" value="<?= $lokasi->berangkat_melalui ?>"> -->
                                            <?= form_error('berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                                        <div class="col-sm-5">
                                            <input required type="text" class="form-control" id="pengirim" placeholder="PT." name="pengirim" value="<?= $lokasi->pengirim ?>"  pattern="[a-zA-Z ]+" title="Hanya gunakan huruf">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lama" class="col-sm-3 col-form-label">Lama Bekerja</label>
                                        <div class="col-sm-5">

                                        <select required class="custom-select" name="lama" id="lama" class="form-control" onchange="handleChangeLama(this)">
                                        <?php 
                                        for ($i=1; $i<=11; $i++) {
                                            if ($i <= 10) {
                                                if ($i == $lokasi->lama_bekerja) {
                                                    echo "<option value='$i' selected> $i tahun </option>";
                                                } else {
                                                    echo "<option value='$i'> $i tahun </option>";
                                                }
                                            } else {
                                                if ($i == $lokasi->lama_bekerja) {
                                                    echo "<option value='$i' selected>*Lebih dari 10 tahun </option>";
                                                } else {
                                                    echo "<option value='$i'>*Lebih dari 10 tahun </option>";
                                                }
                                            }
                                        }
                                        ?>
                                        </select>

                                        <?php if ($lokasi->lama_bekerja > 10) : ?>
                                            <div id="lamaBlok" style="padding-top:10px; width:100px;">
                                                <input  type="number" min="11"  name="lama" id="lamaInput" class="form-control" placeholder="Silahkan isi. . ." pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka" value="<?php echo $lokasi->lama_bekerja; ?>">
                                                <small id="helpInfo" class="form-text text-muted"> <i> *hanya angka! </i></small>
                                            </div>
                                        <?php else: ?>
                                            <div id="lamaBlok" style="display: none; padding-top:10px; width:160px;">
                                                <input  type="number" min="11"  name="lama" id="lamaInput" class="form-control" placeholder="Silahkan isi. . ." pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka" value="<?php echo $lokasi->lama_bekerja; ?>">
                                                <small id="helpInfo" class="form-text text-muted"> <i> *hanya angka! </i></small>
                                            </div>
                                        <?php endif; ?>

                                            <!-- <input required type="text" class="form-control" id="lama" placeholder="x tahun x bulan" name="lama" value="<?= $lokasi->lama_bekerja ?>"> -->
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
                                        <span class="text">Perbarui Data</span>
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

<!-- untuk dinamis selection -->
<script type="text/javascript">

function handleChangeJenis(selectElement) {
const jenisBlok = document.getElementById("jenisBlok");
const jenisInput = document.getElementById("jenisInput");
const jenisSelect = document.getElementById("jenis");

    if (selectElement.value == "jenisLain") {
        jenisBlok.style.display = "block";
        jenisInput.required = true;
        jenisInput.value = "";
    } else {
        jenisBlok.style.display = "none";
        jenisInput.required = false;
        jenisInput.value = jenisSelect.value;
    }
}

function handleChangeLama(selectElement) {
const lamaBlok = document.getElementById("lamaBlok");
const lamaInput = document.getElementById("lamaInput");
const lamaSelect = document.getElementById("lama");
    if (selectElement.value > 10) {
        lamaBlok.style.display = "block";
        lamaInput.required = true;
        lamaInput.value = "";
    } else {
        lamaBlok.style.display = "none";
        lamaInput.required = false;
        // lamaInput.setAttribute('name', '');
        lamaInput.value = lamaSelect.value;
    }
}

function handleChangeBerangkat(selectElement) {
const berangkatBlok = document.getElementById("berangkatBlok");
const berangkatInput = document.getElementById("berangkatInput");
const berangkatSelect = document.getElementById("berangkat");
    if (selectElement.value == "Lainnya") {
        berangkatBlok.style.display = "block";
        berangkatInput.required = true;
        berangkatInput.value = "";
    } else {
        berangkatBlok.style.display = "none";
        berangkatInput.required = false;
        // berangkatInput.setAttribute('name', '');
        berangkatInput.value = berangkatSelect.value;
    }
}


</script>
<!-- End of Main Content -->