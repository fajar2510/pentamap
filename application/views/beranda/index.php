<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


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
    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPMI [Calon P.Migran Ind]</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_cpmi->cpmi; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TKA [Tenaga Kerja Asing]</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_tka->tka; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PMI-B [PMI Bermasalah]</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pmib->pmib; ?> <span><small>orang</small> </span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tenaga Kerja ter-PHK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_phk->phk; ?> <span><small>orang</small> </span> </div>
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
    <!-- /.container-fluid -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/img/favicon/indo.jpg" alt="" width="200px" height="500px" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>MAP VIEW UNDER CONTRUCTION, DEVELOP SOON</h5>
                    <p>AKAN MENAMPILKAN DATA TKA PMI PMI-B PHK PER WILAYAH KABUPATEN SE-JAWA TIMUR DENGAN MODE PETA GIS ,GEOGRAPICAL INTERFACE SYSTEM</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/img/favicon/map1.png" alt="" width="200px" height="500px"" alt=" Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>PENTA DISNAKERTRANS JATIM</h5>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/img/favicon/map2.png" alt="" width="200px" height="500px"" alt=" Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>GO GO GO </h5>
                    <p>...</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script>
        $('.carousel').carousel({
            interval: 1000
        })
    </script>

</div>
<!-- End of Main Content -->
</div>