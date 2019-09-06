<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:08
 */

require_once 'CRUD.php';
class Usuario extends CRUD
{
    private $id; //bigint
    private $nome; //varchar
    private $email; //varchar
    private $telefone; //varchar
    private $nivel; //int

    protected $table = 'usuario';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (email, telefone, nivel, nome) VALUES 
        (:cpf, :email, :telefone, :nivel, :nome) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET nome = :nome, email = :email, telefone = :telefone, nivel = :nivel WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /*buscar por Email*/
    public function selectEmail($email){
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':email', $email , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }





}