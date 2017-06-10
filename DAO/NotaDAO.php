<?php

class NotaDAO
{
    public static function salvar(\Nota $nota)
    {
        if ($nota->getIdNota()) {
            $sql = "UPDATE nota SET idVenda=:idVenda, valor=:valor WHERE idNota=:idNota";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idNota", $nota->getIdNota(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO cidade(idVenda, valor) VALUES (:idVenda, :valor)";
            $sth = Conexao::getConexao()->prepare($sql);
        }

        $sth->bindValue(":idCidade", $nota->getVenda()->getIdVenda(), \PDO::PARAM_INT);
        $sth->bindValue(":valor", $nota->getValor(), \PDO::PARAM_STR);
        $sth->execute();
    }

    public static function excluir($idNota)
    {
        $sql = "DELETE FROM nota WHERE idNota=:IdNota";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idNota", $idNota, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }
}