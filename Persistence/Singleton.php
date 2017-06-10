<?php
namespace Webdev;

use Doctrine\DBAL\Logging\EchoSQLLogger;

class Singleton {

    public static $entityManager = null;

    private function __construct() {
        
    }

    public static function getEntityManager() {

        if (self::$entityManager == null) {

            $entidades = array("./Entidades");
            $devMode = true;

            $parametrosBD = array(
                "host" => "localhost",
                "driver" => "pdo_mysql",
                "user" => "root",
                "password" => "",
                "dbname" => "webdev",
                'charset'  => 'utf8'
            );

            $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entidades, $devMode);
            //$config->setSQLLogger(new EchoSQLLogger());
            self::$entityManager = \Doctrine\ORM\EntityManager::create($parametrosBD, $config);
        }

        return self::$entityManager;
    }

}
