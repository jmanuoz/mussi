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
                                <span>Encuestas</span>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Panorama sindical</span>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Todas las encuestas</span>
                            </li>

                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Editar servicios
                        
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase">Todos los servicios</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Ordenar
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                <label>
                                                    <input type="checkbox" /> Más viejas primero</label>
                                                <label>
                                                    <input type="checkbox"  /> Más nuevas primero</label>
                                            <label>
                                                    <input type="checkbox" /> Por tipo </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                        <ul class="feeds">
                                            <?php foreach($servicios as $servicio):?>
                                            <li>
                                                <a href="<?php echo site_url('Servicios/editar/'.$servicio->id_tipo); ?>">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm <?php echo ($servicio->categoria_servicio==$cat_encuesta)?'label-success':'label-warning' ?>">
                                                                    <i class="fa <?php echo ($servicio->categoria_servicio==$cat_encuesta)?'fa-bar-chart-o':'fa-rss' ?>"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> <?php echo $cat_servicios[$servicio->categoria_servicio].' / '.$servicio->nombre ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </a>
                                            </li>
                                            <?php endforeach ?>
                                            
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>