<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:03
 */

require_once 'CRUD.php';
class Categoria extends CRUD
{
    private $id; //bigint
    private $descricao; //varchar
    private $icone; //varchar

    protected $table = 'categoria';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (descricao, icone) VALUES 
        (:descricao, :icone) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':icone', $this->icone, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET descricao = :descricao, icone = :icone WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':icone', $this->icone, PDO::PARAM_STR);
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
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * @param mixed $icone
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;
    }


}