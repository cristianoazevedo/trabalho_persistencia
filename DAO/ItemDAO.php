<?php


class ItemDAO
{
    public static function salvar(\Item $item)
    {
        $sql = "INSERT INTO item(idProduto, idVenda, quantidade, preco) VALUES (:idProduto, :idVenda, :quantidade, :preco)";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idProduto",  $item->getProduto()->getIdProduto(), \PDO::PARAM_INT);
        $sth->bindValue(":idVenda",  $item->getVenda()->getIdVenda(), \PDO::PARAM_INT);
        $sth->bindValue(":quantidade",  $item->getQuantidade(), \PDO::PARAM_INT);
        $sth->bindValue(":preco", $item->getPreco(), \PDO::PARAM_INT);
       // print_r($sth) ;exit;
        $sth->execute();
    }

    public static function excluir($idVenda)
    {
        $sql = "DELETE FROM item WHERE idVenda=:idVenda";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idVenda", $idVenda, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }
}