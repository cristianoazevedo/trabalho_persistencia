<?php

session_start();

if (!isset($_SESSION["LOGADO"]))
    $_SESSION["LOGADO"] = false;

if (!isset($_SESSION["CLIENTES"]))
    $_SESSION["CLIENTES"] = array();

if (!isset($_SESSION["CLIENTE_CODIGO"]))
    $_SESSION["CLIENTE_CODIGO"] = 1;


if (!isset($_SESSION["PRODUTOS"]))
    $_SESSION["PRODUTOS"] = array();

if (!isset($_SESSION["PRODUTO_CODIGO"]))
    $_SESSION["PRODUTO_CODIGO"] = 1;


if (!isset($_SESSION["VENDAS"]))
    $_SESSION["VENDAS"] = array();

if (!isset($_SESSION["VENDA_CODIGO"]))
    $_SESSION["VENDA_CODIGO"] = 1;
?>