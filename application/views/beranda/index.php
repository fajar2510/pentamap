<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <!-- Page Heading -->
        <!-- disini cadangan title -->
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- data dashboard -->
    <?php foreach ($tka as $total_tka); ?>
    <?php foreach ($pmib as $total_pmib); ?>
    <?php foreach ($cpmi as $total_cpmi); ?>
    <?php foreach ($phk as $total_phk); ?>

    <!-- Content Row -->

    <!-- <div class="row card">
        <div class="col-md-12">
        <h6>  &nbsp; <b> <?= $title; ?> Provinsi Jawa Timur <span id="tahun_peta"><?= date('Y'); ?></span></h1>
            
        </div>
        
        <div class="col-md-12">
            <select class="form-control" id="tahun_pilih" name="tahun">
                <option value="all">-Pilih Tahun-</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>
        </div>
    </div> -->

  

    <?= $this->session->flashdata('message'); ?>
    <!-- <hr> -->

    <div class=" row">
        <div class="col-md-12">
            <!-- <h5 style="padding-bottom:10;">  &nbsp; <?= $title; ?> Provinsi Jawa Timur <span id="tahun_peta"><?= date('Y'); ?></span></h5> -->
            <!-- <div>
                <hr>
                <p> <b> Petunjuk :</b></p>
                <ul>
                    <li>
                        <i>
                            1. Klik Ikon yang mewakili wilayah atau kabupaten kota provinsi Jawa Timur
                        </i>
                    </li>
                    <li>
                        <i>
                            2. Geser ,Zoom out/Zoom in untuk memberikan pandangan yang lebih baik
                        </i>
                    </li>
                    <li>
                        <i>
                            3. Setiap wilayah di Jawa Timur akan menampilkan data jumlah PMI, PMI-B, TKA, dan Tenga Kerja ter-PHK
                        </i>
                    </li>
                </ul>
            </div> -->

            <div id="mapp"></div>
            
            <hr style="margin-top: 100; margin-bottom: 60 ;">

            <div class="row" id="diagram">
                <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="pie_chart"></div>
                </figure>
                </div>
                <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="spline_chart"></div>
                </figure>
                </div>
            </div>


            <!-- <div id="legenda">
                <svg height="25" width="100%">
                    <line x1="10" y1="10" x2="40" y2="10" style="stroke:peru; stroke-width:2;"/>
                    <text x="59" y="15" style="font-family:sans-serif; font-size=16px;">
                        Garis Batas Wilayah Jawa Timur
                    </text>]
                </svg>
                <svg height="25" width="100%">
                      <circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#D61C4E" opacity="70%"/> 
                     <text x="60" y="15" style="font-family:roboto; font-size=16px;">
                        Tenaga Kerja ter-PHK
                    </text>
                </svg> 
                <svg height="25" width="100%">
                      <circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#FEDB39" opacity="70%"/> 
                     <text x="60" y="15" style="font-family:roboto; font-size=16px;">
                        PMI Bermasalah (PMIB)
                    </text>
                </svg> 
                <svg height="25" width="100%">
                      <circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#0096FF" opacity="70%"/> 
                     <text x="60" y="15" style="font-family:roboto; font-size=16px;">
                        Calon Pekerja Migran Indonesia (CPMI)
                    </text>
                </svg> 
                <svg height="25" width="100%">
                      <circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="green" opacity="70%"/> 
                     <text x="60" y="15" style="font-family:roboto; font-size=16px;">
                        Tenaga Kerja Asing (TKA)
                    </text>
                </svg> 
                <svg height="25" width="100%">
                      <circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#3CCF4E opacity="70%"/> 
                     <text x="60" y="15" style="font-family:roboto; font-size=16px;">
                        Tenaga Kerja Daerah
                    </text>
                </svg>
            </div> -->
            

            <!-- <ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center'> "+no+" . "+data.perusahaan[i].nama_perusahaan+" <span><span > <button type='button' class='btn btn-primary btn-sm detailp' data-id='"+data.perusahaan[i].id+"' onclick='btn_detail_lp("+data.perusahaan[i].id+")'><i class='fa-solid fa-clock-rotate-left' aria-hidden='true'></i>rincian</button>   </span><span class='badge badge-danger badge-pill'>" + 0 "</span></span></li></ul> -->
            <!-- <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <center>
                            <h6> <b>TABEL VIEW DATA TENAGA KERJA PROVINSI JAWA TIMUR </b> </h6>
                        </center>
                        <thead align="center">
                            <tr>
                                <th width="3%"> No</th>
                                <th width="5%">Nama Kabupaten</th>
                                <th width="20%">Jumlah PHK</th>
                                <th width="28%">Jumlah PMI</th>
                                <th width="28%">Jumlah PMIB</th>
                                <th width="28%">Jumlah TKA</th>
                                <th width="28%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($tabel as $p) : ?>
                                <tr>
                                    <td align="center"><?= $i; ?></td>
                                    <td><small><?= $p['nama_kabupaten']; ?></small> </td>
                                    <td align="center"><small> <?= $p['jumlah_phk']; ?></small></td>
                                    <td align="center"><small><?= $p['jumlah_pmi']; ?></small> </td>
                                    <td align="center"><small> <?= $p['jumlah_pmib']; ?></small></td>
                                    <td align="center"><small><?= $p['jumlah_tka']; ?></small> </td>
                                    <td align="center"><small><?= $p['jumlah_tka'] + $p['jumlah_phk'] + $p['jumlah_pmi'] + $p['jumlah_pmib']; ?></small> </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
    </div>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalPerusahaanlist" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h6 class="modal-title" style="font-weight:bold;" id="nama_kabb"></h6>
                </div>
                <div class="container py-0 px-0">
                    <div class="modal-body py-0"  id="baris_tabel">
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

    <div class=" modal fade" id="detail_reward_perusahaan" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title style="font-weight:bold;"" id="modalInfoLabel" style="font-weight:bold;">Rincian Perusahaan</h5>
                    <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-600">
                            <i class="fas fa-window-close"></i>
                        </span>
                    </button>
                </div>
                <div class="container">
                    <div class="modal-body">
                        <div id="detailper">
                                
                        </div>
                        <div id="tabel_list_reward" ></div>
                    </div>
                </div>
                    <div class="modal-footer" id="btn_kembali">
                </div>
            </div>
        </div>
    </div>




</div>
<!-- End of Main Content -->
</div>


<!-- modal hapus PHK -->
<?php foreach ($sebaran_phk as $sphk) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapusPhk<?= $sphk->id_phk ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>

                </div>
                <center>
                    <!-- <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="80" height="100"> -->
                    <form action="<?= base_url('phk/hapusMap/' . $sphk->id_phk); ?>">
                        <div class="modal-body">Data PHK &nbsp; <b>
                                <font color="black"><?= $sphk->nama_tk ?></font>
                            </b> akan dihapus !</div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash"></i>
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                                </span>
                                <span class="text">Hapus</span>        
                            
                        </button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal hapus Lokal -->
<?php foreach ($sebaran_lokal as $slokal) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapusLokal<?= $slokal->id_phk ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>

                </div>
                <center>
                    <!-- <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="80" height="100"> -->
                    <form action="<?= base_url('phk/hapusMap/' . $slokal->id_phk); ?>">
                        <div class="modal-body">Data Lokal &nbsp; <b>
                                <font color="black"><?= $slokal->nama_tk ?></font>
                            </b> akan dihapus !</div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash"></i>
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                                </span>
                                <span class="text">Hapus</span>        
                            
                        </button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal hapus CPMI -->
<?php foreach ($sebaran_cpmi as $scpmi) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapusCpmi<?= $scpmi->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>

                </div>
                <center>
                    <!-- <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="80" height="100"> -->
                    <form action="<?= base_url('cpmi/hapusMap/' . $scpmi->id); ?>">
                        <div class="modal-body">Data CPMI &nbsp; <b>
                                <font color="black"><?= $scpmi->nama_pmi ?></font>
                            </b> akan dihapus !</div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash"></i>
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                                </span>
                                <span class="text">Hapus</span>        
                            
                        </button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal hapus PMIB -->
<?php foreach ($sebaran_pmib as $spmib) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapusPmib<?= $spmib->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>

                </div>
                <center>
                    <!-- <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="80" height="100"> -->
                    <form action="<?= base_url('pmi/hapusMap/' . $spmib->id); ?>">
                        <div class="modal-body">Data PMIB &nbsp; <b>
                                <font color="black"><?= $spmib->nama ?></font>
                            </b> akan dihapus !</div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash"></i>
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                                </span>
                                <span class="text">Hapus</span>        
                            
                        </button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal hapus tka -->
<?php foreach ($sebaran_tka as $stka) : ?>
    <!-- modalhapus -->
    <div class="modal fade" id="modalHapusTka<?= $stka->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Apakah kamu yakin ?</h5>

                </div>
                <center>
                    <!-- <img src="<?= base_url('assets/img/favicon/hapus.png') ?>" alt="Hapus" width="80" height="100"> -->
                    <form action="<?= base_url('tka/hapusMap/' . $stka->id); ?>">
                        <div class="modal-body">Data TKA &nbsp; <b>
                                <font color="black"><?= $stka->nama_tka ?></font>
                            </b> akan dihapus !</div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash"></i>
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                                </span>
                                <span class="text">Hapus</span>        
                            
                        </button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
<?php endforeach; ?>


