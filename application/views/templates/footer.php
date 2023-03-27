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
    <!-- <script src="<?= base_url(); ?>assets/leaflet/leaflet.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
    <!-- leaflet full screen -->
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-fullscreen-master/Control.FullScreen.js"></script>
    <!-- leflet search -->
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-search/src/leaflet-search.js"></script>
    	
    <!-- leflet label -->
    <!-- <script src="<?= base_url('assets/'); ?>leaflet/Leaflet.label/dist/leaflet.label.js"></script> -->
    <!-- leflet legenda -->
    <!-- <script src="<?= base_url('assets/'); ?>leaflet/leaflet.Legend/src/leaflet.legend.js"></script> -->
   
    <!-- LEAFLET CENTER -->

    <!-- date picker untuk tahun only -->
    <script src="<?= base_url('assets/'); ?>css/date-picker-tahun/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script> -->



    <!-- select2 multiple form -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.bootstrap-select').selectpicker();

          //AJAX REQUEST TO GET SELECTED JENIS DAN RAGAM DISABILITAS
            $.ajax({
				url: "<?php echo site_url('reward/get_jenis_disabilitas');?>",
				method: "POST",
				// data :{id_jenis:id_jenis},
				cache:false,
				success : function(data){
                    log("masuk");
					var item=data;
					var val1=item.replace("[","");
					var val2=val1.replace("]","");
					var values=val2;
					$.each(values.split(","), function(i,e){
						$(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
						$(".strings").selectpicker('refresh');
                        });
                    }                   
                });
                return false;
			});
	  </script>
	

        <!-- perhitungan otomasi jumlah disabilitas dan total tenaga kerja di perusahaan -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#disabilitas_L, #disabilitas_P, #tenaga_kerja_L, #tenaga_kerja_P",).keyup(function() {
                var disabilitas_P  = $("#disabilitas_P").val();
                var disabilitas_L = $("#disabilitas_L").val();
                var tenaga_kerja_P  = $("#tenaga_kerja_P").val();
                var tenaga_kerja_L = $("#tenaga_kerja_L").val();

                var disabilitas_total = parseInt(disabilitas_P) + parseInt(disabilitas_L);
                $("#disabilitas_total").val(disabilitas_total);

                var tenaga_kerja_total = parseInt(tenaga_kerja_P) + parseInt(tenaga_kerja_L);
                $("#tenaga_kerja_total").val(tenaga_kerja_total);

                var presentase  = (parseInt(disabilitas_total) / parseInt(tenaga_kerja_total)) * 100;

                $("#presentase").val(presentase.toFixed(1));
            });
        });
    
    </script>


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

     <!-- dinamic select option untuk pilih alamat  -->
    <!-- <script>
        function tampilKabupaten() {
            kdprop = document.getElementById("provinsi_id").value;
            $.ajax({
                url: "<?php echo base_url(); ?>pmi/pilih_kabupaten/" + kdprop + "",
                success: function(response) {
                    $("#kabupaten_id").html(response);
                },
                dataType: "html"
            });
            return false;
        }

        function tampilKecamatan() {
            kdkab = document.getElementById("kabupaten_id").value;
            $.ajax({
                url: "<?php echo  base_url(); ?>pmi/pilih_kecamatan/" + kdkab + "",
                success: function(response) {
                    $("#kecamatan_id").html(response);
                },
                dataType: "html"
            });
            return false;
        }

        function tampilKelurahan() {
            kdkec = document.getElementById("kecamatan_id").value;
            $.ajax({
                url: "<?php echo  base_url(); ?>pmi/pilih_kelurahan/" + kdkec + "",
                success: function(response) {
                    $("#kelurahan_id").html(response);
                },
                dataType: "html"
            });
            return false;
        }
    </script> -->

    <!-- AUTO COMPLETE -->
    <script  type="text/javascript">
                //autocomplete tenaga kerja lokal add
                $(function () {
                    $("id_perusahaan").autocomplete({
                        source: "<?php echo base_url() ?>/index.php",
                        minLength: 1
                    });
                });
    </script>


      <!-- MAP untuk get koordinat lat long -->
    <script>

        var curLocation = [0,0];
        if (curLocation[0] == 0 && curLocation[1]==0) {
        curLocation = [-7.5409737, 112.5288216];
        }


        var map = L.map('mapltlg').setView([-7.330979640916379, 112.4936104206151], 8.5);

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

         //   change layer function

        var baseLayers = {
            
            // "Water Color":Stamen_Watercolor,
            "OpenStreetMap": osm,
            "Google Satellite":googleSat,
            "Google Street":googleStreets,
            
        };
        var layer_baseControl= L.control.layers(baseLayers).addTo(map);
        //batas function

        /*Legend specific*/
        var legend = L.control({ position: "bottomright" });

        legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Pilih Lokasi</h4>";
        div.innerHTML += '<svg height="25" width="100%"><text x="59" y="15" style="font-family:sans-serif; font-size=16px;">Tarik Marker ke titik Lokasi </text></svg>';

        //   div.innerHTML += '<br><svg height="25" width="100%"><circle cx="25" cy="10" x1="10" y1="10" x2="40" y2="10" r="7" stroke="grey" stroke-width="1" fill="#3CCF4E opacity="70%"/> <text x="60" y="15" style="font-family:roboto; font-size=16px;">Tenaga Kerja Daerah</text></svg>';
        // div.innerHTML += ' <br><i class="icon" style="background-image: url(https://d30y9cdsu7xlg0.cloudfront.net/png/194515-200.png);background-repeat: no-repeat;"></i><span>SIG</span><br>';

        return div;
        };
        legend.addTo(map);

        // mengambil nilai lat long function
        map.attributionControl.setPrefix(false);
        
        // L.marker([50.5, 30.5]).addTo(map);

        var marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true'
        }).bindPopup(position).update();
        $("#lat").val(position.lat); 
        $("#long").val(position.lng).keyup(); 
        });

        $("#lat, #long").change(function()  {
        var position = [parseInt($("#lat").val()),parseInt($("#long").val()) ];
        marker.setLatLng(position, {
            draggable : 'true'
        }).bindPopup(position).update();
        map.panTo(position); 
        });

        map.addLayer(marker);

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


        //  jawa timur polygon geo json
        <?php foreach ($kabupaten as $key => $value) { ?>
        $.getJSON("<?= base_url('assets/geojson/kabupaten-jatim/' . $value['geojson']) ?>", function(data) {
            geoLayer = L.geoJson(data,  {
                style : function(feature) {
                    return {
                        opacity: 0.3,
                        color: '<?= $value['warna'] ?>',
                        // fillColor: '<?= $value['warna'] ?>',
                        fillColor: 'white',
                        fillOpacity: 0.1,
                        interactive: true,
                        }    
                },
            }). addTo(map);
   
        });
        <?php } ?>
        //batas function

        </script>



    

    <script type="text/javascript">
        $(document).ready(function() {
            $("#perusahaan").autocomplete({
                source : "<?php echo site_url('reward/get_autofill/?'); ?>",
                select : function(event, ui) {
                    $('[name="id_perusahaan"]'). val(ui.item.id_perusahaan);
                    $('[name="nama_perusahaan"]'). val(ui.item.label);
                    $('[name="kabupaten_kota"]'). val(ui.item.kabupaten_kota);
                    $('[name="nama_perusahaan"]'). val(ui.item.nama_perusahaan);
                    $('[name="nama_pimpinan"]'). val(ui.item.nama_pimpinan);
                    $('[name="nama_kontak_person"]'). val(ui.item.nama_kontak_person);
                    $('[name="no_kontak_person"]'). val(ui.item.no_kontak_person);
                    $('[name="alamat_perusahaan"]'). val(ui.item.alamat_perusahaan);
                    $('[name="no_perusahaan"]'). val(ui.item.no_perusahaan);
                    $('[name="email_perusahaan"]'). val(ui.item.email_perusahaan);
                    $('[name="jenis_perusahaan"]'). val(ui.item.jenis_perusahaan);
                    $('[name="sektor_usaha"]'). val(ui.item.sektor_usaha);

                }
            });
        });

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

    
    <!-- <script>
      $("#bulan").datepicker({
            onSelect: function() { 
                var dateObject = $(this).datepicker('getDate'); 
            }
        });
    </script> -->
   
    <script>
      // date picker untuk memilih hanya tahun saja
      var dp= $("#tahun").datepicker({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years",
          autoclose:true
        });   

    var dp= $("#tahun_bulan").datepicker({
        format: "yyyy-mm",
        viewMode: "months", 
        minViewMode: "months",
        autoclose:true
    });   
      //changeYear event trigger's
      dp.on('changeYear', function (e) {    
        //do something here
        // alert("Tahun dipilih ");
      });
    </script>

    <script>
    // show picture when choose from librarary
    function readURL(input) {
        // alert("test"); return false;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var foto1 = "<img class='fotoBaru' src='http://placehold.it/180' class='img-fluid' style='width: 180px; height: 180px; object-fit: cover; padding-bottom:20px;'/>";
                $('.foto1').html(foto1);

                reader.onload = function (e) {
                    $('.fotoBaru')
                        .attr('src', e.target.result);
                    
                    var gambar_kedua = "<img class='fotoBaru' src='http://placehold.it/180' class='img-thumbnail' alt='Foto Profil Baru' style='object-fit: cover;' />"
                    $('#gambar_pertama').html("");
                    $('#gambar_kedua').html(gambar_kedua);
                    $('.foto2').html("");
                };

                reader.readAsDataURL(input.files[0]);
             }
          }
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

     <!-- VALIDASI FORM HANYA HURUF dan hanya angka  -->
    <script type="text/javascript">
        const inputNama = document.querySelector('#nama');

        inputNama.addEventListener('input', () => {
        const namaValue = inputNama.value;
        const pattern = /^[a-zA-Z\s]*$/;

        if (!pattern.test(namaValue)) {
            inputNama.setCustomValidity('Format salah, Hanya gunakan Huruf');
        } else {
            inputNama.setCustomValidity('');
        }
        });

    </script>

    

    </body>

    </html>