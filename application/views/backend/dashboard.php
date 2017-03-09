<?php
foreach ($followers as $f) {

    switch ($f->name) {
        case 'Twitter':
            $twFollowers = $f->followers;
            break;
        case 'Facebook':
            $fbFollowers = $f->followers;
            break;
        case 'Instagram':
            $inFollowers = $f->followers;
            break;
        case 'Youtube':
            $yoFollowers = $f->followers;
            break;
    }
}
?>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="">Inicio</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Panel principal</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Panel de Administración
            <small>estadísticas y opciones de configuración</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-twitter"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= $twFollowers; ?>">0</span>
                        </div>
                        <div class="desc"> nuevos Twitts </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-youtube"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= $yoFollowers; ?>">0</span></div>
                        <div class="desc"> suscriptores de Youtube </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" style="background-color: #3b5998!important;" href="#">
                    <div class="visual">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= $fbFollowers; ?>">0</span>
                        </div>
                        <div class="desc"> nuevos seguidores </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" style="background-color:#125688!important;" href="#">
                    <div class="visual">
                        <i class="fa fa-instagram"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= $inFollowers; ?>"></span></div>
                        <div class="desc"> nuevos seguidores </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->

        <div class="row">
            <div class="col-lg-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bell-o"></i>Posteos publicados </div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th class="red"></th>
                                            <th>
                                                <i class="fa fa-file-text-o"></i> Contenido </th>
                                            <th class="hidden-xs">
                                                <i class="fa fa-tag"></i> Categorías </th>
                                            <th>
                                                <i class="fa fa-calendar-o"></i> Fecha / Hora </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                   
                                                            <tbody>
<?php foreach($posts as $post):
?>
                                                                <?php if ($post->social_net != 5 && $post->social_net != 6): ?>
                                                                <tr>
                                                                    <td class="highlight redS" style="text-align: center; padding-left: 0; padding-right: 0;">
                                                                <?php
                                                                switch ($post->social_net) {
                                                                case '1':
                                                                echo "<i class='fa fa-twitter' aria-hidden='true'></i>";
                                                                break;
                                                                case '2':
                                                                echo "<i class='fa fa-facebook' aria-hidden='true'></i>";
                                                                break;
                                                                case '3':
                                                                echo "<i class='fa fa-instagram' aria-hidden='true'></i>";
                                                                break;
                                                                case '4':
                                                                echo "<i class='fa fa-youtube-square' aria-hidden='true'></i>";
                                                                break;

                                                                }
                                                                ?>
                                                                    </td>

                                                                    <td class="highlight">
                                                                        <?= $post->text; ?>
                                                                    </td>
                                                                    <td class="hidden-xs">
                                                                        <select name="category-<?php echo $post->posts_id ?>[]" id="category-<?php echo $post->posts_id ?>"
                                                                                class="js-example-basic-multiple" multiple="multiple" onchange="updateCategories(<?php echo $post->posts_id ?>)">
                                                                        <?php foreach($categories as $category): ?>
                                                                            <option value="<?php echo $category->categories_id ?>"
<?php
$categorystd = new stdClass();
$categorystd->category_id = $category->categories_id;
$categorystd->category_name = $category->name;
echo in_array($categorystd, $post->categories)?'SELECTED':''
?>>
                                                                            <?php echo $category->name ?></option>
                                                                            <?php endforeach; ?>

                                                                        </select>

                                                                    </td>
                                                                    <td><?= ($post->date == '') ? $post->social_net : $post->date; ?></td>
                                                                    <td>
                                                                        <a class="publish waves-effect waves-light btn" onclick="quitar_post('<?php echo $post->social_post_id ?>', '<?php echo $post->social_net ?>');">Eliminar</a>

                                                                </tr>
<?php endif; ?>
<?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- END SAMPLE TABLE PORTLET-->
                                                </div>
                                                </div>


                                                
                                                </div>
