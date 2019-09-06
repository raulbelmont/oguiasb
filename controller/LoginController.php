<?php

    require_once '../model/Usuario.php';
    require_once '../model/Senha.php';
    require_once '../model/LoginModel.php';

    $usuario = new Usuario();
    $senha = new Senha();
    $loginModel = new LoginModel();


/*Verificando se email e senha estão preenchidos*/
if ((!empty($_POST['email'])) and (!empty($_POST['senha']))) {

    $email = $_POST['email'];

    /*criptografando senha*/
    $senha = sha1($_POST['senha']);

    /*Efetuando login*/
    if ($loginModel->login($email,$senha)){

        /*redirecionando usuario*/
        if ($usuario->selectEmail($email)){

            $user = $usuario->selectEmail($email);
            if ($user->nivel == 1){

                header('Location:../view/user/homeUser.php');

            }else{
                if ($user->nivel == 2){
                    header('Location:../view/adm/homeAdm.php');
                }else{

                    header('Location:../view/login.php?erro-login=true');


                }
            }

        }else{

            header('Location:../view/login.php?erro-login=true');

        }
    }else{

        header('Location:../view/login.php?erro-login=true');

    }
}else{

    header('Location:../view/login.php?erro-login=true');

}

?>
