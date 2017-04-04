<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1">

    <!-- META TAGS SHARE FACEBOOK -->
    <meta property="og:url" content="<?php echo base_url(uri_string());?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $desc; ?>" />
    <meta property="og:image" content="<?php echo $image; ?>" />

    <!-- META TAGS SHARE TWITTER -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@jpatriciomussi" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:description" content="<?php echo $desc; ?>" />
    <meta name="twitter:image" content="<?php echo $image; ?>" />

    <title>Juan Patricio Mussi</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen" title="no title" charset="utf-8">


    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/general.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/header.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/bio.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/secciones.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/calendario.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/muni.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/map.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/nota.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/timeline.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/card-articulo.css" media="screen" title="no title" charset="utf-8">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7dNJE7C3mPlWhcHpTGsh1QJNyjfVa5BY"></script>
    <script src="https://twemoji.maxcdn.com/2/twemoji.min.js"></script>

</head>
<body>

<div id="app"></div>

<div id="map"></div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

</body>
<script src="<?php echo base_url('assets/');?>/js/bundle.js"></script>
<script src="<?php echo base_url('assets/');?>/js/bundlemap.js"></script>
<script src="<?php echo base_url('assets/') ?>/js/app.js"></script>

</html>
