<?php
    require_once '../model/Categoria.php';
    require_once '../model/EmpresaServico.php';
    $categoria = new Categoria();
    $empresaServico = new EmpresaServico();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="css/public/home.css">
    <link rel="stylesheet" href="css/public/menuInc.css">
    <link rel="stylesheet" href="css/public/incRodape.css">
    <link rel="icon" href="img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB</title>
</head>

<body>

    <header>

       <?php
            include 'inc/menuInc.php';
       ?>

    </header>

    <main>

        <!--Abertura-->
        <div class="container-fluid m-0 p-0">

            <!--Abertura-->
            <div class="row abertura justify-content-center bg-dark m-0 p-0">

                <div class="abertura-conteudo col-12 justify-content-center d-flex align-items-center">

                    <div class="row w-100">
                        <div class="col-12">

                            <h3 class="text-center text-white text-uppercase h3-abertura">O guia de negócios da cidade de São Borja!</h3>
                            <h1 class="text-center text-white mt-3 text-uppercase font-weight-bold d-none d-md-block"><i class="fas fa-map-marked-alt mr-2"></i> O Guia SB</h1>
                            <h1 class="text-center text-white mt-3 text-uppercase font-weight-bold d-block d-md-none"><i class="fas fa-map-marked-alt mr-2"></i></h1>
                            <h1 class="text-center text-white text-uppercase font-weight-bold d-block d-md-none">O Guia SB</h1>
                            <h4 class="text-white text-center font-italic my-3">O que você procura?</h4>

                            <form id="form-busca" class="pt-3" enctype="multipart/form-data" action="busca.php" method="post">
                                <div class="form-row justify-content-center">

                                    <!--Busca genérica-->
                                    <div class="form-group col-12 col-sm-8 col-md-4">
                                        <label for="busca" class="text-white font-weight-bold text-uppercase">Busca <i class="fas fa-map-marker-alt"></i></label>
                                        <input type="text" class="form-control" id="busca" name="busca" placeholder="Ex: papelaria, restaurante, mercado">
                                    </div>

                                    <!--Categoria-->
                                    <div class="form-group col-12 col-sm-8 col-md-3">
                                        <label for="categoria" class="text-white font-weight-bold text-uppercase">Categoria <i class="fas fa-store"></i></label>
                                        <select class="form-control" id="categoria" name="empresaServico">
                                            <option value="todas" selected>Todas</option>
                                            <?php foreach ($empresaServico->selectByOrdemAlfabetica() as $key => $value): ?>
                                                <option value="<?=$value->id?>"><?=$value->descricao?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!--BTN BUSCAR-->
                                    <div class="form-group col-12 text-center mt-5">
                                        <button class="btn-buscar py-2" type="submit">Buscar <i class="fas fa-search"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!--Anúncio-->
            <div class="row justify-content-center m-0 p-0 anuncios">

                <!--Cabeçalho-->
                <h3 class="col-12 py-3 text-center mt-5 text-uppercase mb-3">Destaques <i class="fas fa-bullhorn"></i></h3>

                <!--Anterior-->
                <div id="prev" class="col-12 col-md-2 d-flex align-items-center text-center">
                    <a class="mx-auto py-2 px-3">
                        <i class="fas fa-chevron-left fa-3x"></i>
                    </a>
                </div>

                <!--Imagens-->
                <div class="col-11 col-md-8 m-0 p-0 my-3 my-md-0 carrosel-anuncio">

                    <!--IMG-->
                    <a href="#" class="">
                        <picture class="w-100">
                            <source media="(min-width: 768px)" srcset="img/ex-anuncio.jpg" class="w-100">
                            <source media="(max-width: 767px)" srcset="img/ex-anuncio-little.jpg" class="w-100">
                            <img class="img-fluid w-100" src="img/ex-anuncio.jpg"/>
                        </picture>
                    </a>

                    <!--IMG-->
                    <a href="#" class="">
                        <picture class="w-100">
                            <source media="(min-width: 768px)" srcset="img/ex-anuncio.jpg" class="w-100">
                            <source media="(max-width: 767px)" srcset="img/ex-anuncio-little.jpg" class="w-100">
                            <img class="img-fluid w-100" src="img/ex-anuncio.jpg"/>
                        </picture>
                    </a>

                    <!--IMG-->
                    <a href="#" class="">
                        <picture class="w-100">
                            <source media="(min-width: 768px)" srcset="img/ex-anuncio.jpg" class="w-100">
                            <source media="(max-width: 767px)" srcset="img/ex-anuncio-little.jpg" class="w-100">
                            <img class="img-fluid w-100" src="img/ex-anuncio.jpg"/>
                        </picture>
                    </a>

                    <!--IMG-->
                    <a href="#" class="">
                        <picture class="w-100">
                            <source media="(min-width: 768px)" srcset="img/ex-anuncio.jpg" class="w-100">
                            <source media="(max-width: 767px)" srcset="img/ex-anuncio-little.jpg" class="w-100">
                            <img class="img-fluid w-100" src="img/ex-anuncio.jpg"/>
                        </picture>
                    </a>

                </div>

                <!--Próximo-->
                <div id="next" class="col-12 col-md-2 d-flex align-items-center text-center">
                    <a class="mx-auto py-2 px-3">
                        <i class="fas fa-chevron-right fa-3x"></i>
                    </a>
                </div>

            </div>

            <!--Transição entre anunciantes-->
            <div class="row d-flex align-items-center justify-content-center m-0 my-5 pb-5 oferta">

                <h2 class="col-12 text-center text-white mt-3">Seja um anunciante <i class="fas fa-hands-helping"></i></h2>
                <div class="col-12 mb-4">
                    <hr class="barra" />
                </div>

                <div class="col-12 col-lg-7 m-0 p-0">
                    <p class="m-0 text-center text-lg-left">Deixe os clientes e as oportunidades encontrarem você.</p>
                    <p class="m-0 text-center text-lg-left font-italic">Anuncie no guia online mais completo da cidade de São Borja!</p>
                </div>

                <div class="col-8 col-sm-6 col-lg-4 col-xl-3 m-0 p-0 mt-3 mt-md-5 mt-lg-0 text-center">
                    <a href="#" data-toggle="modal" data-target="#anunciar" class="btn-oferta">Quero anunciar</a>
                </div>
            </div>

            <!--Apoiadores-->
            <div class="row justify-content-center m-0 p-0 mb-5 apoiadores">

                <!--Cabeçalho-->
                <h3 class="col-12 py-3 text-center text-uppercase">Parceiros <i class="fas fa-handshake"></i></h3>

                <!--Anterior-->
                <div id="prev-patrocinadores" class="col-12 col-md-2 d-flex align-items-center text-center">
                    <a class="mx-auto py-2 px-3">
                        <i class="fas fa-chevron-left fa-3x"></i>
                    </a>
                </div>

                <!--Imagens-->
                <div class="col-11 col-md-8 m-0 p-0 my-3 my-md-0 carrosel-de-apoiadores">

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/ex-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/exx-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/ex-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/exx-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/ex-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/exx-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/ex-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/exx-parceiro.jpg"/>
                    </a>
                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/ex-parceiro.jpg"/>
                    </a>

                    <!--IMG-->
                    <a href="#" class="m-1">
                        <img class="img-fluid img-parceiros" src="img/exx-parceiro.jpg"/>
                    </a>

                </div>

                <!--Próximo-->
                <div id="next-patrocinadores" class="col-12 col-md-2 d-flex align-items-center text-center">
                    <a class="mx-auto py-2 px-3">
                        <i class="fas fa-chevron-right fa-3x"></i>
                    </a>
                </div>

            </div>

        </div>

    </main>

    <footer>

        <?php
            include 'inc/incRodape.php';
        ?>

    </footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/others/jquery-3.4.0.js"></script>
<script src="js/others/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="js/others/jquery.mask.js"></script>
<script type="text/javascript" src="js/others/jquery.validate.js"></script>
<script type="text/javascript" src="js/public/menuInc.js"></script>
<script type="text/javascript" src="js/public/home.js"></script>
</body>
<!--Deixe os clientes e as oportunidades encontrarem você. Anuncie no guia online mais completo da cidade de São Borja!-->
</html>
