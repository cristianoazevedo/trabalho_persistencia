<?php

namespace Webdev\Entidades;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Cliente
 * @package Webdev\Entidades
 *
 * @Entity
 * @Table(name="cliente")
 */
class Cliente
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $idCliente;
    /**
     * @ManyToOne(targetEntity="Webdev\Entidades\Cidade")
     * @JoinColumn(name="idCidade", referencedColumnName="idCidade")
     * @var \Webdev\Entidades\Cidade
     */
    private $cidade;
    /**
     * @Column(type="string", length=100)
     * @var string
     */
    private $nome;
    /**
     * @var integer
     * @Column(type="integer")
     */
    private $idade;
    /**
     * @Column(type="string", length=200)
     * @var string
     */
    private $email;
    /**
     * @Column(type="string", length=20)
     * @var string
     */
    private $celular;
    /**
     * @Column(type="string", length=9)
     * @var string
     */
    private $cep;
    /**
     * @Column(type="string", length=100)
     * @var string
     */
    private $endereco;

    /**
     * @OneToMany(targetEntity="Webdev\Entidades\Dependente", mappedBy="cliente", cascade={"all"})
     */
    private $dependentes;

    public function __construct()
    {
        $this->dependentes = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param int $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return \Webdev\Entidades\Cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param Cidade $cidade
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

    /**
     * @return int
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param int $idade
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getDependentes()
    {
        return $this->dependentes;
    }

    /**
     * @param mixed $dependentes
     */
    public function setDependentes($dependentes)
    {
        $this->dependentes = $dependentes;
    }

    public function addDependente(\Webdev\Entidades\Dependente $dependente)
    {
        $dependente->setCliente($this);
        $this->dependentes->add($dependente);
    }

}