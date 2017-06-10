<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 13:25
 */

namespace Webdev\Entidades;

/**
 * Class Produto
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="produto")
 */
class Produto
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $idProduto;
    /**
     * @Column(type="string", length=100)
     * @var string
     */
    private $nome;
    /**
     * @Column(type="decimal", precision=10, scale=2)
     * @var float
     */
    private $preco;
    /**
     * @Column(type="integer")
     * @var integer
     */
    private $estoque;

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->idProduto;
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
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * @param int $estoque
     */
    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }
}