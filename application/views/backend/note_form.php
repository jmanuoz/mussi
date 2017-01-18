<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <form name="" action="" method="POST">
            Titulo: <input type="text" name="title" id="title" value="<?php echo isset($note)?$note->title:'' ?>"/><br>
            Bajada: <input type="text" name="description" id="description" value="<?php echo isset($note)?$note->description:'' ?>"/><br>
            Secciones:<select name="categories[]" id="categories" class="js-example-basic-multiple" multiple="multiple">
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->categories_id ?>"
                           <?php 
                           if(isset($note_categories)){
                            echo in_array(array('category_id'=>$category->categories_id), $note_categories)?'selected':'';
                           }?>>
                        <?php echo $category->name ?></option>
                <?php endforeach; ?>
                
            </select><br>
            Contenido:
            <textarea name ="content" id="editor">
                        <?php echo isset($note)?$note->content:'' ?>
            </textarea>
            <input type="submit" name="guardar" Value="Guardar"/>
        </form>
		
    </div>
</div>