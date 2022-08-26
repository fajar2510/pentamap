<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;"><?= $title; ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <!-- <a href="<?= base_url('cpmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a> -->
        
        
    </div>

    <!-- parsing data -->



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>


            <div class="card shadow mb-0">
                <div class="card-header py-1 ">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <form action="<?= base_url('exportimport/export_pdf_pppmi') ?>" method="post" target="_blank">
                                <div class="dropdown mb-0">
                                    <div class="d-flex flex-row " >
                                    <label for="bulan" class="d-none d-sm-inline-block p-2" style="margin:10px; font-weight:bold; font-family:roboto;"> Bulan:</label>
                                    <input style="margin:10px; font-family:roboto;" name="bulan" id="bulan" class="form-control p-2 " type="month" value= "<?= date('Y-m'); ?>">
                                    <span style="margin:10px;"> 
                                            <button class="btn btn-danger btn-icon-split" type="button" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon text-white-50">
                                                    <i class="fa-solid fa-print"></i>
                                                </span>
                                            <span class="text" style = "font-family:roboto; ">Print</span>
                                            </button>
                                    </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="dropdown mb-0"> -->

                                
                             <!-- <a href="<?= base_url('exportimport/export_excel_cpmi'); ?>" target="_blank" class="btn btn-success " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">CSV</span>
                            </a>                    -->
                            <!-- <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modalImport" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </button> 
                             <a href="<?= base_url('exportimport/export_pdf_pppmi'); ?>" target="_blank" class="btn btn-danger btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </span>
                                <span class="text">PDF</span>
                            </a>  -->
                           
                        <!-- </div> -->

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th rowspan="2"> NO </th>
                                        <th rowspan="2">NAMA_PPPMI__</th>
                                        <th>STATUS</th>
                                        <th colspan="2">TAIWAN</th>
                                        <th colspan="2">HONGKONG</th>
                                        <th colspan="2">SING</th>
                                        <th colspan="2">MALAYSIA</th>
                                        <th colspan="2">BRUNEI_D.</th>
                                        <th colspan="2">LAINNYA</th>
                                        <th colspan="2">SEKTOR</th>
                                        <th colspan="2">DOMISILI</th>
                                        <th colspan="2">JUMLAH</th>
                                        <th rowspan="2">TOTAL</th>
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
                                    <?php foreach ($data_an as $pp) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td align="left"> <small><?= $pp->nama_perusahaan; ?></small> </td>
                                            <td><?= $pp->status; ?></td>
                                            <td><?= $pp->lt; ?></td>
                                            <td><?= $pp->pt; ?></td>
                                            <td><?= $pp->lh; ?></td>
                                            <td><?= $pp->ph; ?></td>
                                            <td><?= $pp->ls; ?></td>
                                            <td><?= $pp->ps; ?></td>
                                            <td><?= $pp->lm; ?></td>
                                            <td><?= $pp->pm; ?></td>
                                            <td><?= $pp->lb; ?></td>
                                            <td><?= $pp->pb; ?></td>
                                            <td><?= $pp->ll; ?></td>
                                            <td><?= $pp->lp; ?></td>
                                            <td><?= $pp->formal; ?></td>
                                            <td><?= $pp->informal; ?></td>
                                            <td><?= $pp->ljatim; ?></td>
                                            <td><?= $pp->jatim; ?></td>
                                            <td><?= $pp->lta; ?></td>
                                            <td><?= $pp->pta; ?></td>
                                            <td><?= $pp->total; ?></td>

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