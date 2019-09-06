<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:06
 */

require_once 'CRUD.php';
class Imagem extends CRUD
{
    private $id; //bigint
    private $imagem; //varchar
    private $descricao; //varchar
    private $negocio_id; //bigint
    private $tipo; //int

    protected $table = 'imagem';


    public function insert()
    {
        $sql = "INSERT INTO $this->table (imagem, descricao, negocio_id,tipo) VALUES 
        (:imagem, :descricao, :negocio_id,:tipo) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET imagem = :imagem, descricao = :descricao, negocio_id = :negocio_id, tipo = :tipo WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_INT);
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
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
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



}