<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
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
                            <form action="<?= base_url('ppmi/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="nama_pmi" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_pmi" placeholder="Masukkan Nama" name="nama_pmi">
                                            <?= form_error('nama_pmi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan PPMI</label>
                                        <div class="col-sm-5">
                                            <select name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
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
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="2000-07-31" id="tanggal_lahir" name="tanggal_lahir">
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
                                        <label for="lokasi" class="col-sm-3 col-form-label">Wilayah/Kota</label>
                                        <div class="col-sm-3">
                                            <select name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <option value="">~ Pilih Lokasi Kota ~</option>
                                                <option value="Bangkalan">Bangkalan</option>
                                                <option value="Banyuwangi">Banyuwangi</option>
                                                <option value="Blitar">Blitar</option>
                                                <option value="Bojonegoro">Bojonegoro</option>
                                                <option value="Bondowoso">Bondowoso</option>
                                                <option value="Gresik">Gresik</option>
                                                <option value="Jember">Jember</option>
                                                <option value="Jombang">Jombang</option>
                                                <option value="Kediri">Kediri</option>
                                                <option value="Kota Batu">Kota Batu</option>
                                                <option value="Kota Blitar">Kota Blitar</option>
                                                <option value="Kota Kediri">Kota Kediri</option>
                                                <option value="Kota Madiun">Kota Madiun</option>
                                                <option value="Kota Malang">Kota Malang</option>
                                                <option value="Kota Mojokerto">Kota Mojokerto</option>
                                                <option value="Kota Pasuruan">Kota Pasuruan</option>
                                                <option value="Kota Probolinggo">Kota Probolinggo</option>
                                                <option value="Kota Surabaya">Kota Surabaya</option>
                                                <option value="Lamongan">Lamongan</option>
                                                <option value="Lumajang">Lumajang</option>
                                                <option value="Madiun">Madiun</option>
                                                <option value="Magetan">Magetan</option>
                                                <option value="Malang">Malang</option>
                                                <option value="Mojokerto">Mojokerto</option>
                                                <option value="Nganjuk">Nganjuk</option>
                                                <option value="Ngawi">Ngawi</option>
                                                <option value="Pacitan">Pacitan</option>
                                                <option value="Pamekasan">Pamekasan</option>
                                                <option value="Pasuruan">Pasuruan</option>
                                                <option value="Ponorogo">Ponorogo</option>
                                                <option value="Probolinggo">Probolinggo</option>
                                                <option value="Sampang">Sampang</option>
                                                <option value="Sidoarjo">Sidoarjo</option>
                                                <option value="Situbondo">Situbondo</option>
                                                <option value="Sumenep">Sumenep</option>
                                                <option value="Trenggalek">Trenggalek</option>
                                                <option value="Tuban">Tuban</option>
                                                <option value="Tulungagung">Tulungagung</option>

                                                <option value="Luar Jatim">*LUAR JATIM</option>
                                            </select>
                                            <small id=" lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="jabatan" placeholder="Masukkan Nama" name="jabatan">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Formal</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="pendidikan" placeholder="Masukkan Nama" name="pendidikan">
                                            <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="pengguna_jasa" class="col-sm-3 col-form-label">Nama Pengguna Jasa</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="pengguna_jasa" placeholder="Masukkan Nama" name="pengguna_jasa">
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
                                    <div class="form-group row">
                                        <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="gaji" placeholder="Masukkan Nama" name="gaji">
                                            <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paspor" class="col-sm-3 col-form-label">Paspor</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="paspor" placeholder="Masukkan Nama" name="paspor">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara_penempatan" class="col-sm-3 col-form-label">Negara Penempatan</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="negara_penempatan" placeholder="Masukkan Nama" name="negara_penempatan">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_pesawat" class="col-sm-3 col-form-label">Kode Pesawat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="kode_pesawat" placeholder="Masukkan Nama" name="kode_pesawat">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('ppmi'); ?>" class="btn btn-light btn-icon-split">
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