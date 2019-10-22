//validação do formulario
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

//scrip ajax do CEP que aparece na hora
$(document).ready(function () {
    $("#CEP").on("change", function () {
        if (this.value) {
            $.ajax({
                url: 'http://api.postmon.com.br/v1/cep/' + this.value,
                dateType: "json",
                crossDomain: true,
                statusCode: {
                    200: function (data) {
                        $("#CEP").removeClass("is-invalid");
                        $("#CEP").addClass("is-valid");


                        $("#logradouro").val(data.logradouro);
                        $("#Bairro").val(data.bairro);
                        $("#Cidade").val(data.cidade);
                        $("#Estado").val(data.estado);
                        //console.log(data);
                    },
                    400: function (msg) {
                        console.log(msg); //Request errar
                    },
                    404: function (msg) {
                        $("#CEP").removeClass("is-valid");
                        $("#CEP").addClass("is-invalid");
                        console.log(msg); // CEP invalido
                    }
                }
            })
        }
    })
});

// mascaras dos inputs
$("#Celular").mask("(99) 99999-9999");
$("#Telefone").mask("(99) 9999-9999");
$("#CEP").mask("99999-999");