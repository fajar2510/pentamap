<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;">Edit Data <?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('tka'); ?>" class="btn btn-secondary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                            <form action="<?= base_url('tka/edit/' . $edit_tka->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">


                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan TKA</label>
                                        <div class="col-sm-6">


                                            <select name="perusahaan" id="perusahaan" class="form-control">

                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small><b> DATA TKA</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_tka" class="col-sm-3 col-form-label ">Nama </small></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="nama_tka" placeholder="Masukkan Nama " value="<?= $edit_tka->nama_tka ?>" name="negara">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="L" <?php if ($edit_tka->jenis_kel == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-laki</option>
                                                <option value="P" <?php if ($edit_tka->jenis_kel == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label ">Kewarganegaraan </small></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="negara" placeholder="Masukkan Nama Negara" value="<?= $edit_tka->kewarganegaraan ?>" name="negara">
                                            <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="jabatan" placeholder="" name="jabatan" value="<?= $edit_tka->jabatan ?>">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_rptka" class="col-sm-3 col-form-label">NO. RPTKA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="no_rptka" placeholder="" name="no_rptka" value="<?= $edit_tka->no_rptka ?>">
                                            <?= form_error('no_rptka', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" id="masa_rptka" name="masa_rptka" value="<?= $edit_tka->masa_rptka ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_imta" class="col-sm-3 col-form-label">NO. IMTA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="no_imta" placeholder="" name="no_imta" value="<?= $edit_tka->no_imta ?>">
                                            <?= form_error('no_imta', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" id="masa_imta" name="masa_imta" value="<?= $edit_tka->masa_imta ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Kerja</label>
                                        <div class="col-sm-3">
                                            <select name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <option value="Bangkalan" <?php if ($edit_tka->lokasi_kerja == 'Bangkalan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Bangkalan</option>
                                                <option value="Banyuwangi" <?php if ($edit_tka->lokasi_kerja == 'Banyuwangi') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Banyuwangi</option>
                                                <option value="Blitar" <?php if ($edit_tka->lokasi_kerja == 'Blitar') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Blitar</option>
                                                <option value="Bojonegoro" <?php if ($edit_tka->lokasi_kerja == 'Bojonegoro') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Bojonegoro</option>
                                                <option value="Bondowoso" <?php if ($edit_tka->lokasi_kerja == 'Bondowoso') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Bondowoso</option>

                                                <option value="Gresik" <?php if ($edit_tka->lokasi_kerja == 'Gresik') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Gresik</option>
                                                <option value="Jember" <?php if ($edit_tka->lokasi_kerja == 'Jember') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Jember</option>

                                                <option value="Jombang" <?php if ($edit_tka->lokasi_kerja == 'Jombang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Jombang</option>
                                                <option value="Kediri" <?php if ($edit_tka->lokasi_kerja == 'Kediri') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Kediri</option>

                                                <option value="Kota Batu" <?php if ($edit_tka->lokasi_kerja == 'Kota Batu') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Batu</option>
                                                <option value="Kota Blitar" <?php if ($edit_tka->lokasi_kerja == 'Kota Blitar') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Blitar</option>

                                                <option value="Kota Kediri" <?php if ($edit_tka->lokasi_kerja == 'Kota Kediri') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Kediri</option>
                                                <option value="Kota Madiun" <?php if ($edit_tka->lokasi_kerja == 'Kota Madiun') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Madiun</option>

                                                <option value="Kota Malang" <?php if ($edit_tka->lokasi_kerja == 'Kota Malang') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Malang</option>
                                                <option value="Kota Mojokerto" <?php if ($edit_tka->lokasi_kerja == 'Kota Mojokerto') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Kota Mojokerto</option>

                                                <option value="Kota Pasuruan" <?php if ($edit_tka->lokasi_kerja == 'Kota Pasuruan') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Kota Pasuruan</option>
                                                <option value="Kota Probolinggo" <?php if ($edit_tka->lokasi_kerja == 'Kota Probolinggo') {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo '';
                                                                                    } ?>>Kota Probolinggo</option>

                                                <option value="Kota Surabaya" <?php if ($edit_tka->lokasi_kerja == 'Kota Surabaya') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Kota Surabaya</option>
                                                <option value="Lamongan" <?php if ($edit_tka->lokasi_kerja == 'Lamongan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Lamongan</option>

                                                <option value="Lumajang" <?php if ($edit_tka->lokasi_kerja == 'Lumajang') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Lumajang</option>
                                                <option value="Madiun" <?php if ($edit_tka->lokasi_kerja == 'Madiun') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Madiun</option>

                                                <option value="Magetan" <?php if ($edit_tka->lokasi_kerja == 'Magetan') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Magetan</option>
                                                <option value="Malang" <?php if ($edit_tka->lokasi_kerja == 'Malang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Malang</option>

                                                <option value="Mojokerto" <?php if ($edit_tka->lokasi_kerja == 'Mojokerto') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Mojokerto</option>
                                                <option value="Nganjuk" <?php if ($edit_tka->lokasi_kerja == 'Nganjuk') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Nganjuk</option>

                                                <option value="Ngawi" <?php if ($edit_tka->lokasi_kerja == 'Ngawi') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Ngawi</option>
                                                <option value="Pacitan" <?php if ($edit_tka->lokasi_kerja == 'Pacitan') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Pacitan</option>

                                                <option value="Pamekasan" <?php if ($edit_tka->lokasi_kerja == 'Pamekasan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Pamekasan</option>
                                                <option value="Pasuruan" <?php if ($edit_tka->lokasi_kerja == 'Pasuruan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Pasuruan</option>
                                                <option value="Ponorogo" <?php if ($edit_tka->lokasi_kerja == 'Ponorogo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Ponorogo</option>

                                                <option value="Probolinggo" <?php if ($edit_tka->lokasi_kerja == 'Probolinggo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Probolinggo</option>
                                                <option value="Sampang" <?php if ($edit_tka->lokasi_kerja == 'Sampang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Sampang</option>

                                                <option value="Sidoarjo" <?php if ($edit_tka->lokasi_kerja == 'Sidoarjo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Sidoarjo</option>
                                                <option value="Situbondo" <?php if ($edit_tka->lokasi_kerja == 'Situbondo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Situbondo</option>

                                                <option value="Sumenep" <?php if ($edit_tka->lokasi_kerja == 'Sumenep') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Sumenep</option>
                                                <option value="Trenggalek" <?php if ($edit_tka->lokasi_kerja == 'Trenggalek') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Trenggalek</option>
                                                <option value="Tuban" <?php if ($edit_tka->lokasi_kerja == 'Tuban') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Tuban</option>
                                                <option value="Tulungagung" <?php if ($edit_tka->lokasi_kerja == 'Tulungagung') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Tulungagung</option>
                                                <option value="Luar Jatim" <?php if ($edit_tka->lokasi_kerja == 'Luar Jatim') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>*Luar Jatim</option>
                                                <!-- <option value="">~ Pilih Lokasi Kerja ~</option>
                                                <?php foreach ($jatim as $j) : ?>
                                                    <option value="<?= $j['id_kabupaten']; ?>"> <?= $j['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                                <option value="LUAR JATIM">*LUAR JATIM</option> -->
                                            </select>
                                            <small id="lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('tka'); ?>" class="btn btn-light btn-icon-split">
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