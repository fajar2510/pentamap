<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
        <a href="<?= base_url('cpmi'); ?>" class="btn btn-secondary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
                            <form action="<?= base_url('cpmi/edit/' . $edit_cpmi->id); ?>" method="post">
                                <div class="modal-body">
                                    <p> <small><b> DATA TANGGAL INPUTAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="tanggal_data" class="col-sm-3 col-form-label">Tanggal Data</label>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $edit_cpmi->date_created ?>" id="tanggal_data" name="tanggal_data">
                                            <?= form_error('tanggal_data', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <p> <small><b> DATA PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan PPMI</label>
                                        <div class="col-sm-5">
                                            <select name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>" <?php if ($p['id'] == $edit_cpmi->perusahaan) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small><b> DATA PMI</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_pmi" class="col-sm-3 col-form-label">Nama PMI</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_pmi" placeholder="Masukkan Nama" name="nama_pmi" value="<?= $edit_cpmi->nama_pmi ?>">
                                            <?= form_error('nama_pmi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class=" form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="L" <?php if ($edit_cpmi->jenis_kelamin == 'L') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Laki-Laki</option>
                                                <option value="P" <?php if ($edit_cpmi->jenis_kelamin == 'P') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                            <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $edit_cpmi->tempat_lahir ?>" name="tempat_lahir">
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="<?= $edit_cpmi->tanggal_lahir ?>" id="tanggal_lahir" name="tanggal_lahir">
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat PMI</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap. . . " name="alamat" rows="2"><?= $edit_cpmi->alamat ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Wilayah/Kota</label>
                                        <div class="col-sm-3">
                                            <select name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <option value="Bangkalan" <?php if ($edit_cpmi->wilayah == 'Bangkalan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Bangkalan</option>
                                                <option value="Banyuwangi" <?php if ($edit_cpmi->wilayah == 'Banyuwangi') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Banyuwangi</option>
                                                <option value="Blitar" <?php if ($edit_cpmi->wilayah == 'Blitar') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Blitar</option>
                                                <option value="Bojonegoro" <?php if ($edit_cpmi->wilayah == 'Bojonegoro') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Bojonegoro</option>
                                                <option value="Bondowoso" <?php if ($edit_cpmi->wilayah == 'Bondowoso') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Bondowoso</option>

                                                <option value="Gresik" <?php if ($edit_cpmi->wilayah == 'Gresik') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Gresik</option>
                                                <option value="Jember" <?php if ($edit_cpmi->wilayah == 'Jember') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Jember</option>

                                                <option value="Jombang" <?php if ($edit_cpmi->wilayah == 'Jombang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Jombang</option>
                                                <option value="Kediri" <?php if ($edit_cpmi->wilayah == 'Kediri') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Kediri</option>

                                                <option value="Kota Batu" <?php if ($edit_cpmi->wilayah == 'Kota Batu') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Batu</option>
                                                <option value="Kota Blitar" <?php if ($edit_cpmi->wilayah == 'Kota Blitar') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Blitar</option>

                                                <option value="Kota Kediri" <?php if ($edit_cpmi->wilayah == 'Kota Kediri') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Kediri</option>
                                                <option value="Kota Madiun" <?php if ($edit_cpmi->wilayah == 'Kota Madiun') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Madiun</option>

                                                <option value="Kota Malang" <?php if ($edit_cpmi->wilayah == 'Kota Malang') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Kota Malang</option>
                                                <option value="Kota Mojokerto" <?php if ($edit_cpmi->wilayah == 'Kota Mojokerto') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Kota Mojokerto</option>

                                                <option value="Kota Pasuruan" <?php if ($edit_cpmi->wilayah == 'Kota Pasuruan') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Kota Pasuruan</option>
                                                <option value="Kota Probolinggo" <?php if ($edit_cpmi->wilayah == 'Kota Probolinggo') {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo '';
                                                                                    } ?>>Kota Probolinggo</option>

                                                <option value="Kota Surabaya" <?php if ($edit_cpmi->wilayah == 'Kota Surabaya') {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>>Kota Surabaya</option>
                                                <option value="Lamongan" <?php if ($edit_cpmi->wilayah == 'Lamongan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Lamongan</option>

                                                <option value="Lumajang" <?php if ($edit_cpmi->wilayah == 'Lumajang') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Lumajang</option>
                                                <option value="Madiun" <?php if ($edit_cpmi->wilayah == 'Madiun') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Madiun</option>

                                                <option value="Magetan" <?php if ($edit_cpmi->wilayah == 'Magetan') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Magetan</option>
                                                <option value="Malang" <?php if ($edit_cpmi->wilayah == 'Malang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Malang</option>

                                                <option value="Mojokerto" <?php if ($edit_cpmi->wilayah == 'Mojokerto') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Mojokerto</option>
                                                <option value="Nganjuk" <?php if ($edit_cpmi->wilayah == 'Nganjuk') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Nganjuk</option>

                                                <option value="Ngawi" <?php if ($edit_cpmi->wilayah == 'Ngawi') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Ngawi</option>
                                                <option value="Pacitan" <?php if ($edit_cpmi->wilayah == 'Pacitan') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Pacitan</option>

                                                <option value="Pamekasan" <?php if ($edit_cpmi->wilayah == 'Pamekasan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Pamekasan</option>
                                                <option value="Pasuruan" <?php if ($edit_cpmi->wilayah == 'Pasuruan') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Pasuruan</option>
                                                <option value="Ponorogo" <?php if ($edit_cpmi->wilayah == 'Ponorogo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Ponorogo</option>

                                                <option value="Probolinggo" <?php if ($edit_cpmi->wilayah == 'Probolinggo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Probolinggo</option>
                                                <option value="Sampang" <?php if ($edit_cpmi->wilayah == 'Sampang') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Sampang</option>

                                                <option value="Sidoarjo" <?php if ($edit_cpmi->wilayah == 'Sidoarjo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Sidoarjo</option>
                                                <option value="Situbondo" <?php if ($edit_cpmi->wilayah == 'Situbondo') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Situbondo</option>

                                                <option value="Sumenep" <?php if ($edit_cpmi->wilayah == 'Sumenep') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Sumenep</option>
                                                <option value="Trenggalek" <?php if ($edit_cpmi->wilayah == 'Trenggalek') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Trenggalek</option>
                                                <option value="Tuban" <?php if ($edit_cpmi->wilayah == 'Tuban') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>Tuban</option>
                                                <option value="Tulungagung" <?php if ($edit_cpmi->wilayah == 'Tulungagung') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>Tulungagung</option>
                                                <option value="Luar Jatim" <?php if ($edit_cpmi->wilayah == 'Luar Jatim') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>*Luar Jatim</option>
                                            </select>
                                            <small id=" lokasiHelp" class="form-text text-muted"> <i> *lokasi wilayah jawa timur </i></small>
                                            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Sektor Jabatan</label>
                                        <div class="col-sm-5">
                                            <select name="jabatan" id="pendidikan" class="form-control">
                                                <option value="FORMAL" <?php if ($edit_cpmi->jabatan == 'FORMAL') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>FORMAL </option>
                                                <option value="INFORMAL" <?php if ($edit_cpmi->jabatan == 'INFORMAL') {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>>INFORMAL </option>
                                            </select>
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Formal</label>
                                        <div class="col-sm-4">
                                            <select name="pendidikan" id="pendidikan" class="form-control">
                                                <option value="SD" <?php if ($edit_cpmi->pendidikan_formal == 'SD') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>SD (Sekolah Dasar)</option>
                                                <option value="SMP" <?php if ($edit_cpmi->pendidikan_formal == 'SMP') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>SMP (Sekolah Menengah Pertama)</option>
                                                <option value="SMA" <?php if ($edit_cpmi->pendidikan_formal == 'SMA') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>SMA/SMU (Sekolah Menengah Atas)</option>
                                                <option value="S1/S2" <?php if ($edit_cpmi->pendidikan_formal == 'S1/S2') {
                                                                            echo 'selected';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>>S1/S2/Insiyur (Strata 1-2)</option>
                                                <option value="-" <?php if ($edit_cpmi->pendidikan_formal == '-') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>>-</option>
                                            </select>
                                            <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="gaji" placeholder="Masukkan Nominal Gaji" name="gaji" value="<?= $edit_cpmi->gaji ?>">
                                            <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paspor" class="col-sm-3 col-form-label">Paspor</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="paspor" placeholder="Nomor Paspor" name="paspor" value="<?= $edit_cpmi->paspor ?>">
                                            <?= form_error('paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="negara_penempatan" class="col-sm-3 col-form-label">Negara Penempatan</label>
                                        <div class="col-sm-4">
                                            <select class="custom-select" name="negara_penempatan" id="negara_penempatan" class="form-control">
                                                <option value="">~ Pilih Negara ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id']; ?>" <?php if ($n['id'] == $edit_cpmi->negara_penempatan) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>> <?= $n['nama_negara']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_pesawat" class="col-sm-3 col-form-label">Kode Pesawat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="kode_pesawat" placeholder="Kode Pesawat" name="kode_pesawat" value="<?= $edit_cpmi->kode_pesawat ?>">
                                            <?= form_error('kode_pesawat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <p> <small> <b>DATA PENGGUNA JASA </b></small></p>
                                    <div class="form-group row">
                                        <label for="pengguna_jasa" class="col-sm-3 col-form-label">Nama Pengguna Jasa</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="pengguna_jasa" placeholder="Masukkan Nama Pengguna Jasa" name="pengguna_jasa" value="<?= $edit_cpmi->pengguna_jasa ?>">
                                            <?= form_error('pengguna_jasa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat_pengguna_jasa" class="col-sm-3 col-form-label">Alamat Pengguna Jasa</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat_pengguna_jasa" placeholder="Alamat Lengkap. . . " name="alamat_pengguna_jasa" rows="2"><?= $edit_cpmi->alamat_pengguna_jasa ?></textarea>
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