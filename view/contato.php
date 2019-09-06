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
    <link rel="stylesheet" href="css/public/contato.css">
    <link rel="stylesheet" href="css/public/menuInc.css">
    <link rel="stylesheet" href="css/public/incRodape.css">
    <link rel="icon" href="img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB - Fale Conosco</title>
</head>

<body>

<header>

    <?php
    include 'inc/menuInc.php';
    ?>

</header>

<main>

    <div class="container-fluid">

        <!--Info para contatos-->
        <div class="row justify-content-center">

            <div class="col-12 text-center titulo py-5">

                <h1 class="text-white">Fale Conosco <i class="fas fa-phone"></i></h1>

            </div>

            <?php if (!empty($_GET['send']) and $_GET['send'] == "true"){ ?>
            <!--Mensagem de sucesso-->
            <div id="msg-sucesso" class="col-10 col-7 py-3 my-4">

                <h4 class="text-center text-success">Mensagem enviada com sucesso <i class="fas fa-check"></i></h4>

                <hr class="barra-msg" />

                <p class="text-center">
                    Recebemos a sua mensagem, muito obrigado por entrar em contato, a sua opnião e a sua mensagem contam muito para nós e ajudam muito no nosso desenvolvimento!
                </p>

            </div>
            <?php  } ?>

            <?php if (!empty($_GET['send']) and $_GET['send'] == "false"){ ?>
            <!--Mensagem de erro-->
            <div id="msg-erro" class="col-10 col-7 py-3 my-4">

                <h4 class="text-center text-danger">Falha ao enviar mensagem <i class="fas fa-exclamation-circle"></i></h4>

                <hr class="barra-msg-erro" />

                <p class="text-center">
                    Desculpe mas algo deu errado ao enviar sua mensagem. Lamentamos o ocorrido, por favor tente novamente.
                </p>

            </div>
            <?php } ?>

            <!--Infos para contato-->
            <div id="info-contato" class="col-12 col-sm-10 col-lg-8 py-5 text-center">

                <a id="logo" href="home.php">
                    <p class="m-0">
                        <i class="fas fa-map-marked-alt fa-3x m-0"></i>
                    </p>

                    <p class="h2 m-0">O Guia SB</p>

                    <hr class="barra" />

                </a>

                <div class="row text-center text-white info-contato">
                    <a href="tel:55999274664" class="d-block text-center text-md-right col-12 col-md-6"><i class="fas fa-phone"></i> (55) 9 9927-4664</a>

                    <a href="mailto:contato#oguiasb.com.br" class="d-block text-center text-md-left col-12 col-md-6"><i class="fas fa-envelope"></i> contato@oguiasb.com.br</a>
                </div>

            </div>

        </div>

        <!--Formulário para contat-->
        <div class="row justify-content-center">

            <h3 class="col-8 my-5 text-center titulo-formulario">Entre em contato ou deixe sua mensagem</h3>

            <form id="form-contato" enctype="multipart/form-data" method="post" action="../controller/ContatoController.php">

                <div class="form-row justify-content-center m-0 p-0">

                    <input type="hidden" name="acao" value="1">

                    <!--Nome-->
                    <div class="form-group col-12 col-md-8">
                        <label for="nome">Nome <i class="fas fa-user"></i> <span class="text-danger">*</span></label>
                        <input id="nome" type="text" class="input py-2" name="nome">
                    </div>

                    <!--E-mail-->
                    <div class="form-group col-12 col-md-8 mt-4">
                        <label for="email">E-mail <i class="fas fa-envelope"></i> <span class="text-danger">*</span></label>
                        <input id="email" type="text" class="input py-2" name="email">
                    </div>

                    <!--Telefone-->
                    <div class="form-group col-12 col-md-8 mt-4">
                        <label for="telefone-contato">Telefone <i class="fas fa-phone"></i> <span class="text-danger">*</span></label>
                        <input id="telefone-contato" type="text" class="input py-2" name="telefone">
                    </div>

                    <!--Assunto-->
                    <div class="form-group col-12 col-md-8 mt-4">
                        <label for="assunto">Assunto <i class="fas fa-comment"></i> <span class="text-danger">*</span></label>
                        <input id="assunto" type="text" class="input py-2" name="assunto">
                    </div>

                    <!--Mensagem-->
                    <div class="form-group col-12 col-md-8 mt-4">
                        <label for="mensagem">Mensagem <i class="fas fa-comment-alt"></i> <span class="text-danger">*</span></label>
                        <textarea id="mensagem" name="mensagem" class="text-area" rows="5"></textarea>
                    </div>

                    <!--BTN submit-->
                    <div id="btn-submit-contato" class="form-group col-12 mt-4 text-center">
                        <button type="submit" class="btn-submit-contato py-2 text-uppercase">Enviar mensagem</button>
                    </div>


                </div>

            </form>


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
<script type="text/javascript" src="js/others/jquery.mask.js"></script>
<script type="text/javascript" src="js/others/jquery.validate.js"></script>
<script type="text/javascript" src="js/public/menuInc.js"></script>
<script type="text/javascript" src="js/public/contato.js"></script>
</body>
<!--Deixe os clientes e as oportunidades encontrarem você. Anuncie no guia online mais completo da cidade de São Borja!-->
</html>
