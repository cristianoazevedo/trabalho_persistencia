<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 03/06/2017
 * Time: 15:55
 */

namespace Webdev\Entidades;

/**
 * Class Dependente
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="dependente")
 */
class Dependente
{
    /**
     * @var integer
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $idDependente;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Cliente")
     * @JoinColumn(name="idCliente", referencedColumnName="idCliente")
     * @var Cliente
     */
    private $cliente;
    /**
     * @var string
     * @Column(type="string", length=100)
     */
    private $nome;
    /**
     * @var string
     * @Column(type="string", length=20)
     */
    private $celular;

    /**
     * @return int
     */
    public function getIdDependente()
    {
        return $this->idDependente;
    }

    /**
     * @param int $idDependente
     */
    public function setIdDependente($idDependente)
    {
        $this->idDependente = $idDependente;
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