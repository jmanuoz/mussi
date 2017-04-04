<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <title>Doxa | Ágora Consultores</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->


         <!-- BEGIN PAGE NOTIFICACIONES LEVEL PLUGINS -->
        <link href="<?php echo base_url('assets/');?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url('assets/');?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

         <!-- BEGIN THEME LAYOUT STYLES -->
         <link href="<?php echo base_url('assets/');?>/css/dashboard.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>/layouts/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url('assets/');?>/layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <?php foreach($css as $file): ?>
         <link href="<?php echo base_url('assets/').$file;?>" rel="stylesheet" type="text/css" />
        <?php endforeach; ?>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <input type="hidden" name="base_url" id="site_url" value="<?php echo site_url();?>" />
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
 <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
