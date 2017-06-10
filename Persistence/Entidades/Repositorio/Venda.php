<?php
/**
 * Created by PhpStorm.
 * User: UniCesumar
 * Date: 10/06/2017
 * Time: 15:10
 */

namespace Webdev\Entidades\Repositorio;


use Doctrine\ORM\EntityRepository;

class Venda extends EntityRepository
{
    public function getQuantidadesDeVendasPorVendedor()
    {
        $dql = <<<DQL
            SELECT vendedor, count(venda.idVenda) as qtde FROM Webdev\Entidades\Vendedor vendedor
              LEFT JOIN Webdev\Entidades\Venda venda WITH venda.vendedor = vendedor
            GROUP BY venda.vendedor
DQL;

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function getQuantidadesDeClientesPorCidade()
    {
        $dql = <<<DQL
            SELECT cidade, count(cliente.idCliente) as qtde FROM Webdev\Entidades\Cidade cidade
              LEFT JOIN Webdev\Entidades\Cliente cliente WITH cliente.cidade = cidade
            GROUP BY cliente.cidade
DQL;

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }


    public function getValorTotalDeVendasPorLoja()
    {
        $dql = <<<DQL
            SELECT venda, loja, SUM(nota.valor) as valor_total FROM Webdev\Entidades\Loja loja
              INNER JOIN Webdev\Entidades\Venda venda WITH venda.loja = loja
              INNER JOIN Webdev\Entidades\Nota nota WITH nota.venda = venda
            GROUP BY loja
DQL;

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function getValorTotalDeVendasPorCliente()
    {
        $dql = <<<DQL
            SELECT venda, cliente, SUM(nota.valor) as valor_total FROM Webdev\Entidades\cliente cliente
              INNER JOIN Webdev\Entidades\Venda venda WITH venda.cliente = cliente
              INNER JOIN Webdev\Entidades\Nota nota WITH nota.venda = venda
            GROUP BY cliente
DQL;

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function getValorTotalDeVendasPorProduto()
    {
        $dql = <<<DQL
            SELECT item, venda, produto, SUM(nota.valor) as valor_total FROM Webdev\Entidades\Produto produto
              LEFT JOIN Webdev\Entidades\Item item WITH item.produto = produto
              LEFT JOIN Webdev\Entidades\Venda venda WITH item.venda = venda
              LEFT JOIN Webdev\Entidades\Nota nota WITH nota.venda = venda
            GROUP BY produto
DQL;

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }
}