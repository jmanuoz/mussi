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

                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Listado de encuestas
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    
                                    <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                               
                                                <th></th>   
                                                <th> Tipo </th>
                                                <th> Titulo </th>
                                                <th> Fecha </th>
                                                <th> Área </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($encuestas as $encuesta): ?>
                                            <tr class="odd gradeX clickable-row" class='' data-href='' >
                                                <td><a href="<?php echo site_url('Encuestas/editar/'.$encuesta->id);?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                <td> <?php echo $encuesta->tipo ?> </td>
                                                <td>
                                                   <?php echo $encuesta->titulo ?>
                                                </td>
                                                <td>   <?php echo date('d/m/Y',strtotime($encuesta->fecha)) ?> </td>
                                                <td class="center"><?php echo $encuesta->area_nombre ?> </td>
                                                <td><span id="delete-<?php echo $encuesta->id ?>" class="glyphicon glyphicon-trash" style="cursor:pointer"></span></td>
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