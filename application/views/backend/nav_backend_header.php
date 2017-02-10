  <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo site_url('Backend/');?>">
                        <img src="<?php echo base_url('assets/');?>/layouts/layout/img/logo-big.svg" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" id="ver_notificaicones" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default" id="contador_notificaciones_nav"> <?php echo count($notifications)?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold" id="contador_notificaciones_nav_exp"><?php echo count($notifications)?> notificaciones</span> pendientes</h3>
                                    <a href="<?php echo site_url('Notifications/index') ?>">ver todas</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                       <?php foreach($notifications as $notification): ?>
                                            <li>
                                            <a href="javascript:;">
                                                <span class="time">Ahora</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-comment"></i>
                                                    </span> <?php echo $notification->text ?> </span>
                                            </a>
                                            </li>
                                        <?php endforeach; ?>
                                        

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" id="user_logo" class="img-circle" src="<?php echo base_url('assets/img_perfiles').'/'.$user->imagen; ?>?t=<?php echo date('s');?>" />
                                <span class="username username-hide-on-mobile" id="nombre_usuario_nav">  <?php echo $user->nombre.' '.$user->apellido;?>  </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                               
                                <li>
                                    <a href="<?php echo site_url('Notificaciones/ver_admin') ?>">
                                        <i class="icon-envelope-open"></i> Notificaciones
                                        <span class="badge badge-danger"> </span>
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo site_url('login/logout');?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
          <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Administración</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                       <li class="nav-item">
                            <a href="" class="nav-link nav-toggle">
                                <i class="icon-share"></i>
                                <span class="title">Redes Sociales</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Redes/twitter');?>" class="nav-link nav-toggle">
                                        <i class="icon-user"></i> Twitter
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Redes/fb');?>" class="nav-link nav-toggle">
                                        <i class="icon-user"></i> Facebook
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Redes/instagram');?>" class="nav-link nav-toggle">
                                        <i class="icon-bar-chart"></i> Instagram
                                    </a>
                                </li>     
                               <li class="nav-item">
                                    <a href="<?php echo site_url('Redes/youtube');?>" class="nav-link nav-toggle">
                                        <i class="icon-bar-chart"></i> Youtube
                                    </a>
                                </li>  
                               
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="ayuda.html" class="nav-link nav-toggle">
                                <i class="icon-pencil"></i>
                                <span class="title">Notas</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                 <li class="nav-item">
                                    <a href="<?php echo site_url('Note/create');?>" class="nav-link nav-toggle">
                                        <i class="icon-settings"></i> Crear
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Note/list_notes');?>" class="nav-link nav-toggle">
                                        <i class="icon-user"></i> Ver Notas
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('Messages/index');?>" class="nav-link nav-toggle">
                                <i class="icon-bell"></i>
                                <span class="title">Mensajes</span>
                                <span class="selected"></span>
                                <span class="badge badge-success" id="messages_count"><?php echo count($messages); ?></span>
                            </a>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->