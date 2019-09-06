/*masks*/
$(document).ready(function(){
    $('#telefone').mask('(99) 99999-9999');
});

$(function () {
    $('#form-anunciar-modal').validate({

        rules: {

            nome:{
                required: true,
                minlength:3
            },

            telefone:{
                required: true,
                minlength: 14
            },

        },

        messages: {

            nome:{
                required:"Por favor informe o seu nome!",
                minlength:"Informe um nome válido"
            },

            telefone: {
                required:"Por favor informe um telefone para contato!",
                minlength:"Por favor informe um telefone válido"
            },
        }

    })
});

/*Contato*/
$('#form-anunciar-modal').on('submit',function (event) {
    event.preventDefault();
    var nome = $('#nome').val();
    var telefone = $('#telefone').val();
    var nomeEmpresa = $('#nomeEmpresa').val();

    if (nome != ''){
        if (telefone != ''){

                $.ajax({
                    url: '../controller/solicitacaoAnuncio.php',
                    type: 'POST',
                    data: {nome:nome, telefone:telefone, nomeEmpresa:nomeEmpresa},
                    beforeSend: function () {
                        $('.btn-salvar-modal').slideUp('slow');
                        $('#form-anunciar-modal').slideUp('slow');
                        $('#spinner-modal').slideDown('slow');
                    },
                    success: function (data) {
                        if (data == 'true'){
                            $('#spinner-modal').slideUp('slow');
                            $('#msg-sucesso-modal').slideDown('slow');
                            setTimeout(function(){
                                $('#msg-sucesso-modal').slideUp('slow');
                                $('.btn-salvar-modal').slideDown('slow');
                                $('#form-anunciar-modal').slideDown('slow');
                                $("#form-anunciar-modal")[0].reset();
                            }, 5000);
                        }else {
                            $('#spinner').slideUp('slow');
                            $('#msg-erro-modal').slideDown(650);
                            setTimeout(function(){
                                $('#msg-erro-modal').slideUp('slow');
                                $('.btn-salvar-modal').slideDown('slow');
                                $('#form-anunciar-modal').slideDown('slow');
                                $("#form-anunciar-modal")[0].reset();
                            }, 5000);
                        }
                    },
                    error: function (jqXHR, status, error) {
                    }
                });
        }
    }

});
