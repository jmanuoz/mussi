<script src="<?php echo base_url('assets/js/usuarios.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
<button type="button"
                    class="btn btn-success pull-right"
                    onclick="location.href='<?php echo site_url("usuarios/crear"); ?>'">
                <i class="icon-plus-sign-alt"></i><?php echo('Nuevo Usuario'); ?></button>
                 <?php iF(isset($msg)){?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> <?php echo $msg; ?> </div>
    <?php } ?>
<table class="table table-striped table-hover" id="table_fieldset">
    <thead>
        <tr>
            <th><a href=""><?php echo "Usuario"; ?></a></th>   
            <th class="center"><?php echo ('Poner graficos'); ?></th>
            <th class="center"><?php echo ('Modificar'); ?></th>
            <th class="center"><?php echo ('Eliminar'); ?></th>
        </tr>	
    </thead>
    <?php foreach ($usuarios as $item): ?>
        <tr>
            <td class="left"><?php echo $item->username; ?></td>
            <td><a href="<?php echo site_url("usuarios/setGraph/".$item->id); ?>"><i class="glyphicon glyphicon-signal" title="<?php echo ('Asignar'); ?>"></i>
                </a></td>
            <td class="center">

                <a href="<?php echo site_url("usuarios/update/".$item->id); ?>"><i class="glyphicon glyphicon-edit" title="<?php echo ('Modificar'); ?>"></i>
                </a>

            </td>
            
            <td class="center">

                <a class="update-user remvoe-profesor" id="<?php echo $item->id ?>" rel="remove" href="javascript: void(0)">
                    <i class="glyphicon glyphicon-trash" title="<?php echo ('Eliminar'); ?>"></i>
                </a>
               
            </td>
        </tr>
    <?php endforeach; ?>
</table>