<?php

require_once '../model/Negocio.php';
require_once '../model/Usuario.php';
require_once '../model/negocioEsCat.php';
require_once '../model/Imagem.php';
require_once '../model/HorarioFuncionamento.php';
require_once '../model/Telefone.php';
require_once '../model/Email.php';

date_default_timezone_set('America/Sao_Paulo');

function limpaCPF_CNPJ($valor){
    $valor = trim($valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("/", "", $valor);
    return $valor;
}

function tratar_arquivo_upload($string){
    // pegando a extensao do arquivo
    $partes 	= explode(".", $string);
    $extensao 	= $partes[count($partes)-1];
    // somente o nome do arquivo
    $nome	= preg_replace('/\.[^.]*$/', '', $string);
    // removendo simbolos, acentos etc
    $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
    $nome = strtr($nome, utf8_decode($a), $b);
    $nome = str_replace(".","-",$nome);
    $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'-',$nome);
    return utf8_decode(strtolower($nome.".".$extensao));
}

/*Inserir negócio*/
if (!empty($_POST) and $_POST['acao'] == 1){

    print_r($_POST);

    /*ordem de cadastro das tabelas:
        - negocio
             cnpj, nome, descricao, dataCadastro, rua, bairro, numero, complemento,endereco, mapa,
             linkFacebook, linkInstagram, linkTwitter, linkYoutube, linkGooglePlus, linkPinterest, linkLinkedin,
             site, usuario_id, categoria_idcategoria, nivelBusca

        - horarioFuncionamento
        - telefone
        - email
    */

    /*Inserindo negocio*/
    $novoNegocio = new Negocio();
    $novoNegocio->setCnpj(limpaCPF_CNPJ($_POST['cnpj']));
    $novoNegocio->setNome($_POST['nome']);
    $novoNegocio->setDescricao($_POST['descricao']);
    $novoNegocio->setDataCadastro(date('Y-m-d H:i'));
    $novoNegocio->setRua($_POST['rua']);
    $novoNegocio->setBairro($_POST['bairro']);
    $novoNegocio->setNumero($_POST['numero']);
    $novoNegocio->setComplemento($_POST['complemento']);
    $novoNegocio->setEndereco("Rua ".$_POST['rua']." ". $_POST['numero']." - ".$_POST['bairro']);
    $novoNegocio->setMapa('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.721082903941!2d-56.01811698547946!3d-28.6381203824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9455c619b0c1864f%3A0xa4385ec2f89ea74b!2sR.+Campos+Os%C3%B3rio%2C+635+-+V%C3%A1rzea%2C+S%C3%A3o+Borja+-+RS%2C+97670-000!5e0!3m2!1spt-BR!2sbr!4v1561839544965!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');
    $novoNegocio->setLinkFacebook(isset($_POST['linkFacebook'])     ? $_POST['linkFacebook']     : null);
    $novoNegocio->setLinkInstagram(isset($_POST['linkInstagram'])     ? $_POST['linkInstagram']     : null);
    $novoNegocio->setLinkTwitter(isset($_POST['linkTwitter'])     ? $_POST['linkTwitter']     : null);
    $novoNegocio->setLinkYoutube(isset($_POST['linkYoutube'])     ? $_POST['linkYoutube']     : null);
    $novoNegocio->setLinkGooglePlus(isset($_POST['linklinkGP'])     ? $_POST['linkGP']     : null);
    $novoNegocio->setLinkPinterest(isset($_POST['linkPinterest'])     ? $_POST['linkPinterest']     : null);
    $novoNegocio->setLinkLinkedin(isset($_POST['linkLinkedin'])     ? $_POST['linkLinkedin']     : null);
    $novoNegocio->setSite(isset($_POST['site'])     ? $_POST['site']     : null);
    $novoNegocio->setUsuarioId($_POST['usuario']);
    $novoNegocio->setCategoriaIdcategoria($_POST['categoria']);
    $novoNegocio->setNivelBusca(1);

        /*Inserindo*/
        if ($novoNegocio->insert()){
                $novoNegocio = $novoNegocio->selectByNome($_POST['nome']);

                /*- negocioESCat
                    negocio_id, empresaServico_id */

            /*Verificando ramos selecionados*/
            /*primeiro ramo*/
            if ($_POST['ramo1'] != 'null'){

                $negocioESCAT = new negocioEsCat();
                $negocioESCAT->setNegocioId($novoNegocio->id);
                $negocioESCAT->setEmpresaServicoId($_POST['ramo1']);
                if ($negocioESCAT->insert()){

                    /*Segundo ramo*/
                    if ($_POST['ramo2'] != 'null'){
                        $negocioESCAT = new negocioEsCat();
                        $negocioESCAT->setNegocioId($novoNegocio->id);
                        $negocioESCAT->setEmpresaServicoId($_POST['ramo2']);
                        if ($negocioESCAT->insert()){

                            if ($_POST['ramo3'] != 'null'){

                                $negocioESCAT = new negocioEsCat();
                                $negocioESCAT->setNegocioId($novoNegocio->id);
                                $negocioESCAT->setEmpresaServicoId($_POST['ramo3']);
                                if ($negocioESCAT->insert()){

                                    /*NESSE PONTO O NEGÒCIO FOI ADICIONADO E SEUS RAMOS TMB*/
                                    /*IMAGENS*/
                                    /*imagem - imagem, descricao,negocio_id, tipo
                                        tipo1 = logo
                                        tipo2 = foto
                                        tipo3 = anuncio
                                    */

                                    /*LOGO*/
                                    if (isset($_FILES['logo'])){

                                        $file = $_FILES['logo'];
                                        $filename = tratar_arquivo_upload(utf8_decode($file['name']));
                                        $uploaddir = '../view/img/logo/';
                                        $uploadfile = $uploaddir . basename($filename);
                                        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
                                            $imagem = new Imagem();
                                            $imagem->setImagem($filename);
                                            $imagem->setDescricao('Logo');
                                            $imagem->setNegocioId($novoNegocio->id);
                                            $imagem->setTipo(1);
                                            $imagem->insert();
                                        }

                                    }

                                    /*foto1*/
                                    if (isset($_FILES['foto1'])){

                                        $file = $_FILES['foto1'];
                                        $filename = tratar_arquivo_upload(utf8_decode($file['name']));
                                        $uploaddir = '../view/img/foto/';
                                        $uploadfile = $uploaddir . basename($filename);
                                        if (move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadfile)) {
                                            $imagem = new Imagem();
                                            $imagem->setImagem($filename);
                                            $imagem->setDescricao('Foto');
                                            $imagem->setNegocioId($novoNegocio->id);
                                            $imagem->setTipo(2);
                                            $imagem->insert();
                                        }

                                    }

                                    /*foto2*/
                                    if (isset($_FILES['foto2'])){

                                        $file = $_FILES['foto2'];
                                        $filename = tratar_arquivo_upload(utf8_decode($file['name']));
                                        $uploaddir = '../view/img/foto/';
                                        $uploadfile = $uploaddir . basename($filename);
                                        if (move_uploaded_file($_FILES['foto2']['tmp_name'], $uploadfile)) {
                                            $imagem = new Imagem();
                                            $imagem->setImagem($filename);
                                            $imagem->setDescricao('Foto');
                                            $imagem->setNegocioId($novoNegocio->id);
                                            $imagem->setTipo(2);
                                            $imagem->insert();
                                        }

                                    }

                                    /*foto3*/
                                    if (isset($_FILES['foto3'])){

                                        $file = $_FILES['foto3'];
                                        $filename = tratar_arquivo_upload(utf8_decode($file['name']));
                                        $uploaddir = '../view/img/foto/';
                                        $uploadfile = $uploaddir . basename($filename);
                                        if (move_uploaded_file($_FILES['foto3']['tmp_name'], $uploadfile)) {
                                            $imagem = new Imagem();
                                            $imagem->setImagem($filename);
                                            $imagem->setDescricao('Foto');
                                            $imagem->setNegocioId($novoNegocio->id);
                                            $imagem->setTipo(2);
                                            $imagem->insert();
                                        }

                                    }

                                    /*foto4*/
                                    if (isset($_FILES['foto4'])){

                                        $file = $_FILES['foto4'];
                                        $filename = tratar_arquivo_upload(utf8_decode($file['name']));
                                        $uploaddir = '../view/img/foto/';
                                        $uploadfile = $uploaddir . basename($filename);
                                        if (move_uploaded_file($_FILES['foto4']['tmp_name'], $uploadfile)) {
                                            $imagem = new Imagem();
                                            $imagem->setImagem($filename);
                                            $imagem->setDescricao('Foto');
                                            $imagem->setNegocioId($novoNegocio->id);
                                            $imagem->setTipo(2);
                                            $imagem->insert();
                                        }

                                    }

                                    /*foto5*/
                                    if (isset($_FILES['foto5'])){

                                        $file = $_FILES['foto5'];
                                        $filename = tratar_arquivo_upload(utf8_decode($file['name']));
                                        $uploaddir = '../view/img/foto/';
                                        $uploadfile = $uploaddir . basename($filename);
                                        if (move_uploaded_file($_FILES['foto5']['tmp_name'], $uploadfile)) {
                                            $imagem = new Imagem();
                                            $imagem->setImagem($filename);
                                            $imagem->setDescricao('Foto');
                                            $imagem->setNegocioId($novoNegocio->id);
                                            $imagem->setTipo(2);
                                            $imagem->insert();
                                        }

                                    }

                                    /*HORÀRIO DE FUNCIONAMENTO*/
                                    /*- horarioFuncionamento
                                            - dia
                                            - horarioAbertura
                                            - horarioFechamento
                                            - negocio_id
                                            - aberto24
                                            - naoAbre */

                                    /*Pro caso de ser 24h*/
                                    if (isset($_POST['aberto24'])){

                                        $horarioFuncionamento = new horarioFuncionamento();

                                        /*Segunda*/
                                        $horarioFuncionamento->setDia('Segunda');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                        /*Terça*/
                                        $horarioFuncionamento->setDia('Terça');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                        /*Quarta*/
                                        $horarioFuncionamento->setDia('Quarta');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                        /*Quinta*/
                                        $horarioFuncionamento->setDia('Quinta');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                        /*Sexta*/
                                        $horarioFuncionamento->setDia('Sexta');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                        /*Sábado*/
                                        $horarioFuncionamento->setDia('Sábado');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                        /*Domingo*/
                                        $horarioFuncionamento->setDia('Domingo');
                                        $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                        $horarioFuncionamento->setAberto24(true);
                                        $horarioFuncionamento->insert();

                                    }
                                    else{

                                        /*Segunda*/
                                        if (isset($_POST['naoAbreSegunda'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Segunda');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Segunda');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaSegunda']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoSegunda']);
                                            $horarioFuncionamento->insert();
                                        }

                                        /*Terça*/
                                        if (isset($_POST['naoAbreTerca'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Terça');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Terça');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaTerca']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoTerca']);
                                            $horarioFuncionamento->insert();
                                        }

                                        /*Quarta*/
                                        if (isset($_POST['naoAbreQuarta'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Quarta');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Quarta');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaQuarta']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoQuarta']);
                                            $horarioFuncionamento->insert();
                                        }

                                        /*Quinta*/
                                        if (isset($_POST['naoAbreQuinta'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Quinta');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Quinta');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaQuinta']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoQuinta']);
                                            $horarioFuncionamento->insert();
                                        }

                                        /*Sexta*/
                                        if (isset($_POST['naoAbreSexta'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Sexta');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Sexta');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaSexta']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoSexta']);
                                            $horarioFuncionamento->insert();
                                        }

                                        /*Sabado*/
                                        if (isset($_POST['naoAbreSabado'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Sábado');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Sábado');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaSabado']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoSabado']);
                                            $horarioFuncionamento->insert();
                                        }

                                        /*Domingo*/
                                        if (isset($_POST['naoAbreDomingo'])){

                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Domingo');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setNaoAbre(true);
                                            $horarioFuncionamento->insert();

                                        }
                                        else{
                                            $horarioFuncionamento = new horarioFuncionamento();
                                            $horarioFuncionamento->setDia('Domingo');
                                            $horarioFuncionamento->setNegocioId($novoNegocio->id);
                                            $horarioFuncionamento->setHorarioAbertura($_POST['aberturaDomingo']);
                                            $horarioFuncionamento->setHorarioFechamento($_POST['fechamentoDomingo']);
                                            $horarioFuncionamento->insert();
                                        }





                                    }


                                    /*TELEFONES*/


                                }else{

                                }


                            }else{

                            }

                        }else{

                        }
                    }else{

                    }

                }else{

                }

            }



        }else{



        }



}