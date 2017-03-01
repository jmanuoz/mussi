$(document).ready(function(){

  $("#mobile-search-logo").click(function(){
    $("#head-mobile .searchBox").css("display", "block");
    $("#search-input-mobile").focus();
  });
  $("#close-mobile-search-btn").click(function(){
    $("#head-mobile .searchBox").css("display", "none");
    $("#search-input-mobile").val('');
  });

  $("#btn-buscar").click(function(){
    $(".timeline .searchBox").css("display", "block");
    $("#search-input-timeline").focus();
  });
  $("#close-timeline-search-btn").click(function(){
    $(".timeline .searchBox").css("display", "none");
    $("#search-input-timeline").val('');
  });

  // Side Menu Mobile
  $("#mobile-menu-logo").sideNav({
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      edge: 'left'
    }
  );

  $('#modal1').modal();

  $('.materialboxed').materialbox();


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
      var agrega = 0;
      if (currentScroll > 0){ agrega = 10; }
      var alturaVa = altura - currentScroll;
      if(alturaVa<=50){ alturaVa=50; } else if(currentScroll==0){ alturaVa}

    hello.setAttribute("style","-webkit-filter:blur(" + valor + "px); transform:scale(1.1); height: "+ alturaVa +"px;");
    // hello.setAttribute("style","scale:(1.1)");

  }

  init();
  })();

  var widthHeader = $("header .card.card-main-header").parent().width();
  $("header .card").not(".mensajeFlotante").width(widthHeader);

  window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 10;
        if (distanceY > shrinkOn) {
          $("header .card").not(".menuFlotante").not(".mensajeFlotante").addClass("fixed z-depth-4");
          // $("header .card-image").addClass("smaller");
          $("header .foto-perfil").addClass("smaller");
          $("header .nombre-perfil").addClass("smaller");
        } else if(distanceY < 100 ) {
          $("header .card").removeClass("fixed");
          $("header .card").removeClass("z-depth-4");
          // $("header .card-image").removeClass("smaller");
          $("header .foto-perfil").removeClass("smaller");
          $("header .nombre-perfil").removeClass("smaller");
        }
  });

  });
