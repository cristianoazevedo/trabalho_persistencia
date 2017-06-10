<?php

class Cidade
{

    /**
     * @var integer
     */
    private $idCidade;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $uf;

    /**
     * Cidade constructor.
     * @param string $nome
     * @param string $uf
     */
    public function __construct($nome = null, $uf = null)
    {
        $this->nome = $nome;
        $this->uf = $uf;
    }


    /**
     * @return int
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }

    /**
     * @param int $idCidade
     */
    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }


}