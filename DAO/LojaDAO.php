<?php

class LojaDAO
{
    public static function salvar(\Loja $loja)
    {
        if ($loja->getIdLoja()) {
            $sql = "UPDATE loja SET idCidade=:idCidade, nome=:nome WHERE idLoja=:idLoja";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idNota", $loja->getIdLoja(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO loja(idCidade, nome) VALUES (:idCidade, :nome)";
            $sth = Conexao::getConexao()->prepare($sql);
        }

        $sth->bindValue(":idCidade", $loja->getCidade()->getIdCidade(), \PDO::PARAM_INT);
        $sth->bindValue(":nome", $loja->getNome(), \PDO::PARAM_STR);
        $sth->execute();
    }

    public static function excluir($idLoja)
    {
        $sql = "DELETE FROM loja WHERE idLoja=:idLoja";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idLoja", $idLoja, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }

    public static function recuperar($idLoja)
    {
        $loja = false;

        $sql = "SELECT idLoja, idCidade, nome FROM loja WHERE idLoja=:idLoja";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue("idLoja", $idLoja, \PDO::PARAM_INT);
        $sth->execute();

        if ($lojaDB = $sth->fetch(\PDO::FETCH_OBJ)) {
            $loja = new \Loja();
            $loja->setIdLoja($lojaDB->idLoja);
            $loja->setCidade(CidadeDAO::recuperar($lojaDB->idCidade));
            $loja->setNome($lojaDB->nome);
        }

        return $loja;
    }
}