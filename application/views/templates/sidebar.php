<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary  sidebar  sidebar-dark accordion "   id="accordionSidebar" >

<!-- navbar-fixed-top" style="position:fixed" -->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex" href="<?= base_url('home'); ?>">
        
        <div class="sidebar-brand-icon"> 
            <!-- <i class="bi bi-map"></i> -->
            <img src="<?php echo base_url() ?>assets/img/favicon/jatim.png" alt="logo" width="55px" >
        </div> 
        
        <!-- membuat jika superadmin dan admin akan menampilkan nama rolenya di sidebar -->
        <?php 
        $ci = get_instance();

        if ($ci->session->userdata('role_id') == 1) { ?>
            <div class="sidebar-brand-text mx-3 px-1 py-0" style="font-family:roboto; font-size:14px;  text-align: left;">
                SuperAdmin Dashboard<br>
                <small><p  style="font-family:roboto; font-size:9px; "></p></small>
            </div>
        <?php }else{ ?>
            <div class="sidebar-brand-text mx-3 px-1 py-0" style="font-family:roboto; font-size:14px;  text-align: left;">
                Admin Dashboard<br>
                <small> <p  style="font-family:roboto; font-size:9px; "></p></small>
            </div>
        <?php } ?>
       
          
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
        <!-- idisini -->
        <?php if (count($subMenu) > 0 ) { ?>

        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        
        
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> -->

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <!-- Nav Item - Dashboard  yang sudah auto aktif-->
                <li class="nav-item active" style="ba">
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
            <?php } ?>
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>"  data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <!-- <hr class="sidebar-divider d-none d-md-block"> -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>

<!-- End of Sidebar -->