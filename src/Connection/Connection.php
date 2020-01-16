<?php

namespace GestionEleves\Connection;

class Connection
{

    /**
     * @var ressource
     */
    private static $dbh;

    private function __construct()
    {

        $config = json_decode(file_get_contents(__DIR__ . "/../../config/database.json"));

        self::$dbh = new \PDO(

            "mysql:host="
                . $config->host
                . ";dbname=" . $config->dbname .
                ";charset=utf8",
            $config->username,
            $config->password,
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]

        );
    }

    public static function getConnection()
    {
        if (null === self::$dbh) {
            new Connection();
        }
        return self::$dbh;
    }
}
