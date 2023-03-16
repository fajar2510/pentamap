<!-- Footer -->

<footer class="sticky-footer bg-white">
            <hr>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright All Reserved &copy; <?= date('Y'); ?>&nbsp;  Aplikasi Pemetaan Tenaga Kerja Jawa Timur - PENTA | DISNAKERTRANS JAWA TIMUR</span>
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

    <!-- <script src="<?= base_url('assets/'); ?>sweetalert2/package/dist/sweetalert2.all.min.js"></script> -->
    <!-- HIGHCHART -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- HIGHCHART -->



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

        // var osm_dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // });
        // osm_dark.addTo(map);

       

        // Open Street Default Layer     
        // var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '©OpenStreetMap, ©CartoDB',
        //     // pane: 'labels'
        // });
        // osm.addTo(map);

        osmNoLabel = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
        attribution: '©OpenStreetMap, ©CartoDB'
        }).addTo(map);

        osmOnlyLabel = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            attribution: '©OpenStreetMap, ©CartoDB'
        });
        osmOnlyLabel.addTo(map);

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

        // Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        //     attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        //     subdomains: 'abcd',
        //     // minZoom: 1,
        //     // maxZoom: 16,
        //     ext: 'jpg'
        //     });
        //     Stamen_Watercolor.addTo(map);

        


        // map search data Cpmi START
        // var dataCpmix = [
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

        // populate map with markers from sample data
        // for(i in dataCpmi) {
        //     var nama_pmi = dataCpmi[i].nama_pmi,	//value searched
        //         loc = dataCpmi[i].loc,	//position found
        //         marker = new L.Marker(new L.latLng(sebaranCpmi), {title: nama_pmi} );//se property searched
        //         marker.bindPopup('nama_pmi: '+ nama_pmi );
        //         markersLayer.addLayer(marker);
        // }

        // MAP SEARCH END

         // pencarian tombol tunggal
        // L.control.search({
        //   url: 'search.php?q={s}',
        //   textPlaceholder: 'search ...',
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

       

        // icon sebaran UPT
        var iconUpt = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/marker/city.png',
            iconSize : [30,30],
            // iconAnchor: [22, 65],
            // popupAnchor: [-3,-55]
        });

        // icon sebaran phk
        var iconPhk = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/sphk.png',
            iconSize : [30,16],
            // iconAnchor: [22, 65],
            // popupAnchor: [-3,-55]
        });

        // icon sebaran cpmi
        var iconCpmi = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/scpmi.png',
            iconSize : [30,16],
        });

        // icon sebaran pmib
        var iconPmib = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/spmib.png',
            iconSize : [30,16],
        });

        // icon sebaran tka
        var iconTka = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/sebaran/stka.png',
            iconSize : [30,16],
        });

        // icon sebaran Lokal
        var iconLokal = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/marker/ellipse.png',
            iconSize : [16,16],
        });

        // icon sebaran Disabilitas
        // var iconDisabilitas = L.icon({
        //     iconUrl : '<?= base_url('assets/'); ?>img/marker/disabled-person.png',
        //     iconSize : [30,30],
        // });

        
        var markersUpt = L.markerClusterGroup( {
            iconCreateFunction: function (cluster) {
            var childCount = cluster.getChildCount();
            var c = ' marker-cluster-upt-';
            if (childCount < 2) {
            c += 'small';
            } 
            else if (childCount < 5) {
            c += 'medium';
            } 
            else {
            c += 'large';
            }

            return new L.DivIcon({ html: '<div><span>' + childCount + '</span></div>', 
            className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
            }
        });

        
        
          // MARKER dengan cluster UPT
        <?php foreach ($data_pelatihan  as $key => $value) { ?> 
            var sebaranUpt = L.marker([<?= $value['lat_upt'] ?>, <?= $value['long_upt'] ?>], { icon:iconUpt} )
            .bindPopup(
            `<div class="container px-1 py-1">
            <center><h5 style="font-weight:bold;"><?= $value['nama_upt'] ?></h5></center>
            <?php if ($value['foto'] != null) { ?><center>
                <img src="<?= base_url("assets/img/upt/") . $value['foto'] ?> " alt="upt-foto" class=" img-responsive" style="padding-bottom: 8px; width: 250; object-fit:cover;"></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="upt-foto" class=" img-responsive" style="padding-bottom: 8px; width: 250; object-fit:cover;" ></center><?php } ?>
            <p class="text-dark px-0 py-0 ">
                    <cite title="kabupaten/kota" ><?= $value['nama_kabupaten'] ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>
            <em><?= $value['alamat_upt'] ?> </em><br>
           
            <p/>

            <table class="table table-sm" style=" padding: 1; margin: 0;" >
                <tr>
                <th scope="col" style=" padding: 0; margin: 0;"><span style="color:#505050; font-size:15px; font-family: sans-serif;"><i class="fa-solid fa-face-frown" style="margin-bottom: 10px;margin-right: 10px;"></i>NON-KERJA</span></th>
                <th scope="col" style=" padding: 0; margin: 0;" ><span class="badge badge-light badge-pill" style="font-size:15px;">
                <?php if ($value[0]['percent'] != null) { echo round($value[0]['percent'],2)."%"; } else { echo "no-data"; }  ?>  
                &nbsp;(<?= $value[2]['jumlah_pengurang_upt']; ?> / <?= $value[1]['jumlah_total_upt']; ?>) </span></th></tr> 
                </tr>
                <tr>
                <th scope="col" style=" padding: 0; margin: 0;"><span style="color:#505050; font-size:15px; font-family: sans-serif;"><i class="fa-solid fa-money-bill style="margin-bottom: 10px;margin-right: 10px;"></i>  DANA ALOKASI</span></th>
                <th scope="col" style=" padding: 0; margin: 0;" ><span class="badge badge-info badge-pill" style="font-size:15px;"><?php if ($value[3]['percent2'] != null) { echo round($value[3]['percent2'],2)."%"; } else { echo "no-data"; }  ?> </span></th></tr> 
                </tr>
            </table>
           <p class="text-dark px-0 py-0 ">
            <strong>Cakupan</strong> <i class="fa-solid fa-arrow-right"></i> <?= $value['ket_upt'] ?> 
           </p>
            
            
            
            </div>`
            ).bindTooltip("<center><b><?= $value['nama_upt'] ?></b></center>", {
                permanent: false,
                size:25,
                direction: 'bottom',
                opacity: 0.85,
                sticky: false,
                className: 'leaflet-tooltip-own-upt'
            });

            markersUpt.addLayer(sebaranUpt);
            map.addLayer(markersUpt);
            map.fitBounds(markersUpt.getBounds());
        <?php }?>


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
            .bindPopup(
            '<div class="container px-1 py-1">'+
              '<?php if ($value->image != null) { ?><center><img src="<?= base_url("assets/img/lokal/") . $value->image ?> " alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php } ?>'+
              '<h5 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $value->nama_tk ?></h5> <span class="badge badge-pill badge-info" style="font-size:12px;"><i>Lokal/daerah</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota" ><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>dari , <?= $value->nama_perusahaan ?><br />'+
              '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>Status Kerja  :  <?php if ($value->status_kerja == "aktif") {echo '<span class="badge badge-pill badge-success">AKTIF</span>' ;} else echo '<span class="badge badge-pill badge-danger">ter-PHK</span>' ?><br>' +
              '<i class="fa-solid fa-hospital-user" style="margin-bottom: 10px;margin-right: 10px;"></i>Berkebutuhan Khusus : <?php if ($value->disabilitas == "T") {echo '<span class="badge badge-pill badge-success">TIDAK</span>';} else  echo '<span class="badge badge-pill badge-warning" style="color:black;">YA</span>'?> </p>'+ 
              
               
              '<a href="<?= base_url('phk/detail/' . $value->id_phk) ?>" target="_blank" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;' +
              '<?php if ($is_login == 1) { ?><a href="<?= base_url('phk/edit_phk/' . $value->id_phk) ?>" class="btn btn-link btn-sm ">Perbarui</a><?php }else{ ?><p></p><?php } ?>' +
              '<?php if ($is_login == 1) { ?><button type="button" data-toggle="modal" data-target="#modalHapusPhk<?= $value->id_phk ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</button></div><?php }else{ ?><p></p><?php } ?>');

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
              '<?php if ($value->image != null) { ?><center><img src="<?= base_url("assets/img/cpmi/") . $value->image ?> " alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php } ?>'+
              '<h5 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $value->nama_pmi ?></h5> <span class="badge badge-pill badge-info" style="font-size:12px;"><i>Calon PMI (CPMI)</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota" ><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i>Negara Penempatan : <span class="badge badge-pill badge-light" style="font-size:12px;"><?= $value->nama_negara ?></span>&nbsp; <img src="<?= base_url("assets/img/img-country-flag/") . $value->flag ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 30px;"><br />'+
              '<i class="fa-solid fa-book-open-reader" style="margin-bottom: 10px; margin-right: 10px;"></i>Perekrut : <?= $value->pengguna_jasa ?><br />'+
              '<i class="fa-solid fa-passport" style="margin-bottom: 10px;margin-right: 10px;"></i>Paspor : <span class="badge badge-pill badge-dark" style="font-size:12px;"><?= $value->paspor ?></span></i><br>'+
              '<i class="fa-solid fa-plane-departure" style="margin-bottom: 10px;margin-right: 10px;"></i>Penerbangan : <?= $value->kode_pesawat ?></i></p> ' +

              '<a href="<?= base_url('cpmi/detail/' . $value->id) ?>" target="_blank" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;' +
              '<?php if ($is_login == 1) { ?><a href="<?= base_url('cpmi/edit_cpmi/' . $value->id) ?>" class="btn btn-link btn-sm ">Perbarui</a><?php }else{ ?><p></p><?php } ?>' +
              '<?php if ($is_login == 1) { ?><button type="button" data-toggle="modal" data-target="#modalHapusCpmi<?= $value->id ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</button></div><?php }else{ ?><p></p><?php } ?>');

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

            return new L.DivIcon({ html: '<div><span>' + childCount  + '</span></div>', 
            className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
            }
         });
          
          <?php foreach ($sebaran_pmib  as $key => $value) { ?> 
              var sebaranPmib = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconPmib} )
              .bindPopup('<div class="container px-1 py-1">'+
              '<?php if ($value->image != null) { ?><center><img src="<?= base_url("assets/img/pmi/") . $value->image ?> " alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php } ?>'+
              '<h5 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $value->nama ?></h5> <span class="badge badge-pill badge-warning" style="font-size:12px; color:black;"><i>PMI Bermasalah (PMI-B)</i></span> '+
              '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota"><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
              '<i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i> Negara Bekerja : <span class="badge badge-pill badge-light" style="font-size:12px;"><?= $value->nama_negara ?></span> &nbsp; <img src="<?= base_url("assets/img/img-country-flag/") . $value->flag ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 30px;"><br />'+
              '<i class="fa-solid fa-briefcase" style="margin-bottom: 10px; margin-right: 10px;"></i> Pekerjaan : <?= $value->jenis_pekerjaan ?><br />'+
              '<i class="fa-solid fa-square-phone" style="margin-bottom: 10px;margin-right: 10px;"></i> Lama bekerja : <span class="badge badge-pill badge-dark" style="font-size:12px;"><?= $value->lama_bekerja ?></span></i><br /> '+
              '<i class="fa-solid fa-briefcase" style="margin-bottom: 10px; margin-right: 10px;"></i> Jalur : <span class="badge badge-pill badge-warning" style="color:black;" ><?= $value->status ?></span></p>'+
              
              '<a href="<?= base_url('pmi/detail/' . $value->id) ?>" target="_blank" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;' +
              '<?php if ($is_login == 1) { ?><a href="<?= base_url('pmi/edit_pmi/' . $value->id) ?>" class="btn btn-link btn-sm ">Perbarui</a><?php }else{ ?><p></p><?php } ?>' +
              '<?php if ($is_login == 1) { ?><button type="button" data-toggle="modal" data-target="#modalHapusPmib<?= $value->id ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</button></div><?php }else{ ?><p></p><?php } ?>');
  
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
              .bindPopup(`<div class="container px-1 py-1">
              <?php if ($value->image != null) { ?><center><img src="<?= base_url("assets/img/tka/") . $value->image ?> " alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php } ?>
              <h5 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $value->nama_tka ?></h5> <span class="badge badge-pill badge-success" style="font-size:12px;"><i>Tenaga Kerja Asing (TKA)</i></span> 
              <p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota"><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>
              <i class="fa-solid fa-flag" style="margin-bottom: 10px;margin-right: 10px;"></i>Kewarganegaraan : <?= $value->nama_negara ?>&nbsp; <img src="<?= base_url("assets/img/img-country-flag/") . $value->flag ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 30px;"><br />
              <i class="fa-solid fa-briefcase" style="margin-bottom: 10px; margin-right: 10px;"></i>Perusahaan : <?= $value->nama_perusahaan ?><br />
              <i class="fa-sharp fa-solid fa-building" style="margin-bottom: 10px; margin-right: 10px;"></i>Jabatan : <?= $value->jabatan ?><br/>
              <i class="fa-solid fa-business-time" style="margin-bottom: 10px;margin-right: 10px;"></i>IMTA &nbsp;&nbsp;&nbsp; : 
                <span class="badge badge-light badge-pill" style="font-size:15px; "><?= $value->masa_imta ?> </span> 
                <?php
                    $imta = $value->masa_imta;
                    $masaImta = strtotime(date('Y-m-d', strtotime($imta) ) );
                    $currentDate = strtotime(date('Y-m-d'));
                    if($masaImta < $currentDate) {
                        echo '<span class="badge badge-light badge-pill" style="font-size:12px; ">Nonaktif</span>';
                    } else {
                        echo '<span class="badge badge-success badge-pill" style="font-size:12px; ">Aktif</span>';
                    }?>
                </i><br/> 
              <i class="fa-solid fa-business-time" style="margin-bottom: 10px;margin-right: 10px;"></i>RPTKA&nbsp;:  
                <span class="badge badge-light badge-pill" style="font-size:15px; "><?= $value->masa_rptka ?></span> 
                <?php
                    $rptka = $value->masa_rptka;
                    $masaRptka = strtotime(date('Y-m-d', strtotime($rptka) ) );
                    $currentDate = strtotime(date('Y-m-d'));
                    if($masaRptka < $currentDate) {
                        echo '<span class="badge badge-light badge-pill" style="font-size:12px; ">Nonaktif</span> ';
                    } else {
                        echo '<span class="badge badge-success badge-pill" style="font-size:12px; ">Aktif</span>';
                    }?>
                </i></p> 
              <a href="<?= base_url('tka/detail/' . $value->id) ?>" target="_blank" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;
              <?php if ($is_login == 1) { ?><a href="<?= base_url('tka/edit_tka/'.$value->id) ?>"  class="btn btn-link btn-sm ">Perbarui</a><?php }else{ ?><p></p><?php } ?>
              <?php if ($is_login == 1) { ?><button type="button" data-toggle="modal" data-target="#modalHapusTka<?= $value->id ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</button></div><?php }else{ ?><p></p><?php } ?>`);

              markersTka.addLayer(sebaranTka);
              map.addLayer(markersTka);
              map.fitBounds(markersTka.getBounds());
            
          <?php }?>


        // MARKER dengan cluster Lokal
        var markersLokal = L.markerClusterGroup( {
            iconCreateFunction: function (cluster) {
            var childCount = cluster.getChildCount();
            var c = ' marker-cluster-lokal-';
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
        // var_dump($data['phk']);
        // die;
        
        <?php foreach ($sebaran_lokal  as $key => $value) { ?> 
            
            var sebaranLokal = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconLokal} )
            .bindPopup(
            '<div class="container px-1 py-1">'+
            '<?php if ($value->image != null) { ?><center><img src="<?= base_url("assets/img/lokal/") . $value->image ?> " alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php } ?>'+
            '<h5 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $value->nama_tk ?></h5> <span class="badge badge-pill badge-info" style="font-size:12px;"><i>Lokal/daerah</i></span> '+
            '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota" ><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
            '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>dari : <?= $value->nama_perusahaan ?><br />'+
            '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>Status Kerja  :  <?php if ($value->status_kerja == "aktif") {echo '<span class="badge badge-pill badge-success">AKTIF</span>' ;} else echo '<span class="badge badge-pill badge-danger">ter-PHK</span>' ?><br>' +
              '<i class="fa-solid fa-hospital-user" style="margin-bottom: 10px;margin-right: 10px;"></i>Berkebutuhan Khusus : <?php if ($value->disabilitas == "T") {echo '<span class="badge badge-pill badge-success">TIDAK</span>';} else  echo '<span class="badge badge-pill badge-warning" style="color:black;">YA</span>'?> </p>'+ 

            '<a href="<?= base_url('phk/detail/' . $value->id_phk) ?>" target="_blank" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;' +
            '<?php if ($is_login == 1) { ?><a href="<?= base_url('phk/edit_phk/' . $value->id_phk) ?>" class="btn btn-link btn-sm ">Perbarui</a><?php }else{ ?><p></p><?php } ?>' +
            '<?php if ($is_login == 1) { ?><button type="button" data-toggle="modal" data-target="#modalHapusLokal<?= $value->id_phk ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</button></div><?php }else{ ?><p></p><?php } ?>');

            markersLokal.addLayer(sebaranLokal);
            map.addLayer(markersLokal);
            map.fitBounds(markersLokal.getBounds());
        
        <?php }?>

         // MARKER dengan cluster Disabilitas
        // var markersDisabilitas = L.markerClusterGroup( {
        //     iconCreateFunction: function (cluster) {
        //     var childCount = cluster.getChildCount();
        //     var c = ' marker-cluster-lokal-';
        //     if (childCount < 10) {
        //     c += 'small';
        //     } 
        //     else if (childCount < 100) {
        //     c += 'medium';
        //     } 
        //     else {
        //     c += 'large';
        //     }

        //     return new L.DivIcon({ html: '<div><span>' + childCount + '</span></div>', 
        //     className: 'marker-cluster' + c, iconSize: new L.Point(40, 40) });
        //     }
        // });
          
        // <?php foreach ($sebaran_disabilitas  as $key => $value) { ?> 
        //     var sebaranDisabilitas = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], { icon:iconDisabilitas} )
        //     .bindPopup(
        //     '<div class="container px-1 py-1">'+
        //       '<?php if ($value->image != null) { ?><center><img src="<?= base_url("assets/img/lokal/") . $value->image ?> " alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php }else{ ?><center><img src="<?= base_url("assets/img/profile/default.png")?>" alt="profile" class="img-responsive rounded-circle" style="padding-bottom: 15px; width: 100px; height: 100px; object-fit:cover; " ></center><?php } ?>'+
        //       '<h5 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $value->nama_tk ?></h5> <span class="badge badge-pill badge-info" style="font-size:12px;"><i>Lokal/daerah</i></span> '+
        //       '<p class="text-dark px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><cite title="kabupaten/kota" ><?= $value->nama_kabupaten ?> <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i></cite> <br>'+
        //       '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>dari : <?= $value->nama_perusahaan ?><br />'+
        //       '<i class="fa-solid fa-building" style="margin-bottom: 10px;margin-right: 10px;"></i>Status Kerja  :  <?php if ($value->status_kerja == "aktif") {echo '<span class="badge badge-pill badge-success">AKTIF</span>' ;} else echo '<span class="badge badge-pill badge-danger">ter-PHK</span>' ?><br>' +
        //       '<i class="fa-solid fa-hospital-user" style="margin-bottom: 10px;margin-right: 10px;"></i>Berkebutuhan Khusus : <?php if ($value->disabilitas == "T") {echo '<span class="badge badge-pill badge-success">TIDAK</span>';} else  echo '<span class="badge badge-pill badge-warning" style="color:black;">YA</span>'?> </p>'+ 

        //       '<a href="<?= base_url('phk/detail/' . $value->id_phk) ?>" target="_blank" class="btn btn-primary  " style="color:white;">Rincian</a> &nbsp;' +
        //       '<?php if ($is_login == 1) { ?><a href="<?= base_url('phk/edit_phk/' . $value->id_phk) ?>" class="btn btn-link btn-sm ">Perbarui</a><?php }else{ ?><p></p><?php } ?>' +
        //       '<?php if ($is_login == 1) { ?><button type="button" data-toggle="modal" data-target="#modalHapusPhk<?= $value->id_phk ?>" class="btn btn-link btn-sm " style="color:red;">Hapus</button></div><?php }else{ ?><p></p><?php } ?>');

        //     markersDisabilitas.addLayer(sebaranDisabilitas);
        //     map.addLayer(markersDisabilitas);
        //     map.fitBounds(markersDisabilitas.getBounds());
          
        // <?php }?>


        //   change layer function
        var overlays = {
                "UPT-BLK": markersUpt,
                // "Disabilitas": markersDisabilitas,
                "PMI": markersCpmi,
                "PMIB": markersPmib,
                "TKA": markersTka,
                "Lokal Phk": markersPhk,
                "Lokal Aktif": markersLokal,
                
            };

        var baseLayers = {
            // "Water Color":Stamen_Watercolor,
            "OSM Clean": osmOnlyLabel,
            "Google Satellite":googleSat,
            "Google Street":googleStreets,
            
            // "OpenStreetMap": osm,
        };
        var layer_baseControl= L.control.layers(baseLayers, overlays).addTo(map);


        //  jawa timur polygon geo json
        <?php foreach ($detail_kabupaten_array as $key => $value) { ?>
        $.getJSON("<?= base_url('assets/geojson/kabupaten-jatim/' . $value['geojson']) ?>", function(data) {
            geoLayer = L.geoJson(data,  {
                style : function(feature) {
                    return {
                        opacity: 0.4,
                        color: '<?= $value['warna'] ?>',
                        fillColor: '<?= $value['warna'] ?>',
                        // fillColor: 'white',
                        fillOpacity: 0.2,
                        interactive: true,
                        }    
                },
            }). addTo(map);

            // geolayer.bindTooltip("My polygon",
            // {permanent: true, direction:"center"}
            // ).openTooltip()

            geoLayer.eachLayer(function (layer) {
                layer.bindPopup('<div class="container px-1 py-1">'+
            ' &nbsp; <img src="<?= base_url("assets/img/logo_kab/") . $value['logo_kab'] ?>" alt="profile" class=" img-responsive" style="padding-bottom: 1px; width: 55px; object-fit:cover;">   '+
            '<p class="text-dark-900 px-0 py-0 " style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; "> <b> <?= $value['nama_kabupaten'] ?></b> &nbsp; <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;margin-right: 10px;"></i><br>'+
            'Luas Area , <?= $value['luas_area'] ?>&nbsp; km <sup>2</sup> '+
            '<table class="table table-sm" style=" padding: 0; margin: 0;" >' +
            '<thead style=" padding: 0; margin: 0;"><tr>'+
            '<th scope="col" style=" padding: 0; margin: 0;"><span style="color:#505050  ; font-family: sans-serif;">CPMI/PMI</span></th>' +
            '<th scope="col" style=" padding: 0; margin: 0;"><span class="badge badge-info badge-pill"><?= $value['totalCpmi'] ?> </span></th></tr> '+
            '<tr>'+
            '<th scope="col" style=" padding: 0; margin: 0;" ><span style="color:#505050  ; font-family: sans-serif;">PMI Bermasalah</span></th>' +
            '<th scope="col" style=" padding: 0; margin: 0;"><span class="badge badge-warning badge-pill"><?= $value['totalPmib'] ?></span></th></tr> '+
            '<tr>'+
            '<th scope="col" style=" padding: 0; margin: 0;" ><span style="color:#505050  ; font-family: sans-serif;">TKA (Luar Negri)</span></th>' +
            '<th scope="col" style=" padding: 0; margin: 0;"><span class="badge badge-success badge-pill"><?= $value['totalTka'] ?> </span></th></tr> '+
            '<tr>'+
            '<th scope="col" style=" padding: 0; margin: 0;" ><span style="color:#505050  ; font-family: sans-serif;">Lokal PHK</span></th>' +
            '<th scope="col" style=" padding: 0; margin: 0;"><span class="badge badge-danger badge-pill"><?= $value['totalPhk'] ?>  </span></th></tr> '+
            '<tr>'+
            '<th scope="col" style=" padding: 0; margin: 0;" ><span style="color:#505050  ; font-family: sans-serif;">Lokal AKTIF</span></th>' +
            '<th scope="col" style=" padding: 0; margin: 0;"><span class="badge badge-purple badge-pill"><?= $value['totLokal'] ?> </span></th></tr> '+
            '<tr>'+
            '<th scope="col" style=" padding: 0; margin: 0;" ><b>&nbsp;&nbsp<span style="color:black;">TOTAL DATA</span></b></th>' +
            '<th scope="col" style=" padding: 0; margin: 0;"><span class="badge badge-black badge-pill"><?= $value[0]['total'] ?>  </span></th></tr> '+
            '</table> <br>' +
            
              '<button type="button" onclick="btn_lp()" data-id="<?php echo $value['id_kabupaten'] ?>" class="btn btn-primary btn-block d-inline-block listp">Lihat Perusahaan</button></div>');
            });
        });
        <?php } ?>
        //batas function

        $.getJSON("<?= base_url() ?>beranda/kabupaten", function(data) {
            $.each(data, function(i, field) {

                var leafleticon = L.icon({
                    // iconUrl: 'assets/img/logo_kab/' + data[i].logo_kab,
                    iconUrl: 'assets/img/marker/darkcircle.png',
                    iconSize: [1, 1]
                })
                
                var lat = parseFloat(data[i].kabupaten_lat);
                var long = parseFloat(data[i].kabupaten_long);

                var phk = data[i].totalPhk;
                var pmib = data[i].totalPmib;
                var pmi = data[i].totalCpmi;
                var tka = data[i].totalTka;
                var lokal = data[i].totLokal;
                var logo = data[i].logo_kab;

                // if (phk == "0") {
                //     phk = parseInt("0");
                // } else {
                    phk = parseInt(data[i].totalPhk);
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
                    pmib = parseInt(data[i].totalPmib);
                //     var circle = L.circle([long, lat], 16000, {
                //         color: '#FEDB39',
                //         fillColor: '#FEDB39',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                // }
                // if (pmi == "0") {
                //     pmi = parseInt("0");
                // } else {
                    pmi = parseInt(data[i].totalCpmi);
                //     var circle = L.circle([long, lat], 10000, {
                //         color: '#0096FF',
                //         fillColor: '#0096FF',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                // }
                // if (tka == "0") {
                //     tka = parseInt("0");
                // } else {
                    tka = parseInt(data[i].totalTka);
                    lokal = parseInt(data[i].totLokal);
                //     var circle = L.circle([long, lat], 12000, {
                //         color: '#3CCF4E',
                //         fillOpacity: 0.3
                //     }).addTo(map);
                // }
                // if (jumlah == '' || null) {
                //     jumlah = 0;
                // } else {
                    // jumlah = parseInt(data[i].totalPhk);
                // }

                var jumlah = phk + pmib + pmi + tka + lokal;
                var bangunanMarker = L.marker([long, lat], {
                        icon: leafleticon,
                        title: data[i].nama_kabupaten,
                            }).addTo(map).bindTooltip("<center><b>"+data[i].nama_kabupaten+"</b></center>", {
                              // .openPopup().bindTooltip("<b>"+data[i].nama_kabupaten+"</b><br> ("+data[i].id_kabupaten+") aktif", {
                                permanent: true,
                                size: 8,
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
          div.innerHTML += '<svg height="25" width="100%"><circle cx="12" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#0096FF" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Pekerja Migran Indonesia (PMI)</text></svg>';
          div.innerHTML += '<br><svg height="25" width="100%"><circle cx="12" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#FEDB39" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">PMI Bermasalah (PMIB)</text></svg>';
          div.innerHTML += '<br><svg height="25" width="100%"><circle cx="12" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="green" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Asing (TKA)</text></svg> ';
          div.innerHTML += '<br> <svg height="25" width="100%"><circle cx="12" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="red" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Lokal PHK</text></svg> ';
          div.innerHTML += '<br><svg height="25" width="100%"><circle cx="12" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="purple" opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Lokal Aktif</text></svg> ';
          div.innerHTML += '<br><svg width="100%" height="20"  xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M1 22h2v-22h18v22h2v2h-22v-2zm7-3v4h3v-4h-3zm5 0v4h3v-4h-3zm-6-5h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2z" opacity="70%"/> <text x="60" y="15" style="font-family:roboto;  font-size=16px;">UPT BLK (Balai Latihan Kerja)</text></svg> ';
        //   div.innerHTML += '<br><svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#3CCF4E opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Daerah</text></svg>';
          // div.innerHTML += ' <br><i class="icon" style="background-image: url(https://d30y9cdsu7xlg0.cloudfront.net/png/194515-200.png);background-repeat: no-repeat;"></i><span>SIG</span><br>';
        //   div.innerHTML += '<svg height="25" width="100%"><line x1="0" y1="10" x2="40" y2="10" style="stroke:#293462; stroke-width:2;"/><text x="59" y="15" style="font-family:sans-serif; font-size=16px;">Garis Batas Wilayah</text>]</svg>';
          return div;
        };
        legend.addTo(map);

        // standart zoom view jatim first load
        // map.locate({setView: true, maxZoom: 30});


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
                                html += "<tr><td scope='row' style=' padding: 0; margin: 0;' class='text-center'>"+no+"</td><td style=' padding: 0; margin: 0;'>" +data.perusahaan[i].nama_perusahaan+"</td><td style=' padding: 0; margin: 0;> <button  class='btn btn-primary detailp' data-id='"+data.perusahaan[i].id+"' onclick='btn_detail_lp("+data.perusahaan[i].id+")'><a href='#'>Penghargaan</a> </button> </td></tr>";
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
            $(".alert").fadeTo(3000, 0).slideUp(250, function(){
            $(this).remove(); 
            });
        }, 10500);

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

    <script type="text/javascript">
        // Data retrieved from https://netmarketshare.com/
    // Build the chart
    Highcharts.chart('pie_chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Diagram Tenaga Kerja Provinsi se-Jawa Timur'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Prosentase',
            colorByPoint: true,
            data: [  {
                name: 'CPMI',
                y: <?php echo $presentase_cpmi ?>
            }, {
                name: 'PMI-B',
                y: <?php echo $presentase_pmib ?>
            },  {
                name: 'TKA',
                y: <?php echo $presentase_tka ?>,
                
            },{
                name: 'LOKAL PHK',
                y: <?php echo $presentase_phk ?>,
            },{
                name: 'LOKAL AKTIF',
                y: <?php echo $presentase_lok ?>,
            }, ]
        },],
    });


    // Retrieved from https://www.ssb.no/jord-skog-jakt-og-fiskeri/jakt
    Highcharts.chart('spline_chart', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Grafik Tenaga Kerja Tahunan '+<?php echo $tahun_awal ?>+'-'+<?php echo $tahun_ini ?>
        },
        subtitle: {
            align: 'center',
            text: 'Source: Dinas Tenaga Kerja & Transmigrasi Prov. Jatim'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 120,
            y: 70,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            plotBands: [{ // Highlight the two last years
                from: <?php echo $tahun_awal ?>,
                to: <?php echo $tahun_ini ?>,
                color: 'rgba(232, 232, 232, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        tooltip: {
            shared: true,
            headerFormat: '<b>Hunting season starting autumn {point.x}</b><br>'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                pointStart: <?php echo $tahun_awal ?>
            },
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [  {
            name: 'CPMI',
            data:
                [
                    <?php foreach($data_tahun_cpmi as $data){ echo $data.","; } ?>
                ]
        },{
            name: 'PMI-B',
            data:
                [
                    <?php foreach($data_tahun_pmib as $data){ echo $data.","; } ?>
                ]
        },
       
        {
            name: 'TKA',
            data:
                [
                    <?php foreach($data_tahun_tka as $data){ echo $data.","; } ?>
                ]
        },{
            name: 'LOKAL PHK',
            data:
                [
                    <?php foreach($data_tahun_phk as $data){ echo $data.","; } ?>
                ]
        },{
            name: 'LOKAL AKTIF',
            data:
                [
                    <?php foreach($data_tahun_lok as $data){ echo $data.","; } ?>
                ]
        },]
    });

    </script>

        <!-- fungsi jika tak ada image tertampil atau data null -->

    </body>

    </html>