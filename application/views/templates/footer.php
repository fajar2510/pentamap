<!-- Footer -->
<footer class="sticky-footer bg-white">
    <hr>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright All Reserved &copy; P E N T A | <img src="<?php echo base_url() ?>assets/img/favicon/logopng.png" alt="" width="15" height="18">&nbsp;DISNAKERTRANS <?= date('Y'); ?></span>
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah kamu yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak , Kembali</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
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
<script src="<?= base_url(); ?>assets/dist/sweetalert2.all.min.js"></script>

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


<!-- chained dropdown sekaligus drilldown daerah  -->
<!-- <script>
    $(document).ready(function() {
        $('#prov').change(function() {
            var provinsi_id = $('#prov').val();
            if (provinsi_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>pmi/index/kabupaten",
                    method: "POST",
                    data: {
                        provinsi_id: provinsi_id
                    },
                    success: function(data) {
                        $('#kab').html(data);
                        $('#kec').html('<option value="">Pilih Kecamatan</option>');
                    }
                });
            } else {
                $('#kab').html('<option value="">Pilih Provinsi</option>');
                $('#kec').html('<option value="">Pilih Kabupaten</option>');
            }
        });

        $('#kab').change(function() {
            var kabupaten_id = $('#kab').val();
            if (kabupaten_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>pmi/index/kecamatan",
                    method: "POST",
                    data: {
                        kabupaten_id: kabupaten_id
                    },
                    success: function(data) {
                        $('#kec').html(data);
                    }
                });
            } else {
                $('#kec').html('<option value="">Pilih Kecamatan</option>');
            }
        });

    });
</script> -->

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
    $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: function() {
            return $('#startDate').val();
        }
    });
</script>

<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script> -->
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

<!-- <script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
<script>
    $("#kabupaten").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
    $("#kecamatan").chained("#kabupaten"); // disini kita hubungkan kecamatan dengan kota
</script> -->





</body>

</html>