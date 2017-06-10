<?php


class Venda
{
    /**
     * @var integer
     */
    private $idVenda;
    /**
     * @var /Loja
     */
    private $loja;
    /**
     * @var /Vendedor
     */
    private $vendedor;
    /**
     * @var /Cliente
     */
    private $cliente;
    /**
     * @var string
     */
    private $dataVenda;

    /**
     * Venda constructor.
     * @param $loja
     * @param $vendedor
     * @param $cliente
     * @param string $dataVenda
     */
    public function __construct($loja = null, $vendedor = null, $cliente = null, $dataVenda = null)
    {
        $this->loja = $loja;
        $this->vendedor = $vendedor;
        $this->cliente = $cliente;
        $this->dataVenda = $dataVenda;
    }

    /**
     * @return int
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * @param int $idVenda
     */
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }



    /**
     * @return mixed
     */
    public function getLoja()
    {
        return $this->loja;
    }

    /**
     * @param mixed $loja
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
    }

    /**
     * @return mixed
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param mixed $vendedor
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return \DateTime
     */
    public function getDataVenda()
    {
        return $this->dataVenda;
    }

    /**
     * @param string $dataVenda
     */
    public function setDataVenda($dataVenda)
    {
        $this->dataVenda = $dataVenda;
    }




}