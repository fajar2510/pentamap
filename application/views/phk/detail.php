<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h3 style="font-family:'Roboto';font-size:15;">Edit Data <?= $title; ?> <?= date('Y'); ?></h3>
        <a href="<?= base_url('tka'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-angle-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a> -->

        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print </a> -->
    </div>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>


            <div class="card shadow mb-0">
                <div class="card-header py-2 ">
                    
                    
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <p style="font-family:'helvetica';font-size:15;">Rincian Data<b> <?= $lokasi->nama_tk ?></b>  <?= $title; ?> <b> <?= date('Y'); ?></b></p>
                            
                            <a href="<?= base_url('beranda'); ?>" class="btn btn-light btn-icon-split " class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-angle-left"></i>
                                </span>
                                <span class="text">Peta</span>
                            </a>
                        </div>
                        <div>
                            <form action="<?= base_url('phk/print/' . $lokasi->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <div id="mapltlg_detail"></div>
                                        </div>
                                        <div class="col-sm-7"> 

                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                <th colspan="4" class="text-center">Data Tenaga Kerja Lokal/Daerah <?= date('Y'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th width="25%" scope="row">Nama Lengkap  </th>
                                                    <td width="5%">:</td>
                                                    <td width="40%"><?= $lokasi->nama_tk ?></td>
                                                    <td width="35%" rowspan="5"> <img src="<?= base_url('assets/img/lokal/') . $lokasi->image ?>"  alt="Profile Picture" 
                                                        class="img-thumbnail img-fluid " style="width: 160px; height: 190px; object-fit: cover;"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Jenis Kelamin</th>
                                                    <td>:</td>
                                                    <td ><?= $lokasi->jenis_kel ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">NIK</th>
                                                    <td>:</td>
                                                    <td><?= $lokasi->nomor_identitas ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">KPJ</th>
                                                    <td>:</td>
                                                    <td><?= $lokasi->kpj ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">No. Handphone</th>
                                                    <td>:</td>
                                                    <td><?= $lokasi->kontak ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Alamat Lengkap</th>
                                                    <td>:</td>
                                                    <td colspan="3"><?= $lokasi->alamat_tk ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Lat/Long</th>
                                                    <td>:</td>
                                                    <td><?= $lokasi->latitude ?></td>
                                                    <td><?= $lokasi->longitude ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kabupaten/kota</th>
                                                    <td>:</td>
                                                    <td colspan="3"> <?= $lokasi->nama_kabupaten ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Perusahaan</th>
                                                    <td>:</td>
                                                    <td colspan="3"><?= $lokasi->nama_perusahaan ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kode Segmen</th>
                                                    <td>:</td>
                                                    <td colspan="3"><?= $lokasi->kode_segmen ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Status</th>
                                                    <td>:</td>
                                                    <td colspan="3"><?= $lokasi->status_kerja ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Disabilitas ?</th>
                                                    <td>:</td>
                                                    <td colspan="3"><?= $lokasi->disabilitas ?></td>
                                                </tr>
                                                 

                                            </tbody>
                                        </table>
                                         <hr>
                                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                                             <p ><small><i>&nbsp;terakhir diperbarui pada &nbsp;  <?= $lokasi->date_created ?> </i> </small> </p> 
                                            <!-- <button class="btn btn-info btn-icon-split" type="submit"  aria-haspopup="true" aria-expanded="false">
                                                <span class="icon text-white-50">
                                                    <i class="fa-solid fa-print"></i>
                                                </span>
                                            <span class="text" >Cetak</span>
                                            </button> -->
                                        </div>
                                       
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- footer start  -->
<!-- Footer -->

<footer class="sticky-footer bg-white">
            <hr>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright All Reserved &copy; <?= date('Y'); ?>&nbsp;  Sistem Informasi Geografis Tenaga Kerja Jatim - PENTA | DISNAKERTRANS JAWA TIMUR</span>
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
    <script src="<?= base_url(); ?>assets/leaflet/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
    <!-- leaflet full screen -->
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-fullscreen-master/Control.FullScreen.js"></script>
    <!-- leflet search -->
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-search/src/leaflet-search.js"></script>

    <!-- date picker untuk tahun only -->
    <script src="<?= base_url('assets/'); ?>css/date-picker-tahun/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>



    <!-- select2 multiple form -->


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

    <!-- untuk ubah status hak akses dengan realtime -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?> ",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });
        });
    </script>

    <!-- untuk memanggil id dari baris tabel yang ingin di hapus -->
    <script type="text/javascript">
        //Hapus Data
        $(document).ready(function() {
            $('#modalHapus').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>


    <!-- untuk menampilkan form date range bootstrap -->
    <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function() {
                return $('#endDate').val();
            }
        });
        $('#awal').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function() {
                return $('#startDate').val();
            }
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


      <!-- MAP untuk get koordinat lat long -->
    <script>

        var map = L.map('mapltlg_detail').setView([<?= $lokasi->latitude ?>, <?= $lokasi->longitude ?>], 9);

        // Open Street Layer
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        // Google Street Layer
        googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            // maxZoom: 16,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        googleStreets.addTo(map);

        //batas function

        /*Legend specific*/
        var legend = L.control({ position: "bottomright" });

        legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Detail Lokasi</h4>";
        return div;
        };
        legend.addTo(map);

        // mengambil nilai lat long function
        map.attributionControl.setPrefix(false);
        
        L.marker([<?= $lokasi->latitude ?>, <?= $lokasi->longitude ?>])
        .addTo(map)
        .bindPopup('<center><div class="container px-0 py-0"><img src="<?= base_url("assets/img/lokal/") . $lokasi->image ?>" alt="profile" class=" img-responsive" style="padding-bottom: 15px; width: 100px; height: 90px; object-fit:cover;  border-radius: 10%">'+
              '<small><p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; font-weight:bold; padding:1px; margin:1px;"><span class="badge badge-pill badge-info" ><i>Lokal</i></span>&nbsp;<?= $lokasi->nama_tk ?> </p></small> </div></center> ')
        .openPopup();
        
       

                
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
    

    </body>

    </html>