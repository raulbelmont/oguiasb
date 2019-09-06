<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:05
 */

require_once 'CRUD.php';
class EmpresaServico extends CRUD
{
    private $id; //bigint
    private $icone; //icone
    private $descricao; //varchar
    private $categoria_idcategoria; //bigint

    protected $table = 'empresaservico';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (icone, descricao, categoria_idcategoria) VALUES 
        (:icone, :descricao, :categoria_idcategoria) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':icone', $this->icone, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_idcategoria', $this->categoria_idcategoria, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET icone = :icone, descricao = :descricao, categoria_idcategoria = :categoria_idcategoria WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':icone', $this->icone, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_idcategoria', $this->categoria_idcategoria, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function selectByCategoria($id){
        $sql = "SELECT * FROM $this->table WHERE categoria_idcategoria = :categoria_idcategoria";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':categoria_idcategoria',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectByOrdemAlfabetica(){
        $sql = "SELECT * FROM $this->table order by descricao asc";
        $stmt = Conecta::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
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
    public function getCategoriaIdcategoria()
    {
        return $this->categoria_idcategoria;
    }

    /**
     * @param mixed $categoria_idcategoria
     */
    public function setCategoriaIdcategoria($categoria_idcategoria)
    {
        $this->categoria_idcategoria = $categoria_idcategoria;
    }



}