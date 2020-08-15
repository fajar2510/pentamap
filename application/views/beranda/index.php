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

    <div class="row">
        <div class="col-md-12">
        <div id="mapp"></div>
        </div>
        </div>


    <script>
        $('.carousel').carousel({
            interval: 1000
        })
    </script>
<script type="text/javascript">
// var L = window.L;

var map = L.map('mapp').setView([-7.2773934,111.7170372], 8);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

$.getJSON("<?=base_url()?>beranda/kabupaten", function(data){
    $.each(data, function(i, field){
        
        var lat=parseFloat(data[i].kabupaten_lat);
        var long=parseFloat(data[i].kabupaten_long);

    L.marker([long,lat]).addTo(map)
    .bindPopup(data[i].nama_kabupaten)
    .openPopup();

    });
  });


</script>

<script>
  var map = L.map('map').setView([-33.87, 150.77], 10);
  var layer = L.esri.basemapLayer('Topographic').addTo(map);
  var layerLabels;

  function setBasemap (basemap) {
    if (layer) {
      map.removeLayer(layer);
    }

    layer = L.esri.basemapLayer(basemap);

    map.addLayer(layer);

    if (layerLabels) {
      map.removeLayer(layerLabels);
    }

    if (
      basemap === 'ShadedRelief' ||
      basemap === 'Oceans' ||
      basemap === 'Gray' ||
      basemap === 'DarkGray' ||
      basemap === 'Terrain'
    ) {
      layerLabels = L.esri.basemapLayer(basemap + 'Labels');
      map.addLayer(layerLabels);
    } else if (basemap.includes('Imagery')) {
      layerLabels = L.esri.basemapLayer('ImageryLabels');
      map.addLayer(layerLabels);
    }
  }

  document
    .querySelector('#basemaps')
    .addEventListener('change', function (e) {
      var basemap = e.target.value;
      setBasemap(basemap);
    });
</script>

</div>
<!-- End of Main Content -->
</div>