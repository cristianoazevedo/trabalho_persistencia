<?php
require_once "../vendor/autoload.php";
require_once "./bootstrap.php";

/*
$cidades = [
    ['Maringá', 'PR'],
    ['Santa fé', 'PR'],
    ['Astorga', 'PR'],
    ['Sarandi', 'PR'],
    ['Curitiba', 'PR']
];

foreach ($cidades as $cidade) {
    $cidade = new \Webdev\Entidades\Cidade($cidade[0], $cidade[1]);
    $entityManeger->persist($cidade);
    $entityManeger->flush();
}*/

/*
$cidades = $entityManeger->getRepository('Webdev\Entidades\Cidade')->findAll();

foreach ($cidades as $cidade) {
    $string = <<<STRING
    <br>-------------------
    <br>ID: %s
    <br>Nome: %s
    <br>UF: %s
STRING;
    echo sprintf($string, $cidade->getIdCidade(), $cidade->getNome(), $cidade->getUf());
}*/
/*
$cidade = $entityManeger->getRepository('Webdev\Entidades\Cidade')->find(1);

if ($cidade instanceof \Webdev\Entidades\Cidade) {
    $entityManeger->remove($cidade);
    $entityManeger->flush();
}*/

/*
$cidades = $entityManeger->getRepository('Webdev\Entidades\Cidade')->findBy([]);
var_dump($cidades);
*/

/*
$cidade = $entityManeger->getRepository('Webdev\Entidades\Cidade')->find(6);

$cliente = new \Webdev\Entidades\Cliente();
$cliente->setCidade($cidade);
$cliente->setNome('Cristiano Azevedo');
$cliente->setIdade(29);
$cliente->setEmail('webdev@unicesumar.com.br');
$cliente->setCelular('4498442358');
$cliente->setCep('87047550');
$cliente->setEndereco('R. Arapongas 147');

$dependente1 = new \Webdev\Entidades\Dependente();
$dependente1->setNome('Alex Azevedo');
$dependente1->setCelular('4498452385');

$dependente2 = new \Webdev\Entidades\Dependente();
$dependente2->setNome('Leonardo Azevedo');
$dependente2->setCelular('44985623874');

$cliente->addDependente($dependente1);
$cliente->addDependente($dependente2);

$entityManeger->persist($cliente);
$entityManeger->flush();*/