<?php

include_once './Conexao.php';
include_once './Cidade.php';
include_once './CidadeDAO.php';

/*
$cidade = new \Cidade('Maringá', "PR");
CidadeDAO::salvar($cidade);
$cidade = new \Cidade('Apucarana', "PR");
CidadeDAO::salvar($cidade);
$cidade = new \Cidade('Campo Mourão', "PR");
CidadeDAO::salvar($cidade);*/

//CidadeDAO::excluir(10);

/*
$cidade = CidadeDAO::recuperar(3);
$cidade->setNome('Maringá');

CidadeDAO::salvar($cidade);

$cidade = CidadeDAO::recuperar(3);
var_dump($cidade);
*/

$cidades = CidadeDAO::listar();

if (count($cidades)) {
    foreach ($cidades as $cidade) {
        /* @var $cidade \Cidade */
    $string = <<<STRING
    <br>-------------------
    <br>ID: %s
    <br>Nome: %s
    <br>UF: %s
STRING;
        echo sprintf($string, $cidade->getIdCidade(), $cidade->getNome(), $cidade->getUf());
    }
}