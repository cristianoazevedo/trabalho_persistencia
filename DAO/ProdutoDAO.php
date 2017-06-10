<?php

class ProdutoDAO
{
    public static function salvar(\Produto $produto)
    {
        if ($produto->getIdProduto()) {
            $sql = "UPDATE produto SET nome=:nome, preco=:preco, estoque=:estoque WHERE idProduto=:idProduto";
            $sth = Conexao::getConexao()->prepare($sql);
            $sth->bindValue(":idProduto", $produto->getIdProduto(), \PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO produto(nome, preco, estoque) VALUES (:nome, :preco, :estoque)";
            $sth = Conexao::getConexao()->prepare($sql);
        }

        $sth->bindValue(":nome", $produto->getNome(), \PDO::PARAM_STR);
        $sth->bindValue(":preco", $produto->getPreco(), \PDO::PARAM_INT);
        $sth->bindValue(":estoque", $produto->getEstoque(), \PDO::PARAM_INT);
        $sth->execute();
    }

    public static function excluir($idProduto)
    {
        $sql = "DELETE FROM produto WHERE idProduto=:IdProduto";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue(":idProduto", $idProduto, PDO::PARAM_INT);
        $sth->execute();

        return $sth->rowCount() == 1;
    }

    public static function recuperar($idProduto)
    {
        $produto = false;

        $sql = "SELECT idProduto, nome, preco, estoque FROM produto WHERE idProduto=:idProduto";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->bindValue("idProduto", $idProduto, \PDO::PARAM_INT);
        $sth->execute();

        if ($produtoDB = $sth->fetch(\PDO::FETCH_OBJ)) {
            $produto = new \Produto();
            $produto->setIdProduto($produtoDB->idProduto);
            $produto->setNome($produtoDB->nome);
            $produto->setPreco($produtoDB->preco);
            $produto->setEstoque($produtoDB->estoque);
        }

        return $produto;
    }
}