<?php

class Vendedor
{
    /**
     * @var integer
     */
    private $idVendedor;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var float
     */
    private $comissao;
    /**
     * @var integer
     */
    private $matricula;
    /**
     * @var string
     */
    private $cpf;
    /**
     * @var integer
     */
    private $situacao;

    /**
     * Vendedor constructor.
     * @param $nome
     * @param $comissao
     * @param $matricula
     * @param $cpf
     * @param $situacao
     */
    public function __construct($nome = null, $comissao = null, $matricula = null, $cpf = null, $situacao = null)
    {
        $this->nome = $nome;
        $this->comissao = $comissao;
        $this->matricula = $matricula;
        $this->cpf = $cpf;
        $this->situacao = $situacao;
    }

    /**
     * @return mixed
     */
    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    /**
     * @param int $idVendedor
     */
    public function setIdVendedor($idVendedor)
    {
        $this->idVendedor = $idVendedor;
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
    public function getComissao()
    {
        return $this->comissao;
    }

    /**
     * @param mixed $comissao
     */
    public function setComissao($comissao)
    {
        $this->comissao = $comissao;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }




}