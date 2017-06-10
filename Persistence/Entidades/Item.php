<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 13:26
 */

namespace Webdev\Entidades;

/**
 * Class Item
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="item")
 */
class Item
{
    /**
     * @Id
     * @ManyToOne(targetEntity="Webdev\Entidades\Venda")
     * @JoinColumn(name="idVenda", referencedColumnName="idVenda")
     * @var \Webdev\Entidades\Venda
     */
    private $venda;
    /**
     * @Id
     * @ManyToOne(targetEntity="Webdev\Entidades\Produto")
     * @JoinColumn(name="idProduto", referencedColumnName="idProduto")
     * @var \Webdev\Entidades\Produto
     */
    private $produto;
    /**
     * @Column(type="decimal", precision=10, scale=2)
     * @var float
     */
    private $preco;
    /**
     * @Column(type="integer")
     * @var integer
     */
    private $quantidade;

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
     * @return Produto
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param Produto $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
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

}