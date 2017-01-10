<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo site_url('Backend/');?>">Inicio</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Escritorio</span>
                                <i class="fa fa-circle"></i>

                            </li>
                             <li>
                                <span>Crear Usuario</span>
                                                                

                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Crear Usuario
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Datos del perfil</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Información personal</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Imágen</a>
                                                    </li>
                                                   
                                                    
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="" method="post" id="usuario_form">
                                                            <div class="form-group">
                                                                <?php if(isset($msg)){?>
                                                                <div class="alert alert-<?php echo $operation_result; ?>"><a href="#" class="close" data-dismiss="alert">&times;</a> <?php echo $msg; ?> </div>
                                                                <?php } ?>
                                                                <label class="control-label">Nombre de Usuario <small>(una palabra en minúsculas)</small></label>
                                                                <input type="text" placeholder="" name='username' class="form-control"
                                                                       value='<?php echo (isset($usuario)?$usuario->username:'')?>'/> </div>
                                                            <?php if(!isset($usuario)): ?>
                                                                <div class="form-group">
                                                                <label class="control-label">Contraseña</label>
                                                                <input type="password" name="pass" placeholder="" class="form-control" value=""/> </div>
                                                                <div class="form-group">
                                                                <label class="control-label">Repetir contraseña</label>
                                                                <input type="password" name="pass2" placeholder="" class="form-control" value=""/> </div>
                                                                <?php endif; ?>
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre</label>
                                                                <input type="text" placeholder="" name="nombre" class="form-control" 
                                                                     value='<?php echo (isset($usuario)?$usuario->nombre:'')?>'  /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Apellido</label>
                                                                <input type="text" placeholder="" name="apellido" class="form-control"
                                                                       value='<?php echo (isset($usuario)?$usuario->apellido:'')?>'/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Celular de contacto</label>
                                                                <input type="text" placeholder="" name="celular" class="form-control" 
                                                                       value='<?php echo (isset($usuario)?$usuario->celular:'')?>'/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Corréo de contacto</label>
                                                                <input type="text" placeholder="" name="mail" class="form-control" 
                                                                       value='<?php echo (isset($usuario)?$usuario->mail:'')?>'/> </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label">Dirección postal </label>
                                                                <textarea class="form-control" rows="3" name="cod_postal" placeholder=""><?php echo (isset($usuario)?$usuario->cod_postal:'')?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">URL</label>
                                                                <input type="text" name="url_sitio" placeholder="http://www.misitio.com" class="form-control" 
                                                                       value='<?php echo (isset($usuario)?$usuario->url_sitio:'')?>'/> </div>
                                                            <div class="margiv-top-10">
                                                                <a href='javascript:document.getElementById("usuario_form").submit();' class="btn green"> Guardar Cambios </a>
                                                                <a href="javascript:;" class="btn default"> Cancelar </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <p> Elegí una imagen personal. </p>
                                                        <form action="" role="form" id="subir_imagen_form" method="post"  enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="<?php   
                                                                        if(isset($usuario)){
                                                                            echo base_url('assets/img_perfiles').'/'.$usuario->imagen.'?'.date('s'); 
                                                                        }else{
                                                                            echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";
                                                                        }
                                                                        ?>" id="img_perfil_src"alt="" />  </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Seleccionar imágen </span>
                                                                            <span class="fileinput-exists"> Cambiar </span>
                                                                            <input type="file" name="imagen" id='imagen'> </span>
                                                                        <a href="javascript:;" id="remove_img"  class="btn default fileinput-exists" data-dismiss="fileinput"> Quitar </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">Aclaración! </span>
                                                                    <span> La imágen es compatible sólo con los últimos navegadores Firefox, Chrome, Opera, Safari y IE 10 solamente. </span>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <a href='javascript:document.getElementById("subir_imagen_form").submit();' class="btn green"> Subir </a>
                                                                <a href="javascript:;" class="btn default"> Cancelar </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    
                    
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>