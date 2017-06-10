<?php
require_once "../vendor/autoload.php";

 //\Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cidade')->teste();

// $resultado = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cidade')->listarCidades();
// var_dump($resultado);

$repositorio = \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cidade');
 /* @var $repositorio \Webdev\Entidades\Repositorio\Cidade*/

//$resultado = $repositorio->findByNomeLike('Maringá');
//$resultado = $repositorio->listarClientes();

//foreach ($resultado as $cliente){
//    echo '<br>'. $cliente->getNome();
//}

//$resultado = $repositorio->listarClientesPorCidade();

$cidade = \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cidade', 6);

//$resultado = $repositorio->findByObjeto($cidade);
//$resultado = $repositorio->listarCidadeDTO();
//$resultado = $repositorio->listarCidadeQueryBuilder();

var_dump($resultado);