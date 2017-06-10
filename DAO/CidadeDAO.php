<?php

class CidadeDAO
{
    public static function salvar(\Cidade $cidade)
    {
        if ($cidade->getIdCidade()) {
            $sql = "UPDATE cidade SET nome=:nome, uf=:uf WHERE idCidade=:idCidade";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idCidade", $cidade->getIdCidade(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO cidade (nome, uf) VALUES (:nome, :uf)";
            $sth = Conexao::getConexao()->prepare($sql);
        }

        $sth->bindValue(":nome", $cidade->getNome(), \PDO::PARAM_STR);
        $sth->bindValue(":uf", $cidade->getUf(), \PDO::PARAM_STR);
        $sth->execute();
    }

    public static function excluir($idCidade)
    {
        $sql = "DELETE FROM cidade WHERE idCidade=:idCidade";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue("idCidade", $idCidade, \PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }

    public static function recuperar($idCidade)
    {
        $cidade = false;

        $sql = "SELECT idCidade, nome, uf FROM cidade WHERE idCidade=:idCidade";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue("idCidade", $idCidade, \PDO::PARAM_INT);
        $sth->execute();

        if ($cidadeDB = $sth->fetch(\PDO::FETCH_OBJ)) {
            $cidade = new \Cidade();
            $cidade->setIdCidade($cidadeDB->idCidade);
            $cidade->setNome($cidadeDB->nome);
            $cidade->setUf($cidadeDB->uf);
        }

        return $cidade;
    }

    public static function listar()
    {
        $cidades = [];
        $sql = "SELECT idCidade, nome, uf FROM cidade ORDER BY nome";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->execute();

        while ($cidadeDB = $sth->fetch(\PDO::FETCH_OBJ)) {
            $cidade = new \Cidade();
            $cidade->setIdCidade($cidadeDB->idCidade);
            $cidade->setNome($cidadeDB->nome);
            $cidade->setUf($cidadeDB->uf);

            $cidades[] = $cidade;
        }

        return $cidades;
    }
}