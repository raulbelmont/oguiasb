<?php

require_once 'CRUD.php';
class negocioEsCat extends CRUD
{
    private $id; //bigint
    private $negocio_id; //bigint
    private $empresaServico_id; //bigint

    protected $table = 'negocioescat';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (negocio_id, empresaServico_id) VALUES 
        (:negocio_id, :empresaServico_id) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':empresaServico_id', $this->empresaServico_id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function update()
    {
        $sql = "UPDATE $this->table SET negocio_id = :negocio_id , empresaServico_id = :empresaServico_id WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':empresaServico_id', $this->empresaServico_id, PDO::PARAM_INT);
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
    public function getEmpresaServicoId()
    {
        return $this->empresaServico_id;
    }

    /**
     * @param mixed $empresaServico_id
     */
    public function setEmpresaServicoId($empresaServico_id)
    {
        $this->empresaServico_id = $empresaServico_id;
    }




}