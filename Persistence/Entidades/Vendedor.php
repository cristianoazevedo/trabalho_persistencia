<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 03/06/2017
 * Time: 15:54
 */

namespace Webdev\Entidades;

/**
 * Class Vendedor
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="vendedor")
 */
class Vendedor
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $idVendedor;
    /**
     * @Column(type="string", length=100)
     * @var string
     */
    private $nome;
    /**
     * @Column(type="decimal", precision=1, scale=2)
     * @var float
     */
    private $comissao;
    /**
     * @Column(type="integer")
     * @var integer
     */
    private $matricula;
    /**
     * @Column(type="string", length=14)
     * @var string
     */
    private $cpf;
    /**
     * @Column(type="integer")
     * @var integer
     */
    private $situacao;

    /**
     * @return mixed
     */
    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    /**
     * @param mixed $idVendedor
     */
    public function setIdVendedor($idVendedor)
    {
        $this->idVendedor = $idVendedor;
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
    public function getComissao()
    {
        return $this->comissao;
    }

    /**
     * @param float $comissao
     */
    public function setComissao($comissao)
    {
        $this->comissao = $comissao;
    }

    /**
     * @return int
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param int $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return int
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param int $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

}