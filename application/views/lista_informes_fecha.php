<div class="portlet-body">
    <div class="scroller" data-always-visible="1"  data-rail-visible="0">
        <ul class="feeds">
            <li>
                <?php foreach($informes as $informe_dia): ?>
                <div class="col1">
                    <div class="cont">
                        <div class="cont-col1">
                            <div class="label label-sm label-info">
                                <i class="fa fa-feed"></i>
                            </div>
                        </div>
                        <div class="cont-col2">
                            <div class="desc"> <a href="<?php echo site_url('Informes_Medios/ver/'.$informe_dia->id_informe); ?>"><?php echo $informe_dia->servicio.' - '.$informe_dia->edicion; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </li>
        </ul>
    </div>
    <div class="scroller-footer">

    </div>
</div>