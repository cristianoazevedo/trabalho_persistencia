<?php
include_once './conexao.php';

/*
$cidades = [
    ['Maringá', 'PR'],
    ['Santa fé', 'PR'],
    ['Astorga', 'PR'],
    ['Sarandi', 'PR'],
    ['Curitiba', 'PR']
];

foreach ($cidades as $cidade) {
    $sql = "INSERT INTO cidade (nome, uf) VALUES (:nome, :uf)";
    $sth = $conexao->prepare($sql);

    $sth->bindValue(":nome", $cidade[0], \PDO::PARAM_STR);
    $sth->bindValue(":uf", $cidade[1], \PDO::PARAM_STR);
    $sth->execute();
}
*/

/*
$sql = "UPDATE cidade SET nome=:nome, uf=:uf WHERE idCidade=:idCidade";
$sth = $conexao->prepare($sql);
$sth->bindValue(":nome", "Curitiba", \PDO::PARAM_STR);
$sth->bindValue(":uf", "PR", \PDO::PARAM_STR);
$sth->bindValue(":idCidade", 2, \PDO::PARAM_INT);
$sth->execute();
*/

/*
$sql = "DELETE FROM cidade WHERE idCidade=:idCidade";
$sth = $conexao->prepare($sql);
$sth->bindValue("idCidade", 2, \PDO::PARAM_INT);
$sth->execute();*/

$sql = "SELECT idCidade, nome, uf FROM cidade ORDER BY nome";
$sth = $conexao->prepare($sql);
$sth->execute();

while ($cidade = $sth->fetch(\PDO::FETCH_OBJ)) {
    $string = <<<STRING
    <br>-------------------
    <br>ID: %s
    <br>Nome: %s
    <br>UF: %s
STRING;
    echo sprintf($string, $cidade->idCidade, $cidade->nome, $cidade->uf);
}