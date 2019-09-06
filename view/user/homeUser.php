<?php
require_once '../../model/Usuario.php';
$usuario = new Usuario();

/*Verificando logout*/
if (!empty($_GET['sair']) and $_GET['sair'] == true ){
    if (!session_id()) session_start();
    session_unset();
    session_destroy();
    header('Location:../login.php');
}else{

}

/*Verificando login e defiindo usuario*/
if (!session_id()) session_start();
if ($_SESSION['isLogado'] == true){

    $usuarioAtual = $usuario->select($_SESSION['user_id']);

}else{
    header('Location:../login.php');
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
    <link rel="stylesheet" href="../css/user/homeUser.css">
    <link rel="icon" href="../img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB - Gestão</title>
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg menu-user">

            <a class="navbar-brand d-flex align-items-center text-white" href="home.php">
                <span><i class="fas fa-map-marked-alt fa-2x mr-2"></i></span> <span class="h4 m-0">O Guia SB</span>
            </a>

            <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav m-0 ml-auto mr-5 ul-link">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Meus Negócios <i class="fas fa-store"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Meu Perfil <i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link btn-logout px-4" href="homeUser.php?sair=true">Sair <i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <main>

    </main>

    <footer>

    </footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/others/jquery-3.4.1.js"></script>
<script src="../js/others/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/others/jquery.mask.js"></script>
<script type="text/javascript" src="../js/others/jquery.validate.js"></script>
<script type="text/javascript" src="../js/public/menuInc.js"></script>
<script type="text/javascript" src="../js/user/homeUser.js"></script>
</body>
</html>
