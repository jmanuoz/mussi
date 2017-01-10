<div class="clearfix">
<form class="form-horizontal" method="POST">
    <?php iF(isset($msg)){?>
    <div class="alert alert- <?php echo $operation_result.'ads'; ?>"><a href="#" class="close" data-dismiss="alert">&times;</a> <?php echo $msg; ?> </div>
    <?php } ?>

<fieldset>

<!-- Form Name -->
<legend>Grafico</legend>
<?php 
$countG = count($graficos);
foreach($graficos as $grafico): ?>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="grafico"><?php echo $grafico->grafico?>: </label>
  <div class="controls">
    <input id="grafico" name="grafico_<?php echo $grafico->id_grafico ?>" type="text" placeholder="Ingrese Link" style="width:500px;" class="input-xlarge" 
           value="<?php echo $grafico->link ?>">
    Orden: <select name="orden_<?php echo $grafico->id_grafico ?>">
          <?php for($i=1;$i<$countG;$i++): ?>
          <option value="<?php echo $i?>" <?php echo ($grafico->orden == $i)?'SELECTED':''?>>
              <?php echo $i?>
          </option>
          <?php endfor; ?>
      </select>
  </div>
 
</div>

<?php endforeach; ?>
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="send"></label>
  <div class="controls">
    <button id="send" name="send" class="btn btn-success">Guardar</button>
  </div>
</div>

</fieldset>
</form>
</div>