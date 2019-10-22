
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