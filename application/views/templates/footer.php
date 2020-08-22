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

    var leafleticon = L.icon({
        iconUrl: 'assets/img/map.png',
        iconSize: [38, 45]
    })

    $.getJSON("<?= base_url() ?>beranda/kabupaten", function(data) {
        $.each(data, function(i, field) {

            var lat = parseFloat(data[i].kabupaten_lat);
            var long = parseFloat(data[i].kabupaten_long);

            var phk = data[i].jumlah_phk;
            var pmib = data[i].jumlah_pmib;
            var pmi = data[i].jumlah_pmi;
            var tka = data[i].jumlah_tka;

            if (phk == '' || null) {
                phk = 0;
            } else {
                phk = data[i].jumlah_phk;
            }

            if (pmib == '' || null) {
                pmib = 0;
            } else {
                pmib = data[i].jumlah_pmib;
            }

            if (pmi == '' || null) {
                pmi = 0;
            } else {
                pmi = data[i].jumlah_pmi;
            }

            if (tka == '' || null) {
                tka = 0;
            } else {
                tka = data[i].jumlah_tka;
            }
            bangunanMarker = L.marker([long, lat], {
                    icon: leafleticon
                }).addTo(map)
                .bindPopup("<u><b><center>" + data[i].nama_kabupaten + "</b></u><br><br><table class='table table-bordered' border='1'><thead><td><b>Keterangan</b></td><td><b>Jumlah</b></td></thead><tr><td>Jumlah Pekerja PHK</td><td><center>" + phk + "</center></td></tr><tr><td>Jumlah PMI-B</td><td><center>" + pmib + "</center></td></tr><tr><td>Jumlah TKA</td><td><center>" + tka + "</center></td></tr><tr><td>Jumlah PMI</td><td><center>" + pmi + "</center></td></tr></table>")
                .openPopup();

        });
    });
</script>
<script>
    $(function() {

        $('#tahun_pilih').on('change', function() {
            var tahun = $(this).val();
            $('#tahun_peta').html(tahun);
            // 
        });
    });

    function tahun() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>beranda/kabupaten",
            data: 'tahun=' + $('#tahun_pilih').val(),
        });
    }
</script>



</body>

</html>