<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
        <a href="<?= base_url('pmi/'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                        <label for="nama" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="status" name="status" readonly value="NON-PROSEDURAL" aria-describedby="statusHelp">
                                            <small id="statusHelp" class="form-text text-muted"> <i> non-prosedural adalah untuk PMI/TKI-B </i></small>
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
                                            <input class="form-control" type="date" value="1999-12-31" id="tgl_lahir" name="tgl_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> ~ Pilih Jenis Kelamin ~ </option>
                                                <option value="L"> Laki-Laki </option>
                                                <option value="P"> Perempuan </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-4">
                                            <select name="provinsi" id="provinsi" class="form-control">
                                                <option value="">~ Pilih Provinsi ~</option>
                                                <?php
                                                foreach ($provinsi as $prov) {
                                                ?>
                                                    <option <?php echo $provinsi_selected == $prov->id ? 'selected="selected"' : '' ?> value="<?php echo $prov->id ?>"><?php echo $prov->nama_provinsi ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <select name="kabupaten" id="kabupaten" class="form-control">
                                                <option value="">~ Pilih Kabupaten/Kota ~</option>
                                                <?php
                                                foreach ($kabupaten as $kab) {
                                                ?>
                                                    <!--di sini kita tambahkan class berisi id provinsi-->
                                                    <option <?php echo $kabupaten_selected == $kab->provinsi_id ? 'selected="selected"' : '' ?> class="<?php echo $kab->provinsi_id ?>" value="<?php echo $kab->id ?>"><?php echo $kab->nama_kabupaten ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-5">
                                            <select name="kecamatan" id="kecamatan" class="form-control">
                                                <option value="">~ Pilih Kecamatan ~</option>
                                                <?php
                                                foreach ($kecamatan as $kec) {
                                                ?>
                                                    <!--di sini kita tambahkan class berisi id kota-->
                                                    <option <?php echo $kecamatan_selected == $kec->id ? 'selected="selected"' : '' ?> class="<?php echo $kec->kabupaten_id ?>" value="<?php echo $kec->id ?>"><?php echo $kec->nama_kecamatan ?></option>
                                                <?php
                                                }
                                                ?>
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
                                            <input type="text" class="form-control" id="desa" placeholder="Desa , Jalan, RT/RW ,No." name="desa" value="<?= set_value('desa'); ?>">
                                            <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Negara Bekerja</label>
                                        <div class="col-sm-4">
                                            <select name="negara" id="negara" class="form-control">
                                                <option value="">~ Pilih Negara ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id']; ?>"> <?= $n['nama_negara']; ?> </option>
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
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="lama" placeholder="x tahun x bulan" name="lama" value="<?= set_value('lama_bekerja'); ?>">
                                            <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label">Unggah Foto</label>
                                        <div class="col-sm-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="uploadHelp">
                                                <label class="custom-file-label" for="image">Pilih File</label>
                                                <small id="uploadHelp" class="form-text text-muted"> <i> .jpg, .jpeg, .png ukuran maks. 2 MB. </i></small>
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

<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>