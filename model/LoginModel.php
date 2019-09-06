<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 28/01/2019
 * Time: 20:46
 */
require_once '../model/Usuario.php';
class LoginModel extends CRUD
{

    private $email;
    private $senha;

    protected $paramSenha;
    protected $tableUs = '';
    protected $tableSenha = 'senha';

    public function login($email,$senha)
    {
        $this->setEmail($email);
        $this->setSenha($senha);

        if ($this->Emailexists($email)){
            $userAtual = $this->Emailexists($email);
            if ($this->VerificarSenha($userAtual->id,$this->paramSenha, $senha)){
                session_start();
                $_SESSION['isLogado'] = true;
                $_SESSION['user_id'] = $userAtual->id;
                $_SESSION['user_type'] = $this->tableUs;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function Emailexists($email){
        $usuario = new Usuario();
        if ($usuario->selectEmail($email)){

            $user = $usuario->selectEmail($email);
            $this->tableUs = $user->nivel;

            $this->paramSenha = 'usuario_id';
            return $usuario->selectEmail($email);
        }else{
            return false;
        }
    }

    protected function VerificarSenha($id, $param, $senha){
        $sql = "SELECT * FROM $this->tableSenha WHERE $param = :id AND senha = :senha";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':id', $id ,PDO::PARAM_INT);
        $stmt->bindParam(':senha', $senha ,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }



}