/* Exibe e esconde os paineis da pagina admin*/

const control = document.getElementById('controle');
const painel = document.getElementById('paineladmin');
function clickControle() {
  control.style.display = 'block';
  painel.style.display = 'none';
}
function clickPainel() {
  control.style.display = 'none';
  painel.style.display = 'block';
}
