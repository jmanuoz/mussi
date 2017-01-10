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
        <h3 class="page-title"> Crear Servicio
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
                            <span class="caption-subject font-blue bold uppercase"> Nuevo servicio 
                                <span class="step-title"></span>
                            </span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" action="" id="servicio" method="POST">
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
                                                    <i class="fa fa-check"></i> Usuarios </span>
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
                                                    <select class="form-control" name="categoria">
                                                        <?php foreach($categoria_servicios as $id=>$categoria ): ?>
                                                        <option value="<?php echo $id; ?>"
                                                                <?php echo (isset($servicio)&& $servicio->categoria_servicio == $id)?'SELECTED':''?>
                                                                > <?php echo $categoria; ?></option>
                                                        <?php endforeach;?>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Título</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="nombre" placeholder="Este campo es requerido" 
                                                           value="<?php echo (isset($servicio)?$servicio->nombre:'')?>">
                                                    <span class="help-block">Ingresá un título para el tipo de del servicio. (EJ: Encuesta Panoráma Sindical, Informe de medios Panoráma Sindical).</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Descripción</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="descripcion" rows="6"><?php echo (isset($servicio)?$servicio->descripcion:'')?></textarea>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="tab-pane" id="tab2">
                                            <div class="col-md-12">
                <div class="portlet  form-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-users font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Seleccionar usuarios del servicio</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Default</label>
                                    
                                    <div class="col-md-9">
                                        <select multiple="multiple" class="multi-select" id="my_multi_select1" name="usuarios[]" >
                                           <?php foreach($usuarios_con_servicio as $usuario):?>
                                            <option value='<?php echo $usuario->id; ?>' selected> 
                                                <?php echo $usuario->nombre.' '.$usuario->apellido; ?></option>
                                            <?php endforeach;?>
                                             <?php foreach($usuarios_sin_servicio as $usuario):?>
                                            <option value='<?php echo $usuario->id; ?>'> 
                                                <?php echo $usuario->nombre.' '.$usuario->apellido; ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </form>
                        <!-- END FORM-->
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
                                            <a href="#tab1" class="btn default button-previous" data-toggle="tab" class="step" >
                                                <i class="fa fa-angle-left"></i> Volver </a>
                                            <a href="#tab2" class="btn btn-outline green button-next" data-toggle="tab" class="step active"> Continuar
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <a href='javascript:document.getElementById("servicio").submit();' class="btn green button-submit"> Guardar
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

