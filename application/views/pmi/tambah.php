<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('pmi/index/'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <form action="<?= base_url('pmi/index'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <select name="status" id="status" class="form-control">
                                                <option value="PROSEDURAL">PROSEDURAL</option>
                                                <option value="NON-PROSEDURAL">NON-PROSEDURAL</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-4">
                                            <input class="form-control" type="date" value="1997-08-19" id="tgl_lahir" name="tgl_lahir">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-4">
                                            <select name="prov" id="prov" class="form-control">
                                                <option value=""> Pilih Provinsi </option>
                                                <?php
                                                foreach ($wilayah_provinsi as $row) {
                                                    echo '<option value="' . $row->id . '">' . $row->nama . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <select name="kab" id="kab" class="form-control">
                                                <option value=""> Pilih Kabupaten/Kota </option>
                                            </select>
                                            <!-- <div id="loading" style="margin-top: 15px;">
                                    <img src="assets/img/loading//loading.gif" width="18"> <small>Memuat...</small>
                                </div> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-5">
                                            <select name="kec" id="kec" class="form-control">
                                                <option value=""> Pilih Kecamatan </option>

                                            </select>
                                        </div>

                                        <!-- <div class="col-sm-5">
                                <select name="desa" id="desa" class="form-control">
                                    <option value=""> Pilih Desa </option>
                                    <?php foreach ($wilayah_desa as $d) : ?>
                                        <option value="<?= $d['nama']; ?>"> <?= $d['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                                    </div>
                                    <div class="form-group row">
                                        <label for="desa" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="desa" placeholder="Desa" name="desa" value="<?= set_value('desa'); ?>">
                                            <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Negara Bekerja</label>
                                        <div class="col-sm-4">
                                            <select name="negara" id="negara" class="form-control">
                                                <option value=""> Pilih Negara </option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['kode_negara']; ?>"> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="jenis" placeholder="" name="jenis" value="<?= set_value('jenis_pekerjaan'); ?>">
                                            <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="berangkat" class="col-sm-3 col-form-label">Berangkat Melalui</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="berangkat" placeholder="" name="berangkat" value="<?= set_value('berangkat_melalui'); ?>">
                                            <?= form_error('berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="pengirim" placeholder="PT." name="pengirim" value="<?= set_value('pengirim'); ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lama" class="col-sm-3 col-form-label">Lama Bekerja</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="lama" placeholder="Tahun" min="0" name="lama" value="<?= set_value('lama_bekerja'); ?>">
                                            <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label">Unggah Foto</label>
                                        <div class="col-sm-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih File</label>
                                            </div>
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