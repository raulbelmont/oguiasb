<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:06
 */

require_once 'CRUD.php';
class horarioFuncionamento extends CRUD
{
    private $id; //bigint
    private $dia; //varchar
    private $horarioAbertura; //varchar
    private $horarioFechamento; //varchar
    private $negocio_id; //bigint
    private $aberto24; //boolean
    private $naoAbre; //boolean

    protected $table = 'horariofuncionamento';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (dia, horarioAbertura, horarioFechamento,negocio_id, aberto24, naoAbre) VALUES 
        (:dia, :horarioAbertura, :horarioFechamento,:negocio_id, :aberto24, :naoAbre) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':dia', $this->dia, PDO::PARAM_STR);
        $stmt->bindParam(':horarioAbertura', $this->horarioAbertura, PDO::PARAM_STR);
        $stmt->bindParam(':horarioFechamento', $this->horarioFechamento, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':aberto24', $this->aberto24, PDO::PARAM_STR);
        $stmt->bindParam(':naoAbre', $this->naoAbre, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET dia = :dia, horarioAbertura = :horarioAbertura, horarioFechamento = :horarioFechamento,negocio_id = :negocio_id,
                aberto24 = :aberto24, naoAbre = :naoAbre WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':dia', $this->dia, PDO::PARAM_STR);
        $stmt->bindParam(':horarioAbertura', $this->horarioAbertura, PDO::PARAM_STR);
        $stmt->bindParam(':horarioFechamento', $this->horarioFechamento, PDO::PARAM_STR);
        $stmt->bindParam(':negocio_id', $this->negocio_id, PDO::PARAM_INT);
        $stmt->bindParam(':aberto24', $this->aberto24, PDO::PARAM_STR);
        $stmt->bindParam(':naoAbre', $this->naoAbre, PDO::PARAM_STR);
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
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * @param mixed $dia
     */
    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    /**
     * @return mixed
     */
    public function getHorarioAbertura()
    {
        return $this->horarioAbertura;
    }

    /**
     * @param mixed $horarioAbertura
     */
    public function setHorarioAbertura($horarioAbertura)
    {
        $this->horarioAbertura = $horarioAbertura;
    }

    /**
     * @return mixed
     */
    public function getHorarioFechamento()
    {
        return $this->horarioFechamento;
    }

    /**
     * @param mixed $horarioFechamento
     */
    public function setHorarioFechamento($horarioFechamento)
    {
        $this->horarioFechamento = $horarioFechamento;
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
    public function getAberto24()
    {
        return $this->aberto24;
    }

    /**
     * @param mixed $aberto24
     */
    public function setAberto24($aberto24)
    {
        $this->aberto24 = $aberto24;
    }

    /**
     * @return mixed
     */
    public function getNaoAbre()
    {
        return $this->naoAbre;
    }

    /**
     * @param mixed $naoAbre
     */
    public function setNaoAbre($naoAbre)
    {
        $this->naoAbre = $naoAbre;
    }



}