<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 13:26
 */

namespace Webdev\Entidades;

/**
 * Class Nota
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="nota")
 */
class Nota
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $idNota;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Venda", cascade={"remove"})
     * @JoinColumn(name="idVenda", referencedColumnName="idVenda")
     * @var \Webdev\Entidades\Venda
     */
    private $venda;
    /**
     * @Column(type="decimal", precision=10, scale=2)
     * @var float
     */
    private $valor;

    /**
     * @return int
     */
    public function getIdNota()
    {
        return $this->idNota;
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