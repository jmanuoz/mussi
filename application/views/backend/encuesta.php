<input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo (isset($encuesta)?$encuesta->id:'')?>" />
<!-- BEGIN CONTENT -->
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
        <h3 class="page-title"> Crear Encuesta
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
                            <span class="caption-subject font-blue bold uppercase"> Nueva encuesta 
                                <span class="step-title"> - paso 1 de 3</span>
                            </span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" action="" id="encuesta" method="POST" enctype="multipart/form-data">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab" class="step">
                                                <span class="number"> 1 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> General </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab" class="step"style="<?php echo !isset($encuesta)?'pointer-events: none;
   cursor: default;':'' ?>">
                                                <span class="number"> 2 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Secciones y Gráficos</span>
                                            </a>
                                        </li>
                                        

                                    </ul>
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"> </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger <?php echo isset($operation_result)?(($operation_result == 0)?'':'display-none'):'display-none'; ?>">
                                            <button class="close" data-dismiss="alert"></button> No pudo realizarse la operación.</div>
                                        <div class="alert alert-success <?php echo isset($operation_result)?(($operation_result == 0)?'display-none':''):'display-none'; ?>">
                                            <button class="close" data-dismiss="alert"></button> Operación realiza con exito! </div>
                                        <div class="tab-pane active" id="tab1">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tipo</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="tipo_servicio">
                                                       <?php
                                                       foreach($servicios as $servicio):?>
                                                        <option value="<?php echo $servicio->id_tipo ?>"
                                                                
                                                                <?php echo (isset($encuesta)&& $encuesta->tipo_id == $servicio->id_tipo)?'SELECTED':''?>
                                                                ><?php echo $servicio->nombre ?></option>
                                                           
                                                           <?php  
                                                       endforeach;
                                                       ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Título</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="titulo" placeholder="Este campo es requerido" 
                                                           value="<?php echo (isset($encuesta)?$encuesta->titulo:'')?>">
                                                    <span class="help-block">Ingresá un título a la encuesta.</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Área o Distrito</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control typeahead" id="area" name="area" placeholder="Este campo es requerido"
                                                           value="<?php echo (isset($encuesta)?$encuesta->area_nombre:'')?>">
                                                    <input type="hidden" id="areas" value='<?php echo json_encode($areas) ?>' />
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Fecha de realización</label>
                                                <div class="col-md-10">
                                                    <input class="form-control form-control-inline input-medium " id="fecha" name="fecha"size="16" type="text" 
                                                           value="<?php echo (isset($encuesta)?date('d/m/Y',strtotime($encuesta->fecha)):'')?>"/>
                                                    <span class="help-block"> Seleccionar Fecha </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Presentación</label>
                                                <span class="btn white btn-file">
                                                <?php   
                                                if(isset($encuesta) && ($encuesta->presentacion != '')): ?>
                                                 <i id="presentacion_icon" class="fa fa-file-pdf-o">&nbsp;<?php echo $encuesta->titulo.'.pdf';?></i>                                           
                                                    <input type="hidden" name="presentacion_file" value="<?php echo $encuesta->presentacion;?>"/>
                                                <?php 
                                                    echo '<br>';
                                                    endif;
                                                ?>                                                
                                                
                                                    <span class="fileinput-new"> Seleccionar archivo </span>
                                                   
                                                    <input type="file" name="presentacion" id='presentacion'> </span>
                                                    <a href="javascript:;" id="remove_file"  class="btn white fileinput-exists" data-dismiss="fileinput"> Quitar </a>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Descripción</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control"  name="descripcion" id="summernote_1" rows="6"><?php echo (isset($encuesta)?$encuesta->descripcion:'')?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">

                                            <div class="col-md-6">
                                                <div class="portlet light bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-bubble font-green-sharp"></i>
                                                            <span class="caption-subject font-green-sharp bold uppercase">Checkable Tree</span>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div id="tree_3" class="tree-demo"> </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            
                                            <div class="form-group col-md-6">
                                                <div class="alert alert-success display-none" id="msg_grafico">
                                            Nodo Guardado con exito!.</div>
                                                <label>Tipo de cuadro</label>
                                                <div class="radio-list">
                                                     <label><input type="radio" name="optionsRadios" id = "size2" class="size1" value="2" >Ancho</label>
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id = "size1" class="size1" value="1" > Media pantalla </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-10">Copiar código de iFrame.</label>
                                                <div class="input-group col-md-10">
                                                    <input type="text" class="form-control" id="link" name="link" placeholder="Ctrl + V código embed...">
                                                     <input type="hidden" name="id_grafico_ajax" id="id_grafico_ajax" value="" />
                                                    <span class="input-group-btn">
                                                        <button class="btn red" id="guardar_grafico" type="button">Crear <i class="fa fa-arrow-right"></i></button>
                                                    </span>
                                                </div>
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
                                            <a href='javascript:document.getElementById("encuesta").submit();' class="btn green button-submit"> Guardar
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
<!-- END CONTENT -->