<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:08
 */

require_once 'CRUD.php';
class Telefone extends CRUD
{
    private $id; //bigint
    private $numero; //numero
    private $negocio_id; //negocio_id

    protected $table = 'telefone';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (numero, negocio_id) VALUES 
        (:numero, :negocio_id) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET numero = :numero, negocio_id = :negocio_id WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
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