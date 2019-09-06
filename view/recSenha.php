<?php

    require_once '../model/Usuario.php';
    require_once '../model/Senha.php';
    $usuario = new Usuario();
    $senha = new Senha();

    $paramExiste = false;
    /*Verificando se o parametro existe*/
    if (!empty($_GET['param'])){

        $param = $_GET['param'];

        foreach ($usuario->selectAll() as $key => $value){
            if (sha1($value->email) == $param){
                $paramExiste = true;
                $idUsr = $value->id;
            }
        }

        /*verificando se ele é válido*/
        if ($paramExiste){

            $user = $usuario->select($idUsr);

        }

    }

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
    <link rel="stylesheet" href="css/public/recSenha.css">
    <link rel="icon" href="img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB</title>
</head>

<body>

<header>


</header>

<main>

    <?php

        if ($paramExiste){ ?>

            <div class="container-fluid">

                <div class="row mt-5 justify-content-center">

                    <h1 class="mt-5 pt-5 text-center col-12">Bem-vindo <span class="span-nome"><?php $nome = explode(' ',$user->nome); echo $nome[0];?>!</span></h1>

                    <hr class="barra">

                    <div class="col-12 col-sm-10 mt-5 bg-light senha-div p-4 mb-4">
                        <form id="form-redefinir-senha" enctype="multipart/form-data" method="post" action="../controller/recuperarSenhaController.php">

                            <div class="form-row m-0 p-0 justify-content-center">

                                <input id="acao" type="hidden" name="acao" value="1"/>
                                <input id="usId" type="hidden" name="id" value="<?=$user->id?>"/>

                                <!--Nova senha-->
                                <div class="form-group col-11 col-sm-8 col-md-6 m-1">

                                    <label for="senha">Nova senha <i class="fas fa-key"></i></label>
                                    <input id="senha" type="password" class="input-group" name="senha" required>
                                    <p id="mostra"></p>

                                </div>

                                <!--Confirmar senha-->
                                <div class="form-group col-11 col-sm-8 col-md-6 m-1">

                                    <label for="senhaConfirma">Digite novamente <i class="fas fa-key"></i></label>
                                    <input id="senhaConfirma" type="password" class="input-group" name="senhaConfirma" required>
                                    <p id="msg-senhas-diferentes" class="text-danger d-none">As senhas digitadas não são iguais!</p>
                                    <p id="msg-senhas-iguais" class="text-success d-none">Ok!</p>
                                </div>

                                <div class="form-group text-center col-10 col-sm-8 col-md-6 mt-3">
                                    <button class="px-5 py-1 btn-redefinir-senha" type="submit">Salvar <i class="fas fa-save"></i></button>
                                </div>

                            </div>

                        </form>

                        <!--Spinner-->
                        <div id="spinner-redefinir" class="row justify-content-center">
                            <h4 class="text-uppercase text-center col-12 mb-2" style="color: #000;">Redefinindo senha</h4>
                            <div class="col-12 text-center my-2">
                                <i id="" class="fas fa-sync-alt fa-3x fa-spin fa-fw"> </i>
                            </div>
                        </div>

                        <!--Sucesso-->
                        <div id="sucesso-redefinir" class="row justify-content-center">
                            <h4 class="text-uppercase text-center text-success col-12">Senha redefinida com sucesso <i class="fas fa-check-circle"></i></h4>
                            <h5 class="text-center col-12">Tente fazer login novamente usando sua nova senha</h5>
                            <p class="text-center col-12"><a href="login.php" id="link-logar">Clique aqui para fazer login <i class="fas fa-sign-in-alt"></i></a></p>
                        </div>

                        <!--Fracasso-->
                        <div id="fracasso-redefinir" class="row justify-content-center">
                            <h4 class="text-uppercase text-center text-danger col-12">Ops... Algo deu errado <i class="fas fa-exclamation-circle"></i></h4>
                            <h5 class="text-center col-12">Tente novamente ou entre em contato conosco</h5>
                        </div>

                        <div class="suporte row justify-content-center">

                            <hr class="barra">
                            <h5 class="text-center col-12 text-uppercase">Suporte</h5>
                            <a href="tel:55999274664" class="col-12 col-lg-5 m-1 text-center text-lg-right"><i class="fas fa-phone"></i> (55) 9 9927-4664</a>
                            <a href="mailto:contato@oguiasb.com.br" class="col-12 m-1 col-lg-5 text-center text-lg-left"><i class="fas fa-envelope"></i> contato@oguiasb.com.br</a>

                        </div>


                    </div>

                </div>

            </div>

        <?php }else{ ?>

            <!--Acesso negado-->
            <div class="container-fluid">

                <div class="row">

                    <h1 class="text-danger font-weight-bold text-uppercase col-12 text-center mt-5 pt-5">Acesso negado!</h1>
                    <p class="col-12 text-center text-danger mt-2"><i class="fas fa-hand-paper fa-10x"></i></p>

                    <hr class="barra" />

                    <h4 class="col-12 text-center my-2">O link que você usou para acessar essa página é inválido.</h4>

                    <a href="home.php" class="col-12 text-center h5 mt-2">Voltar a página inicial</a>
                </div>

            </div>


        <?php }

    ?>

</main>


<footer>


</footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/others/jquery-3.4.1.js"></script>
<script src="js/others/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="js/others/jquery.mask.js"></script>
<script type="text/javascript" src="js/others/jquery.validate.js"></script>
<script type="text/javascript" src="js/public/recSenha.js"></script>
</body>
<!--Deixe os clientes e as oportunidades encontrarem você. Anuncie no guia online mais completo da cidade de São Borja!-->
</html>
