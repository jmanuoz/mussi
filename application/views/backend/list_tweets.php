<style media="screen">
  .select2-container--bootstrap .select2-selection--multiple{
    width: 350px!important;
  }
  .select2-container--bootstrap .select2-selection--multiple .select2-selection__rendered{
    width: 350px!important;
  }

  /* TABLE ELEMENTS */
  td{
    vertical-align: middle!important;
  }
  th.redS{
    background-color: transparent!important;
    border: none!important;
    width: 30px!important;
  }
  th.estado{ width: 20px; }
  th.fecha { width: 175px; }
  th.chk{ width: 20px; }
  td.estado{
    text-align: center;
    color: #26c281;
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
              <input type="submit" name="guardar" value="Guardar" class="btn btn-guardar btn-success" />

            <input type="hidden" name="social_net" id="social_net" value="<?php echo $social_net?>" />

              <a href="javascript:;" class="reload"> </a>
              <a href="javascript:;" class="remove"> </a>
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-scrollable">

              <form name="form" method="POST" action="">

              <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                  <tr>

                    <th class="redS"></th>
                    <th class="chk">
                      C
                    </th>
                    <th class="estado">
                      Estado
                    </th>
                    <th class="fecha">
                      <i class="fa fa-clock"></i> Fecha
                    </th>
                      <th class="hidden-xs">
                        <i class="fa fa-user"></i> Contenido </th>
                      <th>
                        Categorías
                      </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tweets as $tweet): ?>
                        <tr class="tooltips" <?= ($tweet->posted_by!='') ? "data-container='body' data-placement='top' data-original-title='Retwitteado de @$tweet->posted_by' style='background-color:#e7ecf1!important;'" : "" ?>>
                          <td class="highlight" style="text-align: center; padding-left: 0; padding-right: 0;">
                            <i class="fa fa-twitter"></i>
                          </td>
                          <td>

                            <?php if($tweet->saved == false){ ?>

                              <input type="checkbox" name="tweets[]" id="checkbox-<?php echo $tweet->post_id?>" value='<?php echo json_encode($tweet)?>' <?php echo ($tweet->saved == true)?'checked "':'';?>>

                            <?php }else{ ?>

                              <input type="checkbox" name="tweets[]" id="checkbox-<?php echo $tweet->post_id?>" value='<?php echo json_encode($tweet)?>' <?php echo ($tweet->saved == true)?'checked "':'';?>>

                              <button type="button" id="btn-<?= $tweet->post_id; ?>" class="btn btn-success">Subido</button>

                              <a class="btn btn-danger" id="remove_post-<?php echo $tweet->post_id?>" onclick="quitar_post('<?php echo $tweet->post_id?>'); javascript:document.getElementById('btn-<?= $tweet->post_id; ?>').remove();">remover</a>

                            <?php } ?>

                          </td>

                          <td class="estado">
                            <?php if($tweet->saved == false){ ?>
                              <i data-container="body" data-placement="top" data-original-title="No publicado" style="color:red" class="tooltips fa fa-close" aria-hidden="true"></i>
                            <?php }else{ ?>
                              <i data-container="body" data-placement="top" data-original-title="No publicado"  class="fa fa-check-square-o tooltips" aria-hidden="true"></i>
                            <?php } ?>
                          <td>
                            <?php
                            $datetime = new DateTime($tweet->date);
                            $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                            $date = $datetime->format('Y-m-d H:i:s');
                            ?>
                            <?= $date; ?>
                          </td>
                          <td class="hidden-xs">
                            <?= $tweet->text; ?>
                          </td>
                          <td>
                            <select name="category-<?php echo $tweet->post_id?>[]" id="category-<?php echo $tweet->post_id?>" class="js-example-basic-multiple" multiple="multiple">
                                <?php foreach($categories as $category):?>
                                    <option value="<?php echo $category->categories_id ?>"
                                             <?php echo in_array(array('category_id'=>$category->categories_id), $tweet->categories)?'SELECTED':''?>>
                                        <?php echo $category->name ?></option>
                                <?php endforeach; ?>

                            </select>
                          </td>

                          </tr>
                          <?php endforeach; ?>
                          </tbody>
                      </table>

                    </form>

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
