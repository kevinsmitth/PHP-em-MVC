// Troca o botao mostrar e esconder..
var qa = document.getElementsByClassName("card");
function show() {
    this.parentNode.getElementsByClassName("div-oculta")[0].style.display = (this.clicked ^= 1) ? "block" : "none";
}
for (var i = 0; i < qa.length; i++)
    qa[i].getElementsByClassName("troca_nome")[0].addEventListener("click", show, false);

