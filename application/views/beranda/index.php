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

    <div class="row">
        <div class="col-md-10">
        
            <h6> <i class="fa fa-map-marker" aria-hidden="true"></i></i> &nbsp; <b> <?= $title; ?> PROVINSI JAWA TIMUR TAHUN <span id="tahun_peta"><?= date('Y'); ?></span></h1>
        </div>
        
        <div class="col-md-12">
            <select class="form-control" id="tahun_pilih" name="tahun">
                <option value="all">-Pilih Tahun-</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>
        </div>
    </div>

  

    <?= $this->session->flashdata('message'); ?>

    
    <br>

    <!-- <hr> -->

    <div class="row">
        <div class="col-md-12">
            
            <!-- tampilan map -->
            <!-- <div id="mapp"></div> -->
            <!-- tampilan map -->
            

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
            <h1>test</h1>
            <div id="mapp"></div>
            <hr>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Perusahaan </h5><h5 id="nama_kabb"></h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div id="baris_tabel"></div>
                        </tbody>
                        </table>
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
                    <h5 class="modal-title" id="modalInfoLabel">Perusahaan</h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                        <div id="detailper">
                                
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

</div>
<!-- End of Main Content -->
</div>