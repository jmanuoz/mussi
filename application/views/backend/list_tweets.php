<style media="screen">
  .select2-container--bootstrap .select2-selection--multiple{
    width: 800px!important;
    margin: 5px 0 15px 0;
  }
  .select2-container--bootstrap .select2-selection--multiple .select2-selection__rendered{
    width: 100%!important;
  }
  .box{
    /*float: left;*/
    width: 100%;
    margin: 20px 0;
    font-family: 'Roboto', sans-serif;
    padding-bottom: 40px;
    border-bottom: 1px solid #CCC;
  }
  .fecha{
    font-weight: 100;
    font-size: 16px;
    margin: 10px 0;
  }
  .fecha i{
    margin: 0 2px 0 0;
  }
  .btn-success{
    cursor: auto;
  }
  .cat-text{
    margin-top: 15px;
    width: 100%;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 100;
  }
  .user{
    font-weight: 500;
    font-size: 16px;
  }
  .text{
    margin-bottom: 20px;
    font-size: 18px;
    font-weight: 100;
  }
  .btn-guardar{
    font-size: 16px!important;
    font-weight: 500!important;
    padding: 10px 30px!important;
    margin-bottom: 25px!important;
  }
  .btn-danger{
    margin-right: 10px;
  }
</style>
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
            <span>Twitter</span>
          </li>
        </ul>
        <div class="page-toolbar">
          <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
          </div>
        </div>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title"> Listado de Twitts
        <small>Acá podes ver <b>todos</b> los twitts publicados por Juan Patricio Mussi</small>
      </h1>
      <!-- END PAGE TITLE-->

      <!-- BEGIN SAMPLE TABLE PORTLET-->
      <div class="portlet">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-twitter"></i>Twitts </div>
            <div class="tools">
              <a href="javascript:;" class="reload"> </a>
              <a href="javascript:;" class="remove"> </a>
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-scrollable">
              <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                  <tr>
                    <th style="background-color: transparent; border: none!important;"></th>
                    <th>
                      Estado
                    </th>
                    <th>
                      <i class="fa fa-clock"></i> Fecha </th>
                      <th class="hidden-xs">
                        <i class="fa fa-user"></i> Contenido </th>
                      <th>
                        Categorías
                      </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tweets as $tweet): ?>
                        <tr>
                          <td class="highlight" style="text-align: center; padding-left: 0; padding-right: 0;">
                            <i class="fa fa-facebook"></i>
                          </td>
                          <td>Publicado</td>
                          <td>
                            19/02/2017 20:30h
                          </td>
                          <td class="hidden-xs"> Contenido de post de fb</td>
                          <td>
                            Categorías
                          </td>
                          <td>
                            <a href="javascript:;" style="border-color: #36c6d3; color: #36c6d3;" class="btn btn-outline btn-circle btn-sm purple">
                              <i class="fa fa-upload"></i> Publicar </a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                          </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- END SAMPLE TABLE PORTLET-->

        <form name="form" method="POST" action="">

          <input type="submit" name="guardar" value="Guardar" class="btn btn-guardar btn-success" />

        <input type="hidden" name="social_net" id="social_net" value="<?php echo $social_net?>" />

        <h1>Lista de Tweets</h1>

        <?php foreach ($tweets as $tweet): ?>
        <div class="box">


          <div class="fecha">

            <?php if($tweet->saved == false){ ?>

              <input type="checkbox" name="tweets[]" id="checkbox-<?php echo $tweet->post_id?>" value='<?php echo json_encode($tweet)?>' <?php echo ($tweet->saved == true)?'checked "':'';?>>

            <?php }else{ ?>

              <input type="checkbox" name="tweets[]" id="checkbox-<?php echo $tweet->post_id?>" value='<?php echo json_encode($tweet)?>' <?php echo ($tweet->saved == true)?'checked "':'';?>>

              <button type="button" id="btn-<?= $tweet->post_id; ?>" class="btn btn-success">Subido</button>

              <a class="btn btn-danger" id="remove_post-<?php echo $tweet->post_id?>" onclick="quitar_post('<?php echo $tweet->post_id?>'); javascript:document.getElementById('btn-<?= $tweet->post_id; ?>').remove();">remover</a>

            <?php } ?>

            <i aria-hidden="true" class="fa fa-calendar"></i>
            <?php echo $tweet->date ?>

          </div>


            <div class="cat-text">Categorías:</div>
            <select name="category-<?php echo $tweet->post_id?>[]" id="category-<?php echo $tweet->post_id?>" class="js-example-basic-multiple" multiple="multiple">
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->categories_id ?>"
                             <?php echo in_array(array('category_id'=>$category->categories_id), $tweet->categories)?'SELECTED':''?>>
                        <?php echo $category->name ?></option>
                <?php endforeach; ?>

            </select>

            <?php if ($tweet->posted_by != ''): ?>
              <div class="user">
               <b><i style="margin-right: 5px;" aria-hidden="true" class="fa fa-twitter"></i>Twiteado por:</b> <?php echo $tweet->posted_by ?>
              </div>
            <?php endif; ?>

            <div class="text">
              <?php echo $tweet->text ?>
            </div>

            <?php foreach ($tweet->media as $media):
                if ($media->type == 'photo'):
                    ?>
                    <img src="<?php echo $media->src ?>" width="320" height="240"/>
                <?php else: ?>
                    <video width="320" height="240" controls>
                        <source src="<?php echo $media->src ?>" type="video/mp4">

                    </video>
                <?php endif;
                ?>

                <?php endforeach; ?>
        </div>

        <?php endforeach; ?>

        <input type="submit" name="guardar" value="Guardar" class="btn btn-guardar btn-success" />

        </form>
    </div>
</div>
