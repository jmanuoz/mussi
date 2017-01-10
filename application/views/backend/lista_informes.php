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
                    <h3 class="page-title"> Listado de informes
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
                                                <th> Servicio </th>
                                                <th> Edición </th>
                                                <th> Fecha </th>
                                                <th> Usuaruios </th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($informes as $informe):?>
                                            <tr class="odd gradeX">
                                                <td><a href="<?php echo site_url('Informes_Medios/editar/'.$informe->id_informe);?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                <td> <?php echo $informe->servicio ?> </td>
                                                <td>  <?php echo $informe->edicion ?> </td>
                                                <td><?php echo date('d/m/Y',strtotime($informe->fecha)) ?></td>
                                                <td> Mussi, Baradel, Ro </td>
                                        

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