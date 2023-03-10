<?php
namespace AsaP\Utils;
use \PDO;
use \PDOStatement;
use \AsaP\Main;

class Database {
    private static \PDO $database;

    private static function getPDO() : PDO
    {
        if (!isset(SELF::$database))
        {
            $database = new PDO("mysql:host=" . Main::getInstance()->getConfig()->database->host . ";dbname=" . Main::getInstance()->getConfig()->database->name . ";charset=utf8", Main::getInstance()->getConfig()->database->user, Main::getInstance()->getConfig()->database->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            SELF::$database = $database;
        }

        return SELF::$database;
    }

    public static function query($statement, $className)
    {
        $request = SELF::getPDO()->query($statement);
        $results = $request->fetchAll(PDO::FETCH_CLASS, $className);

        return $results;
    }

}

?>