<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Inicio</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Notificaciones </span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Notificaciones a solicitudes de Usuarios
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase">Centro de notificaciones</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                        <ul class="feeds">
                                            <?php foreach($notifications as $notification): 
                                                if($notification->notifications_type_id != Notifications_model::NEW_MESSAGE):
                                                ?>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-comment"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <?php switch($notification->notifications_type_id){
                                                                    case Notifications_model::NEW_TWITTER_POSTS :?>
                                                                        <div class="desc"> Hay nuevos posts en <a href="<?php echo site_url('Redes/twitter') ?>">Twitter </a><span class="label label-sm label-danger "> Ver
                                                                                    <i class="fa fa-share"></i>
                                                                                </span></a>
                                                                        </div>
                                                                    <?php
                                                                        break;
                                                                    case Notifications_model::NEW_FB_POSTS :?>
                                                                        <div class="desc"> Hay nuevos posts en <a href="<?php echo site_url('Redes/fb') ?>">Facebook </a><span class="label label-sm label-danger "> Ver
                                                                                    <i class="fa fa-share"></i>
                                                                                </span></a>
                                                                        </div>
                                                                    <?php
                                                                        break;
                                                                    case Notifications_model::NEW_INSTA_POSTS :?>
                                                                        <div class="desc"> Hay nuevos posts en <a href="<?php echo site_url('Redes/instagram') ?>">Instagram </a><span class="label label-sm label-danger "> Ver
                                                                                    <i class="fa fa-share"></i>
                                                                                </span></a>
                                                                        </div>
                                                                    <?php
                                                                        break;
                                                                    case Notifications_model::NEW_YOUTUBE_POSTS :?>
                                                                        <div class="desc"> Hay nuevos posts en <a href="<?php echo site_url('Redes/youtube') ?>">Youtube </a><span class="label label-sm label-danger "> Ver
                                                                                    <i class="fa fa-share"></i>
                                                                                </span></a>
                                                                        </div>
                                                                    <?php
                                                                        break;
                                                                   
                                                                    
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> <?php echo date('d/m/Y',strtotime($notification->date))?> </div>
                                                </div>
                                            </li>
                                            <?php 
                                            endif;
                                            endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="scroller-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>