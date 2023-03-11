<?php
namespace AsaP\Utils;
use \PDO;
use \AsaP\Main;

class Database
{
    private static \PDO $database;

    // Establishes a connection to the database
    private static function getPDO() : PDO
    {
        // If no connection exists, create one
        if (!isset(SELF::$database))
        {
            $database = new PDO("mysql:host=" . Main::getInstance()->getConfig()->database->host . ";dbname=" . Main::getInstance()->getConfig()->database->name . ";charset=utf8", Main::getInstance()->getConfig()->database->user, Main::getInstance()->getConfig()->database->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            SELF::$database = $database;
        }

        return SELF::$database;
    }

    // Executes an unsecure query (SQL Injection possible)
    public static function query($statement, $className)
    {
        $request = SELF::getPDO()->query($statement);
        $results = $request->fetchAll(PDO::FETCH_CLASS, $className);

        return $results;
    }

    // Executes a secure prepared statement (prevents SQL Injection)
    public static function prepare($statement, $params, $className)
    {
        $statement = SELF::getPDO()->prepare($statement);
        $statement->execute($params);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, $className);

        return $results;
    }

}