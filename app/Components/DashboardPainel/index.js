/* função de sair da SESSION está em alguns botoes de algumas paginas*/

function sair_confirm(msg, url) {
  if (confirm(msg)) {
    window.location.href = '/user/logout';
  } else {
    false;
  }
}

/* tooltips do bootstrap mostra msg antes nos botoes */

$(function() {
  $('[data-toggle="tooltip"]').tooltip();
});

//Navbar do Painel de controle
$('#menu-toggle').click(function(e) {
  e.preventDefault();
  $('#wrapper').toggleClass('active');
});

/* Pegando os dsdos do DB e trazendo como notificação */
/*
    $.ajax({
      type: 'post', //Definimos o método HTTP usado
      dataType: 'html', //Definimos o tipo de retorno
      url: '/app/Model/Notifications.php', //Definindo o arquivo onde serão buscados os dados
      success: function(dados) {
        //Adicionando registros retornados na tabela
        $('#notifications').append(dados);
    
        console.log(dados);
      }
    });*/
/* adiciona a classe que deixa o botao vermelho */
/*
    $.ajax({
      success: function() {
        var notificacao = 'notifications';
        if ($("span[id='notifications']").text() > 0) {
          $('#notificbtn').addClass('btn-danger');
          $('#notificbtn').addClass('notificbtnmove');
        }
      }
    });*/
