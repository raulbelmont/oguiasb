<?php
require_once '../../model/Usuario.php';
require_once '../../model/EmpresaServico.php';
require_once '../../model/Categoria.php';
$usuario = new Usuario();
$empresaServico = new EmpresaServico();
$categoria = new Categoria();

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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../../bootstrap-timepicker/css/bootstrap-timepicker.css"/>
    <link rel="icon" href="../img/logo-red.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo-red.png" type="image/x-icon" />
    <style>
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
        #target {
            width: 345px;
        }

    </style>
    <title>O Guia SB - Módulo de Gestão</title>
</head>

<body>
<header>


</header>

<main>


    <div class="container-fluid">

        <div class="row justify-content-center py-2 my-3 border-top border-bottom">
            <a class="col-12 text-center" href="?sair=true">Sair</a>
        </div>

        <div class="row justify-content-center">

            <form id="form-negocio" enctype="multipart/form-data" method="post" action="../../controller/NegocioController.php">

                <div class="form-row justify-content-center m-0">

                    <input type="hidden" id="acao" value="1" name="acao">

                    <h3 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Sobre o negócio</h3>

                    <!--Sobre o negócio-->

                    <!--Nome-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="input-group" required>
                    </div>

                    <!--CNPJ-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" class="input-group" required>
                    </div>

                    <!--Descrição-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="5" class="input-group"></textarea>
                    </div>

                    <!--Ramo 1-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="ramo1">Selecione o ramo principal de atuação</label>
                        <select id="ramo1" name="ramo1" class="input-group" required>

                            <option value="null" selected>Selecionar...</option>
                            <?php foreach ($empresaServico->selectByOrdemAlfabetica() as $key => $value): ?>
                            <option value="<?=$value->id?>"><?=$value->descricao?> (Cat Nº<?=$value->categoria_idcategoria?>)</option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!--Ramo 2-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="ramo2">Selecione o ramo secundário de atuação</label>
                        <select id="ramo2" name="ramo2" class="input-group" required>

                            <option value="null" selected>Selecionar...</option>

                            <?php foreach ($empresaServico->selectByOrdemAlfabetica() as $key => $value): ?>
                                <option value="<?=$value->id?>"><?=$value->descricao?> -- <small>Categoria Nº<?=$value->categoria_idcategoria?></small></option>
                            <?php endforeach; ?>

                        </select>
                    </div>


                    <!--Ramo 3-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="ramo3">Selecione o ramo terceário de atuação</label>
                        <select id="ramo3" name="ramo3" class="input-group" required>

                            <option value="null" selected>Selecionar...</option>
                            <?php foreach ($empresaServico->selectByOrdemAlfabetica() as $key => $value): ?>
                                <option value="<?=$value->id?>"><?=$value->descricao?> -- <small>Categoria Nº<?=$value->categoria_idcategoria?></small></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!--Categoria-->
                    <div class="form-group col-11 col-sm-10 col-lg-8 border-bottom mb-3 pb-3">
                        <label for="categoria">Selecione a categoria em que esses ramos estão inseridos</label>
                        <select id="categoria" class="input-group" name="categoria" required>

                            <?php foreach ($categoria->selectAll() as $key => $value): ?>
                                <option value="<?=$value->id?>"><?=$value->descricao?> (Nº <?=$value->id?>)</option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!--Localização-->
                    <h3 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Localização</h3>

                    <!--Rua-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="rua">Rua</label>
                        <input type="text" id="rua" name="rua" class="input-group" required>
                    </div>

                    <!--Número-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="numero">Número</label>
                        <input type="text" id="numero" name="numero" class="input-group" required>
                    </div>

                    <!--Bairro-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="bairro">Bairro</label>
                        <input type="text" id="bairro" name="bairro" class="input-group" required>
                    </div>

                    <!--Complemento-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="complemento">Complemento</label>
                        <input type="text" id="complemento" name="complemento" class="input-group">
                    </div>

                    <!--Endereço Google-->

                    <h3 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Dados para contato</h3>

                    <!--E-mail-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="email">E-mail</label>
                        <input id="email" type="text" class="input-group" name="email" required>
                    </div>

                    <!--Telefone-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="text" class="input-group" name="telefone" required>
                    </div>

                    <!--Celular/Whatsapp-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="celular">Celular / Whatsapp</label>
                        <input id="celular" type="text" class="input-group" name="celular" required>
                    </div>

                    <!--site-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="site">Site</label>
                        <input id="site" type="text" class="input-group" name="site" required>
                    </div>

                    <!--mapa-->
                    <div class="form-group col-11 col-sm-10 col-lg-8 my-5">
                        <label for="mapa">Selecione seu endereço no maps</label>
                        <input id="mapa" type="text">
                    </div>

                    <!--horario de funcionamento-->

                    <h5 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Horário de funcionamento</h5>

                    <!--Aberto 24H-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <input type="checkbox" id="aberto24" name="aberto24">
                        <label for="aberto24">Aberto 24h</label>
                    </div>

                    <!--Espaço-->
                    <div class="form-group col-12"></div>

                    <!--Segunda-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <p class="font-weight-bold">Segunda-feira</p>

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreSegunda">Não abre</label>

                        <input type="text" class="input-group my-2 time-picker" id="aberturaSegunda" name="aberturaSegunda" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoSegunda" name="fechamentoSegunda" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <!--Terça-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <p class="font-weight-bold">Terça-feira</p>

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreTerca">Não abre</label>

                        <input type="text" class="input-group my-2 time-picker" id="aberturaTerca" name="aberturaTerca" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoTerca" name="fechamentoTerca" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <!--Quarta-feira-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <p class="font-weight-bold">Quarta-feira</p>

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreQuarta">Não abre</label>

                        <input type="text" class="input-group my-2 time-picker" id="aberturaQuarta" name="aberturaQuarta" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoQuarta" name="fechamentoQuarta" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <!--Quinta-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreSexta">Não abre</label>

                        <p class="font-weight-bold">Quinta-feira</p>
                        <input type="text" class="input-group my-2 time-picker" id="aberturaQuinta" name="aberturaQuinta" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoQuinta" name="fechamentoQuinta" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <!--Sexta-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <p class="font-weight-bold">Sexta-feira</p>

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreSabado">Não abre</label>

                        <input type="text" class="input-group my-2 time-picker" id="aberturaSexta" name="aberturaSexta" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoSexta" name="fechamentoSexta" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <!--Sábado-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <p class="font-weight-bold">Sábado</p>

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreSabado">Não abre</label>

                        <input type="text" class="input-group my-2 time-picker" id="aberturaSabado" name="aberturaSabado" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoSabado" name="fechamentoSabado" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <!--Domingo-->
                    <div class="form-group col-11 col-sm-10 col-lg-8 border-bottom mb-3 pb-3">
                        <p class="font-weight-bold">Domingo</p>

                        <input type="checkbox" id="naoAbreSegunda" name="naoAbreSegunda">
                        <label for="naoAbreDomingo">Não abre</label>

                        <input type="text" class="input-group my-2 time-picker" id="aberturaDomingo" name="aberturaDomingo" placeholder="Horário de abertura">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

                        <input type="text" class="input-group my-2 time-picker" id="fechamentoDomingo" name="fechamentoDomingo" placeholder="Horário de fechamento">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>

                    <h3 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Redes Sociais</h3>

                    <!--Facebook-->
                    <div class="form-group col-11 col-sm-10 col-lg-5">
                        <label for="linkFacebook">Link do facebook</label>
                        <input type="text" id="linkFacebook" class="input-group" name="linkFacebook">
                    </div>

                    <!--Twitter-->
                    <div class="form-group col-11 col-sm-10 col-lg-5">
                        <label for="linkTwitter">Link do Twitter</label>
                        <input type="text" id="linkTwitter" class="input-group" name="linkTwitter">
                    </div>

                    <!--Google Plus-->
                    <div class="form-group col-11 col-sm-10 col-lg-5">
                        <label for="linkGP">Link do Google Plus</label>
                        <input type="text" id="linkGP" class="input-group" name="linkGP">
                    </div>

                    <!--Linkedin-->
                    <div class="form-group col-11 col-sm-10 col-lg-5">
                        <label for="linkLinkedin">Link do Linkedin</label>
                        <input type="text" id="linkLinkedin" class="input-group" name="linkLinkedin">
                    </div>

                    <!--Instagram-->
                    <div class="form-group col-11 col-sm-10 col-lg-5">
                        <label for="linkInstagram">Link do Instagram</label>
                        <input type="text" id="linkInstagram" class="input-group" name="linkInstagram">
                    </div>

                    <!--Youtube-->
                    <div class="form-group col-11 col-sm-10 col-lg-5">
                        <label for="linkYoutube">Link do Youtube</label>
                        <input type="text" id="linkYoutube" class="input-group" name="linkYoutube">
                    </div>

                    <!--Pinterest-->
                    <div class="form-group col-11 col-sm-10 col-lg-5 border-bottom mb-3 pb-3">
                        <label for="linkPinterest">Link do Pinterest</label>
                        <input type="text" id="linkPinterest" class="input-group" name="linkPinterest">
                    </div>

                    <!--Informações adicionais-->

                    <h3 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Informações adicionais</h3>

                    <!--Logo-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="logo">Selecionar logo</label>
                        <input type="file" accept="image/*"s class="input-group" name="logo" id="logo">
                    </div>

                    <h5 class="col-11 col-sm-10 col-lg-8 font-weight-bold">Fotos (Até 5)</h5>

                    <!--Foto 1-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="foto1">Foto 1</label>
                        <input type="file" accept="image/*" class="input-group" name="foto1" id="foto1"/>
                    </div>

                    <!--Foto 2-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="foto2">Foto 2</label>
                        <input type="file" accept="image/*" class="input-group" name="foto2" id="foto2"/>
                    </div>

                    <!--Foto 3-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="foto3">Foto 3</label>
                        <input type="file" accept="image/*" class="input-group" name="foto3" id="foto3"/>
                    </div>

                    <!--Foto 4-->
                    <div class="form-group col-11 col-sm-10 col-lg-8">
                        <label for="foto1">Foto 4</label>
                        <input type="file" accept="image/*" class="input-group" name="foto4" id="foto4"/>
                    </div>

                    <!--Foto 5-->
                    <div class="form-group col-11 col-sm-10 col-lg-8 border-bottom mb-3 pb-3">
                        <label for="foto1">Foto 5</label>
                        <input type="file" accept="image/*" class="input-group" name="foto5" id="foto5"/>
                    </div>

                    <!-- Usuario responsavel -->
                    <div class="form-group col-11 col-sm-10 col-lg-8 border-bottom mb-3 pb-3">
                        
                        <label for="usuario">Usuário responsável</label>
                        <select id="usuario" name="usuario" class="input-group"  required>
                            <?php
                              foreach ($usuario->selectAll() as $key => $value):
                            ?>
                                <option value="<?=$value->id?>"><?=$value->nome?> </option>
                            <?php
                                endforeach;
                            ?>
                        </select>

                    </div>




                    <div class="form-group col-10 my-3 text-center">
                        <button type="submit" class="px-3 btn-group-lg btn-outline-success">Salvar</button>
                    </div>


                </div>

            </form>

        </div>

    </div>


</main>

<footer>

</footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/others/jquery-3.4.0.js"></script>
<script src="../js/others/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/others/jquery.mask.js"></script>
<script type="text/javascript" src="../js/others/jquery.validate.js"></script>
<script type="text/javascript" src="../../bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCETTStvn-0-ZfGi_-uTOshPl45LCBi8to&libraries=places&callback=initAutocomplete"
        async defer></script>

<script>

    $('.time-picker').timepicker({
        minuteStep: 1,
        appendWidgetTo: 'body',
        showSeconds: true,
        showMeridian:false,
        defaultTime: false
    });

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

</script>

</body>
<!--Deixe os clientes e as oportunidades encontrarem você. Anuncie no guia online mais completo da cidade de São Borja!-->
</html>

