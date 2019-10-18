// Script que faz a hora exibir em qualquer coisa com id "demo"
const $clock = $('.real-clock');

setInterval(function() {
  $clock.html(new Date().toLocaleString().substr(11, 8));
}, 1000);

// botao do scroll pra subir

$(function() {
  $(document).on('scroll', function() {
    if ($(window).scrollTop() > 100) {
      $('.smoothscroll-top').addClass('show');
    } else {
      $('.smoothscroll-top').removeClass('show');
    }
  });
  $('.smoothscroll-top').on('click', scrollToTop);
});

function scrollToTop() {
  verticalOffset = typeof verticalOffset != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body')
    .animate({ scrollTop: offsetTop }, 600, 'linear')
    .animate({ scrollTop: 25 }, 200)
    .animate({ scrollTop: 0 }, 150)
    .animate({ scrollTop: 0 }, 50);
}
