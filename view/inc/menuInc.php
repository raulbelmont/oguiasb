<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/public/menuInc.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>

<header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 m-0 p-0">
                <nav id="menu-principal" class="navbar navbar-expand-lg navbar-light fixed-top">

                    <a class="navbar-brand text-white d-flex align-items-center" href="home.php">
                        <span><i class="fas fa-map-marked-alt fa-2x mr-2"></i></span> <span class="h4 m-0">O Guia SB</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="text-white"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-0 ml-auto mr-0">

                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>

                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="categorias.php">Categorias</a>
                            </li>

                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="contato.php">Fale Conosco</a>
                            </li>

                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="login.php"><i class="far fa-user"></i> Entrar</a>
                            </li>

                            <li class="nav-item ml-auto btn-anunciar">
                                <a class="nav-link" data-toggle="modal" data-target="#anunciar">Anunciar meu negócio</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div>
        <!-- Modal -->
        <div class="modal fade" id="anunciar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-weight-bold" id="titulo-modal">Divulgue seu negócio</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <a><i class="fas fa-times"></i></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-anunciar-modal" enctype="multipart/form-data" method="post" action="../controller/solicitacaoAnuncio.php">

                            <h5 class="modal-title d-block text-center font-weight-bold">Deixe aqui suas informações e então entraremos em contato com você</h5>
                            <hr class="barra mb-4" />

                            <div class="form-row justify-content-center">

                                <!--nome-->
                                <div class="form-group col-12 col-sm-10">
                                    <label for="nome">Qual o seu nome?</label>
                                    <input id="nome" type="text" name="nome" class="input"/>
                                </div>

                                <!--nomeEmpresa-->
                                <div class="form-group col-12 col-sm-10">
                                    <label for="nomeEmpresa">Qual o nome da sua empresa?</label>
                                    <input id="nomeEmpresa" type="text" name="nomeEmpresa" class="input"/>
                                </div>

                                <!--telefone-->
                                <div class="form-group col-12 col-sm-10">
                                    <label for="telefone">Qual o número do seu telefone?</label>
                                    <input id="telefone" type="text" name="telefone" class="input" placeholder="(ddd) xxxxx-xxxx"/>
                                </div>

                                <div class="form-group col-12">
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="btn-salvar-modal py-2">Enviar</button>
                                    </div>
                                </div>

                            </div>

                        </form>

                        <!--Spinner-->
                        <div id="spinner-modal" class="row justify-content-center">
                            <h4 class="text-uppercase text-center col-12 mb-2" style="color: #000;">Enviando mensagem</h4>
                            <div class="col-12 text-center my-2">
                                <i id="" class="fas fa-sync-alt fa-3x fa-spin fa-fw"> </i>
                            </div>
                        </div>

                        <!--Sucesso-->
                        <div id="msg-sucesso-modal" class="row my-5 justify-content-center text-center">
                            <p class="text-success"><i class="fas fa-check-circle fa-2x"></i></p>
                            <h4 class="text-uppercase text-success text-center col-12 my-2">Muito obrigado por entrar em contato, em breve entraremos em contato com você!</h4>
                        </div>

                        <!--Sucesso-->
                        <div id="msg-erro-modal" class="row my-5 justify-content-center text-center">
                            <p class="text-danger"><i class="fas fa-exclamation-circle fa-2x"></i></p>
                            <h4 class="text-uppercase text-danger text-center col-12 my-2">Houve um erro ao enviar. Por favor tente novamente mais tarde.</h4>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

</header>
</body>
</html>
