<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 13:26
 */

namespace Webdev\Entidades;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Venda
 * @package Webdev\Entidades
 *
 * @Entity(repositoryClass="Webdev\Entidades\Repositorio\Venda")
 * @Table(name="venda")
 */
class Venda
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $idVenda;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Loja")
     * @JoinColumn(name="idLoja", referencedColumnName="idLoja")
     * @var \Webdev\Entidades\Loja
     */
    private $loja;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Vendedor")
     * @JoinColumn(name="idVendedor", referencedColumnName="idVendedor")
     * @var \Webdev\Entidades\Vendedor
     */
    private $vendedor;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Cliente")
     * @JoinColumn(name="idCliente", referencedColumnName="idCliente")
     * @var \Webdev\Entidades\Cliente
     */
    private $cliente;
    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $dataVenda;

    /**
     * @OneToMany(targetEntity="Webdev\Entidades\Item", mappedBy="venda", cascade={"all"})
     */
    private $itens;

    /**
     * Venda constructor.
     */
    public function __construct()
    {
        $this->itens = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * @return \Webdev\Entidades\Loja
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
     * @return \Webdev\Entidades\Vendedor
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
     * @return \Webdev\Entidades\Cliente
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
     * @return mixed
     */
    public function getDataVenda()
    {
        return $this->dataVenda;
    }

    /**
     * @param mixed $dataVenda
     */
    public function setDataVenda($dataVenda)
    {
        $this->dataVenda = $dataVenda;
    }

    /**
     * @return ArrayCollection
     */
    public function getItens()
    {
        return $this->itens;
    }

    public function addItem(\Webdev\Entidades\Item $item)
    {
        $item->setVenda($this);
        $this->itens->add($item);
    }

    public function getValorTotal()
    {
        $total = 0;

        if ($this->getItens()->count()) {
            $total = array_sum(array_map(function($item){
                /* @var $item \Webdev\Entidades\Item */
                return $item->getQuantidade() * $item->getPreco();
            }, $this->getItens()->toArray()));
        }

        return $total;
    }
}