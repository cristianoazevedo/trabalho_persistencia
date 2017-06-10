<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 08:55
 */

namespace Webdev\Entidades\Repositorio;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class Cidade extends EntityRepository
{
    public function teste()
    {
        echo "Teste de repositorio";
    }

    public function listarCidades()
    {
        $dql = "SELECT cid FROM Webdev\Entidades\Cidade cid";
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function findByNomeLike($nome)
    {
        $dql = "SELECT cid FROM Webdev\Entidades\Cidade cid WHERE cid.nome LIKE :nome";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('nome', '%' . $nome . '%');

        return $query->getResult();
    }

    public function listarClientes()
    {
        $dql = "SELECT cli, cid FROM Webdev\Entidades\Cliente cli JOIN cli.cidade cid";
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function listarClientesPorCidade()
    {
        $dql = <<<DQL
        SELECT COUNT(cli.idCliente) as qtde, cid FROM Webdev\Entidades\Cidade cid 
        LEFT JOIN Webdev\Entidades\Cliente cli WITH cli.cidade = cid
        GROUP BY cid.idCidade
DQL;

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function findByObjeto(\Webdev\Entidades\Cidade $cidade)
    {
        $dql = <<<DQL
            SELECT cli FROM Webdev\Entidades\Cliente cli WHERE cli.cidade = :cidade
DQL;
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('cidade', $cidade);

        return $query->getResult();
    }

    public function listarCidadeDTO()
    {
        $dql = <<<DQL
        SELECT NEW Webdev\Entidades\CidadeDTO(cid.idCidade, cid.nome, cid.uf) FROM Webdev\Entidades\Cidade cid
DQL;
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function listarCidadeQueryBuilder()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->select('cid')
            ->from('Webdev\Entidades\Cidade', 'cid');

        return $qb->getQuery()->getResult();
    }
}