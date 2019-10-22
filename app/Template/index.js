// inicia o AOS
AOS.init();

// scroll do navbar para as partes
$('.navbar-nav a[href^="#"]').on('click', function(e) {
  e.preventDefault();
  var id = $(this).attr('href'),
    targetOffset = $(id).offset().top;

  $('html, body').animate(
    {
      scrollTop: targetOffset - 100
    },
    1200
  );
});

//scrooltop

$(window).scroll(function() {
  if ($(this).scrollTop() > 50) {
    $('.scrolltop:hidden')
      .stop(true, true)
      .fadeIn();
  } else {
    $('.scrolltop')
      .stop(true, true)
      .fadeOut();
  }
});
$(function() {
  $('.scroll').click(function() {
    $('html,body').animate(
      {
        scrollTop: $('head').offset().top
      },
      '1000'
    );
    return false;
  });
});
/* ativa os links pra mudar a cor */
$(document).ready(function() {
  $(
    ".navi li a[href='" +
      location.href.substring(location.href.lastIndexOf('/'), 255) +
      "']"
  ).addClass('active');
});

/* tooltips do bootstrap mostra msg antes nos botoes */

$(function() {
  $('[data-toggle="tooltip"]').tooltip();
});
