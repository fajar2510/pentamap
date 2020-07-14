<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('pmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
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
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">

                            <a href="#" class="btn btn-success btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-filter"></i>
                                </span>
                                <span class="text">Filter</span>
                            </a>
                            <div>
                                <div class="container">
                                    Rentang Awal: <input id="startDate" width="276" />
                                    Rentang Akhir: <input id="endDate" width="276" />
                                </div>
                                <!-- <span>
                                    <div class="form-group row">
                                        <label for="ren_awal" class="col-4 col-form-label">
                                            <h6 class="m-0 font-weight-bold text-primary text-left"> Rentang Awal</h6>
                                        </label>
                                        <input class="form-control" type="date" value="2018-08-19" id="ren_awal" name="ren_awal">
                                    </div>
                                </span>
                            </div>
                            <div>
                                <span>
                                    <div class="form-group row">
                                        <label for="ren_akhir" class="col-4 col-form-label">
                                            <h6 class="m-0 font-weight-bold text-primary text-left"> Rentang Akhir</h6>
                                        </label>
                                        <input class="form-control" type="date" value="2018-08-19" id="ren_akhir" name="ren_akhir">
                                    </div>
                                </span> -->
                            </div>



                        </div>


                        <div class="dropdown mb-0">
                            <a href="#" class="btn btn-info btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </a>
                            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Eksport</span>
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Excel</a>
                                <a class="dropdown-item" href="#">PDF</a>
                            </div>
                            </>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr align="center">

                                        <td colspan="9" align="center">
                                            <center><b>
                                                    DATA PEMULANGAN PEKERJA MIGRAN INDONESIA (PMI-B)
                                                </b>
                                                <center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="4%" rowspan="2"> No</th>
                                        <th width="6%" rowspan="2">Tanggal</th>
                                        <th width="11%" rowspan="2">Nama</th>

                                        <th colspan="3">Alamat</th>
                                        <th width="8%" scope="col" rowspan="2">Negara Bekerja</th>
                                        <th width="8%" scope="col" rowspan="2">Status</th>
                                        <th width="9%" scope="col" rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th width="8%" rowspan="2">Desa</th>
                                        <th width="8%" rowspan="2">Kecamatan</th>
                                        <th width="9%" rowspan="2">Kabupaten</th>

                                    </tr>


                                </thead>
                                <tbody align="center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($pmi as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <!-- <td><img src="<?= base_url('assets/img/pmi/') . $p['image']; ?>" alt="" width="60" height="60"></td> -->
                                            <td> <small><?= $p['date_created']; ?></small>
                                            </td>
                                            <td><?= $p['nama']; ?>
                                            </td>

                                            <td><?= $p['desa']; ?></td>
                                            <td><?= $p['kecamatan']; ?></td>
                                            <td> <small><?= $p['kabupaten']; ?> </small> </td>
                                            <td><?= $p['negara_bekerja']; ?></td>
                                            <td> <small><?= $p['status']; ?> </small> </td>
                                            <td>
                                                <a href="<?= base_url('pmi/edit/') . $p['id']; ?>"  class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                                <button type="button" data-toggle="modal" data-target="#modalUnduht" class="btn btn-sm btn-success"> <i class="fas fa-file-download"></i></i></button>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id="<?= $p['id']; ?>"> <i class="fa fa-trash-alt"></i></button>

                                                <!-- <a class="badge badge-warning fas fa-ban" href="<?= base_url('datamaster/editUser/' . $p['id']); ?>">&nbsp;edit</a>
                                <a class="badge badge-danger fas fa-trash-alt" href="<?= base_url('datamaster/deleteUser/' . $p['id']); ?>" onclick="return confirm('Are you sure ?')">&nbsp;delete</a> -->
                                                <!-- <a class="badge badge-danger" href="<?= base_url('datamaster/deleteUser'); ?>" onclick="hapusModal('$p['id']')" data-toggle="modal" data-target="#hapusModal">
                                    Hapus pake modal
                                </a> -->
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- modal tambah -->
<div class=" modal fade" id="tambahPMI" tabindex="-1" role="dialog" aria-labelledby="newUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Tambah Data PMI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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

                        <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                            <span class="icon text-gray-600">
                                <i class="fas fa-window-close"></i>
                            </span>
                            <span class="text">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambahkan</span>
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




<!-- modalhapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data akan dihapus secara permanen </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?= base_url('pmi/deletePmi/' . $p['id']); ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>