/*Confirmação de senha*/
var idemSenhas = false;
$('#senhaConfirma').on('keyup', function () {
    var $val1 = $(this).val();
    var $val2 = $('#senha').val();


    if ($val1 == $val2) {
        $('#msg-senhas-iguais').removeClass('d-none');
        $('#msg-senhas-diferentes').addClass('d-none');
        idemSenhas = true;


    } else {
        $('#msg-senhas-iguais').addClass('d-none');
        $('#msg-senhas-diferentes').removeClass('d-none');
        idemSenhas = false;
    }

});


/*Medindo força da senha*/
$('#senha').on('keyup', function () {
    senha = $("#senha").val();
    forca = 0;
    mostra = $("#mostra");
    if ((senha.length >= 4) && (senha.length <= 7)) {
        forca += 10;
    } else if (senha.length > 7) {
        forca += 25;
    }
    if (senha.match(/[a-z]+/)) {
        forca += 10;
    }
    if (senha.match(/[A-Z]+/)) {
        forca += 20;
    }
    if (senha.match(/d+/)) {
        forca += 20;
    }
    if (senha.match(/W+/)) {
        forca += 25;
    }

    if (forca < 30) {
        mostra.html('<tr><td bgcolor="red" width="' + forca + '"></td><td>Fraca </td></tr>');
    } else if ((forca >= 30) && (forca < 60)) {
        mostra.html('<tr><td bgcolor="yellow" width="' + forca + '"></td><td>Justa </td></tr>');
    } else if ((forca >= 60) && (forca < 85)) {
        mostra.html('<tr><td bgcolor="blue" width="' + forca + '"></td><td>Forte </td></tr>');
    } else {
        mostra.html('<tr><td bgcolor="green" width="' + forca + '"></td><td>Excelente </td></tr>');
    }

});

$(function () {
    $('#form-redefinir-senha').validate({

        rules: {

            senha:{
                required: true,
                minlength:6
            },

            senhaConfirma:{
                required: true,
                minlength: 6
            },

        },

        messages: {

            senha:{
                required:"Campo Obrigatório!",
                minlength:"A senha deve ter no mínimo 6 caracteres"
            },

            senhaConfirma: {
                required:"Campo Obrigatório!",
                minlength:"A senha deve ter no mínimo 6 caracteres"
            },
        }

    })
});

/*Salvando senha*/
$('#form-redefinir-senha').on('submit', function (event) {
    event.preventDefault();
    var id = $('#usId').val();
    var senha = $('#senha').val();
    var acao = $('#acao').val();

    if (senha != '') {
        if (idemSenhas == true) {

            $.ajax({
                url: '../controller/recuperarSenhaController.php',
                type: 'POST',
                data: {senha: senha, id: id, acao: acao},
                beforeSend: function () {
                    $('#form-redefinir-senha').slideUp('slow');
                    $('#spinner-redefinir').slideDown('slow');
                },
                success: function (data) {
                    alert(data)
                    if (data == 'true') {
                        $('#spinner-redefinir').slideUp('slow');
                        $('#sucesso-redefinir').slideDown('slow');
                        $("#form-redefinir-senha")[0].reset();

                    } else {
                        $('#spinner-redefinir').slideUp('slow');
                        $('#fracasso-redefinir').slideDown(650);
                        $('#form-redefinir-senha').slideDown('slow');
                        setTimeout(function () {
                            $('#fracasso-redefinir').slideUp('slow');
                        }, 5000);
                    }
                },
                error: function (jqXHR, status, error) {
                }
            });
        }
    }

});

