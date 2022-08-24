</body>
<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(1500, 0).slideUp(200, function(){
            $(this).remove(); 
            });
        }, 3000);
    </script>

    <!-- Use a button to open the snackbar -->
    <script>
        function snackbarlogin() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
    <!-- The actual snackbar -->


    

    </html>