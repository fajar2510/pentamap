<!-- Footer -->

<footer class="sticky-footer bg-white">
            <hr>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright All Reserved &copy; <?= date('Y'); ?>&nbsp; P E N T A | DISNAKERTRANS JAWA TIMUR</span>
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
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>

    <!-- Load Bootsrap 3 bundle  -->
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/js-select2/js/jquery-3.4.1.min.js');?>"></script> -->

    <!-- select2 multiple form -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/'); ?>js-select2/js/jquery-3.4.1.min.js');?>"></script> -->
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js-select2/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js-select2/js/bootstrap-select.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/'); ?>jquery-ui/jquery-ui.min.js"></script>

    <script src="<?= base_url(); ?>assets/leaflet/leaflet.js"></script>
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet-fullscreen-master/Control.FullScreen.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script> -->

    <!-- date picker untuk tahun only -->
    <script src="<?= base_url('assets/'); ?>css/date-picker-tahun/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <!-- select2 multiple form -->
    <script type="text/javascript">
    $(document).ready(function(){
			$('.bootstrap-select').selectpicker();


                //AJAX REQUEST TO GET SELECTED PRODUCT
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

			//GET CONFIRM DELETE
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
        });]
    </script>


    <script>
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
    </script>

   

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

     <!-- script map utama -->
    <script type="text/javascript">
        // var L = window.L;

        var map = L.map('mapp').setView([-7.6709737, 113.3288216], 8.5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
             maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            
        }).addTo(map);

        var latlngs = [
            
            [-7.032749742778853,
              112.67578124999999
              
            ],
            [ -7.119970883040842,
              112.69226074218749
             
            ],
            [ -7.1663003819031825,
              112.71148681640625
             
            ],
            [-7.163575247345454,
              112.8350830078125
              
            ],
            [ -7.228973966601107,
              113.17291259765625
             
            ],
            [-7.267118852885314,
              113.50250244140624
              
            ],
            [-7.149949330320771,
              113.61236572265624
              
            ],
            [-7.141773584935546,
              113.89251708984374
              
            ],
            [-7.0545565715284955,
              113.90625
              
            ],
            [-7.032749742778853,
              113.97491455078125
              
            ],
            [-6.989133016574015,
              114.11773681640625
              
            ],
            [-6.901887376486809,
              114.06829833984375
              
            ],
            [ -6.86643922958172,
              113.89251708984374
             
            ],
            [-6.890980536470734,
              113.5272216796875
              
            ],
            [-6.901887376486809,
              113.203125
              
            ],
            [-6.896433987868805,
              112.84881591796875
              
            ],
            [-7.040927423719915,
              112.708740234375
              
            ],
            [-7.032749742778853,
              112.67578124999999
              
            ]
      
        ];
        var polygon = L.polygon(latlngs, {
            color: '#D07000'
        }).addTo(map);

        var latlng_jatim = [
            [-8.2169271321774,
              110.89599609375
              
            ],
            [-8.260418916317658,
              111.005859375
              
            ],
            [-8.227800526152265,
              111.09374999999999
              
            ],
            [-8.276727101164033,
              111.14868164062499
              
            ],
            [ -8.276727101164033,
              111.42333984375
             
            ],
            [-8.369127356573127,
              111.78039550781249
              
            ],
            [ -8.303905908124174,
              111.7474365234375
             
            ],
            [-8.325647599239051,
              112.21435546875
              
            ],
            [ -8.439771599521729,
              112.6318359375
             
            ],
            [ -8.336517992258848,
              112.9669189453125
             
            ],
            [-8.293034610795036,
              113.2305908203125
              
            ],
            [-8.390865416667355,
              113.389892578125
              
            ],
            [ -8.510402920862324,
              113.7030029296875
             
            ],
            [-8.646195681181904,
              114.1864013671875
              
            ],
            [-8.60817860744248,
              114.224853515625
              
            ],
            [ -8.662487539644008,
              114.356689453125
             
            ],
            [ -8.760223824796954,
              114.356689453125
             
            ],
            [ -8.77651071605234,
              114.5654296875
             
            ],
            [-8.705929041749668,
              114.60937499999999
              
            ],
            [-8.646195681181904,
              114.4720458984375
              
            ],
            [ -8.477805461808186,
              114.3951416015625
             
            ],
            [-8.49410453755187,
              114.3621826171875
              
            ],
            [-7.966757602932168,
              114.4281005859375
              
            ],
            [ -7.83073144786945,
              114.488525390625
             
            ],
            [ -7.705548128425908,
              114.246826171875
             
            ],
            [-7.721878499324502,
              114.14245605468749
              
            ],
            [-7.612997502224091,
              114.0216064453125
              
            ],
            [ -7.694660864529159,
              113.9447021484375
             
            ],
            [ -7.716435112415487,
              113.7579345703125
             
            ],
            [-7.710991655433217,
              113.4722900390625
              
            ],
            [-7.787193658965735,
              113.2965087890625
              
            ],
            [-7.732765062729807,
              113.15917968749999
              
            ],
            [ -7.645664723491027,
              112.9229736328125
             
            ],
            [ -7.487750181700039,
              112.82409667968749
             
            ],
            [-7.297087564171992,
              112.8515625
              
            ],
            [ -7.2180748352370445,
              112.78976440429688
             
            ],
            [-7.19559454792355,
              112.74238586425781
              
            ],
            [ -7.231698708367139,
              112.6702880859375
             
            ],
            [ -7.155399745953593,
              112.65655517578125
             
            ],
            [ -7.1226962775182825,
              112.62908935546874
             
            ],
            [ -7.046379130937701,
              112.642822265625
             
            ],
            [-6.86643922958172,
              112.59887695312499
              
            ],
            [ -6.871892962887516,
              112.4066162109375
             
            ],
            [-6.904614047238073,
              112.071533203125
              
            ],
            [ -6.779171028142861,
              111.9561767578125
             
            ],
            [ -6.751896464843375,
              111.6815185546875
             
            ],
            [-6.931879889517204,
              111.5826416015625
              
            ],
            [-7.100892668623642,
              111.6265869140625
              
            ],
            [-7.291638856626342,
              111.4453125
              
            ],
            [ -7.384257828309248,
              111.4398193359375
             
            ],
            [ -7.286190082778849,
              111.2860107421875
             
            ],
            [ -7.27529233637217,
              111.14868164062499
             
            ],
            [-7.618442212274373,
              111.1761474609375
              
            ],
            [-7.759980241585301,
              111.214599609375
              
            ],
            [-7.743651345263343,
              111.302490234375
              
            ],
            [-7.934115417828389,
              111.258544921875
              
            ],
            [-7.917793352627911,
              111.170654296875
              
            ],
            [-8.064668502396389,
              111.1212158203125
              
            ],
            [-8.021155456563902,
              111.0662841796875
              
            ],
            [-8.064668502396389,
              110.950927734375
              
            ],
            [ -8.2169271321774,
              110.89599609375
             
            ]

        ];
        var polygon = L.polygon(latlng_jatim, {
            color: '#D07000'
        }).addTo(map);


        var latlngs2 = [
            [-8.210225, 110.820616],

        ];
        var polygon = L.polygon(latlngs2, {
            color: '#D07000'
        }).addTo(map);

        $.getJSON("<?= base_url() ?>beranda/kabupaten", function(data) {
            $.each(data, function(i, field) {

                var leafleticon = L.icon({
                    iconUrl: 'assets/img/logo_kab/' + data[i].logo_kab,
                    iconSize: [50, 50]
                })
                
                var lat = parseFloat(data[i].kabupaten_lat);
                var long = parseFloat(data[i].kabupaten_long);

                var phk = data[i].jumlah_phk;
                var pmib = data[i].jumlah_pmib;
                var pmi = data[i].jumlah_pmi;
                var tka = data[i].jumlah_tka;
                var logo = data[i].logo_kab;

                if (phk == "0") {
                    phk = parseInt("0");
                } else {
                    phk = parseInt(data[i].jumlah_phk);
                    var circle = L.circle([long, lat], 14000, {
                        color: '#D61C4E',
                        fillOpacity: 0.5
                    }).addTo(map);
                }
                if (pmib == "0") {
                    pmib = parseInt("0");
                } else {
                    pmib = parseInt(data[i].jumlah_pmib);
                    var circle = L.circle([long, lat], 16000, {
                        color: '#FEDB39',
                        fillColor: '#FEDB39',
                        fillOpacity: 0.5
                    }).addTo(map);
                }
                if (pmi == "0") {
                    pmi = parseInt("0");
                } else {
                    pmi = parseInt(data[i].jumlah_pmi);
                    var circle = L.circle([long, lat], 10000, {
                        color: '#0096FF',
                        fillColor: '#0096FF',
                        fillOpacity: 0.5
                    }).addTo(map);
                }
                if (tka == "0") {
                    tka = parseInt("0");
                } else {
                    tka = parseInt(data[i].jumlah_tka);
                    var circle = L.circle([long, lat], 12000, {
                        color: '#7DCE13',
                        fillOpacity: 0.5
                    }).addTo(map);
                }
                if (jumlah == '' || null) {
                    jumlah = 0;
                } else {
                    jumlah = parseInt(data[i].jumlah_phk);
                }

                var jumlah = phk + pmib + pmi + tka;
                bangunanMarker = L.marker([long, lat], {
                        icon: leafleticon,
                        title: "Kabupaten/kota",
                    }).addTo(map)
                    .bindPopup("<u><b><center>" + data[i].nama_kabupaten +
                    "</b></u><br><br><ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center p-2'>ter-PHK<span class='badge badge-danger badge-pill'>" + phk + "</span></li><li class='list-group-item d-flex justify-content-between align-items-center p-2'>PMI-Bermasalah<span class='badge badge-warning badge-pill'>" + pmib + "</span></li><li class='list-group-item d-flex justify-content-between align-items-center p-2'>CPMI<span class='badge badge-secondary badge-pill'>" + tka + "</span></li><li class='list-group-item d-flex justify-content-between align-items-center p-2'>TKA (Asing)<span class='badge badge-info badge-pill'>" + pmi + "</span></li><li class='list-group-item d-flex justify-content-between align-items-center px-2 font-weight-bold'><b>TOTAL</b><span class='badge badge-dark badge-pill'>" + jumlah + "</span></li></ul>" +
                        "<br><button type='button' onclick='btn_lp()' class='btn btn-sm btn btn-light listp' data-id='"+data[i].id_kabupaten+"'><b>Rincian Perusahaan</b></button>")
                    .openPopup().bindTooltip("<center><b>"+data[i].nama_kabupaten+"</b><br> <b>  ("+ jumlah +") </b> orang </center>", {
                      // .openPopup().bindTooltip("<b>"+data[i].nama_kabupaten+"</b><br> ("+data[i].id_kabupaten+") aktif", {
                        permanent: true,
                        direction: 'bottom',
                        opacity: 0.9
                    });
            });
        });

        map.locate({setView: true, maxZoom: 16});

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

        // LIST PERUSAHAAN
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
                        var html="<center><h5>Daftar Perusahaan</h5></center><table class='table'><thead><tr><th scope='col'>No</th><th scope='col'>Nama Perusahaan</th>"
                        html+="<th scope='col'>Aksi</th></tr></thead><tbody>";
                        var nama_kabupaten="";
                        nama_kabupaten += "WILAYAH : "+data.kab[0].nama_kabupaten;
                        if (data.perusahaan.length == 0) {
                            html += "<tr><td scope='row' colspan='4'><center>Tidak ada data Perusahaan</center></td></tr>";
                        }else{
                            var no=1;
                            for(i=0; i<data.perusahaan.length; i++)
                            {
                                html += "<tr><td scope='row'>"+no+"</td><td>"+data.perusahaan[i].nama_perusahaan+"</td><td><button class='btn btn-outline-primary detailp' data-id='"+data.perusahaan[i].id+"' onclick='btn_detail_lp("+data.perusahaan[i].id+")'><i class='fa-solid fa-clock-rotate-left' aria-hidden='true'></i> Riwayat Usulan Penghargaan</button></td></tr>";
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
                        list_reward+="<br><center><h5>Daftar Reward</h5></center><table class='table'><thead><tr><th scope='col'>No</th><th scope='col'>Jenis Disabilitas</th><th scope='col'>Ragam Disabilitas</th>"
                        list_reward+="<th scope='col'>Tanggal Diusulkan</th></tr></thead><tbody>";
                        for(i=0; i<1; i++){
                            html += "<div class='row'><label class='col-sm-3 col-form-label'>Nama Perusahaan </label><label class='col-sm-8 col-form-label'>:"+data.perusahaan[i].nama_perusahaan+"</label></div>";
                            html += "<div class='row'><label class='col-sm-3 col-form-label'>Nama Pimpinan </label><label class='col-sm-8 col-form-label'>:"+data.perusahaan[i].nama_pimpinan+"</label></div></div>";
                            html += "<div class='row'><label class='col-sm-3 col-form-label'>Sektor Usaha </label><label class='col-sm-8 col-form-label'>:"+data.perusahaan[i].nama_sektor+"</label></div></div>";
                        }
                        var no=1;
                        for(i=0; i<data.perusahaan.length; i++){
                            if (data.perusahaan[i].id_reward != null) {
                                list_reward += "<tr><td scope='row'>"+no+"</td><td>"+data.perusahaan[i][0]+"</td><td scope='row'>"+data.perusahaan[i][1]+"</td><td scope='row'>"+data.perusahaan[i].tanggal_usul+"</td></tr>";
                                no+=1;
                                ada_reward +=1;   
                            }
                            else{
                                list_reward += "<tr><td scope='row' colspan='4'><center>Tidak ada data Reward</center></td></tr>";
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
        // $(document).ready(function(){
 
        // $('.btn_lp').on('click', function(){ 
        //     alert("masuk");
        //     return false;
        //     var id=$(this).val();
        //     $.ajax({
        //         url : "<?php echo site_url('beranda/list_perusahaan');?>",
        //         method : "POST",
        //         data : {id: id},
        //         async : true,
        //         dataType : 'json',
        //         success: function(data){
        //             var html = '';
        //             var i;
        //             for(i=0; i<data.length; i++){
        //                 html += '<option value='+data[i].subcategory_id+'>'+data[i].subcategory_name+'</option>';
        //             }
        //             $('#sub_category').html(html);

        //         }
        //     });
            // return false;
        // }); 
        
        // });
    </script>


    <!-- script map utama -->

    <!-- script map filter tahun -->
    <!-- <script>
        $(function() {

            $('#tahun_pilih').on('change', function() {
                var tahun = $(this).val();
                $('#tahun_peta').html(tahun);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>beranda/kabupaten",
                    data: {
                        tahun: tahun
                    },
                    success: function(hasil) {
                        $('#mapp').html(hasil);
                    }
                });
            });
        });

        function tahun() {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>beranda/kabupaten",
                data: 'tahun=' + $('#tahun_pilih').val(),
                dataType: "json",
                success: function(hasil) {
                    $('#mapp').html(hasil);
                }
            });
        }
    </script> -->


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
            $(".alert").fadeTo(2000, 0).slideUp(200, function(){
            $(this).remove(); 
            });
        }, 4000);

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

          // fungsi tampil lebih banyak data table di tabel
          // $(document).ready(function() {                   // function error jangan di jalankan yaa
          //     $('#dataTable').dataTable({
          //         "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
          //         "iDisplayLength": 25
          //     });
          // } );

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
      //changeYear event trigger's
      dp.on('changeYear', function (e) {    
        //do something here
        alert("Tahun dipilih ");
      });
    </script>

    <script>
    // show picture when choose from librarary
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#fotoBaru')
                        .attr('src', e.target.result);
                    
                    var gambar_kedua = "<img id='fotoBaru' src='http://placehold.it/180' class='img-thumbnail' alt='Foto Profil Baru' style='object-fit: cover;' />"
                    $('#gambar_pertama').html("");
                    $('#gambar_kedua').html(gambar_kedua);
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
    

    </body>

    </html>