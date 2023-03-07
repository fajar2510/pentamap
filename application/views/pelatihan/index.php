<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style="font-family:'Roboto';">Data Serapan <?= $title; ?> Tahun <?= date('Y'); ?> </h3>
        

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
                    <div class="d-sm-flex align-items-center justify-content-start mb-0">
                        <div class="dropdown mb-0">
                        <!-- <form action="<?= base_url('exportimport/reward_perusahaan')?>" target="_blank" method="POST">
                            <div class="d-flex flex-row " >
                            <label for="tahun" class="d-none d-sm-inline-block p-2" style="margin:10px; font-weight:bold; font-family:roboto;"> Tahun:</label>
                            <input style="margin:10px; font-family:roboto;" readonly name="tahun" id="tahun" class="form-control p-2 " type="text" value="<?= date('Y'); ?>">
                               <span style="margin:10px;"> 
                                    <button class="btn btn-info btn-icon-split" type="submit" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-print"></i>
                                        </span>
                                    <span class="text" style = "font-family:roboto; ">Print</span>
                                    </button>
                             </span>
                             </div>
                             </form> -->
                            <!-- <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Excel.csv</a>
                                <a class="dropdown-item" href="#">PDF.pdf</a>
                            </div> -->
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table table-sm">
                            <table data-page-length="-1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="pure-table-odd">
                                        <th > No</th>
                                        <th  class="text-center">Nama UPT</th>
                                        <th  class="text-center">Cakupan</th>
                                        <th  class="text-center">Lokasi</th>
                                        <th  class="text-center">%Dana</th>
                                        <th  class="text-center">%non-kerja</th>
                                        <th width="" class="text-center" >Aksi</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_pelatihan as $lat) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td> <small> <?= $lat['nama_upt']; ?> </small></td>
                                            <td> <small> <?= $lat['ket_upt']; ?> </small></td>
                                            <td> <small> <?= $lat['nama_kabupaten']; ?></small></td>
                                            <td> <small> <span class="badge badge-pill badge-warning" style="font-size:15px; font-family:Arial; color:black;">
                                            <?php if ($lat[3]['percent2'] != null) { echo round($lat[3]['percent2'],2)."%"; } else { echo "no-data"; }  ?></span></small></td>
                                            <td> <small>
                                           <strong> <?= round($lat[0]['percent'],2)."%"; ?></strong> <i class="fa-solid fa-arrow-right"> </i> 
                                            <span class="badge badge-pill badge-success" style="font-size:12px; color:white;">
                                             <?= $lat[2]['jumlah_pengurang_upt']; ?> /
                                             <?= $lat[1]['jumlah_total_upt']; ?></span> orang</i></small></td>
                                            <td class="text-center">  
                                                <button type="button" data-toggle="modal" data-target="#modalInfo<?= $lat['id_kabupaten']; ?>" class="btn btn-sm btn-light">  <i class="fa-solid fa-eye"></i></button>
                                                <!-- <?php if ($is_admin == 1) { ?>
                                                    <button type="button" data-toggle="modal" data-target="#modalPrint<?= $lat['id_upt']; ?>" class="btn btn-sm btn-success"> Ajukan <i class="fa fa-paper-plane"></i></button>
                                                <?php } ?> -->

                                               
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
</div>
<!-- End of Main Content -->

<!-- penampil view info data -->
<?php foreach ($data_pelatihan as $lat) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $lat['id_kabupaten']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info <?= $title; ?></h5>  <h5><small><i>rekomendasi lokasi pelatihan</i> </small></h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                      
                        <p > <small><b> DATA UPT <?= $title; ?></b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama UPT </label>
                            <p for="name" class="col-sm-8 col-form-label">: &nbsp; <strong><?= $lat['nama_upt']; ?></strong> </=>
                        </div>
                      
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Kabupaten/kota </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $lat['nama_kabupaten']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Cakupan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $lat['ket_upt']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Latitude</label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<em><?= $lat['lat_upt']; ?></em> </label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Longitude</label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<em><?= $lat['long_upt']; ?></em> </label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">%non-kerja</label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<strong><?php if ($lat[0]['percent'] != null) { echo round($lat[0]['percent'],2)."%"; } else { echo "no-data"; }  ?></strong> 
                                <i class="fa-solid fa-arrow-right"> </i> 
                                <span class="badge badge-pill badge-success" style="font-size:12px; color:white;">
                                    <?= $lat[2]['jumlah_pengurang_upt']; ?> /
                                    <?= $lat[1]['jumlah_total_upt']; ?>
                                </span> orang
                                </i>
                            </label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">%Dana Alokasi</label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp; <span class="badge badge-pill badge-warning" style="font-size:15px; font-family:Arial; color:black;"><?php if ($lat[3]['percent2'] != null) { echo round($lat[3]['percent2'],2)."%"; } else { echo "no-data"; }  ?></span> </label>
                        </div>
                        <!-- <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Riwayat Pelatihan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;</label>
                        </div> -->
                        
                        
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-600">
                            <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?> 




