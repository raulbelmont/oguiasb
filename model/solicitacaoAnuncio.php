<?php

require_once 'CRUD.php';
class solicitacaoAnuncio extends CRUD
{

    private $id; //bigint
    private $dataSolicitacao; //datetime
    private $nome; //varchar
    private $nomeEmpresa; //varchar
    private $telefone; //varchar

    protected $table = 'solicitacaoanuncio';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (dataSolicitacao, nome, nomeEmpresa, telefone) VALUES
        (:dataSolicitacao, :nome, :nomeEmpresa, :telefone)";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':dataSolicitacao', $this->dataSolicitacao);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':nomeEmpresa', $this->nomeEmpresa, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        return $stmt->execute();

    }

    public function update()
    {

        $sql = "UPDATE $this->table SET dataSolicitacao = :dataSolicitacao, nome = :nome, nomeEmpresa = :nomeEmpresa, telefone = :telefone WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':dataSolicitacao', $this->nome);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':nomeEmpresa', $this->nomeEmpresa, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
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
    public function getDataSolicitacao()
    {
        return $this->dataSolicitacao;
    }

    /**
     * @param mixed $dataSolicitacao
     */
    public function setDataSolicitacao($dataSolicitacao)
    {
        $this->dataSolicitacao = $dataSolicitacao;
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

    /**
     * @return mixed
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @param mixed $nomeEmpresa
     */
    public function setNomeEmpresa($nomeEmpresa)
    {
        $this->nomeEmpresa = $nomeEmpresa;
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




}