<?php $errors = validation_errors(); ?>
<style media="screen">
  .logo{
    border-radius: 50%!important;
    background-image: url('../../assets/img/mussi-perfil.jpg');
    background-size: cover;
    height: 100px;
    width: 100px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 1px 5px 0 rgba(0,0,0,0.12),0 3px 1px -2px rgba(0,0,0,0.2);
    border-radius: 50%;
    background-image: url("http://www.monteagudo.com.ar/demo/mussi/assets/img/mussi-perfil.jpg");
  }
  .content{
    margin: 30px auto 10px;
  }
</style>
<!-- BEGIN LOGIN FORM -->
<div class="login">

  <!-- BEGIN LOGO -->
      <div class="logo">
      </div>
      <!-- END LOGO -->

      <div class="alert alert-danger <?php echo ($errors != '')?'':'display-hide'; ?>">
          <button class="close" data-close="alert"></button>
          <span id="msg-error"><?php echo $errors ?> </span>
      </div>
      <?php if (isset($operation_result)): ?>
          <div class="alert  <?php echo (($operation_result)=='danger' ? 'alert-danger' : 'alert-success'); ?>" id="error_div_pass">
              <button class="close" data-close="alert"></button>
              <span id="error_msg_pass"><?php echo $msg; ?> </span>
          </div>
       <?php endif; ?>

      <!-- BEGIN LOGIN -->
      <div class="content">
          <!-- BEGIN LOGIN FORM -->
          <form class="login-form" action="<?php echo base_url('login/verify'); ?>" method="post" >
              <h3 class="form-title font-green">Ingresar</h3>
              <div class="alert alert-danger display-hide">
                  <button class="close" data-close="alert"></button>
                  <span> Enter any username and password. </span>
              </div>
              <div class="form-group">
                  <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                  <label class="control-label visible-ie8 visible-ie9">Username</label>
                  <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre de Usuario" required name="username" /> </div>
              <div class="form-group">
                  <label class="control-label visible-ie8 visible-ie9">Password</label>
                  <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" required name="password" /> </div>
              <div class="form-actions">
                  <button type="submit" class="btn green uppercase">Entrar</button>
                  <label class="rememberme check mt-checkbox mt-checkbox-outline">
                      <input type="checkbox" name="remember_me" value="1" />Recordarme
                      <span></span>
                  </label>
              </div>

          </form>
          <!-- END LOGIN FORM -->
  </div>

        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/metronic/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/');?>/metronic/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <script src="<?php echo base_url('assets/');?>/metronic/global/scripts/dashboard.min.js" type="text/javascript"></script>
       <!-- END PAGE LEVEL SCRIPTS -->
       <!-- BEGIN THEME LAYOUT SCRIPTS -->
       <script src="<?php echo base_url('assets/');?>/metronic/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/');?>/metronic/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/');?>/metronic/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/');?>/metronic/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
       <!-- END THEME LAYOUT SCRIPTS -->
