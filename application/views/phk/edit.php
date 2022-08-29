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
                            <form action="<?= base_url('phk/edit/' . $edit_phk->id_phk); ?>" method="post">
                                <div class="modal-body">
                                    <p> <small><b> DATA TENAGA KERJA</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_tk" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nama_tk" placeholder="Masukkan Nama Lengkap" name="nama_tk" value="<?= $edit_phk->nama_tk ?>">
                                            <?= form_error('nama_tk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="wilayah" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="wilayah" id="wilayah" class="form-control input-sm">
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $edit_phk->wilayah) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('kabupaten/kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="koordinat" class="col-sm-3 col-form-label">Koordinat</label>
                                        <div class="col-sm-3"> 
                                            <input type="text" id="lat" class="form-control" name="lat" readonly  value="<?= $edit_phk->latitude ?>" placeholder="Latitude. . .">
                                            <!-- <div id="mapltlg"></div> -->
                                             <?= form_error('koordinat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="long" class="form-control" name="long" readonly value="<?= $edit_phk->longitude ?>" placeholder="Longitude. . .">
                                            
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
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="no_identitas" placeholder="No.KTP" name="no_identitas" value="<?= $edit_phk->nomor_identitas ?>">
                                            <?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kpj" class="col-sm-3 col-form-label">No.KPJ (BPJS)</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="kpj" placeholder="No.KPJ" name="kpj" value="<?= $edit_phk->kpj ?>">
                                            <?= form_error('kpj', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="alamat lengkap. . . " name="alamat" rows="2"><?= $edit_phk->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="kontak" class="col-sm-3 col-form-label">No. Telepon</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="08xxx" name="kontak" value="<?= $edit_phk->kontak ?>">
                                            
                                            <?= form_error('no.telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_bekerja" class="col-sm-3 col-form-label">Masih bekerja?</label>
                                        <div class="col-sm-3">
                                            <select name="status_kerja" id="status_kerja" class="form-control">
                                                <option value="phk" <?php if ($edit_phk->status_kerja == 'phk') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>non aktif</option>
                                                <option value="aktif" <?php if ($edit_phk->status_kerja == 'aktif') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="disabilitas" class="col-sm-3 col-form-label">Berkebutuhan khusus?</label>
                                        <div class="col-sm-3">
                                            <select name="disabilitas" id="disabilitas" class="form-control">
                                                <option value="T" <?php if ($edit_phk->disabilitas == 'T') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Tidak</option>
                                                <option value="Y" <?php if ($edit_phk->disabilitas == 'Y') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-6">
                                            <select class="custom-select" name="perusahaan" id="perusahaan" class="form-control">
                                               
                                                <?php foreach ($perusahaan as $n) : ?>
                                                    <option value="<?= $n['id']; ?>" <?php if ($n['id'] == $edit_phk->nama_perusahaan) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?= $n['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="kode_segmen" class="col-sm-3 col-form-label">Kode Segmen</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kode_segmen" placeholder="Kode Segmen" name="kode_segmen" value="<?= $edit_phk->kode_segmen ?>">
                                            <?= form_error('kode_segmen', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
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