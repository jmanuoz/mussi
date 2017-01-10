</div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; <a href="http://agoraconsultores.com.ar/doxa" target="_blank">Doxa</a> es un producto de 
                <a href="http://agoraconsultores.com.ar/" target="_blank">Ágora Consultores</a>.
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url('assets/');?>/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/');?>/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/');?>/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('assets/');?>/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url('assets/');?>/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/');?>/global/scripts/app.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/');?>/js/nav_backend_header.js" type="text/javascript"></script>
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
        
        <?php foreach($js as $file): ?>
        <script src="<?php echo base_url('assets/').$file;?>" type="text/javascript"></script>
        <?php endforeach; ?>
        <!-- END PAGE LEVEL SCRIPTS -->

         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/');?>/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/');?>/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>