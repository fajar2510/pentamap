<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
        <a href="<?= base_url('cpmi'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                            <form action="<?= base_url('cpmi/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <p> <small><b> DATA TANGGAL INPUTAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="tanggal_data" class="col-sm-3 col-form-label">Tanggal Data</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= date('Y-m-d'); ?>" id="tanggal_data" name="tanggal_data">
                                            <?= form_error('tanggal_data', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div> 
                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                    <label for="perusahaan" class="col-sm-3 col-form-label">Nama PT/Organisasi</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="perusahaan" placeholder="Masukkan Nama PT/organisasi" name="perusahaan">
                                            <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small><b> DATA PMI</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_pmi" class="col-sm-3 col-form-label">Nama PMI</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_pmi" placeholder="Masukkan Nama" name="nama_pmi">
                                            <?= form_error('nama_pmi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> ~ Pilih Jenis Kelamin ~ </option>
                                                <option value="L"> Laki-Laki </option>
                                                <option value="P"> Perempuan </option>
                                            </select>
                                            <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir">
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="2000-07-31" id="tanggal_lahir" name="tanggal_lahir">
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Kabupaten/kota</label>
                                        <div class="col-sm-3">
                                            <select name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <option value="">~ Pilih Kabupaten/kota ~</option>
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>"> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id=" lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Sektor Jabatan</label>
                                        <div class="col-sm-4">
                                            <select name="jabatan" id="pendidikan" class="form-control">
                                                <option value=""> ~ Pilih Sektor Jabatan ~ </option>
                                                <option value="FORMAL">FORMAL</option>
                                                <option value="INFORMAL">INFORMAL</option>
                                            </select>
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Formal</label>
                                        <div class="col-sm-4">
                                            <select name="pendidikan" id="pendidikan" class="form-control">
                                                <option value=""> ~ Pilih Pendidikan ~ </option>
                                                <option value="SD">SD (Sekolah Dasar)</option>
                                                <option value="SMP">SMP/SLTP (Sekolah Menengah Pertama)</option>
                                                <option value="SMA">SMA/SMU (Sekolah Menengah Atas)</option>
                                                <option value="S1/S2">S1/S2/Insiyur (Strata 1-2)</option>
                                                <option value="-">-</option>
                                            </select>
                                            <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="gaji" placeholder="Masukkan Nominal Gaji" name="gaji">
                                            <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paspor" class="col-sm-3 col-form-label">Paspor</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="paspor" placeholder="Nomor Paspor" name="paspor">
                                            <?= form_error('paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara_penempatan" class="col-sm-3 col-form-label">Negara Penempatan</label>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="negara_penempatan" id="negara_penempatan" class="form-control">
                                                <option value="">~ Pilih Negara ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id']; ?>"> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_pesawat" class="col-sm-3 col-form-label">Kode Pesawat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="kode_pesawat" placeholder="Kode Pesawat" name="kode_pesawat">
                                            <?= form_error('kode_pesawat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small> <b>DATA PENGGUNA JASA </b></small></p>
                                    <div class="form-group row">
                                        <label for="pengguna_jasa" class="col-sm-3 col-form-label">Nama Pengguna Jasa</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="pengguna_jasa" placeholder="Masukkan Nama Pengguna Jasa" name="pengguna_jasa">
                                            <?= form_error('pengguna_jasa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat_pengguna_jasa" class="col-sm-3 col-form-label">Alamat Pengguna Jasa</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat_pengguna_jasa" placeholder="Alamat Lengkap. . . " name="alamat_pengguna_jasa" rows="2"></textarea>
                                            <?= form_error('alamat_pengguna_jasa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <a href="<?= base_url('cpmi'); ?>" class="btn btn-light btn-icon-split">
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