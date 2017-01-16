<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <form name="form" method="POST" action="">
            <input type="hidden" name="social_net" id="social_net" value="<?php echo $social_net?>" />
        <?php foreach ($tweets as $tweet): ?>
        <div>
            <img alt="jpatriciomussi" src="<?php echo $tweet->profile_image ?>" />
            <input type="checkbox" name="tweets[]" id="checkbox-<?php echo $tweet->post_id?>" value='<?php echo json_encode($tweet)?>' <?php echo ($tweet->saved == true)?'checked disabled="disabled"':'';?>>
             <?php if($tweet->saved == true):?>
                <a id="remove_post-<?php echo $tweet->post_id?>" onclick="quitar_post('<?php echo $tweet->post_id?>')">remover</a>
            <?php endif;?>
            <br>
            <select name="category-<?php echo $tweet->post_id?>">
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->categories_id ?>"><?php echo $category->name ?></option>
                <?php endforeach; ?>
                
            </select><br>
            <?php echo $tweet->date ?><br>
             <?php if ($tweet->posted_by != ''): ?>
                            Twiteado por: <?php echo $tweet->posted_by ?><br>

                            <?php endif; ?>
            <?php echo $tweet->text ?>
            <br>
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
            <input type="submit" name="guardar" value="Guardar" />
        </form>
    </div>
</div>
