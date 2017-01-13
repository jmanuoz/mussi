<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php if(isset($login_link) && $login_link != ''):
            echo $login_link;
            else:
            ?>
        
        
        <form name="form" method="POST" action="">
        <?php foreach ($posts as $post): ?>
        <div>
           
            <input type="checkbox" name="instaPosts[]" value='<?php echo json_encode($post)?>'>
            <br>
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
