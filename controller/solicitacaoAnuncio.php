<?php

date_default_timezone_set('America/Sao_Paulo');
require_once '../model/solicitacaoAnuncio.php';
$slcAnuncio = new solicitacaoAnuncio();

    if (!empty($_POST)){

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $nomeEmpresa = $_POST['nomeEmpresa'];

        $slcAnuncio->setNome($nome);
        $slcAnuncio->setTelefone($telefone);
        $slcAnuncio->setNomeEmpresa($nomeEmpresa);
        $slcAnuncio->setDataSolicitacao(date('Y-m-d H:i:s'));

            if ($slcAnuncio->insert()){
                echo 'true';
            }else{
                echo 'false';
            }

    }else{
        echo 'false';
    }

?>
