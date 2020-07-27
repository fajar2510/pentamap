<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('pmi/index/'); ?>" class="btn btn-secondary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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

                            <form action="<?= base_url('pmi/edit/' . $pmi->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $pmi->nama ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir / <sup>*umur</sup> </label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $pmi->tgl_lahir ?>" id="tgl_lahir" name="tgl_lahir">
                                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="L" <?php if ($pmi->gender == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-Laki</option>
                                                <option value="P" <?php if ($pmi->gender == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"><?= $pmi->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jk" class="control-label col-sm-3"></label>
                                        <div class="col-sm-4">
                                            <!-- <?php
                                                    $style_provinsi = 'class="form-control input-sm" id="provinsi_id" name="prov"  onChange="tampilKabupaten()"';
                                                    echo form_dropdown('provinsi_id', $provinsi, '', $style_provinsi);
                                                    ?> -->
                                            <select class="custom-select" name="prov" id="provinsi_id" class="form-control input-sm" onChange="tampilKabupaten()">
                                                <?php foreach ($provinsi_select as $row) : ?>
                                                    <option value="<?= $row['id_provinsi']; ?>" <?php if ($row['id_provinsi'] == $pmi->provinsi) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?>> <?= $row['nama_provinsi']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- <?php
                                                    $style_kabupaten = 'class="form-control input-sm" name="kab" id="kabupaten_id" onChange="tampilKecamatan()"';
                                                    echo form_dropdown("kabupaten_id", array('Pilih Kabupaten' => '- Pilih Kabupaten -'), '', $style_kabupaten);
                                                    ?> -->
                                            <select class="custom-select" name="kab" id="kabupaten_id" class="form-control input-sm" onChange="tampilKecamatan()">
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>" <?php if ($row['id_kabupaten'] == $pmi->kabupaten) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="control-label col-sm-3"></label>
                                        <div class="col-sm-4">
                                            <?php
                                                    $style_kecamatan = 'class="form-control input-sm" name="kec" id="kecamatan_id" onChange="tampilKelurahan()"';
                                                    echo form_dropdown("kecamatan_id", array('Pilih Kecamatan' => '- Pilih Kecamatan -'), '', $style_kecamatan);
                                                    ?>
                                            
                                            <!-- <select class="custom-select" name="kec" id="kecamatan_id" class="form-control input-sm" onChange="tampilKelurahan()">
                                                <?php foreach ($kecamatan as $row) : ?>
                                                    <option value="<?= $row['id_kecamatan']; ?>" <?php if ($row['id_kecamatan'] == $pmi->kecamatan) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kecamatan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select> -->
                                        </div>
                                        <div class="col-sm-4">
                                            <?php
                                                    $style_kelurahan = 'class="form-control input-sm" name="desa" id="kelurahan_id"';
                                                    echo form_dropdown("kelurahan_id", array('Pilih Kelurahan' => '- Pilih Kelurahan -'), '', $style_kelurahan);
                                                    ?>
                                            <!-- <select class="custom-select" name="desa" id="kelurahan_id" class="form-control input-sm">
                                                <?php foreach ($kelurahan as $row) : ?>
                                                    <option value="<?= $row['id_kelurahan']; ?>" <?php if ($row['id_kelurahan'] == $pmi->kelurahan) {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>> <?= $row['nama_kelurahan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Negara Bekerja</label>
                                        <div class="col-sm-4">
                                            <select name="negara" id="negara" class="form-control">
                                                <option value=""> Pilih Negara </option>
                                                <!-- <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['nama_negara']; ?>"> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?> -->
                                                <!-- statis data -->
                                                <option value="Indonesia" <?php if ($pmi->negara_bekerja == 'Indonesia') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Indonesia
                                                </option>
                                                <option value="Malaysia" <?php if ($pmi->negara_bekerja == 'Malaysia') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Malaysia
                                                </option>
                                                <option value="Singapura" <?php if ($pmi->negara_bekerja == 'Singapura') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Singapura
                                                </option>
                                                <option value="Brunei Darusallam" <?php if ($pmi->negara_bekerja == 'Brunei Darusallam') {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo '';
                                                                                    } ?>>Brunei Darusallam
                                                </option>
                                                <option value="Hongkong" <?php if ($pmi->negara_bekerja == 'Hongkong') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Hongkong
                                                </option>
                                                <option value="RRC/China" <?php if ($pmi->negara_bekerja == 'RRC/China') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>RRC/China
                                                </option>
                                                <option value="Taiwan" <?php if ($pmi->negara_bekerja == 'Taiwan') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Taiwan
                                                </option>
                                                <option value="Jepang" <?php if ($pmi->negara_bekerja == 'Jepang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Jepang
                                                </option>
                                                <option value="Korea Selatan" <?php if ($pmi->negara_bekerja == 'Korea Selatan') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Korea Selatan
                                                </option>
                                                <option value="Arab Saudi" <?php if ($pmi->negara_bekerja == 'Arab Saudi') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Arab Saudi
                                                </option>
                                                <option value="Indonesia" <?php if ($pmi->negara_bekerja == 'Indonesia') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Indonesia
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="jenis" placeholder="" name="jenis" value="<?= $pmi->jenis_pekerjaan ?>">
                                            <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="berangkat" class="col-sm-3 col-form-label">Berangkat Melalui</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="berangkat" placeholder="" name="berangkat" value="<?= $pmi->berangkat_melalui ?>">
                                            <?= form_error('berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="pengirim" placeholder="PT." name="pengirim" value="<?= $pmi->pengirim ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lama" class="col-sm-3 col-form-label">Lama Bekerja</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="lama" placeholder="x tahun x bulan" name="lama" value="<?= $pmi->lama_bekerja ?>">
                                            <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label">Unggah Foto</label>
                                        <div class="col-sm-2">

                                            <!-- <?php
                                                    if ($pmi->image == null) {
                                                        echo "assets/img/pmi/default.png";
                                                    } else {
                                                        echo " $pmi->image";
                                                    }
                                                    ?> -->
                                            <img src="<?= base_url('assets/img/pmi/') . $pmi->image ?>" class="img-thumbnail" alt="Profile Picture">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih File</label>
                                            </div>
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