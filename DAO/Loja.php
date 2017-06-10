<?php


class Loja
{
    /**
     * @var integer
     */
    private $idLoja;
    /**
     * @var /Cidade
     */
    private $cidade;
    /**
     * @var string
     */
    private $nome;

    /**
     * Loja constructor.
     * @param $cidade
     * @param string $nome
     */
    public function __construct($cidade = null, $nome = null)
    {
        $this->cidade = $cidade;
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getIdLoja()
    {
        return $this->idLoja;
    }

    /**
     * @param int $idLoja
     */
    public function setIdLoja($idLoja)
    {
        $this->idLoja = $idLoja;
    }



    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
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




}