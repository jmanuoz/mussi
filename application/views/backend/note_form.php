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
      <h1 class="page-title"> Crear Nota
        <!-- <small>Acá podes ver <b>todos</b> los twitts publicados por Juan Patricio Mussi</small> -->
      </h1>
      <!-- END PAGE TITLE-->

        <form name="" action="" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="title">Título:</label>
            <input value="<?php echo isset($note)?$note->title:'' ?>" type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Ingresá el título">
            <small id="titleHelp" class="form-text text-muted">Acá tenes que ingresar el título de la nota.</small>
          </div>

          <div class="form-group">
            <?php
              if(isset($note) && $note->image != ''):
            ?>
            <div style="width:100%; float:left; margin-bottom: 10px;">
              <img src="<?php echo site_url().'assets/img_notes/'.$note->image; ?>" width="400" />
            </div>
            <?php endif; ?>
            <label for="exampleInputFile">Imagen destacada</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" aria-describedby="imgHelp">
            <small id="imgHelp" class="form-text text-muted">Cargá la imagen de la nota.</small>
          </div>


          <div class="form-group">
            <label for="categories">Secciones:</label>

            <select name="categories[]" id="categories" class="js-example-basic-multiple" multiple="multiple">
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->categories_id ?>"
                           <?php
                           if(isset($note_categories)){
                            echo in_array(array('category_id'=>$category->categories_id), $note_categories)?'selected':'';
                           }?>>
                        <?php echo $category->name ?></option>
                <?php endforeach; ?>
            </select>

          </div>

          <div class="form-group">
            <label for="editor">Contenido:</label>
            <textarea name="content" class="summernote" id="editor">
                        <?php echo isset($note)?$note->text:'' ?>
            </textarea>
          </div>

          <div class="form-group">
            <input type="submit" class="form-control" name="guardar" value="Guardar"/>
          </div>

        </form>

    </div>
</div>
