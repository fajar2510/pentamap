<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;">Edit Data <?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('ppmi'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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

                            <form action="<?= base_url('ppmi/edit/' . $edit_ppmi->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan PPMI</label>
                                        <div class="col-sm-6">
                                            <select name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="taiwan" class="col-sm-3 col-form-label">Taiwan</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="taiwan_lk" min="0" placeholder="L" name="taiwan_lk" value="<?= $edit_ppmi->taiwan_lk ?>">
                                            <?= form_error('taiwan_lk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="taiwan_p" min="0" placeholder="P" name="taiwan_p" value="<?= $edit_ppmi->taiwan_p ?>">
                                            <?= form_error('taiwan_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hongkong" class="col-sm-3 col-form-label">Hongkong</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="hongkong_lk" min="0" placeholder="L" name="hongkong_lk" value="<?= $edit_ppmi->hongkong_lk ?>">
                                            <?= form_error('hongkong_lk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="tahongkong_piwan_p" min="0" placeholder="P" name="hongkong_p" value="<?= $edit_ppmi->hongkong_p ?>">
                                            <?= form_error('hongkong_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="singapura" class="col-sm-3 col-form-label">Singapura</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="singapura_lk" min="0" placeholder="L" name="singapura_lk" value="<?= $edit_ppmi->singapura_lk ?>">
                                            <?= form_error('singapura_lk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="singapura_p" min="0" placeholder="P" name="singapura_p" value="<?= $edit_ppmi->singapura_p ?>">
                                            <?= form_error('singapura_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="malaysia" class="col-sm-3 col-form-label">Malaysia</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="malaysia_lk" min="0" placeholder="L" name="malaysia_lk" value="<?= $edit_ppmi->malaysia_lk ?>">
                                            <?= form_error('malaysia_lk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="malaysia_p" min="0" placeholder="P" name="malaysia_p" value="<?= $edit_ppmi->malaysia_p ?>">
                                            <?= form_error('malaysia_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="brunei" class="col-sm-3 col-form-label">Brueni Darusallam</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="brunei_lk" min="0" placeholder="L" name="brunei_lk" value="<?= $edit_ppmi->brunei_lk ?>">
                                            <?= form_error('brunei_lk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="brunei_p" min="0" placeholder="P" name="brunei_p" value="<?= $edit_ppmi->brunei_p ?>">
                                            <?= form_error('brunei_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lain" class="col-sm-3 col-form-label">Lainnya</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="lain_lk" min="0" placeholder="L" name="lain_lk" value="<?= $edit_ppmi->lain_lk ?>">
                                            <?= form_error('lain_lk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="lain_p" min="0" placeholder="P" name="lain_p" value="<?= $edit_ppmi->lain_p ?>">
                                            <?= form_error('lain_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sektor" class="col-sm-3 col-form-label">Sektor</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="formal" min="0" placeholder="Formal" name="formal" value="<?= $edit_ppmi->formal ?>">
                                            <?= form_error('formal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="informal" min="0" placeholder="Informal" name="informal" value="<?= $edit_ppmi->informal ?>">
                                            <?= form_error('informal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="domsili" class="col-sm-3 col-form-label">Domisili PMI</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="jatim" min="0" placeholder="Jatim" name="jatim" value="<?= $edit_ppmi->jatim ?>">
                                            <?= form_error('jatim', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="luar_jatim" min="0" placeholder="*Luar Jatim" name="luar_jatim" value="<?= $edit_ppmi->luar_jatim ?>">
                                            <?= form_error('luar_jatim', '<small class="text-danger pl-3">', '</small>'); ?>
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
<!-- End of Main Content -->