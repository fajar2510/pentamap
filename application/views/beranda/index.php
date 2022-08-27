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
        
        <!-- <div class="col-md-12">
            <select class="form-control" id="tahun_pilih" name="tahun">
                <option value="all">-Pilih Tahun-</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>
        </div> -->
    </div>

  

    <?= $this->session->flashdata('message'); ?>
    
    <br>
    <!-- <hr> -->

    <div class="row">
        <div class="col-md-12">
            

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
            <div id="mapp" style=""></div>
            <hr style="margin-top: 100; margin-bottom: 60 ;">

            <h6 style="color:red">testing unit</h6>


            <!-- tampilan lama  -->
<tr><td scope='row'>"+no+"</td><td>"+data.perusahaan[i].nama_perusahaan+"</td><td><button class='btn btn-outline-primary detailp' data-id='"+data.perusahaan[i].id+"' onclick='btn_detail_lp("+data.perusahaan[i].id+")'><i class='fa-solid fa-clock-rotate-left' aria-hidden='true'></i> Riwayat Usulan Penghargaan</button></td></tr>

            
            <!-- tampilan baru -->


            <hr>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="nama_kabb"></h5><br>
                </div>
                <div class="container">
                    <div class="modal-body" id="baris_tabel">
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
                    <h5 class="modal-title" id="modalInfoLabel">Riwayat Usulan Penghargaan Disabilitas Perusahaan</h5>
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
                        <div id="tabel_list_reward"></div>
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