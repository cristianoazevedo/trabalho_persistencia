<?php

class VendedorDAO
{
    public static function salvar(\Vendedor $vendedor)
    {
        if ($vendedor->getIdVendedor()) {
            $sql = "UPDATE vendedor SET nome=:nome, comissao=:comissao, matricula=:matricula, cpf=:cpf, situacao=:situacao WHERE idVendedor=:idVendedor";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idVendedor", $vendedor->getIdVendedor(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO vendedor(nome, comissao, matricula, cpf, situacao) VALUES (:nome, :comissao, :matricula, :cpf, :situacao)";
            $sth = Conexao::getConexao()->prepare($sql);
        }

        $sth->bindValue(":nome", $vendedor->getNome(), \PDO::PARAM_STR);
        $sth->bindValue(":comissao", $vendedor->getComissao(), \PDO::PARAM_INT);
        $sth->bindValue(":matricula", $vendedor->getMatricula(), \PDO::PARAM_INT);
        $sth->bindValue(":cpf", $vendedor->getCpf(), \PDO::PARAM_STR);
        $sth->bindValue(":situacao", $vendedor->getSituacao(), \PDO::PARAM_INT);
        $sth->execute();
    }

    public static function excluir($idVendedor)
    {
        $sql = "DELETE FROM vendedor WHERE idVendedor=:idVendedor";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idLoja", $idVendedor, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }

    public static function recuperar($idVendedor)
    {
        $vendedor = false;

        $sql = "SELECT idVendedor, nome, comissao, matricula, cpf, situacao FROM vendedor WHERE idVendedor=:idVendedor";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue("idVendedor", $idVendedor, \PDO::PARAM_INT);
        $sth->execute();

        if ($vendedorDB = $sth->fetch(\PDO::FETCH_OBJ)) {
            $vendedor = new \Vendedor();
            $vendedor->setIdVendedor($vendedorDB->idVendedor);
            $vendedor->setNome($vendedorDB->nome);
            $vendedor->setComissao($vendedorDB->comissao);
            $vendedor->setMatricula($vendedorDB->matricula);
            $vendedor->setCpf($vendedorDB->cpf);
            $vendedor->setSituacao($vendedorDB->situacao);
        }

        return $vendedor;
    }
}