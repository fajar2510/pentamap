<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style="color:#5b5b5b;"><?= $title; ?>(Pekerja Migran Indonesia Bermasalah) </h5>
        <!-- <a href="#" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPMI"> -->
        <?php if ($is_admin == 1) { ?>
        <a href="<?= base_url('pmi/tambah/'); ?>" class="btn btn-primary btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <?php } ?>

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
                            <form enctype="multipart/form-data" method="post" action="<?= base_url('pmi'); ?>">
                                <div>
                                    <div class="container">
<!-- 
                                        Rentang Awal: <input id="startDate" width="276" name="tawal">
                                        Rentang Akhir: <input id="endDate" width="276" name="takhir">
                                        <button type="submit" class="btn btn-success btn-icon-split " name="filter" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-filter"></i>
                                            </span>
                                            <span class="text">Filter</span>
                                        </button> -->
                            </form>
                        </div>
                        <div class="dropdown mb-0">
                            <span style="margin:10px;"> 
                                    <button class="btn btn-info btn-icon-split" type="button" data-toggle="modal" data-target="#modalfilterpmib" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-print"></i>
                                        </span>
                                    <span class="text" style = "font-family:roboto; ">Cetak Daftar Hadir</span>
                                    </button>
                            </span>
                            <!-- <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Excel.csv</a>
                                <a class="dropdown-item" href="#">PDF.pdf</a>
                            </div> -->
                        </div>
                        <div class="modal fade" id="modalfilterpmib" tabindex="-1" role="dialog" aria-labelledby="modalfilterpmib" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Filter Cetak PMI Bermasalah</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <form action="<?= base_url('exportimport/pmi_negara/')?>" target="_blank" method="POST">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="tahun" class="d-none d-sm-inline-block p-2" style="font-weight:bold; font-family:roboto;"> Bulan</label>
                                                    <label for="tahun" class="d-none d-sm-inline-block p-2" style="font-weight:bold; font-family:roboto;"> Negara</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input style="margin:10px; font-family:roboto;" readonly name="tahun" id="tahun_bulan" class="form-control p-2 " type="text" value="<?= date('Y-m'); ?>">
                                                    <select style="margin:10px; font-family:roboto;" name="negara" id="" class="form-control" required>
                                                        <option value="">- Pilih Negara -</option>
                                                        <?php foreach ($negara as $v) { ?>
                                                            <option value="<?php echo $v->id_negara ?>"><?php echo $v->nama_negara ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <span style="margin:10px;"> 
                                                            <button class="btn btn-info btn-icon-split" type="submit" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                                                <span class="icon text-white-50">
                                                                    <i class="fa-solid fa-print"></i>
                                                                </span>
                                                            <span class="text" style = "font-family:roboto; ">Cetak</span>
                                                            </button>
                                                    </span>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="dropdown mb-0">
                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#modalImport" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">Import</span>
                            </button>

                            <a href="<?= base_url('exportimport/export_pdf_pmi/'); ?>" target="_blank" class=" btn btn-danger " class=" d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">PDF</span>
                            </a>
                            <a href="<?= base_url('exportimport/export_excel_pmi'); ?> " target="_blank" class="btn btn-success " class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">CSV</span>
                            </a>
                        </div> -->
            </div>
            <div class="card-body">
                <div class="table table-sm">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead align="center">
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Kab/kota</th>
                                <th>Negara Bekerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pmi as $p) : ?>
                                <tr>
                                    <!-- <td align="center"><?= $i; ?></td> -->
                                    <th scope="row"><small><center>  <?= $i; ?></center></small> </th>
                                    <td><small><?= $p['date_created']; ?></small> </td>

                                    <!-- <td><img src="<?= base_url('assets/img/pmi/') . $p['image']; ?>" alt="Profil" width="60" height="60"></td> -->
                                    <td><?= $p['nama']; ?> <sup>
                                            (<?php $lahir    = new DateTime($p['tgl_lahir']);
                                                $today        = new DateTime();
                                                $umur = $today->diff($lahir);
                                                echo $umur->y;
                                                // echo " Tahun, ";
                                                // echo $umur->m;
                                                // echo " Bulan, dan ";
                                                // echo $umur->d;
                                                // echo " Hari";
                                                ?>)th</sup> </td>
                                    <td ><small> <?= $p['nama_kabupaten']; ?></small></td>
                                    <td align="center"><?= $p['nama_negara']; ?>
                                    <img src="<?= base_url('assets/img/img-country-flag/') . $p['flag']; ?>"  class="img-fluid img-thumbnail" alt="Bendera" style="width: 100;" >
                                    </td>
                                    <td align="center">
                                        <?php if ($is_admin == 1) { ?>
                                            <a href="<?= base_url('exportimport/export_pdf_kwitansi/') . $p['id']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa-solid fa-clipboard"></i> Kwitansi</a>
                                        <?php } ?>
                                            <button type="button" class="btn btn-light px-1" data-toggle="modal" data-target="#modalInfo<?= $p['id']; ?>" class="btn btn-sm btn-success">  <i class="fa-solid fa-eye"></i></i></button>
                                        <?php if ($is_admin == 1) { ?>
                                            <a class="btn btn-sm btn-warning" href="<?= base_url('pmi/edit_pmi/'). $p['id']; ?>" class="btn btn-sm btn-warning " > <i class="fa fa-edit btn btn-sm btn-warning"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt btn btn-sm btn-danger"></i></button>
                                        <?php } ?>
                                    </td>
                                        
                                        
                                        <!-- <div class="btn-group"> -->
                                       
                                        <!-- <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu "> -->
                                            <!-- <a class="dropdown-item btn btn-sm btn-secondary" href="<?= base_url('exportimport/pmi_negara/') . $p['negara_bekerja'] . '/' . $p['date_created']; ?>" target="_blank" class="btn btn-sm btn-secondary">  <i class="fa fa-book btn-sm btn-secondary" aria-hidden="true"></i> Laporan</a> -->
                                           
                                            <!-- <div class="dropdown-divider"></div> -->
                                            
                                       <!-- </div> -->

                                        <!-- <a href=" <?= base_url('exportimport/pmi_negara/') . $p['negara_bekerja'] . '/' . $p['date_created']; ?>" target="_blank" class="btn btn-sm btn-light  "> lap. <i class="fa fa-book" aria-hidden="true"></i></i></a>
                                        <a href="<?= base_url('exportimport/export_pdf_kwitansi/') . $p['id']; ?>" target="_blank" class="btn btn-sm btn-light"> nota<i class="fa-solid fa-receipt"></i></a>
                                        <button type="button" data-toggle="modal" data-target="#modalInfo<?= $p['id']; ?>" class="btn btn-sm btn-success">  <i class="fa-solid fa-eye"></i></i></button>
                                        <a href="<?= base_url('pmi/edit/') . $p['id']; ?>" class="btn btn-sm btn-warning "> <i class="fa fa-edit"></i></a>
                                        <button type=" button" data-toggle="modal" data-target="#modalHapus<?= $p['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button> -->
                                   
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


<?php foreach ($pmi as $p) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapus<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Apakah kamu yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <center>
                    <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="170" height="150">
                    <form action="<?= base_url('pmi/deletePmi/' . $p['id']); ?>">
                        <div class="modal-body">Data&nbsp; <b>
                                <font color="red"><?= $p['nama']; ?> <sup>
                                        (<?php $lahir    = new DateTime($p['tgl_lahir']);
                                            $today        = new DateTime();
                                            $umur = $today->diff($lahir);
                                            echo $umur->y;
                                            // echo " Tahun, ";
                                            // echo $umur->m;
                                            // echo " Bulan, dan ";
                                            // echo $umur->d;
                                            // echo " Hari";
                                            ?>)th</sup></font>
                            </b> akan dihapus ! </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value=<?= $p['id']; ?>>
                            <button class="btn btn-secondary" type="button" id="btn-ok" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- end main -->

<!-- Button trigger modal -->

<!-- penampil view info data -->
<?php foreach ($pmi as $p) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalInfo<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Rincian Data Info <?= $title; ?></h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-sm-8">
                                <p > <small><b> DATA <?= $title; ?> </b></small></p>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Nama </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <strong><?= $p['nama']; ?></strong> </label> 
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Jenis Kelamin </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?php if ($p['gender'] == 'L') {
                                                            echo 'Laki-laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        } ?> &nbsp; (&nbsp;<?= $p['gender']; ?>&nbsp;)</label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['tgl_lahir']; ?> 
                                            <strong>(<?php $lahir    = new DateTime($p['tgl_lahir']);
                                                $today        = new DateTime();
                                                $umur = $today->diff($lahir);
                                                echo  $umur->y ;
                                                // echo " Tahun, ";
                                                // echo $umur->m;
                                                // echo " Bulan, dan ";
                                                // echo $umur->d;
                                                // echo " Hari";
                                                ?>) tahun</strong></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Kabupaten/kota</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_kabupaten']; ?></label>
                                    
                                </div>
                                <!-- <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label"></label>
                                    <label for="name" class="col-sm-8 col-form-label">: <small>&nbsp;<?= $p['nama_kelurahan']; ?>, &nbsp;<?= $p['nama_kecamatan']; ?>,
                                                                &nbsp;<?= $p['nama_kabupaten']; ?>, &nbsp;<?= $p['nama_provinsi']; ?> </small> </label>
                                </div> -->
                                
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Negara Bekerja</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['nama_negara']; ?>
                                            <img src="<?= base_url('assets/img/img-country-flag/') . $p['flag']; ?>"  class="img-fluid img-thumbnail" alt="Bendera" style="width: 100;" >
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Jenis Pekerjaan</label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['jenis_pekerjaan']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Berangkat melalui  </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['berangkat_melalui']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Pengirim </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['pengirim']; ?></label>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Lama bekerja </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp;<?= $p['lama_bekerja']; ?> tahun</label>
                                </div>
                                <!-- <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Status Aktif </label>
                                    <label for="name" class="col-sm-8 col-form-label">: &nbsp; <?php if ($p['is_active'] == '1') {
                                                            echo '<i class="fa-solid fa-toggle-on color-1"></i>  Aktif ' ;
                                                        } else {
                                                            echo '<i class="fa-light fa-toggle-off"></i>  Nonaktif ';
                                                        } ?></label>
                                </div> -->
                            </div>
                            <div class="col">
                                <!-- <p > <small><b> <br> </b></small></p> -->
                                <td width="35%" rowspan="5"> 
                                    <?php if ($p['image'] != null) { ?>
                                            <center><img src="<?= base_url("assets/img/pmi/") . $p['image'] ?> "alt="profile" class=" img-responsive" style="width: 130px; height: 180px; object-fit: cover;"></center>
                                    <?php }else{ ?>
                                            <center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class=" img-responsive" style="width: 130px; height: 180px; object-fit: cover;"></center><?php } ?>
                                
                                <p class="text-center" ><small> Foto. &nbsp; <strong> <?= $p['nama']; ?></strong></small></p>
                            </div>
                        </div>
                        
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


<!-- Modal -->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Berkas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?= form_open_multipart('exportimport/import_data_pmi') ?>
                    <div class="form-group column">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="importexcel" name="importexcel" accept=".xlsx, .xls" aria-describedby="uploadHelp">
                            <label class="custom-file-label" for="image">Pilih Berkas</label>
                            <small id="uploadHelp" class="form-text text-muted"> <i>
                                    <font color="orange">file format hanya .xls .xlsx (pilih dokumen excel anda terlebih dahulu!!) </font>
                                </i></small>
                        </div>
                        <hr>
                        <center>
                            <button type="submit" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="text">IMPORT</span>
                            </button>
                        </center>
                        <!-- <div class="col">
                            <b><?= $this->session->flashdata('message'); ?></b>
                        </div> -->
                    </div>
                    <?= form_close();  ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>