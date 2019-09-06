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
    <link rel="stylesheet" href="css/public/categorias.css">
    <link rel="stylesheet" href="css/public/menuInc.css">
    <link rel="stylesheet" href="css/public/incRodape.css">
    <link rel="icon" href="img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-red.png" type="image/x-icon" />

    <title>O Guia SB - Categorias</title>
</head>

<body>

<header>

    <?php
    include 'inc/menuInc.php';
    ?>

</header>

<main>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 titulo py-5">
                <h1 class="text-center text-white">Categorias</h1>
            </div>

        </div>

        <?php foreach ($categoria->selectAll() as $key => $value): ?>

            <div class="row justify-content-center">
                <div class="col-12">
                    <hr class="barra my-5">
                </div>

                <h5 class="col-12 text-center titulo-categoria mb-3"><a href="busca.php?categoria=<?=$value->id?>"><?=$value->icone?> <?=$value->descricao?></a></h5>


                <?php
                $qtd = count($empresaServico->selectByCategoria($value->id));
                $qtd_coluna = floor($qtd/3);
                ?>
                <div class="col-12 card-itens">

                    <div class="row justify-content-center">

                        <?php foreach ($empresaServico->selectByCategoria($value->id) as $key => $valueEmpresaServico): ?>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 m-0 mx-lg-3">
                            <a href="busca.php?empresaServico=<?=$valueEmpresaServico->id?>" class="mx-auto empresa-servico"><?=$valueEmpresaServico->icone?> <?=$valueEmpresaServico->descricao?></a>
                        </div>

                        <?php endforeach; ?>

                    </div>

                </div>

                <p class="text-center mt-4 btn-informacoes d-lg-none btn-informacoes-abrir text-danger col-12">Abrir <i class="fas fa-angle-down"></i></p>

                <p class="text-center mt-4 btn-informacoes btn-informacoes-fechar text-danger d-none d-lg-none col-12">Menos <i class="fas fa-angle-up"></i></p>


            </div>

        <?php endforeach; ?>

    </div>

</main>

<footer class="mt-5">

    <?php
    include 'inc/incRodape.php';
    ?>

</footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/others/jquery-3.4.1.js"></script>
<script src="js/others/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="js/others/jquery.mask.js"></script>
<script type="text/javascript" src="js/others/jquery.validate.js"></script>
<script type="text/javascript" src="js/public/menuInc.js"></script>
<script type="text/javascript" src="js/public/categorias.js"></script>
</body>
</html>
