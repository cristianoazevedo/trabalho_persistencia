<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 03/06/2017
 * Time: 15:54
 */

namespace Webdev\Entidades;

/**
 * Class Loja
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="loja")
 */
class Loja
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $idLoja;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Cidade")
     * @JoinColumn(name="idCidade", referencedColumnName="idCidade")
     * @var Cidade
     */
    private $cidade;
    /**
     * @var string
     * @Column(type="string", length=100)
     */
    private $nome;

    /**
     * @return mixed
     */
    public function getIdLoja()
    {
        return $this->idLoja;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
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
}