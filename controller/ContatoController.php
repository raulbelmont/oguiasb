<?php


require_once '../model/Contato.php';
require_once '../PHPMailer/PHPMailer-master/src/SMTP.php';
require_once '../PHPMailer/PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer/PHPMailer-master/src/Exception.php';
$contato = new Contato();

date_default_timezone_set('America/Sao_Paulo');

function limpaCPF_CNPJ($valor){
    $valor = trim($valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("/", "", $valor);
    return $valor;
}

if (empty($_POST['acao'])){
    header('Location:../cores.php');
}

if (!empty($_POST['acao']) and $_POST['acao'] == 1){

    $contato->setNome($_POST['nome']);
    $contato->setEmail($_POST['email']);
    $contato->setTelefone($_POST['telefone']);
    $contato->setAssunto($_POST['assunto']);
    $contato->setMensagem($_POST['mensagem']);
    $contato->setDataContato(date('Y-m-d H:i:s'));

    if ($contato->insert()){

        /*REDIRECIONANDO DADOS PARA A INPACTUS*/
        $senha = "gremio91756972";
        $mailer = new \PHPMailer\PHPMailer\PHPMailer();
        $mailer->isSMTP();
        $mailer->CharSet = "utf8";
        $mailer->SMTPDebug = false;
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'tls';
        $mailer->Host="smtp.gmail.com";
        $mailer->Port = 587;
        $mailer->Username = "raulbelomont@gmail.com";
        $mailer->Password = $senha;
        $mailer->FromName = $contato->getNome();
        $mailer->From = "raulbelomont@gmail.com";
        $mailer->addAddress("raulbelomont@gmail.com", 'Inpactus');
        $mailer->isHTML(true);



        $dataContatacao = date('d/m/Y H:m');
        $mailer->Subject = "E-mail de Contato - ". $contato->getNome()."  ". $dataContatacao;


        $mailer->Body =
            "E-mail enviado por: ".$contato->getNome()."<br/>".
            "Telefone para contato: ".$contato->getTelefone()."<br/>".
            "E-mail para contato: ".$contato->getEmail()."<br/>".
            "Assunto: ".$contato->getAssunto()."<br/>".
            "<strong>Mensagem:</strong><br/>".
            "<p style='margin: 5px;'>". $contato->getMensagem(). "</p>";


        /*Enviando e-mail para a inpactus*/
        if ($mailer->send()){
            /*ENVIANDO E-MAIL DE CONFIRMAÇÃO AO CLIENTE*/
            $senha = "gremio91756972";
            $mailer = new \PHPMailer\PHPMailer\PHPMailer();
            $mailer->isSMTP();
            $mailer->CharSet = "utf8";
            $mailer->SMTPDebug = false;
            $mailer->SMTPAuth = true;
            $mailer->SMTPSecure = 'tls';
            $mailer->Host="smtp.gmail.com";
            $mailer->Port = 587;
            $mailer->Username = "raulbelomont@gmail.com";
            $mailer->Password = $senha;
            $mailer->FromName = "O Guia SB";
            $mailer->From = "raulbelomont@gmail.com";
            $mailer->addAddress($contato->getEmail());
            $mailer->isHTML(true);
            $mailer->Subject = "Agradecimento - Recebemos sua mensagem ". $contato->getNome();


            $mailer->Body =
                "<strong>O Guia SB</strong>".
                "<p>Olá ".$contato->getNome()."!</p>".
                "<p>Recebemos a sua mensagem, muito obrigado por entrar em contato, a sua opnião e a sua mensagem contam muito para nós e ajudam muito no nosso desenvolvimento!</p>".
                "<p>Estamos a sua disposição, qualquer dúvida você pode entrar em contato conosco!</p>".
                "<p>Pelo telefone: (55)9 9927-4664</p>".
                "<p>Ou pelo E-mail: raulbelomont@gmail.com</p>".
                "<p>Tenha um bom dia, atenciosamente <strong>O Guia SB</strong></p>".
                "<strong style='margin: 5px'><i>Está mensagem é gerada automaticamente, por favor não responda.</i></strong>";

            /*Mandando e-mail para o cliente*/
            if ($mailer->send()){

                header('location:../view/contato.php?send=true');

            }else{

                header('location:../view/contato.php?send=beng');
            }

        }else{

            header('location:../view/contato.php?send=bung');

        }


    }else{

        header('location:../view/contato.php?send=bong');

    }


}

if (!empty($_POST['acao']) and $_POST['acao'] == 2){

}


