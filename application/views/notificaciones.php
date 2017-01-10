<link href="<?php echo base_url('assets/'); ?>/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo site_url('Dashboard/view');?>">Inicio</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Perfil</span>
                            </li>
                            

                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Centro de notificaciones
                        
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
                    <!-- BEGIN PROFILE CONTENT -->
                            <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="<?php echo base_url('assets/img_perfiles').'/'.$user->imagen; ?>?t=<?php echo date('s');?>" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo $user->nombre.' '.$user->apellido; ?> </div>
                                        <div class="profile-usertitle-job"> <?php echo $user->username; ?>  </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="page_user_profile_1.html">
                                                    <i class="icon-home"></i> Notificaciones </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('Home/perfil');?>">
                                                    <i class="icon-settings"></i> Configuración de cuenta </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('Home/ayuda');?>">
                                                    <i class="icon-info"></i> Ayuda </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                                <!-- PORTLET MAIN -->
                                
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Notificaciones</span>
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <!--BEGIN TABS-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                            <ul class="feeds">
                                                                <?php foreach($notificaciones as $notificacion): ?>
                                                                <li>
                                                                    <div class="col1">
                                                                        <div class="cont">
                                                                            <div class="cont-col1">
                                                                                <div class="label label-sm label-success">
                                                                                    <i class="fa fa-<?php
                                                                                    switch($notificacion->id_tipo_notificacion){
                                                                                       case MENSAJE_NOTIFICACION:
                                                                                            echo 'comment';
                                                                                            break;
                                                                                        case ENCUESTA_NOTIFICACION:
                                                                                            echo 'pie-chart';
                                                                                            break;
                                                                                        case INFORME_NOTIFICACION:
                                                                                            echo 'bell-o';
                                                                                            break;
                                                                                    }
                                                                                    ?>"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cont-col2">
                                                                                <div class="desc"> <a href="<?php
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
                                                                                ?>"> <?php echo $notificacion->mensaje ?></a> 
                                                                                
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col2">
                                                                        <div class="date"> <?php echo date('d/m/Y',strtotime($notificacion->fecha)) ?> </div>
                                                                    </div>
                                                                </li>
                                                                <?php endforeach; ?>
                                                                
                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!--END TABS-->
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                            <!-- END PROFILE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>