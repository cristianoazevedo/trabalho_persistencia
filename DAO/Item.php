<?php


class Item
{
    /**
     * @var /Produto
     */
    private $produto;
    /**
     * @var /Venda
     */
    private $venda;
    /**
     * @var integer
     */
    private $quantidade;
    /**
     * @var float
     */
    private $preco;

    /**
     * Item constructor.
     * @param $produto
     * @param $venda
     * @param int $quantidade
     * @param float $preco
     */
    public function __construct($produto = null, $venda = null, $quantidade = null, $preco = null)
    {
        $this->produto = $produto;
        $this->venda = $venda;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param mixed $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    /**
     * @return mixed
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * @param mixed $venda
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;
    }

    /**
     * @return int
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param int $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return float
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }




}