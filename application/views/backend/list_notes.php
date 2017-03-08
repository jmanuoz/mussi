<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="">Home</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Notas</span>
          </li>
        </ul>

      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title"> Lista de Notas
        <small>Acá podes ver <b>todas</b> las notas publicadas por Juan Patricio Mussi</small>
      </h1>
      <!-- END PAGE TITLE-->

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width: 25px;"></th>
                                    <th> Título </th>
                                    <th> Nota </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notes as $note):
                                    $content = strip_tags($note->text);
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><a href="<?php echo site_url('Note/modify/' . $note->notes_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
                                        <td> <?php echo $note->title ?> </td>
                                        <td><?php echo strlen($content)==30?$content.'...':$content;  ?></td>



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
