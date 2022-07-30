<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('datamaster/perusahaan'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <form action="<?= base_url('datamaster/perusahaan_edit/' . $edit_perusahaan->id) ?>" method="post">
                                <div class="modal-body">
                                <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_perusahaan" placeholder="Masukkan Nama PT" name="nama_perusahaan" value="<?= $edit_perusahaan->nama_perusahaan ?>">
                                            <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_pimpinan" class="col-sm-3 col-form-label">Pimpinan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_pimpinan" placeholder="Masukkan Nama Pimpinan" name="nama_pimpinan" value="<?= $edit_perusahaan->nama_pimpinan ?>">
                                            <?= form_error('nama_pimpinan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="alamat lengkap . . ." name="alamat" rows="3"><?= $edit_perusahaan->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <p> <small><b> KONTAK PERSON</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_kontak_person" class="col-sm-3 col-form-label">Nama Kontak</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nama_kontak_person" placeholder="nama kontak person" name="nama_kontak_person" value="<?= $edit_perusahaan->nama_kontak_person ?>">
                                            <?= form_error('nama_kontak_person', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kontak" class="col-sm-3 col-form-label">No.Telp 1</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="" name="kontak" value="<?= $edit_perusahaan->kontak ?>">
                                           
                                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_kontak_person" class="col-sm-3 col-form-label">No.Telp 2</label>
                                        <div class="col-sm-4">
                                            <input type="tel" class="form-control" aria-describedby="uploadHelp1" id="no_kontak_person" placeholder="" name="no_kontak_person" value="<?= $edit_perusahaan->no_kontak_person ?>">
                                           
                                            <?= form_error('no_kontak_person', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email_perusahaan" class="col-sm-3 col-form-label">E-mail</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="email_perusahaan" placeholder="e-mail" name="email_perusahaan" value="<?= $edit_perusahaan->email_perusahaan?>">
                                            <?= form_error('email_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <p> <small><b> DATA SEKTOR</b></small></p>
                                    <div class="form-group row">
                                    <label for="fungsi" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select" name="fungsi" id="fungsi" class="form-control input-sm">
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $edit_perusahaan->fungsi) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('fungsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sektor_perusahaan" class="col-sm-3 col-form-label">Sektor Perusahaan</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="sektor_perusahaan" placeholder="sektor/bidang" name="sektor_perusahaan" value="<?= $edit_perusahaan->sektor_perusahaan?>">
                                            <?= form_error('sektor_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                     </div>
                                    <div class="form-group row">
                                        <label for="jenis_perusahaan" class="col-sm-3 col-form-label">Jenis Perusahaan</label>
                                        <div class="col-sm-2">
                                            <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control">
                                                <option value="Kecil" <?php if ($edit_perusahaan->jenis_perusahaan == 'Kecil') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Kecil</option>
                                                <option value="Menengah" <?php if ($edit_perusahaan->jenis_perusahaan == 'Menengah') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Menengah</option>
                                                <option value="Besar" <?php if ($edit_perusahaan->jenis_perusahaan == 'Besar') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Besar</option>
                                                <option value="BUMN" <?php if ($edit_perusahaan->jenis_perusahaan == 'BUMN') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>BUMN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_kantor" class="col-sm-3 col-form-label">Kode Kantor</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="kode_kantor" placeholder="" name="kode_kantor" value="<?= $edit_perusahaan->kode_kantor?>">
                                            <?= form_error('kode_kantor', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status Kantor</label>
                                        <div class="col-sm-2">
                                            <select name="status" id="status" class="form-control">
                                            <option value="P" <?php if ($edit_perusahaan->status == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Pusat</option>
                                                <option value="C" <?php if ($edit_perusahaan->status == 'C') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Cabang</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
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
<!-- End of Main Content -->