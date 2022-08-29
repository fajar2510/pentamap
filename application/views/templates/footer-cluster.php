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
    
    <!-- Load Esri Leaflet Map  -->
    <!-- <script src="https://unpkg.com/esri-leaflet@2.5.0/dist/esri-leaflet.js" integrity="sha512-ucw7Grpc+iEQZa711gcjgMBnmd9qju1CICsRaryvX7HJklK0pGl/prxKvtHwpgm5ZHdvAil7YPxI1oWPOWK3UQ==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->

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

    <!-- select2 multiple form -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/'); ?>js-select2/js/jquery-3.4.1.min.js');?>"></script> -->
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js-select2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js-select2/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>jquery-ui/jquery-ui.min.js"></script>

    <!-- LEAFLET CENTER -->
    <!-- <script src="<?= base_url(); ?>assets/leaflet/leaflet.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   
    <!-- LEAFLET CENTER -->

    <!-- date picker untuk tahun only -->
    <script src="<?= base_url('assets/'); ?>css/date-picker-tahun/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <script>



        var map = L.map('mapcluster').setView([-7.6709737, 113.3288216], 8.5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        </script>

        
      <!-- untuk animasi loading saat memuat halaman -->
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>



</body>

</html>