<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:04
 */

require_once 'CRUD.php';
class Email extends CRUD
{
    private $id; //bigint
    private $email; //varchar
    private $descricao; //varchar
    private $negocio_id; //bigint

    protected $table = 'email';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (email, descricao, cliente_id) VALUES 
        (:email, :descricao, :cliente_id) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':cliente_id', $this->negocio_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET email = :email, descricao = :descricao, cliente_id = :cliente_id WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':cliente_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getNegocioId()
    {
        return $this->negocio_id;
    }

    /**
     * @param mixed $negocio_id
     */
    public function setNegocioId($negocio_id)
    {
        $this->negocio_id = $negocio_id;
    }



}