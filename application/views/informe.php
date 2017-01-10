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
                                <span>Informes</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Informes de medios
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-feed font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase">Informes del día</span>
                                    </div>
                                    
                                </div>
                                <div id="datepaginator_sample_4"> </div>
                                <div id="lista_informes">
                                <div class="portlet-body">
                                    <div class="scroller" data-always-visible="1"  data-rail-visible="0">
                                        <ul class="feeds">
                                            <li>
                                                <?php foreach($informes_dia as $informe_dia): ?>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-feed"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> <a href="<?php echo site_url('Informes_Medios/ver/'.$informe_dia->id_informe); ?>"><?php echo $informe_dia->servicio.' - '.$informe_dia->edicion; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                                 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="scroller-footer">
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                           
                                    <div class="form-group">
                                                <label class="control-label col-md-12">Ingresá los correros electrónicos de las personas que querés que reciban tus informes diariamente.</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="" id="object_tagsinput">
                                                    <input type="hidden" name="mails" id="mails" value='<?php echo json_encode($envios)?>' />
                                                    
                                                    <div class="margin-top-10">
                                                        <input type="text" class="form-control input-large" placeholder="Ingresá dirección de correo." id="object_tagsinput_value"> </div>
                                                    
                                                    <div class="margin-top-10">
                                                        <a href="javascript:;" class="btn red" id="object_tagsinput_add">Agregar destinatario</a>
                                                    </div>
                                                </div>
                                            </div>
                             

                        </div>
                        <div class="col-md-8 col-sm-8">
  
                        <div class="portlet light portlet-fit full-height-content full-height-content-scrollable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-red"></i>                              
                                <span class="caption-subject font-red bold uppercase"> <?php 
                                if(($informe_hoy) != null){
                                    echo $informe_hoy->servicio.' - '.$informe_hoy->edicion. ' '.date('d/m/Y',strtotime($informe_hoy->fecha));
                                }?></span>
                                
                            </div>
                            
                        </div>
                        <div class="portlet-body">
                            <div class="full-height-content-body">
                                <?php
                                 if(($informe_hoy) != null){
                                    echo $informe_hoy->informe;
                                 }?>
                            </div>
                        </div>
                    </div>
                        
                        
                        
                    </div>
                    
                                        </div>

                    
                </div>
                <!-- END CONTENT BODY -->
            </div>