<?php
require_once __DIR__ .'/../../vendor/autoload.php';

class ControllerCliente {

    public static function build() {
        return new \Webdev\Entidades\Cliente();
    }

    public static function save($post) {

        $idCliente = isset($_POST["idCliente"]) ? $_POST["idCliente"] : false;
        $idCidade = isset($_POST["idCidade"]) ? $_POST["idCidade"] : false;
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : false;
        $idade = isset($_POST["idade"]) ? $_POST["idade"] : false;
        $email = isset($_POST["email"]) ? $_POST["email"] : false;
        $celular = isset($_POST["celular"]) ? $_POST["celular"] : false;
        $cep = isset($_POST["cep"]) ? $_POST["cep"] : false;
        $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : false;

        if (!$idCliente) {
            $cliente = new \Webdev\Entidades\Cliente();
        } else {
            $cliente = \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cliente', $idCliente);
        }

        $cidade = \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cidade', $idCidade);

        $cliente->setNome($nome);
        $cliente->setIdade($idade);
        $cliente->setEmail($email);
        $cliente->setCelular($celular);
        $cliente->setCep($cep);
        $cliente->setEndereco($endereco);
        $cliente->setCidade($cidade);

        \Webdev\Singleton::getEntityManager()->persist($cliente);
        \Webdev\Singleton::getEntityManager()->flush();
    }

    public static function delete($idCliente) {
        try {
            $cliente = \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cliente', $idCliente);
            \Webdev\Singleton::getEntityManager()->remove($cliente);
            \Webdev\Singleton::getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function get($idCliente) {
        return \Webdev\Singleton::getEntityManager()->find('Webdev\Entidades\Cliente', $idCliente);
    }

    public static function all() {
        return \Webdev\Singleton::getEntityManager()->getRepository('Webdev\Entidades\Cliente')->findAll();
    }

}
