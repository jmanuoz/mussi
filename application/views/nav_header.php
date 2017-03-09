<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <div class="menu-toggler sidebar-toggler" style="float:left;"></div>
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
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" id="ver_notificaicones" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"  id="contador_notificaciones_nav">  <?php echo count($notificaciones) ?>  </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold" id="contador_notificaciones_nav_exp"> <?php echo count($notificaciones) ?>  notificaciones</span> pendientes</h3>
                            <a href="<?php echo site_url('Notificaciones/ver');?>">ver todas</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                 <?php
                                 foreach($notificaciones as $notificacion): ?>
                                <li>
                                <a href="<?php
                                    switch($notificacion->id_tipo_notificacion){
                                                    case MENSAJE_NOTIFICACION:
                                                        echo site_url('Encuestas/ver/').'/'.$notificacion->id_modulo;
                                                        break;
                                                    case ENCUESTA_NOTIFICACION:
                                                        echo site_url('Encuestas/ver/').'/'.$notificacion->id_modulo;
                                                        break;
                                                    case INFORME_NOTIFICACION:
                                                        echo site_url('Informes_Medios/ver/').'/'.$notificacion->id_modulo;
                                                        break;
                                                }
                                ?>">
                                    <span class="time">Ahora</span>
                                    <span class="details">
                                        <span class="label label-sm label-icon label-success">
                                            <i class="fa fa-<?php
                                                switch($notificacion->id_tipo_notificacion){
                                                    case MENSAJE_NOTIFICACION:
                                                        echo 'comment';
                                                        break;
                                                    case ENCUESTA_NOTIFICACION:
                                                        echo 'plus';
                                                        break;
                                                    case INFORME_NOTIFICACION:
                                                        echo 'bell-o';
                                                        break;
                                                }
                                            ?>"></i>
                                        </span> <?php echo $notificacion->mensaje ?> </span>
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
                        <span class="username username-hide-on-mobile" id="nombre_usuario_nav"> <?php echo $user->nombre.' '.$user->apellido;?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo site_url('Home/perfil');?>">
                                <i class="icon-user"></i> Perfil </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Notificaciones/ver');?>">
                                <i class="icon-envelope-open"></i> Notificaciones
                                <span class="badge badge-danger"> <?php echo count($notificaciones) ?> </span>
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
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
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
                        <li class="nav-item <?php echo $section == 'view'?'start active open':''; ?> ">
                            <a href="<?php echo site_url('Home/index');?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Escritorio</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                       <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-folder"></i>
                                <span class="title">Servicios</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-bar-chart"></i> Encuestas
                                        <span class="arrow"></span>
                                        <?php if (count($notificaciones_encuestas) > 0):?>
                                        <span class="badge badge-success"><?php echo count($notificaciones_encuestas); ?></span>
                                        <?php endif; ?>
                                    </a>
                                    <ul class="sub-menu">
                                        <?php foreach($tipo_encuestas as $tipo_encuesta): ?>
                                        <li class="nav-item">
                                            <a href="javascript:;" target="_blank" class="nav-link nav-toggle">
                                                <i class="icon-graph"></i> <?php echo $tipo_encuesta->servicio ?>
                                                <span class="arrow nav-toggle"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php foreach($tipo_encuesta->encuestas as $encuesta):?>
                                                <li class="nav-item">
                                                    <a href="<?php echo site_url('Encuestas/ver/'.$encuesta->id); ?>" class="nav-link">
                                                        <i class="icon-bar-chart"></i> <?php echo $encuesta->titulo ?></a>
                                                </li>
                                                <?php endforeach; ?>

                                            </ul>
                                        </li>
                                        <?php endforeach?>

                                    </ul>
                                </li>
                                <?php if(isset($informe)): ?>
                                <li class="nav-item">
                                   <a href="<?php echo site_url('Informes_Medios/ver/');?>" class="nav-link">
                                        <i class="icon-feed"></i> Monitoreo Medios
                                    </a>

                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo $section == 'ayuda'?'start active open':''; ?>">
                            <a href="<?php echo site_url('Home/ayuda');?>" class="nav-link nav-toggle">
                                <i class="icon-question"></i>
                                <span class="title">Ayuda</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $section == 'contacto'?'start active open':''; ?>">
                            <a href="<?php echo site_url('Home/contacto');?>" class="nav-link nav-toggle">
                                <i class="icon-bell"></i>
                                <span class="title">Contacto</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
