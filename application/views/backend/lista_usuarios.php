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
                                <span>Usuarios</span>

                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Listado de usuarios
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                   
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                               </th>
                                                <th> Nombre de Usuario </th>
                                                <th> Nombre </th>
                                                <th> Apellido </th>
                                                <th> Correo </th>
                                                <th> Télefono </th>
                                                <th> Postal </th>
                                                <th> Url </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($usuarios as $usuario):?>
                                            <tr class="odd gradeX">
                                                <td><a href="<?php echo site_url('Usuarios/editar/'.$usuario->id);?>"><span class="glyphicon glyphicon-edit"></span></a> </td>
                                                <td> <?php echo $usuario->username ?> </td>
                                                <td><?php echo $usuario->nombre ?></td>
                                                <td> <?php echo $usuario->apellido ?> </td>
                                                <td><a href="mailto:<?php echo $usuario->mail ?>"> <?php echo $usuario->mail ?> </a></td>
                                                <td> <?php echo $usuario->celular ?></td>
                                                <td> <?php echo $usuario->cod_postal ?></td>
                                                <td> <a href="<?php echo $usuario->url_sitio ?>"><?php echo $usuario->url_sitio ?></a></td>

                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                    </div>
                    
                    
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>