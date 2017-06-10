<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 11:03
 */

namespace Webdev\Entidades;


class CidadeDTO
{
    /**
     * @var string
     */
    private $idCidade;
    /**
     * @var string;
     */
    private $nome;
    /**
     * @var string
     */
    private $uf;

    /**
     * CidadeDTO constructor.
     * @param string $idCidade
     * @param string $nome
     * @param string $uf
     */
    public function __construct($idCidade, $nome, $uf)
    {
        $this->idCidade = $idCidade;
        $this->nome = $nome;
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }

    /**
     * @param string $idCidade
     */
    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
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