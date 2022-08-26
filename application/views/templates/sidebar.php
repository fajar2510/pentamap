<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary  sidebar  sidebar-dark accordion"  id="accordionSidebar" >
<br>
<!-- navbar-fixed-top" style="position:fixed" -->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start" href="<?= base_url('beranda'); ?>">
        
        <div class="sidebar-brand-icon"> 
            <!-- <i class="far fa-building"></i> </div> -->
            <img src="<?php echo base_url() ?>assets/img/favicon/logopng.png" alt="logo-disnakertrans-jatim" width="55px" height="65">
        </div> 
        <div class="sidebar-brand-text mx-3">P E N T A <br>
            <small> <p>DISNAKERTRANS </br> Jawa Timur</p></small>
        </div>
          
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- QUERY MENU-->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU-->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $queryMenu = "SELECT *
                        FROM `user_sub_menu` JOIN `user_menu`
                        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_sub_menu`.`menu_id` = $menuId
                        AND `user_sub_menu`.`is_active` = 1 
                        ";
        $subMenu = $this->db->query($queryMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <!-- Nav Item - Dashboard  yang sudah auto aktif-->
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>"  data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->