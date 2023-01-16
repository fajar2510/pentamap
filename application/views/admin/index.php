<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


        <!-- Page Heading -->
        <h5 class="h5 mb-1 text-gray-600"><?= $title; ?> ADMIN </h5>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- data dashboard -->
    <?php foreach ($tka as $total_tka); ?>
    <?php foreach ($pmib as $total_pmib); ?>
    <?php foreach ($cpmi as $total_cpmi); ?>
    <?php foreach ($phk as $total_phk); ?>
    <?php foreach ($lok as $total_lokal); ?>
    <?php foreach ($disabilitas as $total_disabilitas); ?>
    <?php foreach ($pengguna as $total_pengguna); ?>
    <?php foreach ($upt as $total_upt); ?>

    <!-- Content Row -->
    <div class="row">


    <!-- <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Sistem Informasi PENTA | DISNAKERTRANS</h6>
            </a>
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Sistem Informasi PENTA | DISNAKERTRANS</h6>
                </a>
                
            </div>
            
    </div> -->


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPMI [Calon Pekerja Migran Indonesia] </div>
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
            <div class="card border-left-warning shadow h-100 py-2">
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
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tenaga Kerja Lokal PHK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_phk->phk; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tenaga Kerja Lokal Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_lokal->lok; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tenaga Kerja Disabilitas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_disabilitas->disabilitas; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-light shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL PENGGUNA APLIKASI (no admin)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pengguna->pengguna; ?> <span><small>orang</small> </span> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL UPT BLK (Unit Pelaksana Tenis/ Balai Latihan Kerja) </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_upt->upt; ?> <span><small>lokasi</small> </span> </div>
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
       
           
    
       
            <!-- start -->
            <!-- <p style="font-weight:bold; font-family:roboto; padding-left:5px;">Testing Get Location Coordinat</p>
            <div class="form-group col-5 ">
                <div class="row">
                    <div style="padding:5px; ">
                        <label for="lat">Latitude</label>
                    <input type="text" id="lat" class="form-control" name="lat" value="">
                    </div>
                    <div style="padding:5px; ">
                        <label for="long">Longitude</label>
                        <input type="text" id="long" class="form-control" name="long" value="">
                    </div>  
                </div>
            </div>

            <div id="map"></div> -->
            <!-- end -->
    
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>