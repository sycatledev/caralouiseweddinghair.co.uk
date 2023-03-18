<?php

namespace AsaP;

use \PDO;
use \AsaP\Main;

class Database
{
    private static \PDO $database;

    // Establishes a connection to the database
    private static function getPDO(): PDO
    {
        $credentials = self::getCredentials();

        // If no connection exists, create one
        if (!isset(SELF::$database)) {
            $database = new PDO("mysql:host=" . $credentials->host . ";dbname=" . $credentials->name . ";charset=utf8", $credentials->user, $credentials->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            SELF::$database = $database;
        }

        return SELF::$database;
    }

    private static function getCredentials()
    {
        $config = Main::getInstance()->getConfig();
        $env = Main::getInstance()->getEnvironment();

        return $config->$env->database;
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
