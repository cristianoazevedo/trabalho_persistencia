<?php

class Nota
{
    /**
     * @var integer
     */
    private $idNota;
    /**
     * @var Venda
     */
    private $venda;
    /**
     * @var float
     */
    private $valor;

    /**
     * Nota constructor.
     * @param Venda $venda
     * @param float $valor
     */
    public function __construct(Venda $venda, $valor)
    {
        $this->venda = $venda;
        $this->valor = $valor;
    }

    /**
     * @return int
     */
    public function getIdNota()
    {
        return $this->idNota;
    }

    /**
     * @return Venda
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * @param Venda $venda
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }




}