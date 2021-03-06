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
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih " <b> Logout </b>" jika ingin mengakhiri sesi.</div>
                <img src="<?= base_url('assets/img/favicon/logout.png') ?>" alt="Logout" width="230" height="200">

                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                        <span class="icon text-gray-600">
                            <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Batal</span>
                    </button>
                    <form action="<?= base_url('auth/logout'); ?>">
                        <button type="submit" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </span>
                            <span class="text">Logout</span>
                        </button>
            </center>
            </form>
            <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a> -->
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->

<!-- <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script> -->

<!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script> -->
<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>

<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Load date picker -->
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>

<!-- Sweet Alert 2 -->
<!-- <script src="<?= base_url(); ?>assets/dist/sweetalert2.all.min.js"></script> -->


<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>



<!-- untuk mengambil input tanggal -->
<script>
    $(function() {
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
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

<script type="text/javascript">
    // var L = window.L;

    var map = L.map('mapp').setView([-7.6709737, 112.3288216], 8);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // use the detect retina option to load retina tiles for this layer.
    // L.esri.basemapLayer('DarkGray', {
    //     detectRetina: true
    // }).addTo(map);
    // L.esri.basemapLayer('DarkGrayLabels').addTo(map);

    var latlngs = [
        [-8.210225, 110.820616],
        [-7.879864, 111.295774],
        [-7.427994, 111.125486],
        [-7.248205, 111.188658],
        [-7.346281, 111.427610],
        [-7.180084, 111.570432],
        [-7.002922, 111.606138],
        [-6.926585, 111.570432],
        [-6.749327, 111.685789],
        [-6.762965, 111.965940],
        [-6.888412, 112.100523],
        [-6.850236, 112.564695],
        [-6.861144, 113.929746],
        [-7.120129, 114.783933],
        [-7.844494, 114.468076],
        [-8.434495, 114.358213],
        [-8.657214, 114.577940],
        [-8.763096, 114.580686],
        [-8.744094, 114.338987],
        [-8.630061, 114.325254],
        [-8.507844, 113.5822181],
        [-8.288566, 113.205936],
        [-8.443456, 112.642887],
        [-8.302156, 111.89581],
        [-8.370095, 111.673344],
        [-8.231487, 111.080082],
        [-8.207021, 110.893314],
    ];
    var polygon = L.polygon(latlngs, {
        color: 'white'
    }).addTo(map);

    var latlngs2 = [
        [-8.210225, 110.820616],

    ];
    var polygon = L.polygon(latlngs2, {
        color: 'blue'
    }).addTo(map);


    // $.getJSON("<?= base_url() ?>beranda/phk", function(phk) {
    //     $.each(phk, function(i, field) {
    //         var phk_max = phk[i].jumlah_phk;
    //     });
    // });

    // $.getJSON("<?= base_url() ?>beranda/pmi", function(pmi) {
    //     $.each(pmi, function(i, field) {
    //         var pmi_max = pmi[i].jumlah_pmi;
    //     });
    // });

    // $.getJSON("<?= base_url() ?>beranda/pmib", function(pmib) {
    //     $.each(pmib, function(i, field) {
    //         var pmib_max = pmib[i].jumlah_pmib;
    //     });
    // });

    // $.getJSON("<?= base_url() ?>beranda/tka", function(tka) {
    //     $.each(tka, function(i, field) {
    //         var tka_max = tka[i].jumlah_tka;
    //     });
    // });

    $.getJSON("<?= base_url() ?>beranda/kabupaten", function(data) {
        $.each(data, function(i, field) {

            var leafleticon = L.icon({
                iconUrl: 'assets/img/logo_kab/' + data[i].logo_kab,
                iconSize: [38, 45]
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

                    color: '#F93333',


                    fillOpacity: 0.5

                }).addTo(map);
            }

            if (pmib == "0") {
                pmib = parseInt("0");

            } else {
                pmib = parseInt(data[i].jumlah_pmib);
                var circle = L.circle([long, lat], 16000, {

                    color: 'yellow',

                    fillColor: 'yellow',
                    fillOpacity: 0.5

                }).addTo(map);
            }

            if (pmi == "0") {
                pmi = parseInt("0");
            } else {
                pmi = parseInt(data[i].jumlah_pmi);
                var circle = L.circle([long, lat], 10000, {

                    color: '#1464C4',
                    fillColor: '#1464C4',

                    fillOpacity: 0.5

                }).addTo(map);
            }

            if (tka == "0") {
                tka = parseInt("0");
            } else {
                tka = parseInt(data[i].jumlah_tka);
                var circle = L.circle([long, lat], 12000, {

                    color: '#0BF367',


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
                    title: "hahah",
                }).addTo(map)
                .bindPopup("<u><b><center>" + data[i].nama_kabupaten +
                    "</b></u><br><br><table class='table table-bordered' border='1'><thead><td><b>Keterangan</b></td><td><b>Jumlah</b></td></thead><tr style='background-color:#F93333'><td style='color:white'>Jumlah Pekerja PHK</td><td style='color:white'><center>" + phk + "</center></td></tr><tr style='background-color:#F3DB0B'><td style='color:#312A28'> <b> Jumlah PMI-B <b/></td ><td style='color:#312A28'><center>" + pmib + "</center></td></tr><tr style='background-color:#0BF367'><td style='color:#110F0F'>Jumlah TKA</td><td style='color:#110F0F'><center>" + tka + "</center></td></tr><tr style='background-color:#1464C4'><td style='color:white'>Jumlah PMI</td><td style='color:white'><center>" + pmi + "</center></td></tr><tr><td>Total</td><td><center>" + jumlah + "</center></td></tr></table>")
                .openPopup().bindTooltip(data[i].nama_kabupaten, {
                    permanent: true,
                    direction: 'bottom',
                    opacity: 0.7
                });


        });
    });
</script>
<script>
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
</script>



</body>

</html>