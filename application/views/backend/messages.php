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
                                <span>Mensajes </span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Mensajes de Usuarios
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
                                        <span class="caption-subject font-blue bold uppercase">Mensajes</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                        <ul class="feeds">
                                            <?php foreach($messages as $message): ?>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-comment"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Hay un <a href="<?php echo site_url('Messages/response').'/'.$message->messages_id ?>">comentario nuevo </a>de <?php echo $message->name.' '.$message->email ?>.
                                                                <a href="<?php echo site_url('Messages/response').'/'.$message->messages_id ?>"><span class="label label-sm label-danger "> Contestar
                                                                    <i class="fa fa-share"></i>
                                                                </span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> <?php echo date('d/m/Y',strtotime($message->date))?> </div>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
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