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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script> -->

    <!-- <script src="<?= base_url('assets/'); ?>sweetalert2/package/dist/sweetalert2.all.min.js"></script> -->


    <script>


    var map = L.map('mapupt-index').setView([-7.530979640916379, 112.4936104206151], 5);

    // Open Street Default Layer     
    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            // maxZoom: 16,
            subdomains:['mt0','mt1','mt2','mt3']
        });
    googleStreets.addTo(map);



    var iconUpt = L.icon({
            iconUrl : '<?= base_url('assets/'); ?>img/marker/city.png',
            iconSize : [30,30],
        });
        
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

        
        
          
        <?php foreach ($sebaran_upt  as $key => $value) { ?> 
            var sebaranUpt = L.marker([<?= $value['lat_upt'] ?>, <?= $value['long_upt'] ?>], { icon:iconUpt} )
            .bindPopup(
       
                `<div class="container px-1 py-1">
            <h5 style="font-weight:bold;"><?= $value['nama_upt'] ?></h5>
            <img src="<?= base_url("assets/img/upt/") . $value['foto'] ?>" alt="upt-foto" class=" img-responsive" style="padding-bottom: 8px; width: 250; object-fit:cover;"> 
                
            <table class="table table-sm" style=" padding: 1; margin: 1;" >
            <thead style=" padding: 2; margin: 2; font-color:black;">
            <tr>
            <th scope="col" style=" padding: 0; margin: 0; color: black;">Alamat</th>
            <th scope="col" style=" padding: 0; margin: 0; "><span class="badge badge-light badge-pill">&nbsp;  &nbsp;<?= $value['alamat_upt'] ?></span></th></tr>
            <tr>
            <th scope="col" style=" padding: 0; margin: 0; color: black;">Cakupan</th>
            <th scope="col" style=" padding: 0; margin: 0; "><span class="badge badge-light badge-pill">&nbsp;  &nbsp;<?= $value['ket_upt'] ?></span></th></tr>
            
            </table></div>'`
             ).bindTooltip("<center><b><?= $value['nama_upt'] ?></b></center>", {
                permanent: true,
                size:25,
                direction: 'bottom',
                opacity: 0.85,
                sticky: false,
                className: 'leaflet-tooltip-own'
             });

            markersUpt.addLayer(sebaranUpt);
            map.addLayer(markersUpt);
            map.fitBounds(markersUpt.getBounds());

            
          
        <?php }?>

        var overlays = {
                "UPT": markersUpt
            };

        var layer_baseControl= L.control.layers( overlays).addTo(map);

    //  jawa timur polygon geo json
    <?php foreach ($detail_kabupaten as $key => $value) { ?>
        $.getJSON("<?= base_url('assets/geojson/kabupaten-jatim/' . $value->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data,  {
                style : function(feature) {
                    return {
                        opacity: 0.2,
                        color: '<?= $value->warna ?>',
                        // fillColor: '<?= $value->warna ?>',
                        fillColor: 'white',
                        fillOpacity: 0.5,
                        interactive: true,
                        }    
                 },
            }). addTo(map);

            // geolayer.bindTooltip("My polygon",
            // {permanent: true, direction:"center"}
            // ).openTooltip()

            geoLayer.eachLayer(function (layer) {
                layer.bindPopup('<div class="container px-1 py-1">'+
              '<h6 style="font-weight:bold;"><u><?= $value->nama_kabupaten ?></u></h6> '+ 
              ' &nbsp; <img src="<?= base_url("assets/img/logo_kab/") . $value->logo_kab ?>" alt="profile" class=" img-responsive" style="padding-bottom: 1px; width: 55px; object-fit:cover;"></div> ');
            });
        });
        <?php } ?>
        //batas function

    
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


</body>

</html>