/*efeitos nos cards dos planos*/
$('.btn-informacoes-abrir').on('click',function () {
    $(this).siblings('.card-itens').slideDown('400');
    $(this).addClass('d-none');
    $(this).siblings('.btn-informacoes-fechar').removeClass('d-none');
});

/*efeitos nos cards dos planos*/
$('.btn-informacoes-fechar').on('click',function () {
    $(this).siblings('.card-itens').slideUp('400');
    $(this).addClass('d-none');
    $(this).siblings('.btn-informacoes-abrir').removeClass('d-none');
});


$(window).resize(function(){

    if ($(window).width() >= 992) {

        $('.card-itens').slideDown(1)


    }

});