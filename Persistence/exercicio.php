<?php
require_once "../vendor/autoload.php";

/**
 * ==================================
 * DADOS NECESSÁRIOS PARA O EXERCÍCIO
 * =================================
 */

$cidades = [
    ['Maringá', 'PR'],
    ['Santa fé', 'PR'],
    ['Astorga', 'PR'],
    ['Sarandi', 'PR'],
    ['Curitiba', 'PR']
];

foreach ($cidades as $cidade) {
    $cidade = new \Webdev\Entidades\Cidade($cidade[0], $cidade[1]);
    \Webdev\Singleton::getEntityManager()->persist($cidade);
}

/**
 * Pega randômica a cidade
 */
$cidade = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cidade')->findOneBy([]);

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

\Webdev\Singleton::getEntityManager()->persist($cliente);

$loja = new \Webdev\Entidades\Loja();
$loja->setNome("Shopping Cidade");
$loja->setCidade($cidade);

\Webdev\Singleton::getEntityManager()->persist($loja);

$vendedor = new \Webdev\Entidades\Vendedor();
$vendedor->setNome('Evaristo da costa');
$vendedor->setComissao(3.0);
$vendedor->setMatricula(123456);
$vendedor->setCpf(72743855347);
$vendedor->setSituacao(1);

\Webdev\Singleton::getEntityManager()->persist($vendedor);


\Webdev\Singleton::getEntityManager()->flush();

/**
 * ===================
 * CRUD PRODUTO
 * ===================
 */

$produtos = [
    ['MP3', 50.00, 1],
    ['MP4', 60.00, 5],
    ['DVD Player', 150.00, 100],
    ['PS4 ', 1050.00, 8],
    ['PSP', 450.00, 78],
    ['Nintendo DS', 350.00, 1],
    ['PS Vita', 850.00, 56],
];

foreach ($produtos as $prod) {
    $produto = new \Webdev\Entidades\Produto();
    $produto->setNome($prod[0]);
    $produto->setPreco($prod[1]);
    $produto->setEstoque($prod[2]);

    \Webdev\Singleton::getEntityManager()->persist($produto);
}

\Webdev\Singleton::getEntityManager()->flush();

/**
* Pegando um produto aleatório
 * @var $produto \Webdev\Entidades\Produto
 */
$produto = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Produto')->findOneBy([], ['idProduto' => 'DESC']);

/**
 * Alterando o nome do produto
 */
$produto->setNome('Teste de alteração de nome');
\Webdev\Singleton::getEntityManager()->persist($produto);
\Webdev\Singleton::getEntityManager()->flush();

/**
 * Excluindo o último produto da tabela
 */
$produto = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Produto')->findOneBy([], ['idProduto' => 'DESC']);
\Webdev\Singleton::getEntityManager()->remove($produto);
\Webdev\Singleton::getEntityManager()->flush();


/**
 * ==================
 * VENDA E ITENS
 * ==================
 */

$loja = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Loja')->findOneBy([]);
$vendedor = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Vendedor')->findOneBy([]);
$cliente = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cliente')->findOneBy([]);

$venda = new \Webdev\Entidades\Venda();
$venda->setCliente($cliente);
$venda->setVendedor($vendedor);
$venda->setLoja($loja);
$venda->setDataVenda(new \DateTime());

$produtos = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Produto')->findBy([], ['idProduto' => 'ASC'], 5);

foreach ($produtos as $produto) {
    /* @var $produto \Webdev\Entidades\Produto */
    $item = new \Webdev\Entidades\Item();
    $item->setProduto($produto);
    $item->setQuantidade(rand(1,10));
    $item->setPreco($produto->getPreco());

    $venda->addItem($item);
}

\Webdev\Singleton::getEntityManager()->persist($venda);
\Webdev\Singleton::getEntityManager()->flush();


/**
 * ================
 * NOTA
 * ================
 */

$nota = new \Webdev\Entidades\Nota();
$nota->setVenda($venda);
$nota->setValor($venda->getValorTotal());

\Webdev\Singleton::getEntityManager()->persist($nota);
\Webdev\Singleton::getEntityManager()->flush();


/**
 * ===========================
 * REMOVENDO NOTA, VENDA, ITEM
 * ==========================
 */
$nota = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Nota')->findOneBy([]);
\Webdev\Singleton::getEntityManager()->remove($nota);

$venda = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Venda')->findOneBy([]);
\Webdev\Singleton::getEntityManager()->remove($venda);


$venda = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Venda')->findOneBy([]);
$item = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Item')->findOneBy(['venda' => $venda]);
\Webdev\Singleton::getEntityManager()->remove($item);

//\Webdev\Singleton::getEntityManager()->flush();

$repositorio = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Venda');
/* @var $repositorio \Webdev\Entidades\Repositorio\Venda */

$resultado = $repositorio->getQuantidadesDeVendasPorVendedor();
var_dump($resultado);

$resultado = $repositorio->getQuantidadesDeClientesPorCidade();
var_dump($resultado);

$resultado = $repositorio->getValorTotalDeVendasPorLoja();
var_dump($resultado);

$resultado = $repositorio->getValorTotalDeVendasPorCliente();
var_dump($resultado);

$resultado = $repositorio->getValorTotalDeVendasPorProduto();
var_dump($resultado);


