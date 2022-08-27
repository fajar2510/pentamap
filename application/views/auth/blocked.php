<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Access Blocked</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon/x.ico">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper"  >
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column"  >

            <!-- Main Content -->
            <div id="content" >

                <!-- Begin Page Content -->
                <div class="container-fluid mt-5" >

                    <!-- 404 Error Text -->
                    <div class="text-center" >
                        <div class="error mx-auto" data-text="403">403</div>
                        
                        <p class="lead text-black-800 mb-5">Oops Akses Dilarang</p>
                        <p class="text-black-500 mb-3">Kurasa kamu menemukan sebuah glitch efek dari the matrix...</p>
                        <a href="<?= base_url('user'); ?>" class="btn btn-danger mb-3">&larr; Kembali </a>
                        <br>
                        <img class="img-profile rounded-circle " src="<?= base_url("assets/img/favicon/undraw_feeling_blue_4b7q.png"); ?>"  style="object-fit: cover; width:300px;">
                        <!-- <hr style="margin-top: 30px; margin-bottom: 10px ;"> -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>   
            <!-- Footer -->

            <footer class="sticky-footer bg-white">
                <hr>
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright All Reserved &copy; <?= date('Y'); ?>&nbsp; Sistem Informasi Geofrafis | DISNAKERTRANS JAWA TIMUR</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>