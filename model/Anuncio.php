<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:02
 */

require_once 'CRUD.php';
class Anuncio extends CRUD
{

    private $id; //bigint
    private $tipo; //varchar
    private $negocio_id; //bigint
    private $imagem_id; //imagem_id

    protected $table = 'anuncio';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (tipo, negocio_id, imagem_id) VALUES 
        (:tipo, :negocio_id, :imagem_id) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':imagem_id', $this->imagem_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET tipo = :tipo, imagem_id = :imagem_id WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_STR);
        $stmt->bindParam(':imagem_id', $this->imagem_id, PDO::PARAM_INT);
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getImagemId()
    {
        return $this->imagem_id;
    }

    /**
     * @param mixed $imagem_id
     */
    public function setImagemId($imagem_id)
    {
        $this->imagem_id = $imagem_id;
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