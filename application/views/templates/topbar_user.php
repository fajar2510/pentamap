
<!-- Content Wrapper -->

<div id="content-wrapper" class="d-flex flex-column" >

    <!-- Main Content -->
    <div id="content" >

        <!-- Topbar -->
        <nav  class=" navbar navbar-expand navbar-light bg-white topbar mb-4 static-top  shadow top-container" >

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <?php $ci = get_instance();
                if ($ci->session->userdata('role_id') == 1) { ?>
                    <a href="<?= base_url('admin'); ?>">
                        <div class="sidebar-brand-icon"> 
                            <img src="<?php echo base_url() ?>assets/img/favicon/mapnav.png" alt="logo" width="55px" height="65">
                        </div> 
                    </a>
            <?php } elseif ($ci->session->userdata('role_id') == 2) { ?>
                    <a href="<?= base_url('beranda'); ?>">
                        <div class="sidebar-brand-icon"> 
                            <img src="<?php echo base_url() ?>assets/img/favicon/mapnav.png" alt="logo" width="55px" height="65">
                        </div> 
                    </a>
            <?php } else {?> 
                <img src="<?php echo base_url() ?>assets/img/favicon/mapnav.png" alt="logo" width="55px" height="65">
            <?php } ?>
            <div class="sidebar-brand-text mx-3 px-1 py-0" style="font-family:roboto; font-size:14px;  text-align: left;">Sistem Informasi Geografis<br>
                <small> <p  style="font-family:roboto; font-size:9px; ">Tenaga Kerja Jawa Timur</p></small>
            </div>
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Cari data ..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div> -->

                    <!-- //parsing data total tenaga kerja -->
                    <?php foreach ($tka as $total_tka); ?>
                    <?php foreach ($pmib as $total_pmib); ?>
                    <?php foreach ($cpmi as $total_cpmi); ?>
                    <?php foreach ($phk as $total_phk); ?>

                    <marquee behavior="scroll" direction="left" scrollamount="5" width="130%">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <small>
                                    <!-- //gambar bendera indonesia -->
                                    <!-- <img src="<?php echo base_url() ?>assets/img/favicon/idn-flag.png" width="30" height="30" alt="pmi" class="rounded-circle"> -->
                                    <span>Total Results:</span> <font color="3561EC"><b>&nbsp;&nbsp;CPMI </b></font>
                                    <span class="border-left"> &nbsp;<font color="black"><?php echo $total_cpmi->cpmi; ?></font></span> &nbsp; &nbsp;&nbsp; <font color="3561EC"><b>TKA </b></font> 
                                    <span class="border-left"> &nbsp;<font color="black"><?php echo $total_tka->tka; ?></font> </span> &nbsp; &nbsp;&nbsp; <font color="3561EC"><b>PMI-B </b></font>
                                    <span class="border-left"> &nbsp;<font color="black"><?php echo $total_pmib->pmib; ?></font> </span> &nbsp; &nbsp;&nbsp; <font color="3561EC"><b>PHK </b></font>
                                    <span class="border-left"> &nbsp;<font color="black"><?php echo $total_phk->phk; ?></font> </span>
                                </small>
                            </div>
                        </div>
                    </marquee>
                </div>
            </form>
            
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto ">

            <li class="nav-item no-arrow text-gray-400">
                <a class="nav-item nav-link active text-gray-600" href="home">Peta
                </a>
            </li>
            <li class="nav-item no-arrow">
                <a class="nav-item nav-link text-gray-600" href="home#diagram">Data Diagram
                </a> 
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-gray-600" href="#" id="nakerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                Tenaga Kerja
                </a>
            <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="nakerDropdown">
                    <a class="dropdown-item" href="<?= base_url('phk'); ?>" >
                    PHK
                    </a>
                    <a class="dropdown-item" href="<?= base_url('pmi'); ?>" >
                    PMI Bermasalah
                    </a>
                    <a class="dropdown-item" href="<?= base_url('cpmi'); ?>">
                    CPMI
                    </a>
                    <a class="dropdown-item" href="<?= base_url('tka'); ?>">
                    TKA
                    </a>
                </div>
            </li>
            <li class="nav-item no-arrow">
                <a class="nav-item nav-link text-gray-600" href="reward">Data Reward
                </a> 
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <?php 
                $ci = get_instance();
                if ($ci->session->userdata('email')) { ?>
              
                   <!-- <h6 style="font-family: arial;" id="jam"></h6> -->
                
                 <!-- $jam = ('<h6 style="font-family: arial;" id="jam"></h6>'); -->
                  <!-- echo  "&nbsp; $jam";  -->

                  <li class="nav-link no-arrow mx-1" > 
                  <right>
                <?php
                    
                    date_default_timezone_set('Asia/Jakarta');                   
                   
                    $a = date("H");
                    if (($a >= 3) && ($a <= 10)) {
                        echo '<h6 style="font-family: arial"> <b> Selamat Pagi  </b> </h6>';
                    } else if (($a > 10) && ($a <= 15)) {
                        echo '<h6 style="font-family: arial"> <b> Selamat Siang </b> </h6>';
                    } else if (($a > 15) && ($a <= 18)) {
                        echo '<h6 style="font-family: arial"> <b> Selamat Sore </b></h6>';
                    } else {
                        echo '<h6 style="font-family: arial"> <b> Selamat Malam </b></h6>';
                    }
                    ?>
                    
                    <p class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></p>

               
                    </right>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <img class="img-profile rounded-circle" src="<?= base_url("assets/img/profile/") . $user['image']; ?>" style="object-fit: cover;">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('user'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profil
                        </a>
                        <!-- <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
                            <i class="fas fa-fw fa-user-edit mr-2 text-gray-400"></i>
                            Edit
                        </a> -->
                        <!-- <a class="dropdown-item" href="<?= base_url('user/changePassword'); ?>">
                            <i class="fas fa-fw fa-unlock-alt mr-2 text-gray-400"></i>
                            Ubah Password
                        </a> -->
                        <a class="dropdown-item disabled" disabled >
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Log <i><b> (segera hadir)</b></i>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"  data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
                <?php }else{ ?>
                <li class="nav-item no-arrow">
                    <a class="nav-item nav-link text-gray-600" href="<?= base_url('auth'); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Login
                    </a> 
                </li>
                <?php } ?>


            </ul>



        </nav>
        <!-- End of Topbar -->