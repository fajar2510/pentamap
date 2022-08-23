<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 style="font-family:'Roboto';font-size:15;">Usulan <?= $title; ?> Tahun <?= date('Y'); ?> </h3>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <a href="<?= base_url('reward/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                    <div class="d-sm-flex align-items-center justify-content-end mb-0">


                        <div class="dropdown mb-0">
                            <!-- <a href="#" class="btn btn-info btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
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
                            </> -->
                        </div>

                    </div>
                    
                    <div class="card-body">
                        <div class=" table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="pure-table-odd">
                                        <th rowspan="2"> No</th>
                                        <th rowspan="2" class="text-center">Kabupaten /kota</th>
                                        <th rowspan="2" class="text-center">Nama Perusahaan</th>
                                        <th colspan="3" class="text-center">Disabilitas</th>
                                        <th rowspan="2" class="text-center">Presentase%</th>
                                        <th rowspan="2">Diusulkan pada</th>
                                        <th width="14%" class="text-center" rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th> L</th>
                                        <th>P</th>
                                        <th>Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_reward as $r) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td> <small> <?= $r['nama_kabupaten']; ?></small></td>
                                            <td> <?= $r['nama_perusahaan']; ?></td>
                                            <td><center><?= $r['disabilitas_L']; ?></center>  </td>
                                            <td><center><?= $r['disabilitas_P']; ?></center>  </td>
                                            <td> <center><?= $r['disabilitas_total']; ?></center> </td>
                                            <td> <center><?= $r['presentase']; ?> %</center> </td>
                                            <td> <small> <?= $r['date_created']; ?></small></td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal" data-target="#modalInfo<?= $r['id_reward']; ?>" class="btn btn-sm btn-success">  <i class="fa-solid fa-eye"></i></i></button>
                                                <a href="<?= base_url('reward/edit/') . $r['id_reward']; ?>" class="btn btn-sm btn-warning " > <i class="fa fa-edit"></i></a>
                                                <button type="button" data-toggle="modal" data-target="#modalHapus<?= $r['id_reward']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
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
<?php foreach ($data_reward as $r) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $r['id_reward']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Data Info <?= $title; ?></h5>  <h5><small><i>diusulkan pada &nbsp;<?= $r['date_created']; ?> </i> </small></h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                      
                        <p > <small><b> DATA INDEKS <?= $title; ?></b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Perusahaan </label>
                            <p for="name" class="col-sm-8 col-form-label">: &nbsp; <?= $r['nama_perusahaan']; ?></=>
                        </div>
                      
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Pimpinan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['nama_pimpinan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Alamat </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['alamat']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">No.Telp. Perusahaan </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['kontak']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">E-mail </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['email_perusahaan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Jenis(Skala) </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['jenis_perusahaan']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Sektor </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['nama_sektor']; ?></label>
                        </div>
                        
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Kabupaten/kota </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['nama_kabupaten']; ?></label>
                        </div>

                        <p> <small><b> KONTAK PERSON</b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Nama Kontak Person </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['nama_kontak_person']; ?></label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">No. Kontak Person </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['no_kontak_person']; ?></label>
                        </div>
                        
                        <p> <small><b> DISABILITAS</b></small></p>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Disabilitas </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['disabilitas_L']; ?> Laki-laki ,&nbsp;<?= $r['disabilitas_P']; ?> Perempuan  ,&nbsp; <?= $r['disabilitas_total']; ?> Total</label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Tenaga Kerja Total </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['tenaga_kerja_L']; ?> Laki-laki ,&nbsp;<?= $r['tenaga_kerja_P']; ?> Perempuan  ,&nbsp; <?= $r['tenaga_kerja_total']; ?> Total</label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Presentase Disabilitas </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $r['presentase']; ?> %</label>
                        </div>

                        <!-- GANTI BAGIAN INI SAJA, UPDATE 23-8-2022 -->
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Ragam Disabilitas </label>
                            <label for="name" class="col-sm-8 col-form-label">:  &nbsp; 
                            <?php  
                                $arr_ragam = explode(",", $r['jenis_disabilitas']);
                                $namanya="";
                                $index_buatan=0;
                                $temp="";
                                foreach($arr_ragam as $arr){
                                    $query = "SELECT DISTINCT dis_jenis.ragam_id, dis_ragam.disabilitas_ragam
                                    FROM dis_jenis 
                                    JOIN dis_ragam
                                    ON dis_jenis.ragam_id = dis_ragam.id_ragam 
                                    WHERE id_jenis  = '$arr'";
                    
                                    $arr_result = $this->db->query($query)->result_array();
                                    foreach ($arr_result as $val) {
                                        $index_buatan+=1;
                                    if ($val['disabilitas_ragam'] != $temp ) {
                                        if ($index_buatan == 1) {
                                            $namanya .= "";
                                        }else {
                                            $namanya .= ",&nbsp;";
                                        }
                                        $namanya .= $val['disabilitas_ragam']; 
                                    }
                                    $temp = $val['disabilitas_ragam'];
                                    }
                                 }    
                                 echo $namanya;
                            ?>
                            </label>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">Jenis Disabilitas </label>
                            <label for="name" class="col-sm-8 col-form-label">: &nbsp;
                                <?php  
                                $jenis = explode(",", $r['jenis_disabilitas']);
                                $namanya_jenis="";
                                $index_buatan_jenis=0;
                                foreach($jenis as $arr){
                                    $query = "SELECT DISTINCT dis_jenis.ragam_id, dis_jenis.jenis_disabilitas
                                    FROM dis_jenis 
                                    WHERE id_jenis  = '$arr'";
                    
                                    $arr_result = $this->db->query($query)->result_array();
                                    foreach ($arr_result as $val) {
                                        $index_buatan_jenis+=1;
                                        if ($index_buatan_jenis == 1) {
                                            $namanya_jenis .= "";
                                        }else {
                                            $namanya_jenis .= ",&nbsp;";
                                        }
                                        $namanya_jenis .= $val['jenis_disabilitas']; 
                                    }
                                }
                                echo $namanya_jenis;
                                
                                ?></label>
                        </div>
                        <!-- GANTI BAGIAN INI SAJA, UPDATE 23-8-2022 -->
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


<?php foreach ($tb_reward as $re) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $re['id_reward']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->

                </div>
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="210" height="150">
                    <form action="<?= base_url('reward/hapus/' . $re['id_reward']); ?>">
                        <div class="modal-body">Hapus &nbsp; <b>
                                <font color="black"><?= $re['nama_perusahaan']; ?> &nbsp;?</font>
                           </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>