/* função de salvar a edição dos grids */

function salvaredicao(msg, url) {
  if (confirm(msg)) {
    window.location.href = '/admin/update';
  } else {
    return false;
  }
}

/* mudar ao clicar botao de destaque 'sim' e 'não' */
$('.divdestaque').on('click', '.destaque, .deactivate', function(e) {
  e.preventDefault();
  var ativo = $(this).hasClass('destaque');
  $(this)
    .val(ativo ? 'Não' : 'Sim')
    .toggleClass('destaque deactivate');
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
