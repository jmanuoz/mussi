<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php if (!$this->facebook->is_authenticated()) : ?>

            <div class="login">
                <a href="<?php echo $this->facebook->login_url(); ?>">Login</a>
            </div>

        <?php else : ?>
            <div class="page-content">
                <form name="form" method="POST" action="">
                    <?php foreach ($posts as $post): ?>
                        <div>

                            <input type="checkbox" name="posts[]" value='<?php echo json_encode($post) ?>'>
                            <br>
                            <?php echo $post->date ?><br>
                             <?php if ($post->posted_by != ''): ?>
                            Publicado por: <?php echo $post->posted_by ?><br>

                            <?php endif; ?>
                            <?php echo $post->text ?>
                            <?php if ($post->type == 'link'): ?>
                                <a href="<?php echo $post->link; ?>"><?php echo $post->link; ?></a>

                            <?php endif; ?>
                            <br>
                            <?php
                            foreach ($post->media as $media):
                                if ($media->type == 'video'):
                                    ?>
                                    <video width="320" height="240" controls>
                                        <source src="<?php echo $media->src ?>" type="video/mp4">

                                    </video>                    
                                <?php else: ?>
                                    <img src="<?php echo $media->src ?>" width="320" height="240"/>
                                <?php endif;
                                ?>

        <?php endforeach; ?>
                        </div>

    <?php endforeach; ?>
                    <input type="submit" name="guardar" value="Guardar" />
                </form>
            </div>
<?php endif; ?>
    </div>
</div>