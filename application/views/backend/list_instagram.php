<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php if(isset($login_link) && $login_link != ''):
            echo $login_link;
            else:
            ?>
        
        
        <form name="form" method="POST" action="">
            <input type="hidden" name="social_net" id="social_net" value="<?php echo $social_net?>" />
        <?php foreach ($posts as $post): ?>
        <div>
           
            <input type="checkbox" id="checkbox-<?php echo $post->post_id?>" name="instaPosts[]" value='<?php echo json_encode($post)?>' <?php echo ($post->saved == true)?'checked disabled="disabled"':'';?>>
             <?php if($post->saved == true):?>
            <a id="remove_post-<?php echo $post->post_id?>" onclick="quitar_post('<?php echo $post->post_id?>')">remover</a>
            <?php endif;?>
            <br>
            
             <select name="category-<?php echo $post->post_id?>">
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->categories_id ?>"><?php echo $category->name ?></option>
                <?php endforeach; ?>
                
            </select><br>
            <?php echo $post->date ?><br>
             <?php if ($post->posted_by != ''): ?>
                            Twiteado por: <?php echo $post->posted_by ?><br>

                            <?php endif; ?>
            <?php echo $post->text ?>
            <br>
            <?php foreach ($post->media as $media):
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
            <input type="submit" name="guardar" value="Guardar" />
        </form>
        <?php endif;?>
    </div>
</div>
