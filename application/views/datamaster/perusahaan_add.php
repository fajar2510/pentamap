<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('perusahaan/'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <form action="<?= base_url('pmi/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">


                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama PT/Perusahaan" name="nama" value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="Jln. No. . . " name="alamat" rows="3"></textarea>
                                            <!-- <input type="text-area" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="<?= set_value('alamat'); ?>"> -->
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kontak" class="col-sm-3 col-form-label">Kontak</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="kontak" placeholder="" name="kontak" value="<?= set_value('kontak'); ?>">
                                            <small id="uploadHelp1" class="form-text text-muted"> <i> *alamat e-mail/no.telp yang dapat dihubungi </i></small>
                                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <select name="status" id="status" class="form-control">
                                                <option value=""> ~ Pilih Status Perusahaan ~ </option>
                                                <option value="P"> Pusat </option>
                                                <option value="C"> Cabang </option>
                                            </select>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group row">
                                        <label for="sektor" class="col-sm-3 col-form-label">Sektor/Bidang</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="sektor" placeholder="" name="sektor" value="<?= set_value('sektor'); ?>">
                                            <small id="uploadHelp1" class="form-text text-muted"> <i> *hanya opsional!! </i></small>
                                            <?= form_error('sektor', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label">Unggah Logo Perusahaan</label>
                                        <div class="col-sm-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                                <label class="custom-file-label" for="image">Pilih File</label>
                                                <small id="uploadHelp" class="form-text text-muted"> <i> *hanya opsional!! </i></small>
                                            </div>
                                        </div>
                                    </div> -->
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