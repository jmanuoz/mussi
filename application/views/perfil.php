<script>
    $(document).ready(function() {
        
    $("#submit_pass").click(function(e) {
        e.preventDefault();
        if($('#new_pass').val() == $('#new_pass_2').val() && $('#new_pass').val() != $('#old_pass').val() && $('#new_pass').val() != '' && $('#new_pass_2').val() != '' && $('#old_pass').val() != ''){
            document.getElementById("cambiar_pass_form").submit();
        }else{
            $('#error_div_pass').show();
            if($('#new_pass').val() == '' || $('#new_pass_2').val() == '' || $('#old_pass').val() == ''){
                $('#error_msg_pass').html('Complete todos los campos');
            }else if($('#new_pass').val() != $('#new_pass_2').val()){                
                $('#error_msg_pass').html('La nueva contraseña no coincide');
            }else{
                $('#error_msg_pass').html('La nueva contraseña debe ser distinta de la anterior');
            }
        }
    });
        
    $("#remove_img").click(function(e) {
        e.preventDefault();
        document.getElementById("img_perfil_src").src="";});
        $("#imagen").change(function(){
            readURL(this);
        });
    
    
    });
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_perfil_src').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


    </script>
<!-- BEGIN CONTENT -->
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
        <h3 class="page-title"> Perfil

        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <!-- BEGIN PROFILE CONTENT -->
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
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Cambiar Password</a>
                                </li>

                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane <?php echo ((isset($error_pass) || isset($success))?'':'active'); ?>" id="tab_1_1">
                                    <form role="form" id="perfil" name="perfil" method="post"action="">
                                         <?php if (isset($operation_result)): ?>
                                            <div class="alert  <?php echo (($operation_result)=='danger' ? 'alert-danger' : 'alert-success'); ?>" id="error_div_pass">                                
                                                <button class="close" data-close="alert"></button>                               
                                                <span id="error_msg_pass"><?php echo $msg; ?> </span>                                
                                            </div>
                                             <?php endif; ?>
                                        <div class="form-group">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" placeholder="" name="nombre" value="<?php echo $user->nombre?>" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Apellido</label>
                                            <input type="text" value="<?php echo $user->apellido?>" name="apellido" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Celular de contacto</label>
                                            <input type="text" value="<?php echo $user->celular?>" name="celular" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Corréo de contacto</label>
                                            <input type="text" value="<?php echo $user->mail?>" name="mail" class="form-control" /> </div>

                                        <div class="form-group">
                                            <label class="control-label">Dirección postal </label>
                                            <textarea class="form-control" rows="3" placeholder="" name="cod_postal"><?php echo $user->cod_postal?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">URL</label>
                                            <input type="text" value="<?php echo $user->url_sitio?>" class="form-control" name="url_sitio" /> </div>
                                        <div class="margiv-top-10">
                                            <a href='javascript:document.getElementById("perfil").submit();' class="btn green"> Guardar Cambios </a>
                                            <a href='javascript:window.location = "<?php echo site_url('Dashboard/view');?>";' class="btn default"> Cancelar </a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <p> Elegí una imagen personal. </p>
                                    <form action="" method="post" id="imagen_form" name='imagen_form' enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?php echo  base_url('assets/img_perfiles').'/'.$user->imagen; ?>" id="img_perfil_src"alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Seleccionar imágen </span>
                                                        <span class="fileinput-exists"> Cambiar </span>
                                                        <input type="file" name="imagen" id="imagen"> </span>
                                                    <a href='' id="remove_img" class="btn default fileinput-exists" > Quitar </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">Aclaración! </span>
                                                <span> La imágen es compatible sólo con los últimos navegadores Firefox, Chrome, Opera, Safari y IE 10 solamente. </span>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <a href='javascript:document.getElementById("imagen_form").submit();' class="btn green"> Subir </a>
                                            <a href='javascript:window.location = "<?php echo site_url('Dashboard/view');?>";' class="btn default"> Cancelar </a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane <?php echo ((isset($error_pass) || isset($success))?'active':''); ?>" id="tab_1_3">
                                    <div class="alert alert-danger <?php echo (isset($error_pass)?'':'display-hide'); ?>" id="error_div_pass">                                
                                        <button class="close" data-close="alert"></button>                               
                                                <span id="error_msg_pass"><?php echo isset($error_pass)?$error_pass:''; ?> </span>                                
                                    </div>
                                    <div class=" alert alert-success <?php echo (isset($success)?'':'display-hide'); ?>" id="success_div_pass">                                
                                        <button class="close" data-close="alert"></button>                               
                                                <span id="success_msg_pass"><?php echo isset($success)?$success:''; ?> </span>                                
                                    </div>
                                    <form action="" method="post" id="cambiar_pass_form">
                                        <div class="form-group">
                                            <label class="control-label">Password Actual</label>
                                            <input type="password" name="old_pass" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Nuevo Password</label>
                                            <input type="password" name="new_pass" id="new_pass" class="form-control" required=""  /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Re-tipear el nuevo Password</label>
                                            <input type="password" name="new_pass_2" id="new_pass_2"  class="form-control" /> </div>
                                        <div class="margin-top-10">
                                            <a href='' id="submit_pass"class="btn green"> Cambiar Password </a>
                                            <a href='javascript:window.location = "<?php echo site_url('Dashboard/view');?>";' class="btn default"> Cancelar </a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

</div>