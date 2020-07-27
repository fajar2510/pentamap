<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('cpmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>

    <!-- parsing data -->
    <?php foreach ($data_taiwan_lk as $taiwan_lk); ?>
    <?php foreach ($data_taiwan_pr as $taiwan_pr); ?>
    <?php foreach ($data_hongkong_lk as $hongkong_lk); ?>
    <?php foreach ($data_hongkong_pr as $hongkong_pr); ?>
    <?php foreach ($data_sin_lk as $sin_lk); ?>
    <?php foreach ($data_sin_pr as $sin_pr); ?>
    <?php foreach ($data_may_lk as $may_lk); ?>
    <?php foreach ($data_may_pr as $may_pr); ?>


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
                            <!-- <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modalImport" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </button> -->
                            <a href="<?= base_url('exportimport/export_pdf_pppmi'); ?>" target="_blank" class="btn btn-danger btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </span>
                                <span class="text">PDF</span>
                            </a>
                            <!-- <a href="<?= base_url('exportimport/export_excel_cpmi'); ?>" target="_blank" class="btn btn-success " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">CSV</span>
                            </a> -->
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th rowspan="2"> NO </th>
                                        <th rowspan="2">NAMA_PPPMI</th>
                                        <th>STATUS</th>
                                        <th colspan="2">TAIWAN</th>
                                        <th colspan="2">HONGKONG</th>
                                        <th colspan="2">SIN</th>
                                        <th colspan="2">MALAYSIA</th>
                                        <th colspan="2">BRUNEI_D.</th>
                                        <th colspan="2">LAINNYA</th>
                                        <th colspan="2">SEKTOR</th>
                                        <th colspan="2">DOMISILI</th>
                                        <th colspan="2">JUMLAH</th>
                                        <th rowspan="2">TOTAL</th>
                                        <!-- <th>&nbsp;Aksi__&nbsp;</th> -->
                                    </tr>
                                    <tr>
                                        <th>(P/C)</th>
                                        <th> L</th>
                                        <th> P</th>
                                        <th> L</th>
                                        <th> P</th>
                                        <th> L</th>
                                        <th> P</th>
                                        <th> L</th>
                                        <th> P</th>
                                        <th> L</th>
                                        <th> P</th>
                                        <th> L</th>
                                        <th> P</th>
                                        <th> Formal</th>
                                        <th> Informal</th>
                                        <th> Jatim</th>
                                        <th> L.Jatim</th>
                                        <th> L</th>
                                        <th> P</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_pppmi as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><small> <?= $p['nama_perusahaan']; ?> </small></td>
                                            <td><small> <?= $p['status']; ?> </small></td>
                                            <td><small> <?= $p['total_lk']; ?> </small></td>
                                            <td><small> <?= $p['total_pr']; ?> </small></td>
                                            <td><small> <?= $p['total_lk']; ?> </small></td>
                                            <td><small> <?= $p['total_pr']; ?> </small></td>
                                            <td><small> <?= $p['total_lk']; ?> </small></td>
                                            <td><small> <?= $p['total_pr']; ?> </small></td>
                                            <td><small> <?= $p['total_lk']; ?> </small></td>
                                            <td><small> <?= $p['total_pr']; ?> </small></td>
                                            <td><small> <?= $p['total_lk']; ?> </small></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td> <small> <?= $p['nama_pmi']; ?> </small> </td>
                                            <td><small> <?= $p['wilayah']; ?> </small> </td>
                                            <td><small> <?= $p['jenis_kelamin']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['nama_perusahaan']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['pengguna_jasa']; ?> </small> </td> -->
                                            <!-- <td><small> <?= $p['negara_penempatan']; ?> </small> </td> -->
                                            <!-- <td> <?php echo $aa->tka + $bb->pmib; ?></td> -->
                                            <!-- <td>
                                                <a href="<?= base_url('exportimport/export_pdf_cpmi/') . $p['perusahaan'] . '/' . $p['negara_penempatan']; ?>" target="_blank" class="btn btn-sm btn-info"> Laporan</i></a>
                                                <a href="<?= base_url('cpmi/edit/') . $p['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class=" btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
                                            </td> -->
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

<!--  <!-- modalhapus -->