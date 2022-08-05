<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('phk'); ?>" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <form action="<?= base_url('phk/tambah'); ?>" method="post">
                                <div class="modal-body"> 

                                    <p> <small><b> DATA INDEKS PERUSAHAAN</b></small></p>
                                    <div class="form-group row">
                                        <label for="nama_tk" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nama_tk" placeholder="Masukkan Nama PT" name="nama_tk" ">
                                            <?= form_error('nama_tk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="wilayah" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-4">
                                            <select name="wilayah" id="wilayah" class="form-control">
                                                <option value="">~ Pilih Kabupaten/kota ~</option>
                                                <?php foreach ($kabupaten as $row) : ?>
                                                    <option value="<?= $row['id_kabupaten']; ?>"> <?= $row['nama_kabupaten']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            
                                        </div>
                                        <div>
                                        <small id="help2" class="form-text text-muted"> <i> *provinsi jawa timur </i></small>
                                            <?= form_error('wilayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="nama_pimpinan" class="col-sm-3 col-form-label">Nama Pimpinan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="nama_pimpinan" placeholder="" name="nama_pimpinan">
                                            <?= form_error('nama_pimpinan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="nama_konta_person" class="col-sm-3 col-form-label">Nama Kontak Person</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  id="nama_konta_person" placeholder="" name="nama_konta_person">
                                            <?= form_error('nama_konta_person', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <label for="no_kontak_person" class="col-sm-1 col-form-label">No.Telp.</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="no_kontak_person" placeholder="" name="no_kontak_person">
                                            <?= form_error('no_kontak_person', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" placeholder="alamat lengkap . . ." name="alamat" rows="2"></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="no_perusahaan" class="col-sm-3 col-form-label">No.Telp. Perusahaan</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" aria-describedby="uploadHelp1" id="no_perusahaan" placeholder="" name="no_perusahaan">
                                            <?= form_error('no_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email Perusahaan</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="email" aria-describedby="uploadHelp1" placeholder="E-mail Perusahaan . . ." name="email" r>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="jenis_perusahaan" class="col-sm-3 col-form-label">Jenis</label>
                                        <div class="col-sm-2">
                                            <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control">
                                                <option value="Kecil">Kecil</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Besar">Besar</option>
                                                <option value="Besar(BUMN)">Besar(BUMN)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sektor_perusahaan" class="col-sm-3 col-form-label">Sektor</label>
                                        <div class="col-sm-5">
                                        <select name="fungsi" id="fungsi" class="form-control">
                                                <option value="">~ Pilih Jenis Sektor Usaha ~</option>
                                                <?php foreach ($jenis_sektor_usaha as $row) : ?>
                                                    <option value="<?= $row['id_sektor']; ?>"> <?= $row['nama_sektor']; ?> &nbsp; <p><small><i><?= $row['keterangan']; ?> </i></small></p></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('sektor_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <p><small><b>DISABILITAS</b></small></p>

                                    <div class="form-group row">
                                        <label for="ragam_disabilitas" class="col-sm-3 col-form-label">Ragam Disabilitas</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="ragam_disabilitas" placeholder="ragam_disabilitas . . ." name="ragam_disabilitas">
                                            <?= form_error('ragam_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_disabilitas" class="col-sm-3 col-form-label">Jenis Disabilitas</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="jenis_disabilitas" placeholder="jenis_disabilitas . . ." name="jenis_disabilitas">
                                            <?= form_error('jenis_disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div   div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Tambahkan</span>
                                        </button>
                                    </div>
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