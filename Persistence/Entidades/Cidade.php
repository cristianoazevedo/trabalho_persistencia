<?php

namespace Webdev\Entidades;

/**
 * Class Cidade
 * @package Webdev\Entidades
 *
 * @Entity(repositoryClass="Webdev\Entidades\Repositorio\Cidade")
 * @Table(name="cidade")
 */
class Cidade
{
    /**
     * @var integer
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $idCidade;
    /**
     * @var string
     * @Column(type="string", length=100)
     */
    private $nome;
    /**
     * @var string
     * @Column(type="string", length=2)
     */
    private $uf;

    /**
     * Cidade constructor.
     * @param $nome
     * @param $uf
     */
    public function __construct($nome = null, $uf = null)
    {
        $this->nome = $nome;
        $this->uf = $uf;
    }

    /**
     * @return int
     */
    public function getIdCidade()
    {
        return $this->idCidade;
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
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }
}