<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <form name="form" method="POST" action="">
        <?php foreach ($tweets as $tweet): ?>
        <div>
            <img alt="jpatriciomussi" src="<?php echo $tweet->profile_image ?>" />
            <input type="checkbox" name="tweets[]" value='<?php echo json_encode($tweet)?>'>
            <br>
            <?php echo $tweet->date ?><br>
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
