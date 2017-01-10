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
                                <span>Escritorio</span>

                            </li>
                             <li>
                                <span>Nueva encuesta</span>
                                                                

                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Crear Informe
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            
                            
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-graph font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase"> Nuevo Informe 
                                            <span class="step-title"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="#" id="informe" method="POST">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> General </span>
                                                        </a>
                                                    </li>
                                                
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step active">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Informe </span>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> Hay errores.</div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Formulario Validado! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Servicio</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control" name="servicio">
                                                                    <?php foreach($servicios as $servicio):?>
                                                                    <option value="<?php echo $servicio->id_tipo ?>"
                                                                             <?php echo (isset($informe)&& $informe->id_tipo_servicio == $servicio->id_tipo)?'SELECTED':''?>
                                                                            ><?php echo $servicio->nombre ?></option>                                                                    
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-2 control-label">Edición</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control" name="edicion">
                                                                    <?php foreach($ediciones as $edicion):?>
                                                                    <option value="<?php echo $edicion->id_edicion ?>"
                                                                            <?php echo (isset($informe)&& $informe->id_edicion == $edicion->id_edicion)?'SELECTED':''?>
                                                                            ><?php echo $edicion->nombre ?></option>                                                                    
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="control-label col-md-2">Fecha de realización</label>
                                                            <div class="col-md-10">
                                                                <input class="form-control form-control-inline input-medium date-picker" id="fecha" name="fecha" 
                                                                       size="16" type="text" value="<?php echo (isset($informe)?date('d/m/Y',strtotime($informe->fecha)):'')?>" />
                                                                <span class="help-block"> Si no se seleccciona, va con fecha de hoy. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="tab-pane" id="tab2">
                                                        <div class="col-md-12">
                            <div class="portlet  form-fit ">
                                <div class="form-body">
                                            <div class="form-group last">
                                                <label class="control-label col-md-2">Editar texto del informe</label>
                                                <div class="col-md-10">
                                                    <textarea name="summernote" id="summernote_1"><?php echo (isset($informe)?$informe->informe:'')?></textarea>
                                                    
                                                </div>
                                            
                                            </div>
                                        </div>
                                
                            </div>
                            <!-- END PORTLET-->
                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Volver </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continuar
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <a href='javascript:document.getElementById("informe").submit();' class="btn green button-submit"> Guardar
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                        </div>
                        
                    </div>
                    
                    
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>