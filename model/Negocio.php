<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 15/04/19
 * Time: 19:07
 */
require_once 'CRUD.php';
class Negocio extends CRUD
{
    private $id; //bigint
    private $cnpj; //varchar
    private $nome; //varchar
    private $descricao; //text
    private $dataCadastro; //date
    private $rua; //varchar
    private $bairro; //varchar
    private $numero; //varchar
    private $complemento; //varchar
    private $endereco; //varchar
    private $mapa; //varchar
    private $linkFacebook; //varchar
    private $linkInstagram; //varchar
    private $linkTwitter; //varchar
    private $linkYoutube; //varchar
    private $linkGooglePlus; //varchar
    private $linkPinterest; //varchar
    private $linkLinkedin; //varchar
    private $site; //varchar
    private $categoria_idcategoria; //bigint
    private $usuario_id; //bigint
    private $nivelBusca; //int

    protected $table = 'negocio';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (cnpj, nome, descricao, dataCadastro, rua, bairro, numero, complemento, endereco, mapa, linkFacebook, linkInstagram, linkTwitter, linkYoutube, linkGooglePlus,
        linkPinterest, linkLinkedin, site, categoria_idcategoria, usuario_id , nivelBusca) VALUES (:cnpj, :nome, :descricao, :dataCadastro, :rua, :bairro, :numero, :complemento, :endereco, :mapa, :linkFacebook,
         :linkInstagram, :linkTwitter, :linkYoutube, :linkGooglePlus, :linkPinterest, :linkLinkedin, :site, :categoria_idcategoria, :usuario_id , :nivelBusca) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':cnpj', $this->cnpj, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':dataCadastro', $this->dataCadastro);
        $stmt->bindParam(':rua', $this->rua, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $this->bairro, PDO::PARAM_STR);
        $stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
        $stmt->bindParam(':complemento', $this->complemento, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(':mapa', $this->mapa, PDO::PARAM_STR);
        $stmt->bindParam(':linkFacebook', $this->linkFacebook, PDO::PARAM_STR);
        $stmt->bindParam(':linkInstagram', $this->linkInstagram, PDO::PARAM_STR);
        $stmt->bindParam(':linkTwitter', $this->linkTwitter, PDO::PARAM_STR);
        $stmt->bindParam(':linkYoutube', $this->linkYoutube, PDO::PARAM_STR);
        $stmt->bindParam(':linkGooglePlus', $this->linkGooglePlus, PDO::PARAM_STR);
        $stmt->bindParam(':linkPinterest', $this->linkPinterest, PDO::PARAM_STR);
        $stmt->bindParam(':linkLinkedin', $this->linkLinkedin, PDO::PARAM_STR);
        $stmt->bindParam(':site', $this->site, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_idcategoria', $this->categoria_idcategoria, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':nivelBusca', $this->nivelBusca, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET cnpj = :cnpj, nome = :nome, descricao = :descricao, dataCadastro = :dataCadastro, rua = :rua, bairro = :bairro, numero = :numero, 
        complemento = :complemento, endereco = :endereco, mapa = :mapa, linkFacebook = :linkFacebook, linkInstagram = :linkInstagram, linkTwitter = :linkTwitter, 
        linkYoutube = :linkYoutube, linkGooglePlus = :linkGooglePlus, linkPinterest = :linkPinterest, linkLinkedin = :linkLinkedin, site = :site, nivelBusca = :nivelBusca 
        categoria_idcategoria = :categoria_idcategoria, usuario_id = :usuario_id , nivelBusca = :nivelBusca WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':cnpj', $this->cnpj, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':dataCadastro', $this->dataCadastro);
        $stmt->bindParam(':rua', $this->rua, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $this->bairro, PDO::PARAM_STR);
        $stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
        $stmt->bindParam(':complemento', $this->complemento, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(':mapa', $this->mapa, PDO::PARAM_STR);
        $stmt->bindParam(':linkFacebook', $this->linkFacebook, PDO::PARAM_STR);
        $stmt->bindParam(':linkInstagram', $this->linkInstagram, PDO::PARAM_STR);
        $stmt->bindParam(':linkTwitter', $this->linkTwitter, PDO::PARAM_STR);
        $stmt->bindParam(':linkYoutube', $this->linkYoutube, PDO::PARAM_STR);
        $stmt->bindParam(':linkGooglePlus', $this->linkGooglePlus, PDO::PARAM_STR);
        $stmt->bindParam(':linkPinterest', $this->linkPinterest, PDO::PARAM_STR);
        $stmt->bindParam(':linkLinkedin', $this->linkLinkedin, PDO::PARAM_STR);
        $stmt->bindParam(':site', $this->site, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_idcategoria', $this->categoria_idcategoria, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':nivelBusca', $this->nivelBusca, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /*Select by nome*/
    public function selectByNome($nome){
        $sql = "SELECT * FROM $this->table WHERE nome = :nome";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
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
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
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
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param mixed $dataCadastro
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
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
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $complemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getMapa()
    {
        return $this->mapa;
    }

    /**
     * @param mixed $mapa
     */
    public function setMapa($mapa)
    {
        $this->mapa = $mapa;
    }

    /**
     * @return mixed
     */
    public function getLinkFacebook()
    {
        return $this->linkFacebook;
    }

    /**
     * @param mixed $linkFacebook
     */
    public function setLinkFacebook($linkFacebook)
    {
        $this->linkFacebook = $linkFacebook;
    }

    /**
     * @return mixed
     */
    public function getLinkInstagram()
    {
        return $this->linkInstagram;
    }

    /**
     * @param mixed $linkInstagram
     */
    public function setLinkInstagram($linkInstagram)
    {
        $this->linkInstagram = $linkInstagram;
    }

    /**
     * @return mixed
     */
    public function getLinkTwitter()
    {
        return $this->linkTwitter;
    }

    /**
     * @param mixed $linkTwitter
     */
    public function setLinkTwitter($linkTwitter)
    {
        $this->linkTwitter = $linkTwitter;
    }

    /**
     * @return mixed
     */
    public function getLinkYoutube()
    {
        return $this->linkYoutube;
    }

    /**
     * @param mixed $linkYoutube
     */
    public function setLinkYoutube($linkYoutube)
    {
        $this->linkYoutube = $linkYoutube;
    }

    /**
     * @return mixed
     */
    public function getLinkGooglePlus()
    {
        return $this->linkGooglePlus;
    }

    /**
     * @param mixed $linkGooglePlus
     */
    public function setLinkGooglePlus($linkGooglePlus)
    {
        $this->linkGooglePlus = $linkGooglePlus;
    }

    /**
     * @return mixed
     */
    public function getLinkPinterest()
    {
        return $this->linkPinterest;
    }

    /**
     * @param mixed $linkPinterest
     */
    public function setLinkPinterest($linkPinterest)
    {
        $this->linkPinterest = $linkPinterest;
    }

    /**
     * @return mixed
     */
    public function getLinkLinkedin()
    {
        return $this->linkLinkedin;
    }

    /**
     * @param mixed $linkLinkedin
     */
    public function setLinkLinkedin($linkLinkedin)
    {
        $this->linkLinkedin = $linkLinkedin;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getNivelBusca()
    {
        return $this->nivelBusca;
    }

    /**
     * @param mixed $nivelBusca
     */
    public function setNivelBusca($nivelBusca)
    {
        $this->nivelBusca = $nivelBusca;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
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