<!-- Begin Page Content -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.css') ?>" /> -->
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
                                        <label for="jk" class="control-label col-sm-3">Alamat </label>
                                        <div class="col-sm-4">
                                            <?php
                                            $style_provinsi = 'class="form-control input-sm" id="provinsi_id" name="provinsi"  onChange="tampilKabupaten()"';
                                            echo form_dropdown('provinsi_id', $provinsi, '', $style_provinsi);
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php
                                            $style_kabupaten = 'class="form-control input-sm" name="kabupaten" id="kabupaten_id" onChange="tampilKecamatan()"';
                                            echo form_dropdown("kabupaten_id", array('Pilih Kabupaten' => '- Pilih Kabupaten -'), '', $style_kabupaten);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="control-label col-sm-3"></label>
                                        <div class="col-sm-4">
                                            <?php
                                            $style_kecamatan = 'class="form-control input-sm" name="kecamatan" id="kecamatan_id" onChange="tampilKelurahan()"';
                                            echo form_dropdown("kecamatan_id", array('Pilih Kecamatan' => '- Pilih Kecamatan -'), '', $style_kecamatan);
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php
                                            $style_kelurahan = 'class="form-control input-sm" name="desa" id="kelurahan_id"';
                                            echo form_dropdown("kelurahan_id", array('Pilih Kelurahan' => '- Pilih Kelurahan -'), '', $style_kelurahan);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Negara Bekerja</label>
                                        <div class="col-sm-4">
                                            <select name="negara" id="negara" class="form-control">
                                                <option value="">~ Pilih Negara ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['nama_negara']; ?>"> <?= $n['nama_negara']; ?> </option>
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