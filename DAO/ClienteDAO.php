<?php


class ClienteDAO
{
    public static function salvar(\Cliente $cliente)
    {
        if ($cliente->getIdCliente()) {
            $sql = "UPDATE cidade SET idCidade=:idCidade, nome=:nome, idade=:idade, email=:email, celular=:celular, cep=:cep, endereco=:endereco WHERE idCliente=:idCliente";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idCliente", $cliente->getIdCliente(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO cidade (nome, uf) VALUES (:nome, :uf)";
            $sth = Conexao::getConexao()->prepare($sql);
        }

        $sth->bindValue(":idCidade", $cliente->getCidade()->getIdCidade(), \PDO::PARAM_INT);
        $sth->bindValue(":nome", $cliente->getNome(), \PDO::PARAM_STR);
        $sth->bindValue(":idade", $cliente->getIdade(), \PDO::PARAM_INT);
        $sth->bindValue(":email", $cliente->getEmail(), \PDO::PARAM_STR);
        $sth->bindValue(":celular", $cliente->getCelular(), \PDO::PARAM_STR);
        $sth->bindValue(":cep", $cliente->getCep(), \PDO::PARAM_STR);
        $sth->bindValue(":endereco", $cliente->getEndereco(), \PDO::PARAM_STR);
        $sth->execute();
    }
}