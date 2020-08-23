<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-600"><?= $title; ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- data dashboard -->
    <?php foreach ($tka as $total_tka); ?>
    <?php foreach ($pmib as $total_pmib); ?>
    <?php foreach ($cpmi as $total_cpmi); ?>
    <?php foreach ($phk as $total_phk); ?>

    <!-- Content Row -->

    <!-- total start -->
    <div class="row">
        <div class="col-xl-3 col-md-1 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPMI [Calon P.Migran Ind]</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><small>total</small> <?php echo $total_cpmi->cpmi; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-1 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TKA [Tenaga Kerja Asing]</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><small>total</small> <?php echo $total_tka->tka; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-1 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PMI-B [PMI Bermasalah]</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><small>total</small> <?php echo $total_pmib->pmib; ?> <span><small>orang</small> </span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-1 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tenaga Kerja ter-PHK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><small>total</small> <?php echo $total_phk->phk; ?> <span><small>orang</small> </span> </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
    </div>
    <!-- total end -->

    <hr>


    <div class="row">
        <div class="col-md-10  mb-3">
            <center>

                <h6> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i class="fa fa-map-marker" aria-hidden="true"></i></i> &nbsp; <b> PETA TENAGA KERJA PROVINSI JAWA TIMUR TAHUN <span id="tahun_peta"><?= date('Y'); ?></span></b></h6>
            </center>
        </div>

        <div class="col-md-2">
            <select class="form-control" id="tahun_pilih" name="tahun">
                <option value="all">-Pilih Tahun-</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="mapp"></div>
        </div>
    </div>

    <div>
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
    </div>



</div>
<!-- End of Main Content -->
</div>