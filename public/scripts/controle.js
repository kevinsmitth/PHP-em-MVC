/* Refresh da parte da pagina pra exibir os pedidos com timer */

$(document).ready(function() {
  setInterval(function() {
    $('#resultado').load('/admin/controle #resultado');
  }, 60000);
});

/* butao pra fazer aparecer os pedidos pententes aceitos atrasados e concluidos 
    e tambem esconder os que não precisar ser mostrados devido ao click
*/

('use strict');
const btnpendent = document.getElementById('btnpendentes');
const divpendentes = document.getElementById('pendentes');
const btnaceitos = document.getElementById('btnaceitos');
const divaceitos = document.getElementById('aceitos');
const btnatrasados = document.getElementById('btnatrasados');
const divatrasados = document.getElementById('atrasados');
const btnconcluid = document.getElementById('btnconcluidos');
const divconcluidos = document.getElementById('concluidos');
btnpendent.addEventListener('click', function() {
  divpendentes.style.display = 'block';
  divaceitos.style.display = 'none';
  divatrasados.style.display = 'none';
  divconcluidos.style.display = 'none';
});
btnaceitos.addEventListener('click', function() {
  divaceitos.style.display = 'block';
  divpendentes.style.display = 'none';
  divatrasados.style.display = 'none';
  divconcluidos.style.display = 'none';
});
btnatrasados.addEventListener('click', function() {
  divatrasados.style.display = 'block';
  divpendentes.style.display = 'none';
  divaceitos.style.display = 'none';
  divconcluidos.style.display = 'none';
});
btnconcluid.addEventListener('click', function() {
  divconcluidos.style.display = 'block';
  divpendentes.style.display = 'none';
  divaceitos.style.display = 'none';
  divatrasados.style.display = 'none';
});
