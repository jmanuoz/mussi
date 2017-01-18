<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
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
                                    <th> Título </th>
                                    <th> Descripción </th>
                                    
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notes as $note): ?>
                                    <tr class="odd gradeX">
                                        <td><a href="<?php echo site_url('Note/modify/' . $note->notes_id); ?>"><span class="glyphicon glyphicon-edit"></span></a> </td>
                                        <td> <?php echo $note->title ?> </td>
                                        <td><?php echo $note->description ?></td>
                                        
                                        

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
</div>