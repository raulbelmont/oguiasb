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
    <link rel="stylesheet" href="css/public/login.css">
    <link rel="stylesheet" href="css/public/menuInc.css">
    <link rel="stylesheet" href="css/public/incRodape.css">
    <link rel="icon" href="img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB - Entrar</title>
</head>

<body>

<header>

    <?php
    include 'inc/menuInc.php';
    ?>

</header>

<main class="bg-light py-5">

    <div class="container-fluid">

        <div class="row justify-content-center d-flex align-items-center">

            <div id="card-login" class="col-11 col-sm-9 col-lg-6 col-xl-5 py-5">

                <div class="text-center">

                    <div class="text-center logo">

                        <p class="m-0">
                            <i class="fas fa-map-marked-alt fa-3x m-0"></i>
                        </p>

                        <p class="h2 m-0">O Guia SB</p>

                        <hr class="barra-logo" />

                    </div>

                </div>

                <h4 class="text-center font-weight-bold mt-4">Entrar</h4>

                <?php if (!empty($_GET['erro-login']) and $_GET['erro-login'] == "true"){ ?>

                <div class="msg-erro-login">
                    <h5 class="text-center mt-4"><i class="fas fa-exclamation-circle h5-erro"></i></h5>
                    <h5 class="text-center h5-erro mb-3">E-mail ou senha incorretos, tente novamente</h5>
                </div>
                <?php } ?>

                <form id="form-login" method="post" action="../controller/LoginController.php" enctype="multipart/form-data">

                    <div class="form-row justify-content-center">

                        <!--E-mail-->
                        <div class="form-group col-12 col-sm-10">

                            <label for="email">E-mail <i class="fas fa-envelope"></i> <span class="text-danger">*</span></label>

                            <input id="email" type="text" class="input-login" name="email" required>

                        </div>

                        <!--Senha-->
                        <div class="form-group col-12 col-sm-10">

                            <label for="senha">Senha <i class="fas fa-key"></i> <span class="text-danger">*</span></label>

                            <input id="senha" type="password" class="input-login" name="senha" required>

                        </div>

                        <button type="submit" class="col-10 col-sm-6 btn-logar mt-2 py-2">Entrar</button>

                        <div class="col-12 text-center mt-4">

                            <a id="link-recuperar-senha" data-toggle="modal" data-target="#recuperar-senha" class="">Esqueci a senha</a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Modal recuperar senha -->
    <div class="modal fade" id="recuperar-senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="titulo-modal-rec-senha">Recuperar senha</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <a><i class="fas fa-times"></i></a>
                    </button>
                </div>
                <div class="modal-body">

                    <h3 id="alerta-erro-email" class="text-center p-1 mb-4">CPF ou E-mail incorretos <i class="fas fa-exclamation-circle"></i></h3>

                    <form id="form-recuperar-senha" enctype="multipart/form-data" action="../controller/recuperarSenhaController.php" method="post">

                        <div class="form-row justify-content-center">

                            <!--email-->
                            <div class="form-group col-12">
                                <label for="emailRec">Digite o E-mail cadastrado <i class="fas fa-envelope"></i> <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="emailRec" name="email" required>
                            </div>

                            <div class="form-group col-10 col-sm-6 mt-3">
                                <button type="submit" class="btn-recuperar-senha btn-block py-2">Recuperar <i class="fas fa-key"></i></button>
                            </div>

                        </div>

                    </form>

                    <!--Carregamento-->
                    <div class="container-fluid p-5 spin-recuperar-senha">
                        <div class="row my-5 justify-content-center">
                            <h4 class="text-uppercase text-center col-12 my-2">Validando E-mail</h4>

                            <div class="col-12 text-center my-2">
                                <i id="" class="fas fa-sync-alt fa-2x fa-spin fa-fw"> </i>
                            </div>
                        </div>
                    </div>

                    <!--Sucesso-->
                    <div class="container-fluid p-5 sucesso-recuperar-senha">
                        <div class="row my-5 justify-content-center">
                            <h4 class="text-center col-12 my-2 verfica-email">Verifique seu e-mail</h4>
                            <h5 class="text-uppercase text-center col-12 my-2">Enviamos um link de recuperação de senha pro seu E-mail</h5>
                            <i class="fas fa-envelope text-center fa-3x"></i>
                        </div>
                    </div>

                    <!--Fracasso-->
                    <div class="container-fluid p-5 fracasso-recuperar-senha">
                        <div class="row my-5 justify-content-center">
                            <h4 class="text-center col-12 my-2 verfica-email">O E-mail informado não está cadastrado</h4>
                            <h5 class="text-uppercase text-center col-12 my-2">Confira se o e-mail que você digitou está correto</h5>
                            <i class="fas fa-exclamation-triangle text-center fa-3x"></i>
                        </div>
                    </div>


                </div>
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
<script type="text/javascript" src="js/others/jquery.mask.js"></script>
<script type="text/javascript" src="js/others/jquery.validate.js"></script>
<script type="text/javascript" src="js/public/menuInc.js"></script>
<script type="text/javascript" src="js/public/login.js"></script>
</body>
</html>
