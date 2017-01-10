<input type="hidden" id="encuesta_id" name="encuesta_id" value="<?php echo $encuesta->id?>" /> 
<input type="hidden" id="sender_id" name="sender_id" value="<?php echo $user->id ?>" /> 
<input type="hidden" id="reciever_id" name="reciever_id" value="<?php echo $id_user_reciever ?>" /> 
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
                                <span><?php echo $encuesta->titulo?></span>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Última</span>
                            </li>

                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Encuestas
                        <small>mediciones Ágora Consultores</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase"><?php echo $encuesta->titulo.' '.date('d/m/Y',strtotime($encuesta->fecha))?></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-tabs">
                                       
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab"> 1. Sumario y Comentarios</a>
                                        </li>
                                        
                                         <?php foreach($secciones as $key=>$seccion): ?>
                                        <li>
                                            <a href="#tab_1_<?php echo ($key + 2) ?>" class="selector-secciones" data-toggle="tab"> <?php echo ($key + 2).'. '.$seccion->text; ?></a>
                                        </li>  
                                        <?php endforeach; ?>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_1_1">
                                           <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <!-- BEGIN PORTLET-->
                                                <div class="portlet light bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption" style="width: 100%">                                                           
                                                            <i class="icon-bar-chart font-blue"></i>
                                                            <span class="caption-subject font-blue bold uppercase" >Sumario de la encuesta</span>
                                                            <?php if($encuesta->presentacion != ''): ?>
                                                           <a href='<?php echo site_url('Encuestas/obtener_presentacion/'.$encuesta->id) ?>' class="btn green right" target="_blank">
                                                               <i id="presentacion_icon" class="fa fa-file-pdf-o"></i>
                                                               Descargar </a>
                                                            <?php endif; ?>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="portlet-body">
                                                   <span><?php echo $encuesta->descripcion?></span>
                                                    </div>
                                                </div>
                                                <!-- END PORTLET-->
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-red-sunglo"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase">Comentarios</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body" id="chats">
                                    <div class="scroller" style="height: <?php echo (count($mensajes)>2)?'60%':'30%'?> 40%;" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="chats">
                                            <?php 
                                            $last_message_id = 0;
                                            foreach($mensajes as $mensaje):
                                                $last_message_id =  $mensaje->id_mensaje;
                                                ?>
                                            <li class="<?php echo ($mensaje->id_usuario_sender == $user->id)?'out':'in';?>">
                                                <img class="avatar" alt="" src="<?php                                                    
                                                         echo base_url('assets/img_perfiles').'/'.$mensaje->sender_image;                                                    
                                                ?>" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> <?php
                                                    
                                                         echo $mensaje->sender_name.' '.$mensaje->sender_lastname;
                                                   
                                                ?> </a>
                                                    <span class="datetime">a las <?php echo date('H:i d/m/Y',strtotime($mensaje->fecha)); ?> </span>
                                                    <span class="body"> <?php echo $mensaje->mensaje?></span>
                                                </div>
                                            </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                    <input type='hidden' id='last_message_id' value='<?php echo $last_message_id?>' />
                                    <div class="chat-form">
                                        <div class="input-cont">
                                            <input class="form-control" type="text" placeholder="Tipeá el comemtario acá y apretá la tilde para mandar..." /> </div>
                                        <div class="btn-cont">
                                            <span class="arrow"> </span>
                                            <a href="" class="btn blue icn-only">
                                                <i class="fa fa-check icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                                            </div>
                                        </div>
                                        <?php foreach($secciones as $key=>$seccion): ?>
                                        <div class="tab-pane fade " id="tab_1_<?php echo ($key + 2) ?>">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <!-- BEGIN PORTLET-->
                                                    <div class="portlet light bordered">
                                                    
                                                        <div class="portlet-body" style="<?php echo (count($seccion->children)<=1)?'display: none;':'';?>">
                                                            <div class="form-group">
                                                                <h3>Secciones</h3>
                                                                <select class="form-control input-lg subseccion" id="select-<?php echo ($key + 2) ?>">                                                                   
                                                                    <?php foreach($seccion->children as $subkey=>$subseccion): ?>
                                                                    <option value="<?php echo $seccion->id.'-'.$subseccion->id ?>"><?php echo $subseccion->text ?></option>
                                                                    <?php endforeach; ?>                                                                    
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET-->
                                                </div>
                                                <div id='grafico-<?php echo $seccion->id?>'>
                                                    
                                                </div>
                                                
                    </div>
                                        </div>
                                        <?php endforeach;?>


                                       
                                        
                                        
                                        

                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>

                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>