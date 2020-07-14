<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('perusahaan/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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

                                        <td colspan="12" align="center">
                                            <center><b>
                                                    DATA TKA per Perusahaan
                                                </b>
                                                <center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th rowspan="3"> No</th>
                                        <th rowspan="3">Nama Perusahaan</th>
                                        <th rowspan="3">Alamat Perusahaan </th>

                                        <th colspan="9">Data TKA (Tenaga Kerja Asing)</th>
                                        <th width="15%" scope="col" rowspan="3">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th width="5%" rowspan="2">Nama TKA</th>
                                        <th width="5%" rowspan="2">Negara</th>
                                        <th width="5%" rowspan="2">Jenis Kelamin</th>
                                        <th width="5%" rowspan="2">Jabatan</th>
                                        <th width="5%" rowspan="2">No. RPTKA</th>
                                        <th width="5%" rowspan="2">Masa Berlaku (RPTKA)</th>
                                        <th width="5%" rowspan="2">No. IMTA</th>
                                        <th width="5%" rowspan="2">Masa Berlaku (IMTA)</th>
                                        <th width="5%" rowspan="2">Lokasi Kerja</th>
                                    </tr>

                                </thead>
                                <tbody align="center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($tb_tka as $t) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td> <?= $t['nama_perusahaan']; ?>
                                            <td><?= $t['alamat']; ?></td>
                                            <td> <?= $t['nama_tka']; ?> </td>
                                            <td><?= $t['kewarganegaraan']; ?></td>
                                            <td>
                                                <?php if ($t['jenis_kel'] == 'L') {
                                                    echo 'Laki-Laki';
                                                } else {
                                                    echo 'Perempuan';
                                                } ?>
                                            </td>
                                            <td> <?= $t['jabatan']; ?> </td>
                                            <td> <?= $t['no_rptka']; ?> </td>
                                            <td> <?= $t['masa_rptka']; ?> </td>
                                            <td><?= $t['no_imta']; ?></td>
                                            <td> <?= $t['masa_imta']; ?> </td>
                                            <td> <?= $t['lokasi_kerja']; ?> </td>
                                            <td>
                                                <!-- <button type="button" data-toggle="modal" data-target="#modalPrint" class="btn btn-sm btn-info"> <i class="fa fa-print"></i></button> -->
                                                <button type="button" data-toggle="modal" data-target="#modaledit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                                <button type="button" data-toggle="modal" data-target="#modalUnduht" class="btn btn-sm btn-success"> <i class="fas fa-file-download"></i></i></button>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id="<?= $t['id']; ?>"> <i class="fa fa-trash-alt"></i></button>

                                                <!-- <a class="badge badge-warning fas fa-ban" href="<?= base_url('datamaster/editUser/' . $t['id']); ?>">&nbsp;edit</a>
                                <a class="badge badge-danger fas fa-trash-alt" href="<?= base_url('datamaster/deleteUser/' . $t['id']); ?>" onclick="return confirm('Are you sure ?')">&nbsp;delete</a> -->
                                                <!-- <a class="badge badge-danger" href="<?= base_url('datamaster/deleteUser'); ?>" onclick="hapusModal('$t['id']')" data-toggle="modal" data-target="#hapusModal">
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
                <a class="btn btn-danger" href="<?= base_url('pmi/deletePmi/' . $t['id']); ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>