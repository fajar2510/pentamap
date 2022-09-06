<!-- Footer -->

<footer class="sticky-footer bg-white">
            <hr>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright All Reserved &copy; <?= date('Y'); ?>&nbsp;  Sistem Informasi Geofrafis Tenaga Kerja Jatim - PENTA | DISNAKERTRANS JAWA TIMUR</span>
                    <!-- <img src="<?php echo base_url() ?>assets/img/favicon/logopng.png" alt="" width="15" height="18">&nbsp; -->
                </div>
            </div>
        </footer>
<!-- End of Footer -->

    </div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <center>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah kamu yakin ?</h5>
                        <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button> -->
                    </div>

                    <div class="modal-body">Pilih " <b> Logout </b>" jika ingin mengakhiri sesi.</div>

                    <!-- asset gambar logout -->
                    <img src="<?= base_url('assets/img/favicon/logout.png') ?>" alt="Logout" width="230" height="200">

                    <!-- tombol pilihan logut -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light " data-dismiss="modal">
                            <!-- <span class="icon text-black-600">
                                <i class="fas fa-window-close"></i>
                            </span> -->
                            <span class="text">Batal</span>
                        </button>
                        <div></div>
                        <form action="<?= base_url('auth/logout'); ?>">
                            <button type="submit" onclick="snackbarlogout()" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                     <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                                </span>
                                <span class="text">Logout</span>
                            </button>
                            <div id="snackbar"> Sedang LOGOUT . . . </div>
                        </form>
                    </div>
                 </center>
            </div>
        </div>
    </div>

    <!-- Load Script All -->
    <!-- Bootstrap core JavaScript-->

    <!-- Load JS  -->
    <!-- <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>

    <!-- Load Bootsrap 3 bundle  -->
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Load date picker -->
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>jquery-ui/jquery-ui.min.js"></script>

    <!-- LEAFLET CENTER -->
    <!-- <script src="<?= base_url(); ?>assets/leaflet/leaflet.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="crossorigin=""></script>
    <!-- leaflet full screen -->
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-fullscreen-master/Control.FullScreen.js"></script>
    <!-- leflet search -->
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-search/src/leaflet-search.js"></script>
     <!-- leflet Cluster -->
    <script src="<?= base_url('assets/'); ?>leaflet/cluster/dist/leaflet.markercluster-src.js"></script>
    <!-- LEAFLET CENTER -->

    <!-- date picker untuk tahun only -->
    <script src="<?= base_url('assets/'); ?>css/date-picker-tahun/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>



    <!-- untuk mengambil input tanggal -->
    <script>
        $(function() {
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>


    <script>
        $("#datepickerYearOnly").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
    </script>


    <script>
        var now = new Date(new Date().getFullYear(), new Date().getMonth());
              
        $('#bulan').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: now,
        });
    </script>


     <!-- script MAP MAP TENAGA KERJA JATIM utama -->
    <script type="text/javascript">
    
        // memanggil map utama set view jawa timur 
        var map = L.map('mapp').setView([-7.330979640916379, 112.4936104206151], 8.5);

        // Open Street Layer
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        // var osm_dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // });
        // osm_dark.addTo(map);

        // Google Street Layer
        googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            // maxZoom: 16,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        googleStreets.addTo(map);

        // Google Satelite Layer
        googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            // maxZoom: 16,
            subdomains:['mt0','mt1','mt2','mt3']
            });
            googleSat.addTo(map);

        Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            // minZoom: 1,
            // maxZoom: 16,
            ext: 'jpg'
            });
            Stamen_Watercolor.addTo(map);

        


        // map search data Cpmi
        // var dataCpmi = [
        //     <?php  foreach ($sebaran_cpmi as $key => $value) { ?>
        //          {"loc":[<?= $value->latitude ?>,<?= $value->longitude ?>],"nama_pmi":"<?= $value->nama_pmi?>"},
        //     <?php } ?>
        //     ];

        // var markersLayer = new L.LayerGroup();	//layer contain searched elements	
        // map.addLayer(markersLayer);
        // var controlSearch = new L.Control.Search({
        //     position:'topright',		
        //     layer: markersLayer,
        //     initial: false,
        //     zoom: 17,
        //     marker: false
        // });

        // map.addControl( new L.Control.Search({
        //     position:'topright',
        //     layer: markersLayer,
        //     initial: false,
        //     zoom: 17,
        //     collapsed: false
        // }) );

        // //populate map with markers from sample data
        // for(i in dataCpmi) {
        //     var nama_pmi = dataCpmi[i].nama_pmi,	//value searched
        //         loc = dataCpmi[i].loc,	//position found
        //         marker = new L.Marker(new L.latLng(loc), {title: nama_pmi} );//se property searched
        //         marker.bindPopup('nama_pmi: '+ nama_pmi );
        //         markersLayer.addLayer(marker);
        // }

        

        // icon sebaran phk
        var iconPhk = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/sphk.png',
            iconSize : [30,16],
            iconAnchor: [22, 65],
            popupAnchor: [-3,-55]
        });

        // icon sebaran cpmi
        var iconCpmi = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/scpmi.png',
            iconSize : [30,16],
            iconAnchor: [22, 65],
            popupAnchor: [-3,-55]
        });

        // icon sebaran pmib
        var iconPmib = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/spmib.png',
            iconSize : [30,16],
            iconAnchor: [22, 65],
            popupAnchor: [-3,-55]
        });

        // icon sebaran tka
        var iconTka = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/stka.png',
            iconSize : [30,16],
            iconAnchor: [22, 65],
            popupAnchor: [-3,-55]
        });

        
        
        // MARKER dengan cluster PHK
        var markersPhk = L.markerClusterGroup( {
            iconCreateFunction: function (cluster) {
            var childCount = cluster.getChildCount();
            var c = ' marker-cluster-phk-';
            if (childCount < 10) {
            c += 'small';
            } 
            else if (childCount < 100) {
            c += 'medium';
            } 
            else {
            c += 'large';
            }

            return new L.DivIcon({ html: '<div><span>' + childCount + '</span></div>', 
            className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
            }
        });

        
        
          
        <?php foreach ($sebaran_phk  as $key => $value) { ?> 
            var sebaranPhk = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconPhk} )
            .bindPopup('<div class="container px-1 py-1">'+
              '<img src="<?= base_url("assets/img/phk/") . $value->image ?> " alt="profile" class="img-responsive" style="padding-bottom: 15px; width: 200px; height: 200px; object-fit:cover; " >  '+
              '<h5><?= $value->nama_tk ?></h5> <span class="badge badge-pill badge-danger" style="font-size:12px;"><i>telah ter-PHK</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota" ><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>dari , <?= $value->nama_perusahaan ?><br />'+
              '<i class="fa-solid fa-square-phone" style="margin-bottom: 10px; margin-right: 10px;"></i>No. Handphone , <?= $value->kontak ?><br />'+
              '<i class="fa-solid fa-hospital-user" style="margin-bottom: 10px;margin-right: 10px;"></i>Berkebutuhan Khusus , <?php if ($value->disabilitas == 'T') {echo 'Tidak';} else  echo 'Ya'?> </p>'+
              '<button type="button" class="btn btn-primary btn-block d-inline-block ">Selengkapnya</button></div>');

            markersPhk.addLayer(sebaranPhk);
            map.addLayer(markersPhk);
            map.fitBounds(markersPhk.getBounds());
          
        <?php }?>
        

        // MARKER dengan cluster CPMI
        var markersCpmi = L.markerClusterGroup({
            iconCreateFunction: function (cluster) {
            var childCount = cluster.getChildCount();
            var c = ' marker-cluster-cpmi-';
            if (childCount < 10) {
            c += 'small';
            } 
            else if (childCount < 100) {
            c += 'medium';
            } 
            else {
            c += 'large';
            }

            return new L.DivIcon({ html: '<div><span>' + childCount + '</span></div>', 
            className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
            }
        });
          
        <?php foreach ($sebaran_cpmi  as $key => $value) { ?> 
            var sebaranCpmi = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconCpmi} )
            .bindPopup('<div class="container px-1 py-1">'+
              '<img src="<?= base_url("assets/img/cpmi/") . $value->image ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 200px; height: 200px; object-fit:cover;"> '+
              '<h5><?= $value->nama_pmi ?></h5> <span class="badge badge-pill badge-info" style="font-size:12px;"><i>Calon PMI (CPMI)</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota" ><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i>Negara Penempatan , <?= $value->nama_negara ?>&nbsp; <img src="<?= base_url("assets/img/img-country-flag/") . $value->flag ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 30px;"><br />'+
              '<i class="fa-solid fa-book-open-reader" style="margin-bottom: 10px; margin-right: 10px;"></i>Perekrut , <?= $value->pengguna_jasa ?><br />'+
              '<i class="fa-solid fa-passport" style="margin-bottom: 10px;margin-right: 10px;"></i>Paspor , <?= $value->paspor ?></i></p> '+
              '<button type="button" class="btn btn-primary btn-block d-inline-block ">Selengkapnya</button></div>');

            markersCpmi.addLayer(sebaranCpmi);
            map.addLayer(markersCpmi);
            map.fitBounds(markersCpmi.getBounds());
          
        <?php }?>
        

         // MARKER dengan cluster PMIB
         var markersPmib = L.markerClusterGroup({
            iconCreateFunction: function (cluster) {
            var childCount = cluster.getChildCount();
            var c = ' marker-cluster-pmib-';
            if (childCount < 10) {
            c += 'small';
            } 
            else if (childCount < 100) {
            c += 'medium';
            } 
            else {
            c += 'large';
            }

            return new L.DivIcon({ html: '<div><span>' + childCount + '</span></div>', 
            className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
            }
         });
          
          <?php foreach ($sebaran_pmib  as $key => $value) { ?> 
              var sebaranPmib = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconPmib} )
              .bindPopup('<div class="container px-1 py-1"><img src="<?= base_url("assets/img/pmi/") . $value->image ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 200px; height: 200px; object-fit:cover;"> '+
              '<h5><?= $value->nama ?></h5> <span class="badge badge-pill badge-warning" style="font-size:12px; color:black;"><i>PMI Bermasalah (PMI-B)</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota"><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i> Negara Bekerja , <?= $value->negara_bekerja ?> <br />'+
              '<i class="fa-solid fa-briefcase" style="margin-bottom: 10px; margin-right: 10px;"></i> Pekerjaan , <?= $value->jenis_pekerjaan ?><br />'+
              '<i class="fa-solid fa-square-phone" style="margin-bottom: 10px;margin-right: 10px;"></i> Lama bekerja , <?= $value->lama_bekerja ?></i></p> '+
              '<button type="button" class="btn btn-primary btn-block d-inline-block ">Selengkapnya</button></div>');
  
              markersPmib.addLayer(sebaranPmib);
              map.addLayer(markersPmib);
              map.fitBounds(markersPmib.getBounds());
            
          <?php }?>

           // MARKER dengan cluster TKA
         var markersTka = L.markerClusterGroup({
            iconCreateFunction: function (cluster) {
            var childCount = cluster.getChildCount();
            var c = ' marker-cluster-tka-';
            if (childCount < 10) {
            c += 'small';
            } 
            else if (childCount < 100) {
            c += 'medium';
            } 
            else {
            c += 'large';
            }

            return new L.DivIcon({ html: '<div><span>' + childCount + '</span></div>', 
            className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
            }
         });
          
          <?php foreach ($sebaran_tka  as $key => $value) { ?> 
              var sebaranTka = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconTka} )
              .bindPopup('<div class="container px-1 py-1"><img src="<?= base_url("assets/img/tka/") . $value->image ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 200px; height: 200px; object-fit:cover;">'+
              '<h5><?= $value->nama_tka ?></h5> <span class="badge badge-pill badge-success" style="font-size:12px;"><i>Tenaga Kerja Asing (TKA)</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota"><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i>Kewarganegaraan , <?= $value->nama_negara ?>&nbsp; <img src="<?= base_url("assets/img/img-country-flag/") . $value->flag ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 30px;"><br />'+
              '<i class="fa-solid fa-briefcase" style="margin-bottom: 10px; margin-right: 10px;"></i>Jabatan , <?= $value->jabatan ?><br />'+
              '<i class="fa-solid fa-square-phone" style="margin-bottom: 10px;margin-right: 10px;"></i>Kontak , <?= $value->kontak ?></i></p> '+
              
              '<a href="#" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;' +
              '<a href="<?= base_url('beranda/edit_tka/' . $value->id) ?>" class="btn btn-link btn-sm ">Edit</a>' +
              '<a href="<?= base_url('tka/hapus/'. $value->id) ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</a></div>');

              markersTka.addLayer(sebaranTka);
              map.addLayer(markersTka);
              map.fitBounds(markersTka.getBounds());
            
          <?php }?>


        //   change layer function
        var overlays = {
                "PHK": markersPhk,
                "CPMI": markersCpmi,
                "PMIB": markersPmib,
                "TKA": markersTka
            };

        var baseLayers = {
            "Satellite":googleSat,
            "Google Map":googleStreets,
            "Water Color":Stamen_Watercolor,
            // "OpenStreetMapDark": osm_custom,
            "OpenStreetMap": osm,
            
        };
        var layer_baseControl= L.control.layers(baseLayers, overlays).addTo(map);
        //batas function

         //  jawa timur polygon geo json
         <?php foreach ($kab_jatim as $key => $value) { ?>
        $.getJSON("<?= base_url('assets/geojson/kabupaten-jatim/' . $value->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data,  {
                style : function(feature) {
                    return {
                        opacity: 0.1,
                        color: '<?= $value->warna ?>',
                        fillColor: '<?= $value->warna ?>',
                        fillOpacity: 0.1,
                        
                        }    
                 },
            }).addTo(map);

            geoLayer.eachLayer(function (layer) {
                layer.bindPopup('<div class="container px-1 py-1">'+
            //   '<h6><u><?= $value->nama_kabupaten ?></u></h6> '+ 
              ' &nbsp; <img src="<?= base_url("assets/img/logo_kab/") . $value->logo_kab ?>" alt="profile" class=" img-responsive" style="padding-bottom: 1px; width: 55px; object-fit:cover;">   '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; ">  <?= $value->nama_kabupaten ?> &nbsp; <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i><br>'+
              '<i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i>Luas Area , <?= $value->luas_area ?>&nbsp; KM <sup>2</sup> <br>'+
              '<i class="fa-solid fa-location-crosshairs" style="margin-bottom: 10px; margin-right: 10px;"></i>Latitude-Longitude , <?= $value->kabupaten_lat ?>,&nbsp;  <?= $value->kabupaten_lat ?><br>'+
              '<i class="fa-solid fa-people-group" style="margin-bottom: 10px;margin-right: 10px;"></i>Total Tenaga Kerja , </i></p> '+
              '<i class="fa-solid fa-passport" style="margin-bottom: 10px;margin-right: 10px;"></i>Total Perusahaan , </i></p> '+
              '<button type="button" class="btn btn-primary btn-block d-inline-block ">Selengkapnya</button></div>');
            });
        });
        <?php } ?>

        
 

        $.getJSON("<?= base_url() ?>beranda/kabupaten", function(data) {
            $.each(data, function(i, field) {

                var leafleticon = L.icon({
                    // iconUrl: 'assets/img/logo_kab/' + data[i].logo_kab,
                    iconUrl: 'assets/img/marker/darkcircle.png',
                    iconSize: [15, 15]
                })
                
                var lat = parseFloat(data[i].kabupaten_lat);
                var long = parseFloat(data[i].kabupaten_long);

                var phk = data[i].jumlah_phk;
                var pmib = data[i].jumlah_pmib;
                var pmi = data[i].jumlah_pmi;
                var tka = data[i].jumlah_tka;
                var logo = data[i].logo_kab;

                // if (phk == "0") {
                //     phk = parseInt("0");
                // } else {
                    phk = parseInt(data[i].jumlah_phk);
                //     var circle = L.circle([long, lat], 14000, {
                //         color: '#D61C4E',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                //     // circle.bindPopup("<u><b><center>" + data[i].nama_kabupaten +
                //     // "</b></u><br><ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center p-2'>Gelombang Merah (PHK) :  <span class='badge badge-danger badge-pill'> "  + phk + " </span></ul> ");
                //     // circle.openPopup().bindTooltip("<u><b><center>" + data[i].nama_kabupaten +
                //     // "</b></u><br><ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center p-2'>Gelombang Merah (PHK) :  <span class='badge badge-danger badge-pill'> "  + phk + " </span></ul> ", {
                //     //     permanent: false,
                //     //     iconAnchor: [122,65],
                //     //     popupAnchor: [-35, -55],
                //     //     direction: 'left',
                //     //     opacity: 0.9
                //     //   });
                // }
                // if (pmib == "0") {
                //     pmib = parseInt("0");
                // } else {
                    pmib = parseInt(data[i].jumlah_pmib);
                //     var circle = L.circle([long, lat], 16000, {
                //         color: '#FEDB39',
                //         fillColor: '#FEDB39',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                // }
                // if (pmi == "0") {
                //     pmi = parseInt("0");
                // } else {
                    pmi = parseInt(data[i].jumlah_pmi);
                //     var circle = L.circle([long, lat], 10000, {
                //         color: '#0096FF',
                //         fillColor: '#0096FF',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                // }
                // if (tka == "0") {
                //     tka = parseInt("0");
                // } else {
                    tka = parseInt(data[i].jumlah_tka);
                //     var circle = L.circle([long, lat], 12000, {
                //         color: '#3CCF4E',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                // }
                // if (jumlah == '' || null) {
                //     jumlah = 0;
                // } else {
                    jumlah = parseInt(data[i].jumlah_phk);
                // }

                var jumlah = phk + pmib + pmi + tka;
                bangunanMarker = L.marker([long, lat], {
                        icon: leafleticon,
                        title: data[i].nama_kabupaten,
                            }).addTo(map)
                            .bindPopup("<h6><u><b><center>" + data[i].nama_kabupaten + "</b></u><br></h6>" +
                            "<ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center p-2'>ter-PHK<span class='badge badge-danger badge-pill'>" + phk + "</span></li> " +
                            "<li class='list-group-item d-flex justify-content-between align-items-center p-2'>CPMI<span class='badge badge-info badge-pill'>" + pmi + "</span></li> " +
                            "<li class='list-group-item d-flex justify-content-between align-items-center p-2'>PMI-Bermasalah<span class='badge badge-warning badge-pill'>" + pmib + "</span></li> " +
                            "<li class='list-group-item d-flex justify-content-between align-items-center p-2'>TKA (Asing)<span class='badge badge-success badge-pill'>" + tka + "</span></li> " +
                            "<li class='list-group-item d-flex justify-content-between align-items-center px-2 font-weight-bold'><b>TOTAL</b><span class='badge badge-dark badge-pill'>" + jumlah + "</span></li></ul>" +
                                "<br><button type='button' onclick='btn_lp()' class='btn btn-sm btn btn-primary listp' data-id='"+data[i].id_kabupaten+"'><b>Daftar Perusahaan</b></button>")
                            .openPopup().bindTooltip("<center><b>"+data[i].nama_kabupaten+"</b></center>", {
                              // .openPopup().bindTooltip("<b>"+data[i].nama_kabupaten+"</b><br> ("+data[i].id_kabupaten+") aktif", {
                                permanent: true,
                                size: 10,
                                direction: 'bottom',
                                opacity: 0.65,
                                sticky: false,
                                className: 'leaflet-tooltip-own'
                        });
            });
        });

        

         /*Legend specific*/
        var legend = L.control({ position: "bottomright" });

        legend.onAdd = function(map) {
          var div = L.DomUtil.create("div", "legend");
          div.innerHTML += "<h4>Legenda Peta Tenaga Kerja Jatim</h4>";
          div.innerHTML += '<svg height="25" width="100%"><line x1="10" y1="10" x2="40" y2="10" style="stroke:#293462; stroke-width:2;"/><text x="59" y="15" style="font-family:sans-serif; font-size=16px;">Garis Batas Wilayah</text>]</svg>';
          div.innerHTML += '<br> <svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#D61C4E" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja ter-PHK</text></svg> ';
          div.innerHTML += '<br><svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#FEDB39" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">PMI Bermasalah (PMIB)</text></svg>';
          div.innerHTML += '<br><svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#0096FF" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Calon Pekerja Migran Indonesia (CPMI)</text></svg>';
          div.innerHTML += '<br><svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="green" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Asing (TKA)</text></svg> ';
        //   div.innerHTML += '<br><svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#3CCF4E opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Daerah</text></svg>';
          // div.innerHTML += ' <br><i class="icon" style="background-image: url(https://d30y9cdsu7xlg0.cloudfront.net/png/194515-200.png);background-repeat: no-repeat;"></i><span>SIG</span><br>';

          return div;
        };
        legend.addTo(map);

        // standart zoom view jatim first load
        // map.locate({setView: true, maxZoom: 30});
        
        
        


        // L.control.search({
        //   url: 'search.php?q={s}',
        //   textPlaceholder: 'Color...',
        //   position: 'topright',
        //   hideMarkerOnCollapse: true,
        //   marker: {
        //     icon: new L.Icon({iconUrl:'data/custom-icon.png', iconSize: [20,20]}),
        //     circle: {
        //       radius: 20,
        //       color: '#0a0',
        //       opacity: 1
        //     }
        //   }
        // }).addTo(map);


        // full screen map
        // create a fullscreen button and add it to the map
        L.control.fullscreen({
          position: 'topleft', // change the position of the button can be topleft, topright, bottomright or bottomleft, default topleft
          title: 'Show me the fullscreen !', // change the title of the button, default Full Screen
          titleCancel: 'Exit fullscreen mode', // change the title of the button when fullscreen is on, default Exit Full Screen
          content: null, // change the content of the button, can be HTML, default null
          forceSeparateButton: true, // force separate button to detach from zoom buttons, default false
          forcePseudoFullscreen: true, // force use of pseudo full screen even if full screen API is available, default false
          fullscreenElement: false // Dom element to render in full screen, false by default, fallback to map._container
        }).addTo(map);

        
       
    </script>

    <script>
        function btn_lp(){
            var id_kabupaten = $(".listp").attr("data-id");
            $.ajax({
                    url : "<?php echo site_url('beranda/list_perusahaan');?>",
                    method : "POST",
                    data : {id_kabupaten: id_kabupaten},
                    // async : true,
                    dataType : 'json',
                    success: function(data){
                        var html="<table class='table table-sm' style=' padding: 0; margin: 0;' ><thead style=' padding: 0; margin: 0;'><tr><th scope='col' style=' padding: 0; margin: 0;' >No</th><th scope='col' style=' padding: 0; margin: 0;'>Nama Perusahaan</th>"
                        html+="<th scope='col' style=' padding: 0; margin: 0;' >Aksi</th></tr></thead><tbody>";
                        var nama_kabupaten="";
                        nama_kabupaten += "Daftar Perusahaan Kabupaten/kota , "+data.kab[0].nama_kabupaten;
                        if (data.perusahaan.length == 0) {
                            html += "<tr><td scope='row' colspan='4' style=' padding: 0; margin: 0;'><center>Tidak ada data Perusahaan</center></td></tr>";
                        }else{
                            var no=1;
                            for(i=0; i<data.perusahaan.length; i++)
                            {
                                html += "<tr><td scope='row' style=' padding: 0; margin: 0;' class='text-center'>"+no+"</td><td style=' padding: 0; margin: 0;'>" +data.perusahaan[i].nama_perusahaan+"</td><td style=' padding: 0; margin: 0;> <button  class='btn btn-primary detailp' data-id='"+data.perusahaan[i].id+"' onclick='btn_detail_lp("+data.perusahaan[i].id+")'><a href='#'>Rincian</a> </button> </td></tr>";
                                no+=1;
                            }
                        }
                        // alert(data.length);
                        // return false;
                        html+="</tbody></table>";
                        $('#baris_tabel').html(html);
                        $('#nama_kabb').html(nama_kabupaten);
                        $('#detail_reward_perusahaan').modal('hide');
                        $('#modalPerusahaanlist').modal('show');
                    }
                });
		}

        function btn_detail_lp(id){
            var id_prs = id;
            // var id_prs = $(".listp").attr("data-id");
            // $('#modalPerusahaanlist').modal('hide');
            // $('#detail_reward_perusahaan').modal('show');
            // return false;
            $.ajax({
                    url : "<?php echo site_url('beranda/detail_reward_perusahaan');?>",
                    method : "POST",
                    data : {id_prs: id_prs},
                    // async : true,
                    dataType : 'json',
                    success: function(data){
                        var html="";
                        var list_reward="";
                        var ada_reward=0;
                        var btn_kembali="";
                        list_reward+="<br><h5>Riwayat usulan penghargaan disabilitas</h5><table class='table'><thead><tr><th scope='col' style=' padding: 0; margin: 0;'>No</th><th scope='col' style=' padding: 0; margin: 0;'>Jenis Disabilitas</th><th scope='col' style=' padding: 0; margin: 0;'>Ragam Disabilitas</th>"
                        list_reward+="<th scope='col' style=' padding: 0; margin: 0;'>Tanggal Diusulkan</th></tr></thead><tbody>";
                        for(i=0; i<1; i++){
                            html += "<div class='row'><label class='col-sm-3 col-form-label' style=' padding: 0; margin: 0;'>Nama Perusahaan </label><label class='col-sm-8 col-form-label' style=' padding: 0; margin: 0;'>:"+data.perusahaan[i].nama_perusahaan+"</label></div>";
                            html += "<div class='row'><label class='col-sm-3 col-form-label' style=' padding: 0; margin: 0;'>Nama Pimpinan </label><label class='col-sm-8 col-form-label' style=' padding: 0; margin: 0;'>:"+data.perusahaan[i].nama_pimpinan+"</label></div></div>";
                            html += "<div class='row'><label class='col-sm-3 col-form-label' style=' padding: 0; margin: 0;'>Sektor Usaha </label><label class='col-sm-8 col-form-label' style=' padding: 0; margin: 0;'>:"+data.perusahaan[i].nama_sektor+"</label></div></div> <hr>";
                        }
                        var no=1;
                        for(i=0; i<data.perusahaan.length; i++){
                            if (data.perusahaan[i].id_reward != null) {
                                list_reward += "<tr><td scope='row' style=' padding: 0; margin: 0;'>"+no+"</td><td style=' padding: 0; margin: 0;'>"+data.perusahaan[i][0]+"</td><td scope='row' style=' padding: 0; margin: 0;'>"+data.perusahaan[i][1]+"</td><td scope='row' style=' padding: 0; margin: 0;'>"+data.perusahaan[i].tanggal_usul+"</td></tr>";
                                no+=1;
                                ada_reward +=1;   
                            }
                            else{
                                list_reward += "<tr><td scope='row' colspan='4' style=' padding: 0; margin: 0;'><center><br>Tidak ada data Penghargaan</center></td></tr>";
                            }
                        }
                        list_reward+="</tbody></table>";
                        // btn_kembali += "<button type='button' onclick='btn_lp()' data-id='"+data.perusahaan[0].fungsi+"' class='btn btn-light btn-icon-split'></div>";
                        // btn_kembali += "<span class='icon text-white-600'><i class='fas fa-arrow-left'></i></span><span class='text'>Kembali</span></button>"
                        // alert(data.perusahaan[0][0]);
                        // return false;
                        $('#tabel_list_reward').html(list_reward);
                        // $('#btn_kembali').html(btn_kembali);
                        $('#detailper').html(html);
                        $('#modalPerusahaanlist').modal('hide');
                        $('#detail_reward_perusahaan').modal('show');
                    }
                });
		}

    </script>

    <script>
        /// for reset form input fill
        function fun(){
        document.getElementById("myForm").reset();
        } 
    </script>


    <script>
        // alert auto close
        window.setTimeout(function() {
            $(".alert").fadeTo(2500, 0).slideUp(200, function(){
            $(this).remove(); 
            });
        }, 5000);

        // checkbox selected
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
          }

    </script>

   
    <script>
      // date picker untuk memilih hanya tahun saja
      var dp= $("#tahun").datepicker({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years",
          autoclose:true
        });   
      //changeYear event trigger's
      dp.on('changeYear', function (e) {    
        //do something here
        alert("Tahun dipilih ");
      });
    </script>


    <!-- Use a button to open the snackbar -->
    <script>
        function snackbarlogout() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
    <!-- The actual snackbar -->

        <!-- untuk animasi loading saat memuat halaman -->
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>

        <!-- fungsi jika tak ada image tertampil atau data null -->

    </body>

    </html>