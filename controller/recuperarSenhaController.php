<?php

    date_default_timezone_set('America/Sao_Paulo');

    require_once '../model/Usuario.php';
    require_once '../model/Senha.php';
    require_once '../PHPMailer/PHPMailer-master/src/SMTP.php';
    require_once '../PHPMailer/PHPMailer-master/src/PHPMailer.php';
    require_once '../PHPMailer/PHPMailer-master/src/Exception.php';

    $usuario = new Usuario();
    $senha = new Senha();

    if (empty($_POST['acao'])){
        if (!empty($_POST['email'])){

            /*Verificando se o e-mail existe no banco de dados*/
            if ($usuario->selectEmail($_POST['email'])){

                $userAtual = $usuario->selectEmail($_POST['email']);

                $linkParam = sha1($userAtual->email);
                $link = "http://localhost/oguiasb/view/recSenha.php?param=".$linkParam;

                /*ENVIANDO E-MAIL DE RECUPERAÇÂO DE SENHA*/
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
                $mailer->FromName = $userAtual->nome;
                $mailer->From = "raulbelomont@gmail.com";
                $mailer->addAddress($_POST['email']);
                $mailer->isHTML(true);
                $mailer->Subject = "Mensagem de recuperação de senha - Recebemos sua solicitação ". $userAtual->nome;


                $mailer->Body =
                    "<strong>O GUIA SB</strong>".
                    "<p>Olá ".$userAtual->nome."!</p>".
                    "<p>Recebemos a sua solicitação para recuperar sua senha.</p>".
                    "<h4 style='font-weight: bold;'>Clique no link para redefinir sua senha:</h4>".
                    "<a href='$link' style='margin: 5px'>Redefinir minha senha</a>".
                    "<p>Estamos a sua disposição, qualquer dúvida você pode entrar em contato conosco:</p>".
                    "<p>Pelo telefone: (55)99927-4664</p>".
                    "<p>Ou pelo E-mail: raulbelomont@gmail.com</p>".
                    "<p>Tenha um bom dia, atenciosamente <strong>O Guia SB.</strong></p>".
                    "<strong style='margin: 5px'><i>Está mensagem é gerada automaticamente, por favor não responda.</i></strong>";

                if ($mailer->send()){
                    echo "true";
                }else{
                    echo "false";
                }

            }else{
                echo 'false';
            }

        }else{
            echo 'false';
        }
    }else{
        /*Redefinindo a senha*/
        if (!empty($_POST) and $_POST['acao'] == 1){
            $idUser = $_POST['id'];
            $novaSenha = sha1($_POST['senha']);

            if ($senha->redefinirSenha($idUser, $novaSenha)){
                echo 'true';
            }else{
                echo 'false';
            }

        }else{
            echo 'false';
        }
    }





