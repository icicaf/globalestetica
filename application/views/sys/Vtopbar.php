<div class="topbar-main">
    <div class="container-fluid">
        <!-- Logo container-->
        <div class="logo">
            <!-- Text Logo -->
            <a href="#" onclick="return false;" class="logo">
                <span class="logo-small"><i class="mdi mdi-radar"></i>IOTSYS</span>
                <span class="logo-large"><i class="mdi mdi-radar"></i>IOTSYS</span>
            </a>
        </div>

        <!-- End Logo container-->
        <div class="menu-extras topbar-custom">
            <ul class="list-inline float-right mb-0">
                <li class="menu-item list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect nav-user" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <div id="box-date"></div> 
                    </a>
                    <a class="nav-link dropdown-toggle waves-effect nav-user" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <div id="box-time"></div>
                    </a>
                    <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                       <?php echo $this->session->userdata('usuario_nombre'); ?>
                        <img src="<?php echo base_url(); ?>/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small class="text-white"></small> </h5>
                        </div>
                        <a id="modulo_cuenta" href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-star-variant"></i> <span>Cuenta</span>
                        </a>
                        <a is="modulo_ajustes" href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings"></i> <span>Ajustes</span>
                        </a>
                        <!--
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-open"></i> <span>Lock Screen</span>
                        </a> -->
                        <a href="<?php echo base_url(); ?>Csys/salir" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout"></i> <span>Salir</span>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
        <!-- end menu-extras -->
        <div class="clearfix"></div>
    </div> <!-- end container -->
</div>
<!-- end topbar-main -->