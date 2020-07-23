<!-- Begin Page Content -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.css') ?>" /> -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 style="font-family:'Roboto';font-size:12;">&nbsp;&nbsp; <i> <?= $title; ?> <?= date('Y'); ?></i></h4>
        <a href="<?= base_url('tka/'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <form action="<?= base_url('tka/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label ">Nama </small></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                        <label for="negara" class="col-sm-3 col-form-label ">Kewarganegaraan </small></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="negara" placeholder="Masukkan Nama Negara" name="negara">
                                            <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label for="negara" class="col-sm-3 col-form-label">Kewarganegeraan</label>
                                        <div class="col-sm-4">
                                            <select name="negara" id="negara" class="form-control">
                                                <option value="">~ Pilih Kewarganegeraan ~</option>
                                                <?php foreach ($negara as $n) : ?>
                                                    <option value="<?= $n['id']; ?>"> <?= $n['country_name']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="nama_perusahaan" class="col-sm-3 col-form-label"> Perusahaan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nama_perusahaan" placeholder="Masukkan Nama PT/Perusahaan" name="nama_perusahaan" value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value=""> ~ Pilih Status ~ </option>
                                                <option value="P"> Pusat </option>
                                                <option value="C"> Cabang </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="Jln. No. . . " name="alamat" rows="3"></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="perusahaan" class="col-sm-3 col-form-label">Perusahaan</label>
                                        <div class="col-sm-4">
                                            <select name="perusahaan" id="perusahaan" class="form-control">
                                                <option value="">~ Pilih Perusahaan ~</option>
                                                <?php foreach ($perusahaan as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"> <?= $p['nama_perusahaan']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="jabatan" placeholder="" name="jabatan" value="">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sektor" class="col-sm-3 col-form-label">Sektor</label>
                                        <div class="col-sm-3">
                                            <select name="sektor" id="sektor" class="form-control">
                                                <option value="">~ Pilih Sektor ~</option>
                                                <option value="Formal"> FORMAL</option>
                                                <option value="Informal"> INFORMAL</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_rptka" class="col-sm-3 col-form-label">NO. RPTKA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="no_rptka" placeholder="" name="no_rptka">
                                            <?= form_error('no_rptka', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="2020-07-31" id="masa_rptka" name="masa_rptka">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_imta" class="col-sm-3 col-form-label">NO. IMTA / *masa berlaku</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="no_imta" placeholder="" name="no_imta">
                                            <?= form_error('no_imta', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="date" value="2020-07-31" id="masa_imta" name="masa_imta">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Kerja</label>
                                        <div class="col-sm-4">
                                            <select name="lokasi" id="lokasi" class="form-control" aria-describedby="lokasiHelp">
                                                <option value="">~ Pilih Lokasi Kerja ~</option>
                                                <?php foreach ($jatim as $j) : ?>
                                                    <option value="<?= $j['id_kabupaten']; ?>"> <?= $j['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                                <option value="LUAR JATIM">*LUAR JATIM</option>
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
                                        <span class="text">Tambah Data</span>
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