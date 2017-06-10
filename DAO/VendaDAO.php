<?php


class VendaDAO
{
    public static function salvar(\Venda $venda)
    {
        if ($venda->getIdVenda()) {
            $sql = "UPDATE venda SET idLoja=:idLoja, idVendedor=:idVendedor, idCliente=:idCliente, dataVenda=:dataVenda WHERE idVenda=:idVenda";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idVenda", $venda->getIdVenda(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO venda(idLoja, idVendedor, idCliente, dataVenda) VALUES (:idLoja, :idVendedor, :idCliente, :dataVenda)";
            $sth = Conexao::getConexao()->prepare($sql);
        }
        $sth->bindValue(":idLoja",  $venda->getLoja()->getIdLoja(), \PDO::PARAM_STR);
        $sth->bindValue(":idVendedor",  $venda->getVendedor()->getIdVendedor(), \PDO::PARAM_STR);
        $sth->bindValue(":idCliente",  $venda->getCliente()->getIdCliente(), \PDO::PARAM_STR);
        $sth->bindValue(":dataVenda", $venda->getDataVenda()->format("Y-m-d H:i:s"), \PDO::PARAM_INT);
        $sth->execute();
    }

    public static function excluir($idVenda)
    {
        $sql = "DELETE FROM venda WHERE idVenda=:idVenda";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idVenda", $idVenda, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }

    public static function recuperar($idVenda)
    {
        $venda = false;

        $sql = "SELECT idVenda, idLoja, idVendedor, idCliente, dataVenda FROM venda WHERE idVenda=:idVenda";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue("idVenda", $idVenda, \PDO::PARAM_INT);
        $sth->execute();

        if ($vendaDB = $sth->fetch(\PDO::FETCH_OBJ)) {
            $venda = new \Venda();
            $venda->setIdVenda($vendaDB->idVenda);
            $venda->setLoja(LojaDAO::recuperar($vendaDB->idLoja));
            $venda->setVendedor(VendedorDAO::recuperar($vendaDB->idVendedor));
            $venda->setCliente(ClienteDAO::recuperar($vendaDB->idCliente));
            $venda->setDataVenda($vendaDB->dataVenda);
        }

        return $venda;
    }
}