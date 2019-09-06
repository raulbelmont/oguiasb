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
    <link rel="stylesheet" href="css/public/busca.css">
    <link rel="stylesheet" href="css/public/menuInc.css">
    <link rel="icon" href="img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB - Resultados</title>
</head>

<body>

<header>

    <?php
    include 'inc/menuInc.php';
    ?>

</header>

<main>

    <?php

    /*Recebendo parametro da pagina home*/
        if (!empty($_POST)){
            if ($_POST['busca'] == ''){
                $parametro = $_POST['empresaServico'];
            }else{
                $parametro = $_POST['busca'];
            }

        }else{
            /*Recebendo parametro da página de categorias*/
            if (!empty($_GET)){

                if (!empty($_GET['categoria'])){
                    $parametro = $_GET['categoria'];
                }else{
                    if (!empty($_GET['empresaServico'])){
                        $parametro = $_GET['empresaServico'];
                    }
                }

            }
        }

        /*POST*/
        /*buscageral*/
        /*empresaServico*/

        /*GET*/
        /*categoria*/
        /*empresaServico*/
    ?>

</main>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/others/jquery-3.4.1.js"></script>
<script src="js/others/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="js/others/jquery.mask.js"></script>
<script type="text/javascript" src="js/others/jquery.validate.js"></script>
<script type="text/javascript" src="js/public/menuInc.js"></script>
<script type="text/javascript" src="js/public/busca.js"></script>
</body>
</html>