<?php

include_once './Conexao.php';
include_once './Cidade.php';
include_once './CidadeDAO.php';
include_once './Cliente.php';
include_once './ClienteDAO.php';
include_once './Item.php';
include_once './ItemDAO.php';
include_once './Loja.php';
include_once './LojaDAO.php';
include_once './Nota.php';
include_once './NotaDAO.php';
include_once './Produto.php';
include_once './ProdutoDAO.php';
include_once './Venda.php';
include_once './VendaDAO.php';
include_once './Vendedor.php';
include_once './VendedorDAO.php';


$cidade = CidadeDAO::recuperar(1);
$loja = new Loja($cidade,"Pernambucanas");
LojaDAO::salvar($loja);
$loja = new Loja($cidade,"Lunhani");
LojaDAO::salvar($loja);

$vendedor = new Vendedor("João da Silva",1.5, 123456,"01421570986",1);
VendedorDAO::salvar($vendedor);
$vendedor = new Vendedor("Joca Matos",1.6, 653241,"025412230584",1);
VendedorDAO::salvar($vendedor);

$produto = new Produto("Escova", 1.66, 150);
ProdutoDAO::salvar($produto);
$produto = new Produto("Pente", 5.59, 25);
ProdutoDAO::salvar($produto);
$produto = new Produto("Bicicleta", 520.00, 12);
ProdutoDAO::salvar($produto);


$loja = LojaDAO::recuperar(1);
$vendedor = VendedorDAO::recuperar(2);
$cliente = ClienteDAO::recuperar(4);
$venda = new Venda($loja, $vendedor, $cliente, new DateTime());
VendaDAO::salvar($venda);

$loja = LojaDAO::recuperar(2);
$vendedor = VendedorDAO::recuperar(1);
$cliente = ClienteDAO::recuperar(5);
$venda = new Venda($loja, $vendedor, $cliente, new DateTime());
VendaDAO::salvar($venda);


$venda = VendaDAO::recuperar(1);
$produto = ProdutoDAO::recuperar(1);
$produto2 = ProdutoDAO::recuperar(2);
$produto3 = ProdutoDAO::recuperar(3);

$item = new Item($produto, $venda, 10);
ItemDAO::salvar($item);
$item = new Item($produto2, $venda, 5);
ItemDAO::salvar($item);
$item = new Item($produto3, $venda, 10);
ItemDAO::salvar($item);


$nota = new Nota($venda, 1500.00);




