

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('reward'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-0"></div>

                    <div class="card-body">
                        <div>
                            <form  id ="myForm" action="<?= base_url('reward/tambah'); ?>" method="post" >
                                <div class="modal-body"> 
                                <p> <small><b> DATA INDEKS PERUSAHAAN</b></small></p>
                                    <!-- <div class="form-group row">
                                        <label for="usulan_tahun" class="col-sm-3 col-form-label">Tahun Usulan</label>
                                        <div class="col-sm-2">
                                            <?php 
                                                echo '<select name="usulan_tahun" id="usualan_tahun" class="form-control">' . PHP_EOL;
                                                for($i = date("Y")-2; $i <=date("Y")+1; $i++){
                                                    echo '<option value="' . $i . '">' . $i . '</option>' . PHP_EOL;
                                                }
                                                echo '</select>';
                                            ; ?>
                                            <?= form_error('usulan_tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="perusahaan" placeholder="" name="nama_perusahaan">
                                            <input type="hidden" name="id_perusahaan">
                                            <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div ass="col-sm-1">
                                            <input class="btn btn btn-light" type = "button" value = "Reset data" onClick = "fun()"/>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="kabupaten_kota" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-4">
                                            <select name="kabupaten_kota" id="kabupaten_kota" class="form-control">
                                                <option value="">~ Pilih Kabupaten/kota ~</option>
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>"> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            
                                        </div> 
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('kabupaten_kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="nama_pimpinan" class="col-sm-3 col-form-label">Nama Pimpinan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="nama_pimpinan" placeholder="" name="nama_pimpinan">
                                            <?= form_error('nama_pimpinan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="nama_kontak_person" class="col-sm-3 col-form-label">Nama Kontak Person</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  id="nama_kontak_person" placeholder="" name="nama_kontak_person">
                                            <?= form_error('nama_kontak_person', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <label for="no_kontak_person" class="col-sm-1 col-form-label">No.Telp</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="no_kontak_person" placeholder="" name="no_kontak_person">
                                            <?= form_error('no_kontak_person', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="alamat_perusahaan" class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" id="alamat_perusahaan" placeholder="Alamat Lengkap . . ." name="alamat_perusahaan" rows="2"></textarea>
                                            <?= form_error('alamat_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="no_perusahaan" class="col-sm-3 col-form-label">No.Telp. Perusahaan</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="no_perusahaan" placeholder="" name="no_perusahaan">
                                            <?= form_error('no_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email_perusahaan" class="col-sm-3 col-form-label">Email Perusahaan</label>
                                        <div class="col-sm-5">
                                            <input type="email_perusahaan" class="form-control" id="email_perusahaan" aria-describedby="uploadHelp1" placeholder="email@email.com" name="email_perusahaan" >
                                            <?= form_error('email_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="jenis_perusahaan" class="col-sm-3 col-form-label">Jenis</label>
                                        <div class="col-sm-2">
                                            <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control">
                                                <option value="Kecil">Kecil</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Besar">Besar</option>
                                                <option value="Besar(BUMN)">Besar(BUMN)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sektor_usaha" class="col-sm-3 col-form-label">Sektor</label>
                                        <div class="col-sm-8">
                                        <select name="sektor_usaha" id="sektor_usaha" class="form-control">
                                                <!-- <option value="">~ Pilih Jenis Sektor Usaha ~</option> -->
                                                <?php foreach ($jenis_sektor_usaha as $row) : ?>
                                                    <option value="<?= $row['id_sektor']; ?>"> <?= $row['nama_sektor']; ?> &nbsp; &nbsp;<?= $row['keterangan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('sektor_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <p><small><b>DISABILITAS</b></small></p>
                                                    
                                    <div class="form-group row">
                                        <label for="disabilitas_L" class="col-sm-3 col-form-label">Jumlah Disabilitas L/P</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" min="0"  id="disabilitas_L" placeholder="Laki-laki" name="disabilitas_L">
                                            <?= form_error('disabilitas_L', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" min="0" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" aria-describedby="uploadHelp1" id="disabilitas_P" placeholder="Perempuan" name="disabilitas_P">
                                            <?= form_error('disabilitas_P', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" min="0" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" aria-describedby="uploadHelp1" id="disabilitas_total" readonly placeholder="Total" 
                                            value="" name="disabilitas_total" v>
                                            <?= form_error('disabilitas_total', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *total disabilitas </i></small>
                                            
                                        </div>
                                            
                                    </div>
                                    <div class="form-group row">
                                        <label for="tenaga_kerja_L" class="col-sm-3 col-form-label">Jumlah Tenaga Kerja L/P</label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" class="form-control"  id="tenaga_kerja_L" placeholder="Laki-laki" name="tenaga_kerja_L">
                                            <?= form_error('tenaga_kerja_L', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" class="form-control" aria-describedby="uploadHelp1" id="tenaga_kerja_P" placeholder="Perempuan" name="tenaga_kerja_P">
                                            <?= form_error('tenaga_kerja_P', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" class="form-control" aria-describedby="uploadHelp1" id="tenaga_kerja_total" readonly placeholder="Total"
                                            value="" name="tenaga_kerja_total">
                                            <?= form_error('tenaga_kerja_total', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *total tenaga kerja </i></small>
                                            
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="presentase" class="col-sm-7 col-form-label">Presentase %</label>
                                        <div class="col-sm-2">
                                            <input type="text"  readonly class="form-control" step="3" id="presentase" placeholder="0 %" value="" name="presentase">
                                            <?= form_error('presentase', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *% disabilitas </i></small>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ragam_disabilitas" class="col-sm-3 col-form-label" >Ragam Disabilitas</label>
                                        <div class="col-sm-7">

                            

                                            </select>

                                            <textarea class="form-control" id="ragam_disabilitas" placeholder=" . . ." name="ragam_disabilitas" rows="2"></textarea>
                                            <?= form_error('ragam_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_disabilitas" class="col-sm-3 col-form-label">Jenis Disabilitas</label>
                                        <div class="col-sm-7">
                                        <textarea class="form-control" id="jenis_disabilitas" placeholder=" . . ." name="jenis_disabilitas" rows="2"></textarea>
                                            <?= form_error('jenis_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
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