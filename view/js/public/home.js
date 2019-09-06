$('.carrosel-anuncio').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    variableWidth: false,
    prevArrow: $('#prev'),
    nextArrow: $('#next'),
});
$('.carrosel-de-apoiadores').slick({
    infinite: true,
    rows:2,
    slidesToShow: 3,
    slidesToScroll: 2,
    variableWidth: true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $('#prev-patrocinadores'),
    nextArrow: $('#next-patrocinadores'),
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
                infinite: true,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});