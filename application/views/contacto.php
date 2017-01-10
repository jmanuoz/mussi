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
                                <span>Encuestas</span>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Panorama sindical</span>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Última</span>
                            </li>

                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Contactános
                        
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-green-haze">
                                        <i class="icon-settings font-green-haze"></i>
                                        <span class="caption-subject bold uppercase"> Llená los campos y enviános tu consulta</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" class="form-horizontal" method="post">
                                        <div class="form-body">
                                            <?php if (isset($operation_result)): ?>
                                            <div class="alert  <?php echo (($operation_result)=='danger' ? 'alert-danger' : 'alert-success'); ?>" id="error_div_pass">                                
                                                <button class="close" data-close="alert"></button>                               
                                                <span id="error_msg_pass"><?php echo $msg; ?> </span>                                
                                            </div>
                                             <?php endif; ?>
                                           
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Tipo de consulta</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="tipo_consulta" id="form_control_1">
                                                        <option value="Problema o error de funcionamiento">Problema o error de funcionamiento.</option>
                                                        <option value="Solicitud de servicio">Solicitud de servicio.</option>
                                                        <option value="Consulta sobre algúna encuesta o servicio contratado">Consulta sobre algúna encuesta o servicio contratado.</option>
                                                        <option value="Otro">Otro</option>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-2 control-label" for="form_control_1">Escribínos</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="consulta" rows="6" placeholder="Ingresá el texto de tu consulta"></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-10">
                                                    <button type="button" class="btn default">Cancelar</button>
                                                    <button type="submit" class="btn blue">Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>