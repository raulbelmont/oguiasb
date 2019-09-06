/*Contato*/
$('#form-recuperar-senha').on('submit',function (event) {
    event.preventDefault();
    var email = $('#emailRec').val();

    if (email != ''){

        $.ajax({
            url: '../controller/recuperarSenhaController.php',
            type: 'POST',
            data: {email:email,},
            beforeSend: function () {
                $('#form-recuperar-senha').slideUp('slow');
                $('.spin-recuperar-senha').slideDown('slow');
            },
            success: function (data) {
                if (data == 'true'){
                    $('.spin-recuperar-senha').slideUp('slow');
                    $('.sucesso-recuperar-senha').slideDown('slow');
                    setTimeout(function(){
                        $('.sucesso-recuperar-senha').slideUp('slow');
                        $('#recuperar-senha').modal('hide');
                        $('#form-recuperar-senha').slideDown('slow');
                        $("#form-recuperar-senha")[0].reset();
                    }, 6000);
                }else {
                    $('.spin-recuperar-senha').slideUp('slow');
                    $('.fracasso-recuperar-senha').slideDown('slow');
                    $('#form-recuperar-senha').slideDown('slow');
                    setTimeout(function(){
                        $('.fracasso-recuperar-senha').slideUp('slow');
                    }, 5000);
                }
            },
            error: function (jqXHR, status, error) {
            }
        });

    }

});
