<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h3 style="font-family:'Roboto';font-size:15;">Edit Data <?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('tka'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                <div class="card-header py-0 "> 
                    
                    
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <p style="font-family:'helvetica';font-size:15;">Edit Data <b> <?= $lokasi->nama_tka ?></b>  <?= $title; ?> <b> <?= date('Y'); ?></b></p>
                            <a href="javascript:history.go(-1)" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-angle-left"></i>
                                </span>
                                <span class="text"></span>
                            </a>
                        </div>
                        <div  style="color:#5b5b5b;">
                            <form action="<?= base_url('tka/edit_tka/' . $lokasi->id); ?>" method="post" enctype="multipart/form-data">
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
                                            <div  class="foto2"><img src="<?= base_url('assets/img/tka/').$lokasi->image ?>" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover ; padding-bottom:20px;"></div>
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
                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan TKA</label>
                                        <div class="col-sm-6">
                                            <select required name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>" <?php if ($p['id'] == $lokasi->id_perusahaan) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <p> <small><b> DATA TKA</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_tka" class="col-sm-3 col-form-label ">Nama </small></label>
                                        <div class="col-sm-5">
                                            <input required type="text" class="form-control" id="nama" placeholder="Masukkan Nama " value="<?= $lokasi->nama_tka ?>" name="nama_tka">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Kabupaten/kota</label>
                                        <div class="col-sm-3">
                                            <select required name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">

                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $lokasi->lokasi_kerja) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>

                                            </select>
                                            <small id="lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select required name="gender" id="gender" class="form-control">
                                                <option value="L" <?php if ($lokasi->jenis_kel == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-laki</option>
                                                <option value="P" <?php if ($lokasi->jenis_kel == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label ">Kewarganegaraan </small></label>
                                        <div class="col-sm-5">
                                        <select required class="custom-select" name="negara" id="negara" class="form-control">
                                                <option value="">~ Pilih Kewarganegaraan ~</option>
                                                    <?php foreach ($negara as $n) : ?>
                                                        <option value="<?= $n['id_negara']; ?>" <?php if ($n['id_negara'] == $lokasi->kewarganegaraan) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?>> <?= $n['nama_negara']; ?> </option>
                                                    <?php endforeach; ?>
                                            </select>
                                            <!-- <input type="text" class="form-control" id="negara" placeholder="Masukkan Nama Negara" value="<?= $lokasi->kewarganegaraan ?>" name="negara"> -->
                                            <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-5">
                                        <select required class="custom-select" name="jabatan" id="jabatan" onchange="handleChangeJabatan(this)">

                                            <option value="Manager" <?php if($lokasi->jabatan=="Manager"){echo "selected";} ?>>Manager</option>
                                            <option value="Senior Manager" <?php if($lokasi->jabatan=="Senior Manager"){echo "selected";} ?>>Senior Manager</option>
                                            <option value="Supervisor" <?php if($lokasi->jabatan=="Supervisor"){echo "selected";} ?>>Supervisor</option>
                                            <option value="Koordinator" <?php if($lokasi->jabatan=="Koordinator"){echo "selected";} ?>>Koordinator</option>
                                            <option value="Teknisi" <?php if($lokasi->jabatan=="Teknisi"){echo "selected";} ?>>Teknisi</option>
                                            <option value="Operator" <?php if($lokasi->jabatan=="Operator"){echo "selected";} ?>>Operator</option>
                                            <option value="Mekanik" <?php if($lokasi->jabatan=="Mekanik"){echo "selected";} ?>>Mekanik</option>
                                            <option value="Pekerja Kontruksi" <?php if($lokasi->jabatan=="Pekerja Kontruksi"){echo "selected";} ?>>Pekerja Kontruksi</option>
                                            <option value="jabLain" <?php if(!in_array($lokasi->jabatan, array("Manager", "Senior Manager", "Supervisor", "Koordinator", "Teknisi","Mekanik","Operator","Pekerja Kontruksi"))){ echo "selected";} ?>>*Lainnya</option>
                                        </select>

                                        <?php if (!in_array($lokasi->jabatan, array("Manager", "Senior Manager", "Supervisor", "Koordinator", "Teknisi","Mekanik","Operator","Pekerja Kontruksi"))) : ?>
                                            <div id="jabatanBlok" style="padding-top:10px;">
                                                <input  type="text"  name="jabatan" class="form-control" id="jabatanInput" placeholder="Silahkan isi. . ."  pattern="[a-zA-Z ]+" title="Hanya gunakan huruf" value="<?= $lokasi->jabatan; ?>">
                                            </div>
                                        <?php else: ?>
                                            <div id="jabatanBlok" style="display: none; padding-top:10px;">
                                                <input  type="text"  name="jabatan" class="form-control" id="jabatanInput" placeholder="Silahkan isi. . ."  pattern="[a-zA-Z ]+" title="Hanya gunakan huruf" value="<?= $lokasi->jabatan; ?>">
                                            </div>
                                        <?php endif; ?>

                                            <!-- <input required type="text" class="form-control" id="jabatan" placeholder="" name="jabatan" value="<?= $lokasi->jabatan ?>"> -->
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_rptka" class="col-sm-3 col-form-label">NO. RPTKA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input required type="text" class="form-control" id="no_rptka" placeholder="" name="no_rptka" value="<?= $lokasi->no_rptka ?>" pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka">
                                            <?= form_error('no_rptka', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input required class="form-control" type="date" id="masa_rptka" name="masa_rptka" value="<?= $lokasi->masa_rptka ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_imta" class="col-sm-3 col-form-label">NO. IMTA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input required type="text" class="form-control" id="no_imta" placeholder="" name="no_imta" value="<?= $lokasi->no_imta ?>" pattern="^[0-9]*$" title="Format salah, hanya gunakan Angka">
                                            <?= form_error('no_imta', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input required class="form-control" type="date" id="masa_imta" name="masa_imta" value="<?= $lokasi->masa_imta ?>">
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
                                        <span class="text">Perbarui</span>
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

<script>
    function handleChangeJabatan(selectElement) {
    const jabatanBlok = document.getElementById("jabatanBlok");
    const jabatanInput = document.getElementById("jabatanInput");
    const jabatanSelect = document.getElementById("jabatan");
        if (selectElement.value == "jabLain") {
            jabatanBlok.style.display = "block";
            jabatanInput.required = true;
            jabatanInput.value = "";
        } else {
            jabatanBlok.style.display = "none";
            jabatanInput.required = false;
            // jabatanInput.setAttribute('name', '');
            jabatanInput.value = jabatanSelect.value;
        }
    }
</script>
<!-- End of Main Content -->