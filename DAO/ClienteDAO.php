<?php


class ClienteDAO
{
    public static function salvar(\Cliente $cliente)
    {
        if ($cliente->getIdCliente()){
            $sql = "UPDATE cliente set idCidade=: cidade, nome=:nome, idade=:idade, email=:email, celular=:celular, cep=:cep, endereco=:endereco WHERE idCliente=:idCliente";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idCidade", $cliente->getIdCliente(), PDO::PARAM_INT);
        }else{
            $sql = "INSERT INTO cliente(idCidade,nome,idade,email,celular,cep,endereco) VALUES(:idCidade, :nome, :idade, :email, :celular, :cep, :endereco)";
            $sth = Conexao::getConexao()->prepare($sql);
        }
        $sth->bindValue(":idCidade", $cliente->getCidade()->getIdCidade(), PDO::PARAM_STR);
        $sth->bindValue(":nome", $cliente->getNome(), PDO::PARAM_STR);
        $sth->bindValue(":idade", $cliente->getIdade(), PDO::PARAM_INT);
        $sth->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
        $sth->bindValue(":celular", $cliente->getCelular(), PDO::PARAM_STR);
        $sth->bindValue(":cep", $cliente->getCep(), PDO::PARAM_STR);
        $sth->bindValue(":endereco", $cliente->getEndereco(), PDO::PARAM_STR);
        $sth->execute();
    }

    public static function excluir($idCliente)
    {
        $sql = "DELETE FROM cliente WHERE idCliente=:idCliente";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idCliente", $idCliente, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }

    public static function recuperar($idCliente)
    {
        $sql = "SELECT idCliente, idCidade, nome, idade, email, celular, cep, endereco FROM cliente WHERE idCliente=:idCliente";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idCliente", $idCliente, PDO::PARAM_INT);
        $sth->execute();

        if ($clienteDB= $sth->fetch(PDO::FETCH_OBJ)){
            $cliente = new Cliente();
            $cliente->setIdCliente($clienteDB->idCliente);
            $cliente->setCidade(CidadeDAO::recuperar($clienteDB->idCidade));
            $cliente->setNome($clienteDB->nome);
            $cliente->setIdade($clienteDB->idade);
            $cliente->setEmail($clienteDB->email);
            $cliente->setCelular($clienteDB->celular);
            $cliente->setCep($clienteDB->cep);
            $cliente->setEndereco($clienteDB->endereco);
            return $cliente;
        }
        return false;
    }
}