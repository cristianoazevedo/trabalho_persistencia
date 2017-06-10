<?php
require_once __DIR__ .'/../../vendor/autoload.php';

class ControllerCidade {

    public static function build() {
        return new \Webdev\Entidades\Cidade();
    }

    public static function save($post) {

        $idCidade = isset($post["idCidade"]) ? $post["idCidade"] : false;
        $nome = isset($post["nome"]) ? $post["nome"] : false;
        $uf = isset($post["uf"]) ? $post["uf"] : false;

        $cidade = new \Webdev\Entidades\Cidade();

        if ($idCidade) {
            $cidade = \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cidade', $idCidade);
        }

        $cidade->setNome($nome);
        $cidade->setUf($uf);

        \Webdev\Singleton::getEntityManager()->persist($cidade);
        \Webdev\Singleton::getEntityManager()->flush();
    }

    public static function delete($idCidade) {

        try {
            $cidade = \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cidade', $idCidade);
            \Webdev\Singleton::getEntityManager()->remove($cidade);
            \Webdev\Singleton::getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function get($idCidade) {
        return \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cidade', $idCidade);
    }

    public static function all() {
        return \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cidade')->findAll();
    }

}
