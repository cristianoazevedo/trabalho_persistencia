<?php

class Conexao
{
    private static $conexao;

    private function __construct()
    {
    }

    public static function getConexao()
    {
        if (!self::$conexao) {
            self::$conexao = new \PDO("mysql:host=localhost;dbname=webdev", "root", "",
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }

        return self::$conexao;
    }
}