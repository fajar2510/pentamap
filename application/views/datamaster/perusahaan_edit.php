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
                            <form action="<?= base_url('datamaster/perusahaan_edit/' . $perusahaan->id) ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_perusahaan" placeholder="Masukkan Nama PT/Perusahaan" name="nama_perusahaan" value="<?= $perusahaan->nama_perusahaan ?>">
                                            <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" name="alamat" rows="2"> <?= $perusahaan->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kontak" class="col-sm-3 col-form-label">Kontak</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="" name="kontak" value="<?= $perusahaan->kontak ?>"">
                                            <small id=" uploadHelp1" class="form-text text-muted"> <i> *alamat e-mail/no.telp yang dapat dihubungi </i></small>
                                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fungsi" class="col-sm-3 col-form-label">Fungsi</label>
                                        <div class="col-sm-3">
                                            <select name="fungsi" id="fungsi" class="form-control">
                                                <option value="TKA" <?php if ($perusahaan->fungsi == 'TKA') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Penempatan TKA</option>
                                                <option value="PMI" <?php if ($perusahaan->fungsi == 'PMI') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Penempatan PMI</option>
                                                <option value="-" <?php if ($perusahaan->fungsi == '-') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="P" <?php if ($perusahaan->status == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Pusat</option>
                                                <option value="C" <?php if ($perusahaan->status == 'C') {
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