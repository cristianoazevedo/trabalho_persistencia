<?php

class Dependente
{
    /**
     * @var integer
     */
    private $idDependente;
    /**
     * @var \Cliente
     */
    private $cliente;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $celular;

    /**
     * Dependente constructor.
     * @param Cliente $cliente
     * @param string $nome
     * @param string $celular
     */
    public function __construct(Cliente $cliente, $nome, $celular)
    {
        $this->cliente = $cliente;
        $this->nome = $nome;
        $this->celular = $celular;
    }

    /**
     * @return int
     */
    public function getIdDependente()
    {
        return $this->idDependente;
    }


    /**
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
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
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param string $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }



}