<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1">

    <title>ReactJS and ES6</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url('assets/');?>/css/todo.css" media="screen" title="no title" charset="utf-8">

</head>
<body>

<div class="container" id="app"></div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<!-- <script src="./node_modules/readmore-js/readmore.min.js"></script> -->
<!-- <script type="text/javascript" src="./dist/js/expandirArticulo.js"></script> -->
<script src="<?php echo base_url('assets/');?>/js/bundle.js"></script>

</body>
<script type="text/javascript">
$(document).ready(function(){

  $('.materialboxed').materialbox();
  $(".button-collapse").sideNav();

  var widthHeader = $("header .card.card-main-header").parent().width();
  $("header .card").width(widthHeader);

  window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 10;
        if (distanceY > shrinkOn) {
          $("header .card").not(".menuFlotante").not(".mensajeFlotante").addClass("fixed");
          // $("header .card-image").addClass("smaller");
          $("header .foto-perfil").addClass("smaller");
          $("header .nombre-perfil").addClass("smaller");
        } else if(distanceY < 100 ) {
              $("header .card").removeClass("fixed");
              // $("header .card-image").removeClass("smaller");
              $("header .foto-perfil").removeClass("smaller");
              $("header .nombre-perfil").removeClass("smaller");
        }
  });

});
</script>
<script>
$(document).ready(function(){

(function() {
  'user strict';
  var hello = document.getElementById('blur'),
    windowHeight = window.innerHeight,
    isScroll = false;
  var altura = hello.offsetHeight;
  var latestScroll = 0;
  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                            window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

    window.requestAnimationFrame = requestAnimationFrame;

    var init = function() {
      window.addEventListener('scroll', function(){
      latestScroll = window.scrollY;
      checkScroll();
    }, false);
    }

  var checkScroll = function() {
    if(!isScroll) {
      window.requestAnimationFrame(update);
    }
    isScroll = true;
  }

  var update = function() {
    currentScroll = latestScroll;
    isScroll = false;
    var helloScroll = currentScroll * 2,
      blurScroll = currentScroll * 10;

      var valor = (blurScroll / windowHeight - .1).toFixed(2);
      if(valor>=10){ valor=10; }
      var alturaVa = altura - currentScroll;
      if(alturaVa<=50){ alturaVa=50; } else if(currentScroll==0){ alturaVa}

    hello.setAttribute("style","-webkit-filter:blur(" + valor + "px); transform:scale(1.1); height: "+ alturaVa +"px;");
    // hello.setAttribute("style","scale:(1.1)");

  }

  init();
})();
});

</script>
</html>
