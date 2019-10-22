$(document).ready(function() {
  $('.toast').toast('show');
});

$('#formmsg').submit(function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
    type: 'POST',
    url: url,
    data: form.serialize(), // serializes the form's elements.
    success: function(data) {
      const painel = document.getElementById('toastsucesso');
      painel.style.display = 'block';
      $('#formmsg')
        .find('input:text')
        .val('');
      $('#formmsg')
        .find('#email')
        .val('');
      $('#formmsg')
        .find('textarea')
        .val('');
      setTimeout(function() {
        $('#toastsucesso').fadeOut();
      }, 3000);
    }
  });
});

/* JS do grid dos artistas */
$(function() {
  $('.material-card > .mc-btn-action').click(function() {
    var card = $(this).parent('.material-card');
    var icon = $(this).children('i');
    icon.addClass('fa-spin-fast');

    if (card.hasClass('mc-active')) {
      card.removeClass('mc-active');

      window.setTimeout(function() {
        icon
          .removeClass('fa-arrow-left')
          .removeClass('fa-spin-fast')
          .addClass('fa-bars');
      }, 800);
    } else {
      card.addClass('mc-active');

      window.setTimeout(function() {
        icon
          .removeClass('fa-bars')
          .removeClass('fa-spin-fast')
          .addClass('fa-arrow-left');
      }, 800);
    }
  });
});

// barra de progresso de algum lugar kkk

$(function() {
  $('.progressbar').each(function() {
    var t = $(this);
    var dataperc = t.attr('data-perc'),
      barperc = Math.round(dataperc * 2.56);
    t.find('.bar').animate({ width: barperc }, dataperc * 25);
    t.find('.label').append('<div class="perc"></div>');

    function perc() {
      var length = t.find('.bar').css('width'),
        perc = Math.round(parseInt(length) / 2.56),
        labelpos = parseInt(length) - 2;
      t.find('.label').css('left', labelpos);
      t.find('.perc').text(perc + '%');
    }
    perc();
    setInterval(perc, 0);
  });
});
