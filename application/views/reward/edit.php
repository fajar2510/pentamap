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
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">

                    </div>
                    <div class="card-body">
                        <div>
                        <?php foreach ($edit_reward as $edit_reward): ?>
                            <form action="<?= base_url('reward/edit/' . $edit_reward ['id_reward']); ?>" method="post">
                            <div class="modal-body"> 
                                    <div class="form-group row">
                                        <label for="tanggal_data" class="col-sm-3 col-form-label"> Di usulkan pada</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $edit_reward['date_created'] ?>" id="tanggal_data" name="tanggal_data">
                                            <?= form_error('tanggal_data', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <p> <small><b> DATA INDEKS PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"  disabled id="perusahaan" placeholder="Masukkan Nama PT" name="nama_perusahaan" value="<?= $edit_reward ['nama_perusahaan']; ?>">
                                            <input type="hidden" name="id_perusahaan" value="<?= $edit_reward ['id']; ?>">
                                            <input type="hidden" name="id_reward" value="<?= $edit_reward ['id_reward']; ?>">
                                            <!-- <?php foreach ($max_id as $idx); ?> -->
                                            <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kabupaten_kota" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-4">
                                            <select class="custom-select" disabled name="kabupaten_kota" id="kabupaten_kota" class="form-control input-sm">
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $edit_reward['nama_kabupaten']) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('kabupaten_kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                   
                                    

                                    

                                    <div class="form-group row">
                                        <label for="sektor_usaha" class="col-sm-3 col-form-label">Sektor</label>
                                        <div class="col-sm-5">
                                            <select class="custom-select" disabled name="sektor_usaha" id="sektor_usaha" class="form-control input-sm">
                                                <?php foreach ($jenis_sektor_usaha as $jsu) : ?>
                                                    <option value="<?= $jsu['id_sektor']; ?>" <?php if ($jsu['id_sektor'] == $edit_reward['sektor_perusahaan']) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $jsu['nama_sektor']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('sektor_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <p><small><b>DISABILITAS</b></small></p>
                                                    
                                    <div class="form-group row">
                                        <label for="disabilitas_L" class="col-sm-3 col-form-label">Jumlah Disabilitas L/P</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" min="0"  id="disabilitas_L" placeholder="Laki-laki" name="disabilitas_L" value="<?= $edit_reward ['disabilitas_L']; ?>">
                                            <?= form_error('disabilitas_L', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" min="0"  aria-describedby="uploadHelp1" id="disabilitas_P" placeholder="Perempuan" name="disabilitas_P" value="<?= $edit_reward ['disabilitas_P']; ?>">
                                            <?= form_error('disabilitas_P', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <!-- onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" -->
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" min="0"  aria-describedby="uploadHelp1" id="disabilitas_total" readonly placeholder="Total" value="<?= $edit_reward ['disabilitas_total']; ?>"name="disabilitas_total">
                                            <?= form_error('disabilitas_total', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *total disabilitas </i></small>
                                            
                                        </div>
                                            
                                    </div>
                                    <div class="form-group row">
                                        <label for="tenaga_kerja_L" class="col-sm-3 col-form-label">Jumlah Tenaga Kerja L/P</label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" class="form-control"  id="tenaga_kerja_L" placeholder="Laki-laki" name="tenaga_kerja_L" value="<?= $edit_reward ['tenaga_kerja_L']; ?>" >
                                            <?= form_error('tenaga_kerja_L', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" class="form-control" aria-describedby="uploadHelp1" id="tenaga_kerja_P" placeholder="Perempuan" name="tenaga_kerja_P" value="<?= $edit_reward ['tenaga_kerja_P']; ?>">
                                            <?= form_error('tenaga_kerja_P', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" class="form-control" aria-describedby="uploadHelp1" id="tenaga_kerja_total" readonly placeholder="Total" value="<?= $edit_reward ['tenaga_kerja_total']; ?>" name="tenaga_kerja_total">
                                            <?= form_error('tenaga_kerja_total', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *total tenaga kerja </i></small>
                                            
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="presentase" class="col-sm-7 col-form-label">Presentase %</label>
                                        <div class="col-sm-2">
                                            <input type="text"  readonly class="form-control" step="3" id="presentase" placeholder="0 %" name="presentase" value="<?= $edit_reward ['presentase']; ?>">
                                            <?= form_error('presentase', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *% disabilitas </i></small>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="ragam_disabilitas" class="col-sm-3 col-form-label" >Ragam & Jenis Disabilitas</label>
                                        <div class="col-sm-8">
                    
                                        <select class="bootstrap-select" class="form-control" name="jenis_edit[]" data-width="100%" data-live-search="true" multiple required>
                                            
                                            <!-- AMBIL DATA BELUM BISA -->
                                            <?php foreach ($jenis ->result() as $arr) :?>
                                                <option value="<?php echo $arr->ragam_id;?>"> <?php echo $arr->disabilitas_ragam;?> &nbsp;  &nbsp;<?php echo $arr->jenis_disabilitas;?></option>
                                            <?php endforeach;?>
                                            <!-- AMBIL DATA BELUM BISA -->

                                        </select>
                                            <?= form_error('ragam_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div   div class="modal-footer">
                                        <button type="submit" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Sunting</span>
                                        </button>
                                    </div>
                                </div>
                            
                                    
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->