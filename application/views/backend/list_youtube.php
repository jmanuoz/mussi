<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
       
        
        
        <form name="form" method="POST" action="">
            <input type="hidden" name="social_net" id="social_net" value="<?php echo $social_net?>" />
        <?php foreach ($posts as $post): ?>
        <div>
           
            <input type="checkbox" id="checkbox-<?php echo $post->post_id?>" name="instaPosts[]" value='<?php echo json_encode($post)?>' <?php echo ($post->saved == true)?'checked "':'';?>>
             <?php if($post->saved == true):?>
            <a id="remove_post-<?php echo $post->post_id?>" onclick="quitar_post('<?php echo $post->post_id?>')">remover</a>
            <?php endif;?>
            <br>
            
             <select name="category-<?php echo $post->post_id?>[]" id="category-<?php echo $post->post_id?>" class="js-example-basic-multiple" multiple="multiple">
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->categories_id ?>"
                        <?php echo in_array(array('category_id'=>$category->categories_id), $post->categories)?'SELECTED':''?>>
                        <?php echo $category->name ?></option>
                <?php endforeach; ?>
                
            </select><br>
            <?php echo $post->date ?><br>
             <?php if ($post->posted_by != ''): ?>
                            Twiteado por: <?php echo $post->posted_by ?><br>

                            <?php endif; ?>
            <?php echo $post->text ?>
            <br>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $post->post_id ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        
        <?php endforeach; ?>
            <input type="submit" name="guardar" value="Guardar" />
        </form>
       
    </div>
</div>
