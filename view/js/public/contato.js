/*Configurando exibição das mensagens*/
setTimeout(function(){
    $('#msg-sucesso').slideUp('slow');
}, 4000);
setTimeout(function(){
    $('#msg-erro').slideUp('slow');
}, 4000);

/*masks*/
$(document).ready(function(){

    $('#telefone-contato').mask('(99) 99999-9999');

});

$(function () {
    $('#form-contato').validate({

        rules: {

            nome:{
                required: true,
                minlength:3
            },

            email:{
                required: true,
                minlength: 6
            },

            telefone:{
                required: true,
                minlength: 14
            },

            assunto:{
                required:true,
            },

            mensagem:{
                required:true
            }

        },

        messages: {

            nome:{
                required:"Por favor informe o seu nome!",
                minlength:"Informe um nome válido"
            },

            email: {
                required:"Por favor informe o seu E-mail!",
                minlength:"Por favor informe um E-mail válido!"
            },

            telefone: {
                required:"Por favor informe um telefone para contato!",
                minlength:"Por favor informe um telefone válido"
            },
            assunto: {
                required:"Por favor informe o assunto!"
            },
            mensagem: {
                required:"Por favor escreva uma mensagem!"
            }
        }

    })
});