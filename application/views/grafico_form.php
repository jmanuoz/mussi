<div class="clearfix">
<form class="form-horizontal" method="POST">
    <?php iF(isset($msg)){?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> <?php echo $msg; ?> </div>
    <?php } ?>

<fieldset>

<!-- Form Name -->
<legend>Grafico</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="grafico">Nombre Grafico: </label>
  <div class="controls">
    <input id="grafico" name="grafico" type="text" placeholder="Ingrese Usuario" class="input-xlarge" required="" 
           value="<?php echo isset($grafico->grafico)?$grafico->grafico:'' ?>">
    
  </div>
</div>


<!-- Button -->
<div class="control-group">
  <label class="control-label" for="send"></label>
  <div class="controls">
    <button id="send" name="send" class="btn btn-success">Crear</button>
  </div>
</div>

</fieldset>
</form>
</div>